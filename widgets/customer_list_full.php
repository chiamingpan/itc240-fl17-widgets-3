<?php
//customer_list.php - shows a list of customer data
?>
    <?php include 'includes/config.php';?>
    <?php get_header()?>
    <h1>
        <?=$pageID?>
    </h1>
    <?php
$sql = "select * from test_Customers";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records
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
        echo '</tr>';
        
    }    
    echo '</table>';

}else{//inform there are no records
    echo '<p>What! No Customers?  There must be a mistake!!</p>';
}

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
        <?php get_footer();?>
