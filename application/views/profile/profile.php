<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/profile.css" />


<main>
    <section class="title caption" style="background-image: url('<?php echo base_url(); ?>asset/img/profile_title.jpg')">
        <span class="border">פרופיל אישי</span><br>
    </section>

    <section id="details" class="tab">
        <h2>פרטי משתמש </h2>
        <p> אימייל:<br><label> <?php echo $user['user'] ?></label> </p>
        <p> שם חברה: <br><label> <?php echo $user['company'] ?></label> </p>
    </section>

    <section id="" class="tab">
        <h2>הזמנה קרובה </h2>
        <?php if ($coming_orders != null) { ?>
            <p class="date"> תאריך האירוע מתקרב <?php echo $coming_orders[0]['order_date'] ?> </p>
            מספר הזמנה: <?php echo $coming_orders[0]['id'] ?> <br>
            סוג אירוע: <?php echo $coming_orders[0]['order_type'] ?> <br>
            מספר משתתפים: <?php echo $coming_orders[0]['num_participants'] ?> <br>
            מיקום האירוע: <?php echo $coming_orders[0]['city'] ?> <br>
            סוג הגשה: <?php echo $coming_orders[0]['type_dish'] ?> <br>
            שם איש קשר: <?php echo $coming_orders[0]['name_contect'] ?> <br>
            טלפון איש קשר: <?php echo $coming_orders[0]['phone_contect'] ?> <br>
            <?php if ($coming_orders[0]['note'] != " ") { ?>
                הערות: <?php echo $coming_orders[0]['note'] ?> <br><?php } ?>
            ספקים:
            <?php $count = 0;
            foreach ($supplier as $correntsup) : ?>
                <?php if ($correntsup['id_order'] == $coming_orders[0]['id']) { ?>
                    <br> <?php echo $correntsup['profession'];
                            $count++; ?>
                <?php } ?>
            <?php endforeach; ?>
            <?php if ($count == 0) {?>
            לא נבחרו ספקים חיצוניים לאירוע
        <?php } }else { ?>
            אין הזמנה קרובה :(
        <?php } ?>
    </section>


    <section id="comingorders" class="tab">
        <h2>הזמנות הבאות </h2>
        <?php if (sizeof($coming_orders) > 1) { ?>
            <?php for ($i = 1; $i < sizeof($coming_orders); $i++) { ?>
                <section id="comingorder">
                    <p class="date"> תאריך האירוע <?php echo $coming_orders[$i]['order_date'] ?> , מספר הזמנה <?php echo $coming_orders[$i]['id'] ?> </p>
                    סוג אירוע: <?php echo $coming_orders[$i]['order_type'] ?> <br>
                    מספר משתתפים: <?php echo $coming_orders[$i]['num_participants'] ?> <br>
                    מיקום האירוע: <?php echo $coming_orders[$i]['city'] ?> <br>
                    סוג הגשה: <?php echo $coming_orders[$i]['type_dish'] ?> <br>
                    שם איש קשר: <?php echo $coming_orders[$i]['name_contect'] ?> <br>
                    טלפון איש קשר: <?php echo $coming_orders[$i]['phone_contect'] ?> <br>
                    <?php if ($coming_orders[$i]['note'] != " ") { ?>
                        הערות: <?php echo $coming_orders[$i]['note'] ?> <br><?php } ?>
                    ספקים:
                    <?php $count = 0;
                    foreach ($supplier as $correntsup) : ?>
                        <?php if ($correntsup['id_order'] == $coming_orders[$i]['id']) { ?>
                            <br> <?php echo $correntsup['profession'];
                                    $count++; ?>
                        <?php } ?>
                    <?php endforeach; ?>
                    <?php if ($count == 0){ ?>
                    לא נבחרו ספקים חיצוניים לאירוע
                <?php } ?>
                </section>
            <?php } } else { ?>
                אין הזמנות קרובות :(
            <?php } ?>
    </section>


    <section id="prevorders" class="tab">
        <h2>הזמנות קודמות </h2>
        <?php if ($prev_orders != null) { ?>

            <table style="overflow-x:auto;">
                <tr>
                    <th>מספר הזמנה</th>
                    <th>תאריך אירוע</th>
                    <th>סוג אירוע</th>
                    <th> מיקום אירוע</th>
                    <th>מספר משתתפים</th>
                    <th> סוג הגשה</th>
                    <th>טלפון איש קשר</th>               
                    <th> ספקים</th>

                </tr>
                <?php foreach ($prev_orders as $prev_order) : ?>

                    <tr>
                        <td> <?php echo $prev_order['id'] ?> </td>
                        <td><?php echo $prev_order['order_date'] ?></td>
                        <td><?php echo $prev_order['order_type'] ?></td>
                        <td><?php echo $prev_order['city'] ?></td>
                        <td><?php echo $prev_order['num_participants'] ?></td>
                        <td><?php echo $prev_order['type_dish'] ?></td>
                        <td><?php echo $prev_order['name_contect'] ?></td>
                        <td>
                            <?php $count=0; foreach ($supplier as $correntsup) : ?>
                                <?php if ($correntsup['id_order'] == $prev_order['id']) { ?>
                                    <?php echo  $correntsup['profession']; $count++; ?> <br>
                                <?php } if($count==0) echo'לא נבחרו ספקים חיצוניים'; ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </table>
        <?php } else { ?>
            אין הזמנות קודמות<?php } ?>

    </section>

</main>