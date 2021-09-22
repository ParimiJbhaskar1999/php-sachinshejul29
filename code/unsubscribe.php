<?php
 include("dbconn.php");
 if(isset($_GET['id']))
	{$id=$_GET['id'];
$query = "DELETE FROM users WHERE id = '$id'";
		    
		    if(mysqli_query($conn, $query))
    		{
    			echo "<script> alert('Un-subscribed successfully!');window.close();
</script>";
    		  
    		}
    		else
    		{    
				echo "<script> alert('Something went wrong!,Please try again.');window.close();
</script>";
    		   
    		}
    	}
?>