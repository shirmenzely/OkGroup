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
        $this->calendarapi = new Google_Service_Calendar($this->googleapi->client()); //create  api google calender object 
    }

    public function portal()
    {
        $sess_id = $this->session->userdata('user');
        if (empty($sess_id) || $_SESSION['manager'] != 1) {
            redirect("Pages/index");
        } else {
            $data['user'] = $this->session->all_userdata();
        }

        $data['user'] = $this->session->all_userdata();
        $data['title'] = "פורטל עובדים";
        $this->load->view('templates/header', $data);
        $this->load->view('employee_portal/portal', $data);
        $this->load->view('templates/footer');
    }

    public function getCalendar()
    {
        $sess_id = $this->session->userdata('user');
        if (empty($sess_id) || $_SESSION['manager'] != 1) {
            redirect("Pages/index");
        } else {
            $data['user'] = $this->session->all_userdata();
        }

        $data['user'] = $this->session->all_userdata();
        $data['title'] = "יומן אירועים";
        $this->load->view('templates/header', $data);
        $this->load->view('employee_portal/event_calendar', $data);
        $this->load->view('templates/footer');
    }

    public function view_order()
    { // View pending orders
        $data['order'] = NULL;
        $data['order'] = $this->Employee_portal_model->get_pending_orders_by_status();
        $data['title'] = 'ניהול הצעת מחיר';
        $sess_id = $this->session->userdata('user');
        if (empty($sess_id) || $_SESSION['manager'] != 1) {
            redirect("Pages/index");
        } else {
            $data['user'] = $this->session->all_userdata();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('employee_portal/pending_order', $data);
        $this->load->view('templates/footer');
    }


    public function change_status()
    {
        $order_id = $this->input->post('order_id');
        $flag = $this->Employee_portal_model->update_status($order_id);
        if (
            $this->input->post('status_order') == "מאושר"
            && $flag
        ) { // if the status is "מאושר" add event to calendar
            $this->add_event_to_calendar($order_id);
            $this->session->set_flashdata('message2', 'האירוע התווסף ללוח האירועים של החברה');
        }
        $this->extra_details_after_change($order_id);
    }

    public function add_event_to_calendar($order_id) // api google calender
    {
        $details = $this->Employee_portal_model->get_details_order($order_id);
        //change the format from string to date
        $datetemp = str_replace('/', '-', $details[0]['order_date']);
        $datetemp = date_create_from_format("d-m-Y", $datetemp);
        $date = date_format($datetemp, "Y-m-d");

        $data = array();
        $data['breadcrumbs'] = array('Google Calendar' => '#');

        $event = new Google_Service_Calendar_Event(array(
            'summary' => $details[0]['order_type'] . ' לחברת ' . $details[0]['company'],
            'location' => $details[0]['city'],
            'description' => 'סטטוס:' . $details[0]['status'] . ' מספר הזמנה:' . $details[0]['id'],
            'start' => array(
                'date' => $date,
                'timeZone' => 'Israel',
            ),
            'end' => array(
                'date' => $date,
                'timeZone' => 'Israel',
            ),
            'recurrence' => array(
                'RRULE:FREQ=DAILY;COUNT=1'
            ),
            'attendees' => array(
                array('email' => $details[0]['email']),

            ),
        ));
        //  $data['htmlLink'] = $event->htmlLink;


        $calendarId = 'okgroup2020@gmail.com';

        $event = $this->calendarapi->events->insert($calendarId, $event);
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
        $sess_id = $this->session->userdata('user');
        if (empty($sess_id) || $_SESSION['manager'] != 1) {
            redirect("Pages/index");
        } else {
            $data['user'] = $this->session->all_userdata();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('employee_portal/extra_details', $data);
        $this->load->view('templates/footer');
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
            $this->send_email($order_id, $file_name, $pdf);
        }
    }

    public function send_email($order_id,$file_name,$pdf)
    {
        file_put_contents($file_name, $pdf->Output($file_name, 'S'));



 $this->service = new Google_Service_Gmail($this->googleapi->client());//create  api google  object 


   $strMailContent = 'O.K. GROUP שלום, למייל זה מצורפת הצעת מחיר עבור הזמנת שירות של חברת 
        <br>
        בברכה,
        <br>
        O.K. GROUP';

    $strRawMessage = "";
    $boundary = uniqid(rand(), true);
    $subjectCharset = $charset = 'utf-8';
    $strToMailName = 'client';
    $strToMail = $this->input->post('email_user');
    $strSesFromName = ' O.k. Group';
    $strSesFromEmail = 'okgroup2020@gmail.com';
    $strSubject = "הצעת מחיר להזמנה " . $order_id . "";

    $strRawMessage .= 'To: ' .$strToMailName . " <" . $strToMail . ">" . "\r\n";
    $strRawMessage .= 'From: '.$strSesFromName . " <" . $strSesFromEmail . ">" . "\r\n";

    $strRawMessage .= 'Subject: =?' . $subjectCharset . '?B?' . base64_encode($strSubject) . "?=\r\n";
    $strRawMessage .= 'MIME-Version: 1.0' . "\r\n";
    $strRawMessage .= 'Content-type: Multipart/Mixed; boundary="' . $boundary . '"' . "\r\n";

    $filePath = $file_name;
    $finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
    $mimeType = finfo_file($finfo, $filePath);
    $fileData = base64_encode(file_get_contents($filePath));

    $strRawMessage .= "\r\n--{$boundary}\r\n";
    $strRawMessage .= 'Content-Type: '. $mimeType .'; name="'. $file_name .'";' . "\r\n";            
    $strRawMessage .= 'Content-ID: <' . $strSesFromEmail . '>' . "\r\n";            
    $strRawMessage .= 'Content-Description: ' . $file_name . ';' . "\r\n";
    $strRawMessage .= 'Content-Disposition: attachment; filename="' . $file_name . '"; size=' . filesize($filePath). ';' . "\r\n";
    $strRawMessage .= 'Content-Transfer-Encoding: base64' . "\r\n\r\n";
    $strRawMessage .= chunk_split(base64_encode(file_get_contents($filePath)), 76, "\n") . "\r\n";
    $strRawMessage .= "--{$boundary}\r\n";
    $strRawMessage .= 'Content-Type: text/html; charset=' . $charset . "\r\n";
    $strRawMessage .= 'Content-Transfer-Encoding: quoted-printable' . "\r\n\r\n";
    $strRawMessage .= $strMailContent . "\r\n";

    //Send Mails
    //Prepare the message in message/rfc822
    try {
        // The message needs to be encoded in Base64URL
        $mime = rtrim(strtr(base64_encode($strRawMessage), '+/', '-_'), '=');
        $msg = new Google_Service_Gmail_Message();
        $msg->setRaw($mime);
        $userId='okgroup2020@gmail.com';
        $objSentMsg =  $this->service->users_messages->send($userId, $msg);


            $this->session->set_flashdata('message', 'הצעת מחיר נשלחה ללקוח');
            $error = $this->Employee_portal_model->set_status_and_price($order_id, $this->input->post('final_price'));
                    redirect('Employee_portal/extra_details_after_change/' . $order_id . '');

    } catch (Exception $e) {
           redirect('Employee_portal/extra_details_after_change/' . $order_id . '');
            $this->session->set_flashdata('message', ' קרתה תקלה! המערכת לא הצליחה לשלוח את המייל');
    }

}


}
