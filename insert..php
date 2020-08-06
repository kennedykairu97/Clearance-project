<?php
$rgno = $_POST['rgno'];
$nID = $_POST['nID'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$surname = $_POST['surname'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$status = $_POST['status'];
$nationality = $_POST['nationality'];
$county = $_POST['county'];
$dob = $_POST['dob'];
$prog_code = $_POST['prog_code'];
$phonecode= $_POST['phonecode'];
$num= $_POST['num'];
$yos = $_POST['yos'];
$password = $_POST['password'];
if (!empty($regno)||)!empty($nID)||)!empty($fname)||)!empty($lname)||)!empty($surname)||)!empty($gender)||)!empty($address)||)!empty($status)||)!empty($nationality)||)!empty($county)||)!empty($dob)||)!empty($prog_code)||)!empty($phonecode)||)!empty($num)||)!empty($yos)||)!empty($password)||) {
	$host = "localhost";
	$dbUsername ="root";
	$dbPassword ="";
	$dbname ="clearance"


	# code...
	//creating connection
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
	if (mysqli_connect_error()) {
		die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
	} else{
		$SELECT = "SELECT regno From regno Where regno = ? Limit 1";
     $INSERT = "INSERT Into register (regno, nID, fname,lname, surname, gender, num, address, phonecode, num, status, nationality, county, dob, prog_code, password) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		# code...
     //prepare statement
     $stmt =conn->prepare($SELECT);
     $stmt->bind_param("s", regno);
     stmt->execute();
     stmt->bind_result($regno);
     stmt->store_result();
     $rnum =$stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $regno, $nID, $fname,$lname, $surname, $gender, $num, $address, $phonecode, $num, $status, $nationality, $county, $dob, $prog_code, $password);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
	echo "All field are required";
	die();
}

?>
























