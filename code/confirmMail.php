<?php
 include("dbconn.php");
 // Query to insert verified email ID in databse
 $email = htmlspecialchars($_GET['email']);

$sql="INSERT INTO users(email) VALUES ('$email')";
 if(mysqli_query($conn,$sql))
        { 
echo "<script> alert('Subscribed successfully!');window.close();
</script>";}
      else{
        echo "<script>alert('FAILED')</script>";
      }
 ?>