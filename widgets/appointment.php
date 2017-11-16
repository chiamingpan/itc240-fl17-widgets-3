<?php include 'includes/config.php'?>
<?php include 'includes/header.php'?>
<?php
//put client's email address here
$to      = 'Chia.Pan@seattlecolleges.edu';
if(isset($_POST["FirstName"])){//show data

	/*
    $FirstName = $_POST["FirstName"];
	$LastName = $_POST["LastName"];
	$Email = $_POST["Email"];
	$Comments = $_POST["Comments"];
    */
    
    /*
    if(isset($_POST['FirstName'])){$FirstName = strip_tags(trim($_POST['FirstName']));}else{$FirstName="";}
    */
    
    //clean and process the post data
    $FirstName = clean_post('FirstName');
    $LastName = clean_post('LastName');
    $Email = clean_post('Email');
    $Comments = clean_post('Comments');
    

    $subject = "Ceramics Appoinment Request From" . $FirstName . " " . $LastName . " " . date("F j, Y, g:i a");
        /*
    $myText = "The user has entered the following information:" . PHP_EOL . PHP_EOL; //double newlines 
    $myText .= $FirstName . " " . $LastName . PHP_EOL;
    $myText .= $Comments . PHP_EOL; */
    
    $myText = process_post();
    

    $headers = 'From: noreply@newmanix.com' . PHP_EOL .
    'Reply-To: ' . $Email . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $myText, $headers);
    
    echo '
    <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">
          <strong>Message Sent</strong>
        </h2>
        <hr class="divider">
    <p>Thank you for your information!</p>
    <p>We will get back to you within 48 hours</p>
    <p><a href="">Exit</a></p>
    ';
    

}else{//show form
    
/*Beginning hand building
Building
Advanced wheel throwing
*/
    
  echo '
        <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">
          <strong>Book Ceramins Appointment</strong>
        </h2>
        <hr class="divider">
        <form action="" method="post">
          <div class="row">
            <div class="form-group col-lg-4">
              <label class="text-heading">First Name</label>
              <input type="text" name="FirstName" class="form-control">
            </div>
			<div class="form-group col-lg-4">
              <label class="text-heading">Last Name</label>
              <input type="text" name="LastName" class="form-control">
            </div>
            <div class="form-group col-lg-4">
              <label class="text-heading">Email Address</label>
              <input type="email" name="Email" class="form-control">
            </div>

            <div class="clearfix"></div>
                
                <div class="form-group col-lg-4">
            <label class="text-heading">Appointment Type</label> 
            <p>
            <input type="radio" name="Appointment_Type" value="Beginning hand building" />  Beginning hand building<br>
            <input type="radio" name="Appointment_Type" value="Building" /> Building<br>
            <input type="radio" name="Appointment_Type" value="Advanced wheel throwing" /> Advanced wheel throwing<br>
            </p>
            </div>
            
             <div class="form-group col-lg-4">
            <label class="text-heading">Extras</label> 
            <p>
            
            <input type="checkbox" name="Extras[]" value="Mosaic" />  Mosaic <br>
            <input type="checkbox" name="Extras[]" value="Beading" /> Beading<br>
            <input type="checkbox" name="Extras[]" value="Private Lesson" /> Private Lesson<br>
            </p>
            </div>
            
           <div class="form-group col-lg-4">
              <label class="text-heading">Date</label>
              <input type="datetime-local" name="Appointment_Date" class="form-control">
            </div>
            
           
            <div class="form-group col-lg-8">
              <label class="text-heading">Note</label>
              <textarea name="Comments" class="form-control" rows="6"></textarea>
            </div>
            
            <div class="form-group col-lg-4">
    <br>
            <div class="g-recaptcha" data-sitekey="6LfmjTYUAAAAACHDCxQs17-7z61JjU1-2vZFYLg7"></div>
    <br>
            <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
          </div>
        </form>
  ';  
    
}



?>
    <?php 

include 'includes/footer.php';

function clean_post($key)
{
    if(isset($_POST[$key])){
        $value = strip_tags(trim($_POST[$key]));
    }else{
        $value="";
    }
    return $value;
    
}


function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(", ",$_POST[$varName]) . PHP_EOL . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL . PHP_EOL;
         }
    }
    return $myReturn;
}

?>
