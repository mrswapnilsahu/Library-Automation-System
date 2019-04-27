<?php 

require '../config.php';

$conn = connection();

$user = $_POST['user'];

$info = mysqli_query($conn, "SELECT * FROM `issuerecord` ir INNER JOIN book b ON b.bookRFID=ir.issueBookId WHERE issueStudentId = '$user'");

?>


<div class="body table-responsive table-bordered">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>BOOK NAME</th>
				<th>STATUS</th>
				<th>ISSUE DATE</th>
				<th>RETURN DATE</th>
			</tr>
		</thead>
		<tbody>
			<?php $s=0; foreach ($info as $row) {  $s++; ?>
			<tr>
				<td><?php echo $s; ?></td>
				<td><?php echo ucwords(strtolower($row['bookName'])); ?></td>
				<td>
					<?php if ($row['issueStatus'] == '0') { ?>
							<span class="label bg-red">Issue</span>
					<?php }else{ ?>
							<span class="label bg-green">Returned</span>
					<?php } ?>
				</td>
				<td><?php echo $row['issueDate']; ?></td>
				<td><?php echo $row['returnDate'];  ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
