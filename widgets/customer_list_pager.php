<?php
/**
 * demo_list_pager.php demonstrates a list page that paginates data across 
 * multiple pages
 * 
 * This page uses a Pager class which processes a mysqli SQL statement 
 * and spans records across multiple pages. 
 * 
 * @package nmPager
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 3.2 2015/11/24
 * @link http://www.newmanix.com/
 * @license http://www.apache.org/licenses/LICENSE-2.0 v. 3.0
 * @see MyAutoLoader.php
 * @see Pager.php 
 * @todo none
 */

require 'includes/config.php'; #provides configuration, pathing, error handling, db credentials 
require 'includes/Pager.php'; #allows pagination 
# SQL statement
$sql = "select * from test_Customers";

#Fills <title> tag  
$title = 'Customer List/View/Pager';
$config ->loadhead .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';

# END CONFIG AREA ---------------------------------------------------------- 

get_header(); #header must appear before any HTML is printed by PHP

?>
    <hr class="divider">
    <h2 class="text-center text-lg text-uppercase my-0">
        <strong>Customers List</strong>
    </h2>
    <hr class="divider">

    <p>Here is the list of our happy customers' personal information. </p>
    <?php
#reference images for pager

$prev = '<i class="fa fa-angle-double-left" aria-hidden="true" style="color:#660000"></i>';
$next ='<i class="fa fa-angle-double-right" aria-hidden="true" style="color:#660000"></i>';

//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

# Create instance of new 'pager' class
$myPager = new Pager(10,'',$prev,$next,'');
$sql = $myPager->loadSQL($sql,$iConn);  #load SQL, pass in existing connection, add offset
//$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{#records exist - process
    echo $myPager->showNAV();//show pager if enough records 
	if($myPager->showTotal()==1){$itemz = "customer";}else{$itemz = "customers";}  //deal with plural
    echo '<p align="center">We have ' . $myPager->showTotal() . ' ' . $itemz . '!</p>';
    echo '<table><tr>
    <th width="10%">First Name</th>
    <th width="10%">Last Name</th>
    <th width="10%">E-mail</th></tr>';
    
    while($row = mysqli_fetch_assoc($result))
    {
        echo '<tr>';
        echo '<td width="10%"><a href="customer_view.php?id=' . $row['CustomerID'] . '">' . $row['FirstName'] . '</a></td>';
        echo '<td width="10%">'. $row['LastName'] . '</td>';
        echo '<td width="10%">'. $row['Email'] . '</td>';
        echo '<td width="10%"><img src="' . $config->virtual_path . 'uploads/customer' . dbOut($row['CustomerID']) . '_thumb.jpg" /></td>';
        echo '</tr>';
        
    }    
    echo '</table>';

}else{//inform there are no records
    echo '<p>What! No Customers?  There must be a mistake!!</p>';
}


@mysqli_free_result($result);
@mysqli_close($iConn);




get_footer();
?>
