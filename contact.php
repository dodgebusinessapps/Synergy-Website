<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$phone = $_POST['phone'];

//Validate first
if(empty($name)||empty($visitor_email))
{
    echo "Name and email are required.";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Please check your email address and make sure it's correct.";
    exit;
}

$email_from = 'leads@synergycreditpros.com';//<== update the email address
$email_subject = "New Form submission";
$email_body = "You have received a new lead from the contact form. Here is their information:\n
    Name: $name \n
    Email: $email \n
    Phone: $phone \n"

$to = "tim@dodgebusinessapps.com";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: index.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}

?>
