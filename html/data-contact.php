<?php


include 'form.html';

echo '';

if(isset($_POST['submit']))
{
	$email_id = $_POST['email'];

	$ToEmail = "info@fipros.us";

	$subject = "Happyhomes contact mail";

	$body = 'Hi,<br/><b>Name:</b>'.$_POST['name'].
		  '<br/><b>Phone Number:</b>'.$_POST['phone'].
		  '<br/><b>Email Address:</b>'.$_POST['email'].
		  '<br/><b>Details:</b>'.$_POST['detail'];

	$headers = "From:".$email_id."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
       
        if(mail($ToEmail, $subject, $body, $headers)){
		echo '<div class="alert alert-success">Mail sent sucessfully.We will get back to you soon!
		  </div>';
        	$s ="#Name:". $_POST['name'].
        		"    Email address:".$_POST['email']."#\r\n";
		$fh = fopen("mail.txt", "a");
		fwrite($fh, $s);
		fclose($fh);
		}
	else{
		echo "<div class='alert alert-danger'>Mail not sent.Please verify email address that you have entered.</div>";
		}

}
?>
    
