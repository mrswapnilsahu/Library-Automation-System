<?php
require '../config.php';

$conn = connection();

$info = mysqli_query($conn, "SELECT * FROM `issuerecord` ir INNER JOIN book b ON b.bookRFID=ir.issueBookId INNER JOIN student s ON s.studentRFID=ir.issueStudentId ORDER BY `ir`.`issueDate` DESC");

?>
<?php include('header.php'); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ISSUE RECORDS</h2>
            </div>

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>ISSUE RECORDS</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="./">
                                        <i class="material-icons">sync</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive table-bordered">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>STUDENT NAME</th>
                                            <th>MOBILE</th>
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
                                                <td><?php echo ucwords(strtolower($row['studentName'])); ?></td>
                                                <td><?php echo $row['studentMobile']; ?></td>
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
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>
        </div>
    </section>

<?php include('footer.php'); ?>