<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
 
     <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

  	<title>Subscribe</title>
</head>

<body style="background-color: #eee;">
    

	<form class="form" action="" method="POST" style="margin-top: 100px; background-color: #ccc; padding-top: 40px" id="Validate">
        <h2 style="padding-bottom: 30px; font-size: 40px;">Subscribe for Comics!</h2>

		<div class="form-group col-md-10" style="padding-left: 110px; padding-top: 10px;">
            <input type="text" id="email" style="font-family: Raleway;" name="email" placeholder="Enter valid Email" class="form-control">
        </div>
        <div class="form-group col-md-9" style="padding-left: 160px; padding-top: 20px">
            <button class="button button-primary" style="background-color: #5cb85c; font-family: Raleway; border-radius: 8px;" name="Validate" type="submit">Validate</button> 
        </div>
		
	</form>

</body>

</html>

<?php

 require'config.php';
 require 'sendgrid/vendor/autoload.php';

if(isset($_POST['Validate']))
  {
 if(isset($_POST['email']))
  {

    // Email body here
  $mail = htmlspecialchars($_POST['email']);
  $body="Please click on below link for Email ID verification.<br>";
  $body .="<a href='localhost/rtcamp/confirmMail.php?email=".$mail."'>Confirm Email</a>";
  $email = new \SendGrid\Mail\Mail(); 
  $email->setFrom(from_mail, from_name);

  $email->setSubject("xkcd random comic");
  $email->addTo($mail, "");

  $email->addContent("text/html", $body);



  $sendgrid = new \SendGrid(API_KEY);
  try {
      $response = $sendgrid->send($email);
  } catch (Exception $e) {
      echo 'Caught exception: '. $e->getMessage() ."\n";
  }

  echo "<script>alert('Email sent for verification')</script>";
   
  }
  else
  {
    echo "<script>alert('FAILED')</script>";
  }
} 
 ?>

