<?php
class Employee_portal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_portal_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('javascript');
        $this->load->library('pdf');
        $this->load->library('email');
        $this->load->library('encrypt');
        $this->load->library('googleapi');

        $this->calendarapi = new Google_Service_Calendar($this->googleapi->client());//create  api google calender object 
    }
    public function add_event_to_calendar($order_id) // api google calender
    {
        $details=$this->Employee_portal_model->get_details_order($order_id);
        //change the format from string to date
        $datetemp = str_replace('/', '-', $details[0]['order_date']);
        $datetemp=date_create_from_format("d-m-Y",$datetemp );
        $date =date_format($datetemp,"Y-m-d");
       
        $data = array();
        $data['breadcrumbs'] = array('Google Calendar' => '#');

        $event = new Google_Service_Calendar_Event(array(
            'summary' => $details[0]['order_type'] .' לחברת '. $details[0]['company'],
            'location' => $details[0]['city'],
            'description' => 'סטטוס:'.$details[0]['status'].' מספר הזמנה:' .$details[0]['id'],
            'start' => array(
                'date' =>$date,
                'timeZone' => 'Israel',
            ),
            'end' => array(
                'date' =>$date,
                'timeZone' => 'Israel',
            ),
            'recurrence' => array(
                'RRULE:FREQ=DAILY;COUNT=1'
            ),
            'attendees' => array(
                array('email' =>$details[0]['email'] ),
           
              ),
        ));
      //  $data['htmlLink'] = $event->htmlLink;

        $calendarId = 'okgroup2020@gmail.com';
        $event = $this->calendarapi->events->insert($calendarId, $event);
    }

    public function getCalendar()
    {
        $data['user'] = $this->session->all_userdata();
        $data['title'] = "לוח אירועים";

        $this->load->view('templates/header', $data);
        $this->load->view('employee_portal/event_calendar', $data);
        $this->load->view('templates/footer');
   
    }

    public function view_order()
    { // View pending orders
        $data['order'] = NULL;
        $data['order'] = $this->Employee_portal_model->get_pending_orders_by_status();
        $data['title'] = 'ניהול הצעת מחיר';
        $data['user'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('employee_portal/pending_order', $data);
        $this->load->view('templates/footer');
    }


    public function extra_details()
    { // View order details and order quote
        $data['order'] = NULL;
        $data['supplier'] = NULL;
        $data['price'] = NULL;
        $data['price'] = $this->Employee_portal_model->get_price();
        $data['order'] = $this->Employee_portal_model->get_details_order($this->input->post('id'));
        $data['supplier'] = $this->Employee_portal_model->get_supplier_in_order($this->input->post('id'));
        $data['title'] = 'פרטי הזמנה ';
        $data['title2'] = 'תוספות לאירוע ';
        $data['user'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('employee_portal/extra_details', $data);
        $this->load->view('templates/footer');
    }
    public function change_status()
    {
        $order_id = $this->input->post('order_id');
        $this->Employee_portal_model->update_status($order_id);
        if($this->input->post('status_order')=="מאושר"){ // if the status is "מאושר" add event to calendar
            $this->add_event_to_calendar($order_id);
        }
        $this->extra_details_after_change($order_id);
    }

    public function extra_details_after_change($order_id)
    {
        $data['order'] = NULL;
        $data['supplier'] = NULL;
        $data['price'] = NULL;
        $data['price'] = $this->Employee_portal_model->get_price();
        $data['order'] = $this->Employee_portal_model->get_details_order($order_id);
        $data['supplier'] = $this->Employee_portal_model->get_supplier_in_order($order_id);
        $data['title'] = 'פרטי הזמנה ';
        $data['title2'] = 'תוספות לאירוע';
        $data['user'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('employee_portal/extra_details', $data);
        $this->load->view('templates/footer');
    }

    public function bid_pdf() // Make pdf and send it to the client
    {
        $order_id = $this->input->post('order_id');
        $file_name = "" . $order_id . ".pdf";

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('O.K. Group');
        $pdf->SetTitle("  הצעת מחיר להזמנה " . $order_id . "");
        $pdf->SetSubject('הצעת מחיר');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        // set header and footer fonts
        $pdf->setHeaderFont(array('freeserif', '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // set font
        $pdf->SetFont('freeserif', '', 12);

        $html = '';

        $data_content = $this->Employee_portal_model->fetch_single_details($order_id);
        $html .= $data_content;

        $html .= '<p align="left"> בברכה, <br>
        חברת  GROUP .K.O</p>';

        if ($this->input->post('show') == 1) {
            $html .= '      
             <a href="' . site_url() . '/Employee_portal/extra_details_after_change/' . $order_id . '" class="btn btn-primary">לחזרה לחץ כאן</a></td> ';
        }
        // add a page
        $pdf->AddPage();

        // write the text
        $pdf->writeHTML($html);

        if ($this->input->post('show') == 1) {
            $error = $this->Employee_portal_model->set_price($order_id, $this->input->post('final_price'));
            //Close and output PDF document
            $pdf->Output($file_name, 'I');
        } else {
            $this->send_email($order_id,$file_name,$pdf);
        }
    }
    public function send_email($order_id,$file_name,$pdf){
        file_put_contents($file_name, $pdf->Output($file_name, 'S'));
        $message = 'O.K. GROUP שלום, למייל זה מצורפת הצעת מחיר עבור הזמנת שירות של חברת 
        <br>
        בברכה,
        <br>
        O.K. GROUP';
        //SMTP & mail configuration
        $config = array(
            'protocol'  => 'SMTP',
            'smtp_host' => 'imap.gmail.com',
            'smtp_port' => 587 ,
            'smtp_user' => 'okgroup2020@gmail.com',
            'smtp_pass' => 'SNRgroup2020',
            'mailtype'  => 'html',
            'charset'  => 'utf-8',
            'wordwrap'  => TRUE
        );
        $mail_subject = "imap.gmail.com הצעת מחיר להזמנה " . $order_id . "";
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        
        $this->email->to('okgroup2020@gmail.com');
        //$this->email->to($this->input->post('email_user'));
        $this->email->from('no-replay@okgroup.com', 'O.k. Group');
        $this->email->subject($mail_subject);
        $this->email->message($message);
        $this->email->attach($file_name);
        if ($this->email->send()) {
            $this->session->set_flashdata('message', 'הצעת מחיר נשלחה ללקוח');
            $error = $this->Employee_portal_model->set_status_and_price($order_id, $this->input->post('final_price'));
        } else {
            $this->session->set_flashdata('message', ' קרתה תקלה! המערכת לא הצליחה לשלוח את המייל');
        }

        redirect('Employee_portal/extra_details_after_change/' . $order_id . '');


    }

}
