<?php 
session_start();
$userId = $_SESSION['user'];

// echo $_POST['rfid'];

require '../config.php';

// print_r($_POST);

$conn = connection();

$bookRfid = $_POST['rfid'];
$date = date("Y-m-d H:i:s");

	
if (mysqli_query($conn, "UPDATE `issuerecord` SET `issueStatus` = '1', returnDate = '$date' WHERE issueStudentId = '$userId' AND issueBookId = '$bookRfid' AND issueStatus = '0';")) { ?>
			<div class="alert bg-green alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Book returned successfully...</strong>
			</div>
		<?php }else{ ?>
			<div class="alert bg-red alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>Error occured...</strong>
			</div>
		<?php }
	?>
