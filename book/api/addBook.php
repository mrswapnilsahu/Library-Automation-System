<?php 

require '../../config.php';

// print_r($_POST); die;

$conn = connection();

$name = $_POST['name'];
$rfid = $_POST['rfid'];
$info = $_POST['info'];

$check = "SELECT * FROM `book` WHERE `bookRFID` = '$rfid'";

$rs = mysqli_query($conn, $check);

if (mysqli_num_rows($rs) == 0) {

	mysqli_query($conn, "INSERT INTO `book` (`bookId`, `bookName`, `bookRFID`, `bookInfo`) VALUES (NULL, '$name', '$rfid', '$info')");
	echo "Book record added successfully...";

}else{
	echo "Book already exists...";
}



