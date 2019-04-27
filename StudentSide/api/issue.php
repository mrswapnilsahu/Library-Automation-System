<?php 
session_start();
$userId = $_SESSION['user'];

// echo $_POST['rfid'];

require '../../config.php';

// print_r($_POST);

$conn = connection();

$bookRfid = $_POST['rfid'];

echo $date = date("j/m/Y h:i:s A");


	mysqli_query($conn, "INSERT INTO `issuerecord` (`issueId`, `issueBookId`, `issueStudentId`, `issueStatus`, `issueDate`) VALUES (NULL, '$bookRfid', '$userId', '0', '$date')");
	echo "Book issued successfully...";


 ?>