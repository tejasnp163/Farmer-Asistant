<?php	
	$confirm_code = md5(uniqid(rand()));
	
	require '../Mailer/PHPMailerAutoload.php';

	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$mobile=$_POST["mobile"];
	$aadhar=$_POST["aadhar"];
	$building_no=$_POST["flat_no"];
	$building_name=$_POST["building_name"];
	$street_no=$_POST["street_no"];
	$street_name=$_POST["street_name"];
	$city=$_POST["city"];
	$p_code=$_POST["p_code"];
	$state=$_POST["state"];
	$email=$_POST["email"];
	$password = $_POST["password"];

	$conn = mysqli_connect("localhost", "root", "","temp");
	if($conn -> connect_error)
	{
		die("Connection failed: " . $conn -> connect_error);
	}


		$email_add = $email;

		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "smtp.googlemail.com";
		$mail->Port = 587; // or 587
		$mail->IsHTML(true);
		$mail->Username = "farmerassistantcoders@gmail.com";
		$mail->Password = "farmer2018@";
		$mail->SetFrom("farmerassistantcoders@gmail.com");
		$mail->AddAddress($email_add);   // Add a recipient


		$mail->Subject = 'Confirmation Link | Farmer Registartion';
	
		$mail->Body    = "http://localhost//Farmer%20Asistant//Farmer-Asistant//server-scripts//seller-registration-onconfirm.php?email=$confirm_code";
		
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if($mail->send()) {
			echo "hey";
		 	$query = "INSERT INTO temp_farmer (f_id,first_name, last_name, mobile_no, aadhaar_no, flat_no, building_name, street_no, street_name, city, pincode, state,email, password,confirm_code) VALUES('0','$fname', '$lname', '$mobile', '$aadhar' , '$building_no', '$building_name', '$street_no', '$street_name', '$city', '$p_code', '$state', '$email','$password',
		 	'$confirm_code')";
		 	$conn -> query($query);
		 	header("Location: ../farmer/registration-farmer-ack.html");
		} 
		else
		{
			echo "Error!";
		}
		
	echo $email_add;
	
	
	

	
	
?>