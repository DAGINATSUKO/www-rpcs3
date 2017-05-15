<!DOCTYPE html>
<html lang="en-US">
<head>
<title>DAGINATSUKO - Contact</title>
<meta charset="UTF-8">
<meta name="description" content="DAGINATSUKO is an experienced independent web developer, computer enthusiast and PC gamer.">
<meta name="keywords" content="daginatsuko, web developer, portfolio, gaming, emulation, contact">
<meta name="author" content="DAGINATSUKO">
<?php include 'lib/module/call-meta.php';?>
</head>
<?php include 'lib/module/call-sys.php';?>
<body>
<?php include 'lib/module/call-php.php';?>
<!-- End -->
	<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "kimorahdagin@gmail.com";
    $email_subject = "New email from daginatsuko.com";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_POST['first_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
 
}
?>
<!-- End -->
<div id="page-con-content" style="background: url('/img/icons/aesthetic/object-decal.png') no-repeat center; background-size: 524px;">
	<div class="visual-wavebar-1">
	</div>
	<div class="visual-wavebar-1 delayed-fade" style="display:none; ">
	</div>
	
	
	<form name="contactform" method="post" action="send_form_email.php">
	<div id="page-con-contact" class="fade-in-ld">
		<a href='/about'>
		<div id='contact-ava-forum' style='-webkit-animation-duration: .4s;'>
		</div>
		</a>
		<div id='contact-tx1-forum'>
			<h2>CONTACT</h2>
		</div>
		<div id="contact-inp-forum" style='-webkit-animation-duration: .8s;'>
			<input type="text" name="first_name" placeholder="Name" maxlength="64" style="font-family:'font-default'; font-size:15px; width:100%; height:50px; transition:.2s ease-in; color: #fff; border-style:none; background: #0A0A3D; text-align:center; line-height: 30px;">
			<br>
		</div>
		<div id="contact-inp-forum" style='-webkit-animation-duration: 1.0s;'>
			<input type="text" name="email" placeholder="Email" maxlength="64" style="font-family:'font-default'; font-size:15px; width:100%; height:50px; transition:.2s ease-in; color: #fff; border-style:none; background: #0A0A3D; text-align:center; line-height: 30px;">
			<br>
		</div>
		<div id="contact-inp-forum" style='-webkit-animation-duration: 1.2s;'>
			<input type="text" name="comments" placeholder="Subject" maxlength="2048" style="font-family:'font-default'; font-size:15px; width:100%; height:50px; transition:.2s ease-in; color: #fff; border-style:none; background: #0A0A3D; text-align:center; line-height: 30px;">
			<br>
		</div>
		<div id="contact-inp-forum" style='-webkit-animation-duration: 1.4s;'>
			<input type="text" name="telephone" placeholder="PIN" maxlength="8" style="font-family:'font-default'; font-size:15px; width:100%; height:50px; transition:.2s ease-in; color: #fff; border-style:none; background: #0A0A3D; text-align:center; line-height: 30px;">
			<br>
		</div>
		<div id='contact-btn-forum' type="submit" value="Submit" style='-webkit-animation-duration: 1.6s;' title="I'm not taking any submissions right now.">
		</div>
		</form>
	</div>
	<div id='footer-con-idle' style='position:absolute; bottom: 0px;'>
		<!-- Page Footer -->
		<?php include 'lib/module/in-footer.php';?>
		<!-- Page End -->
	</div>
</div>
</body>
</html>