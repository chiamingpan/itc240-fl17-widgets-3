<?php include 'includes/config.php'?>

<?php
if(isset($_GET['day']))
{//from the querystring
    $day = $_GET['day'];
    
}else{//from the system clock
    $day = date('l');
}
    
    
?>
    <?php get_header()?>
    <h3>Daily</h3>
    <p>Current contents of the variable days:
        <?=$day?>
    </p>
    <ul>
        <li><span><a class="dailyCourse" href="?day=Monday">Monday</a></span></li>
        <li><span><a class="dailyCourse" href="?day=Tuesday">Tuesday</a></span></li>
        <li><span><a class="dailyCourse" href="?day=Wednesday">Wednesday</a></span></li>
        <li><span><a class="dailyCourse" href="?day=Thursday">Thursday</a></span></li>
        <li><span><a class="dailyCourse" href="?day=Friday">Friday</a></span></li>
        <li><span><a class="dailyCourse" href="?day=Saturday">Saturday</a></span></li>
        <li><span><a class="dailyCourse" href="?day=Sunday">Sunday</a></span></li>
    </ul>


    <?php get_footer()?>
