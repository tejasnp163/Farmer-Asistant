<?php
	
	require '../Mailer/PHPMailerAutoload.php';

	$confirm_code = $_GET['email'];
	//echo $email;
	$conn = mysqli_connect("localhost", "root", "","temp");
	if($conn -> connect_error)
	{
		die("Connection failed: " . $conn -> connect_error);
	}
	
	$query = "SELECT * FROM temp_farmer WHERE confirm_code='$confirm_code'";

	$result = $conn->query($query);

	echo $confirm_code;

	$f_id="";
	$fname="";
	$lname="";


		if ($result->num_rows > 0) 
		{ 
			$row = $result -> fetch_assoc();

			$f_id=$row["f_id"];
			$fname=$row["first_name"];
			$lname=$row["last_name"];
			$mobile=$row["mobile_no"];
			$aadhar=$row["aadhaar_no"];
			$building_no=$row["flat_no"];
			$building_name=$row["building_name"];
			$street_no=$row["street_no"];
			$street_name=$row["street_name"];
			$city=$row["city"];
			$p_code=$row["pincode"];
			$state=$row["state"];
			$email=$row["email"];
			$password = $row["password"];


			$query1 = "INSERT INTO farmer (farmer_id,first_name, last_name, mobile_no, aadhaar_no, flat_no, building_name, street_no, street_name, city, pincode, state,email, password) VALUES('0','$fname', '$lname', '$mobile', '$aadhar' , '$building_no', '$building_name', '$street_no', '$street_name', '$city', '$p_code', '$state', '$email','$password')";
	 		$conn -> query($query1);
		}

	$sql = "DELETE FROM temp_farmer WHERE confirm_code='$confirm_code'";
	$conn -> query($sql);

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


		$mail->Subject = 'You have Successfully registered on Farmer Assistant!';
	
		$mail->Body    = "Congratulations" . $fname . " " . $lname . "!!! You have been registered on Farmer Assistant!!! \n Your Farmer Id is SE" . $f_id;
		
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if($mail->send()) {
		 	header("Location: ../../farmer/registration-farmer-confirmed.html");
		} 
		else
		{
			echo "Error!";
		}

	
?>