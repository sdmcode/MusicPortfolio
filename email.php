 <?php   
 
 $errors = '';
 
	if(empty($_POST['name'])  || 
	   empty($_POST['email']) || 
	   empty($_POST['txt']))
	{
		$errors .= "\n Error: all fields are required";
	}

	if (empty($errors)) {
		$name = $_POST['name']; 
		$email_address = $_POST['email']; 
		$message = $_POST['txt']; 

		if (!preg_match(
		"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
		$email_address))
		{
			$errors .= "\n Error: Invalid email address";
		}
	 
		$body = $_POST['txt'];
		$subject = $_POST['subject'];	
	}
		
	if( empty($errors))
	{
		$to = 'summadatmobile@gmail.com'; 
		$email_subject = "Contact submission: $name";
		$email_body = "New contact form submission. \n\n \tName: $name \n\n \tEmail: $email_address \n\n \tSubject: $subject \n\n Message \n $bnody \n"; 
		
		$headers = "From: $email_address\n"; 
		$headers .= "Reply-To: $email_address";
		
		mail($to, $subject, $email_body, $headers);
		//redirect to the 'index' page
		header('Location: index.html');
	} 
	
?>


<!DOCTYPE html>
 
<html>

	<head>
	
		<title>Summadat productions</title>
		
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
				
	</head>

	<body>
	
		<div class="cl_white container-fluid text-center">
		
			<a href="index.html"><img src="image/logo.png" class="logo h-25"></a>		
								
			</br></br></br>					
								
			<div class="container-fluid">
				<!-- This page is displayed only if there is some error -->
				<?php
				echo nl2br($errors);
				?>
			</div>
			
			</br></br></br>
					
			<a href="contact.html"><button class="btn btn-default btn-success">Contact & Bookings</button></a>
					
			</br></br></br>			
			
			<div class="container-fluid col-xs">
				<a href="https://soundcloud.com/summadat-music"><img src="image/icon_soundcloud.png" class="icon"></a>
				<a href="https://twitter.com/summadatmobile"><img src="image/icon_twitter.png" class="icon"></a>
			</div>
			
			</br></br>
			
		</div>
		
	</body>
	
</html>