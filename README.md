Application coding is done wtih sample data for confidential information as API key etc.

Folders and Files as below:
Folder Code: 	dbconn.php
		config.php(Sample key)
		index.php
		mailInput.php
		confirmMail.php
		unsubscribe.php
		users.sql (Locally hosted database file for testing)

Folder CSS:	style.css

Folder Sendgrid: With all configuration file for it's working 	

Short description about flow as below:

mailInput.php has front-end where user can enter his/her email for validation.
After clicking on Validate button, pop-up with message 'Email sent for verification' will be generated.
Then he/she will receive verification link on entered email, Email body contains
i. Body: Please click on below link for Email ID verification.
 	  <subscription link>
it needs to be clicked for verification of an email.
After clicking on that link, confirmMail.php will be invoked another pop-up with message 'Subscribed successfully'
will appear and email will be stored in local database named 'rtcamp' with 'users' as it's table.

After that, every 5 minutes, random comic will be generated from 'xkcd.com'
and will be sent to the user. All code regarding this is written in index.php page.

Email body is also defined in index.php page. Email body contains 
 i. Subject : xkcd random comic
 ii.Body : Here is your Comic to enjoy!
	   <comic image>
	   <unsubscription link>
 iii.Attachment: Above comic image for download.

If user wants to unsubscribe the email, he/she can click on unsubscription link,
unsubscribe.php will be invoked with confirmation pop-up with message "Un-subscribed successfully!"
and user's email ID will be removed from database 
and no further emails will be received by them. 

dbconn.php file contains code about connection between database and application.
config.php file contains keys for SendGrid account and connection between account and application.
users.sql contains details about the local database.


Note: Application is still to be hosted on given platform. Will be hosted soon.
Thank you.


