<?php 

require '../config.php';

$conn = connection();

session_start();
$user = $_SESSION['user'];
$rfid = $_POST['rfid'];
$date = date("Y-m-d H:i:s");

$check = "SELECT *  FROM `issuerecord` WHERE `issueBookId` = '$rfid' AND `issueStatus` = 0";

$rs = mysqli_query($conn, $check);

if(mysqli_num_rows($rs) == 0){

	if (mysqli_query($conn, "INSERT INTO `issuerecord` (`issueId`, `issueBookId`, `issueStudentId`, `issueStatus`, `issueDate`) VALUES (NULL, '$rfid', '$user', '0', '$date');")) { ?>
		<div class="alert bg-green alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			<strong>Book added to your account successfully...</strong>
		</div>
	<?php }else{ ?>
		<div class="alert bg-red alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			<strong>Error occured...</strong>
		</div>
	<?php }

}else{ ?>

	<div class="alert bg-red alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		<strong>Already taken by someone...</strong>
	</div>

<?php
}
?>