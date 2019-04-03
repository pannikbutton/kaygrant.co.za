<?php

$EmailFrom = "website@kaygrant.co.za";
$EmailTo = "andrew@kaygrant.co.za";
$Subject = "Website form submission received";
$Name = Trim(stripslashes($_POST['name'])); 
$ContactNumber = Trim(stripslashes($_POST['contactnumber'])); 
$Email = Trim(stripslashes($_POST['Email'])); 
$Message = Trim(stripslashes($_POST['Message'])); 

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Telephone number: ";
$Body .= $ContactNumber;
$Body .= "\n";
$Body .= "Email address: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: $EmailFrom");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.html\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}
?>