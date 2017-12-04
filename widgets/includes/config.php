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

//START NEW THEME STUFF
$sub_folder = 'widgets';//change to 'widgets' or 'sprockets' etc.

//add subfolder, in this case 'fidgets' if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
$config->virtual_path = 'http://' . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;
$config->theme = 'BusinessCasual';//sub folder to themes

//END NEW THEME STUFF

//Web page defaults
$config->title = THIS_PAGE;
$config->banner = 'Widgets';
$config->loadhead = '';//place items in <head> element
$config->loadfoot = '';//place to store items just before body tag
$config->hero = '';//will store random superhero icons
$config->planet = '';//will store random superhero icons


switch(THIS_PAGE)
{        
    case 'index.php':
        $config->title = 'Home Page';
        $config->banner = 'Home Page Banner';
    break;
    
    case 'customer_list.php':
        $config->title = 'Customers Page';
        $config->banner = 'Customer List Banner';
      
    break;
    
    case 'appointment.php':
        $config->title = 'Appointment Page';
        $config->banner = 'Appointment Banner';
    break;
        
    case 'daily.php':
        $config->title = 'Daily Page';
        $config->banner = 'Daily Banner';
    break;
        
    case 'contact.php':
        $config->title = 'Contact Page';
        $config->banner = 'Contact Banner';
    break;
}

//START NEW THEME STUFF
//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . '/themes/' . $config->theme . '/';
//END NEW THEME STUFF
?>
    ?>
