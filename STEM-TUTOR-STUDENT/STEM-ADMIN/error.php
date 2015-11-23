<?php
require_once('lib/swift_required.php');
include 'dbconnection.php';
$customer_name=$_REQUEST['customer_name'];
$email=$_REQUEST['email'];
$phone_number=$_REQUEST['phone_number'];
$description=$_REQUEST['description'];
$query="insert into contact(customer_name,email,phone_number,description)values('$customer_name','$email','$phone_number','$description')";
$res=mysql_query($query);	
if($res){
	
		$br=<<<BR
		 \r\n\r\n\r\n
		BR;
		$new='Name:-'.$customer_name.$br .$email.$br.'Cell:-'.$phone_number.$br.'Description:-'.$description.$br.'Contact Details';

		// Create the message

$message=Swift_Message::newInstance() ;
//var_dump($message);

$message->setSubject('Enquiry Information');

// Set the From address 

$message->setFrom(array($email=>"Enquiry"));

// Set the To addresses

$message->setTo(array('nh8685@gmail.com'=> $customer_name.''));

//Give it a body
$message->setBody($new);

//$transport=Swift_SmtpTransport::newInstance('mail.filmfreshers.com', 25);

//$transport->setUsername('contact@filmfreshers.com');

//$transport->setPassword('smts@123');

$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl');

$transport->setUsername('nh8685@gmail.com');

$transport->setPassword('665213567');

$mailer=Swift_Mailer::newInstance($transport);

$result=$mailer->send($message);	
echo "secces";
//header("Location: index.php?res=secces");
}else
{

	echo "fail";
//header("Location: index.php?res=fail"); 
}
}
?>