<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Random Comic Generator</title>
</head>
<body>

</body>
</html>

<?php
include("dbconn.php");
require'config.php';
require 'sendgrid/vendor/autoload.php';

$latestraw = json_decode(file_get_contents('http://xkcd.com/info.0.json')); 
$latestnum =$latestraw->{'num'};
$randumNumber = rand(1, $latestnum);
$comic = json_decode(file_get_contents('http://xkcd.com/'.$randumNumber.'/info.0.json'));

echo "<img src=".$comic->{'img'}." title=".$comic->{'img'}."/>"; 
echo '<h2>Transcript</h2><pre>'.$comic->{'transcript'}.'</pre>';

$query = "SELECT * FROM users";
$result = mysqli_query($conn,$query);

$emails = mysqli_fetch_all($result,MYSQLI_ASSOC);
print_r($emails);
foreach ($emails as $mail): 
// Email Body here
$body="Here is your Comic to enjoy! \n\n";
$body.="<div><img src=".$comic->{'img'}." /></div>";
$body.="<a href='localhost/rtcamp/unsubscribe.php?id=".$mail['id']."'>unsubscribe to mailer</a>";
$email = new \SendGrid\Mail\Mail(); 
$email->setFrom(from_mail, from_name);

$email->setSubject("xkcd random comic");
$email->addTo($mail['email'], "");
$email->addContent("text/html", $body);


// Email Attachment here
$file_encoded = base64_encode(file_get_contents($comic->{'img'}));
$email->addAttachment(
    $file_encoded,
    "application/text",
    "random_comic.jpg",
    "attachment"
);


$sendgrid = new \SendGrid(API_KEY);
try {
    $response = $sendgrid->send($email);
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}

endforeach
?>
<script>
setTimeout(function () { window.location.reload(); }, 5*60*1000);
// just show current time stamp to see time of last refresh.
document.write(new Date());
</script>
?>
