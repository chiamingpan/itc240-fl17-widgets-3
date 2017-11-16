<?php

/*config.php
*/


//prevent header already sent error
ob_start();


define('DEBUG',TRUE); #we want to see all errors

//prevent date error
date_default_timezone_set('America/Los_Angeles');

//add include file reference here
include 'credentials.php';//database credentials. here
include 'common.php';


//Create config object
$config = new stdClass;

//find the current page URL;
//echo basename($_SERVER['PHP_SELF']);
//define helps us create a constant, string,number,boolean

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//Web page defaults
$config->title = THIS_PAGE;
$config->banner = 'Widgets';


switch(THIS_PAGE)
{        
    case 'index.php':
        $config->title = "Home Page-Widgets";
        $config->banner = "Home Banner";
    
    break;
    
    case 'customers.php':
        $config->title = "Customers Page-Widgets";
        $config->banner = "Customers Banner";
      
    break;
    
    case 'appointment.php':
        $config->title = "Appointment Page-Widgets";
        $config->banner = "Appointment Banner";
    break;
        
    case 'daily.php':
        $config->title = "Daily Page-Widgets";
        $config->banner = "Daily Banner";
    break;
        
    case 'contact.php':
        $config->title = "Widgets Contact Page";
        $config->banner = "Contact Banner";
    break;
}


?>
