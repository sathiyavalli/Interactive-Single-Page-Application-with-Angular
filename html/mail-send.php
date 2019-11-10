<?php
/*if(isset($_POST['submit']))
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

}*/

//echo '<script>alert("check")</script>';

$response = array( 'success' => false , 'error' => false );
    $formData = file_get_contents( 'php://input' );
    $data = json_decode( $formData );
    if ( $_POST['submit'] ) {
        $name = $_POST['name'];
	$Lname = $_POST['Lname'];
        $email = $_POST['email'];
        $message = $_POST['message'];
	$phone = $_POST['phone'];

        if ( $name != '' && $email != '' && $message != '' && $phone != '' ) {
            $mailTo = 'info@fipros.us';
            $subject = 'FiProS contact us mail';
            $body  = 'Firstname: ' . $name ."\r\n";
	    $body .= 'Lastname: ' . $Lname ."\r\n";
            $body .= 'Email: ' . $email ."\r\n";
	    $body .= 'Phone: ' . $phone ."\r\n";
            $body .= "Message:" . $message  ."\r\n";
//	    $body .= "-f".$email;
	    $headers = "From:".$email."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
//"From:" . $email
		
            $success = mail($mailTo, 'FiProS contact us mail', $body,$email);



            if ( $success ) {
                $response[ 'success' ] = true;
		/*$s ="#Name:". $_POST['name'].
        		"    Email address:".$_POST['email']."\r\n";
		$path = $_SERVER['DOCUMENT_ROOT']."/services/home/html/mail.txt";
		chmod('mail.txt',0777);
		$fh = fopen($path, "w")  or die('Cannot open file:  '.$path) ;
		fwrite($fh, $s);
		fclose($fh);
		if($fh){
echo "no";
}*/
		
		
		
            }
	else{
	$response[ 'error' ] = true;
	}

        }
    }
//header('Content-Type:application/json');
    echo json_encode( $response );

?>
