<?php include 'includes/config.php'?>

<?php
if(isset($_GET['day']))
{//from the querystring
    $day = $_GET['day'];
    
}else{//from the system clock
    $day = date('l');
}
    
    
?>
    <?php include 'includes/header.php'?>
    <h3>Daily</h3>
    <p>Current contents of the variable days:
        <?=$day?>
    </p>
    <span><a class="col-lg-3 dailyCourse" href="?day=Monday">Monday<img src="img/1_animal_pots.jpg" alt="mondayclass"></a></span>
    <span><a class="col-lg-3 dailyCourse" href="?day=Tuesday">Tuesday<img src="img/2_getting_moldy.jpg" alt="tuesdayclass"></a></span>
    <span><a class="col-lg-3 dailyCourse" href="?day=Wednesday">Wednesday<img src="img/3_low_fire_soda.jpg" alt="wednesdayclass"></a></span>
    <span><a class="col-lg-3 dailyCourse" href="?day=Thursday">Thursday<img src="img/4_handbuilt_pottery.jpg" alt="thursdayclass"></a></span>
    <span><a class="col-lg-3 dailyCourse" href="?day=Friday">Friday<img src="img/5_sculpting_in_the_daylight%20.jpg" alt="fridayclass"></a></span>
    <span><a class="col-lg-3 dailyCourse" href="?day=Saturday">Saturday<img src="img/6_intermedvanced.jpg" alt="fridayclass"></a></span>
    <span><a class="col-lg-3 dailyCourse" href="?day=Sunday">Sunday<img src="img/7_workshop_with_hayne_bayless.jpg" alt="sundayclass"></a></span>


    <?php include 'includes/footer.php'?>
