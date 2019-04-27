<?php 

require '../../config.php';

// print_r($_POST);

$conn = connection();

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$rfid = $_POST['rfid'];

$check = "SELECT * FROM `student` WHERE `studentRFID` = '$rfid'";

$rs = mysqli_query($conn, $check);

if (mysqli_num_rows($rs) == 0) {

	mysqli_query($conn, "INSERT INTO `student` (`studentId`, `studentName`, `studentEmail`, `studentMobile`, `studentRFID`) VALUES (NULL, '$name', '$mobile', '$email', '$rfid')");
	echo "Student registered successfully...";

}else{
	echo "Student already exists...";
}



