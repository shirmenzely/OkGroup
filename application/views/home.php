 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/home.css"/>

    <button onclick="topFunction()" id="myBtn" title="Go to top">לראש העמוד</button>




    <section class="bg-image img1">   

        <img id="firstimg" src="<?php echo base_url(); ?>asset/img/ok.png" >


    </section>

    <section class="bg-image img2 flex">    
        <section class="right">
            <h1>מי אנחנו?</h1>
            <h1>  ובמה אנו מתמחים?</h1>

            <p> O.K. GROUP

                הינה חברה המאגדת תחת קורת גג אחת את כל נותני השרות הדרושים למנהלים ומקבלי החלטות     
                .
            </p>

            <p>
                חברתנו פעילה במגוון תחומי פעילות, אותם מובילים אנשי מקצוע, יועצים ומנהלים מומחים בתחומי הניהול הייעוץ והובלת שינויים בימוי והפקת אירועים וכנסים ענקיים.
            </p>

            <p>
                הידע המקצועי והניסיון הרב בעבודה בתחומי חינוך חברה וקהילה כמוכן המומחיות בהובלת שינויים ארגוניים חברתיים מאפשרים לנו להפוך את ארגונך מטוב למצוין. 
            </p>

            <p>
                חברתנו מובילה חדשנות ומתחייבת תמיד בשרות מקצוענות אמינות נאמנות ללא פשרות תוך שמירה על משמעות ערכית וצניעות צרו עימנו קשר ונגיע ללא התחייבות לפגישת הכרות.
            </p>

            <p>
                <b>        
                    שלכם,
                    <br>
                    O.K. GROUP
                </b>
            </p>


        </section>
        <section class="left photo">
            <img class="pic" src="<?php echo base_url(); ?>asset/img/work1.png" >
        </section>
    </section>
    
    <section class="bg-image img3 flex">
        <div class="left ">
            
            <h1>
                מנכ"ל החברה 
               
                חיים ביטון (קוקי)
                <br>
                MBA מינהל עסקים, מינהל החינוך
            
                <br>
                    יועץ ארגוני
                ומאמן מומחה ל-ADHD
                
            </h1>

        <p>
            מעל 30 שנה הוביל מערכות ציבוריות ארגוניות חינוכיות ברמה מקומית וארצית 

                חיים הוביל תפקידים רבים:
                מנכ"ל עיריית אריאל ,מנכ"ל המרכז הבינתחומי לתרבות פנאי וספורט באריאל, מנכל הרשת למרכזים קהילתיים ביבנה, מנהל האגף לחינוך הבלתי פורמלי ואירועים ביבנה.
            </p>

            <p>
                <b>
                    בין היתר בתפקידיו הוביל את 
                </b>

                <br>

                הקמת האגף לחינוך בלתי פורמלי ואירועים ביבנה.
                <br>

                הקמת הרשת למרכזים קהילתיים ביבנה.
                <br>

                הקמת המרכז הבינתחומי לתרבות פנאי וספורט באריאל.
                <br>

                ניהל את מחנות הארציים לקידום נוער ומנהיגות צעירה 
                <br>
                <br>

                <b>
                    זכה בפרסים רבים

                </b>


                <br>
                פרס חינוך אישי לעבודה עם נוער
                <br>
                פרס יחידות נוער מצטיינות ארצית 
                <br>
                שותף בפרסי חינוך ארציים

            </p>
            <br>
            <br>
            <br>
            <br>

        </div> 


    </section>

    <section class="bg-image img4 flex-center">

        <div class="center">
            <img  style="width:60px" src="<?php echo base_url(); ?>asset/img/location.png" >
            <p>המיסב 5 , יבנה</p>
        </div>

        <div class="center">
            <img  style="width:60px" src="<?php echo base_url(); ?>asset/img/phone.png" >
            <p> 054-5691296 </p>
        </div>

        <div class="center">
            <img  style="width:60px" src="<?php echo base_url(); ?>asset/img/mail.png" >
            <p> haim.okinc@gmail.com
            </p>
        </div>
    </section>

    <section class="bg-image img5 flex">
        <div class="right responsiveDown">
            <h1>תמונות שוות אלפי מילים</h1>
            <a id="photo_button" href="<?php echo site_url(); ?>/pages/photo_galary" > 
                להצצה לחץ כאן >></a> 
                <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
        </div>
        <div class="left photo">

            <img  src="<?php echo base_url(); ?>asset/img/photo.png" >
            <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        </div>
       
    </section>

    <footer>
<section id="left-text">
Copyright 2020 NSR - All Rights Reserved © 

</section>

<section id="rigth-text">
<i class="fa fa-fw fa-facebook"></i>
<i class="fa fa-fw fa-google"></i>
<i class="fa fa-fw fa-youtube"></i>
<i class="fa fa-fw fa-instagram"></i>
</section>


</footer>


<script>
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
