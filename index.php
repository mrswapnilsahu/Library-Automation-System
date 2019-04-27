<?php

require './config.php';
$conn = connection();

$bookCount = mysqli_query($conn, " SELECT COUNT(*) as bookCount FROM `book` ");
foreach ($bookCount as $bookCount) {}

$issueBookCount = mysqli_query($conn, "SELECT count(*) as issueBookCount FROM `issuerecord` WHERE issueStatus = 0");
foreach ($issueBookCount as $issueBookCount) {}

$studentCount = mysqli_query($conn, " SELECT COUNT(*) as studentCount FROM `student` ");
foreach ($studentCount as $studentCount) {}

$info = mysqli_query($conn, "SELECT * FROM `issuerecord` ir INNER JOIN book b ON b.bookRFID=ir.issueBookId INNER JOIN student s ON s.studentRFID=ir.issueStudentId WHERE issueStatus = 0 ORDER BY `ir`.`issueDate` DESC");

$info1 = mysqli_query($conn, "SELECT * FROM `issuerecord` ir INNER JOIN book b ON b.bookRFID=ir.issueBookId INNER JOIN student s ON s.studentRFID=ir.issueStudentId WHERE issueStatus = 1 ORDER BY `ir`.`issueDate` DESC");


?>
<?php include('header.php'); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL BOOKS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $bookCount['bookCount']; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">book</i>
                        </div>
                        <div class="content">
                            <div class="text">BOOK ISSUE</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $issueBookCount['issueBookCount']; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">school</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL STUDENTS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $studentCount['studentCount']; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>LAST 10 RETURN RECORDS</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive table-bordered">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>STUDENT</th>
                                            <th>MOBILE</th>
                                            <th>BOOK</th>
                                            <th>STATUS</th>
                                            <th>ISSUE</th>
                                            <th>RETURN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $s1=0; foreach ($info1 as $row1) {  $s1++; ?>
                                            <tr>
                                                <td><?php echo $s1; ?></td>
                                                <td><?php echo ucwords(strtolower($row1['studentName'])); ?></td>
                                                <td><?php echo $row1['studentMobile']; ?></td>
                                                <td><?php echo ucwords(strtolower($row1['bookName'])); ?></td>
                                                <td>
                                                    <?php if ($row1['issueStatus'] == '0') { ?>
                                                        <span class="label bg-red">Issue</span>
                                                    <?php }else{ ?>
                                                        <span class="label bg-green">Returned</span>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $row1['issueDate']; ?></td>
                                                <td><?php echo $row1['returnDate'];  ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>LAST 10 ISSUE RECORDS</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive table-bordered">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>STUDENT</th>
                                            <th>MOBILE</th>
                                            <th>BOOK</th>
                                            <th>STATUS</th>
                                            <th>ISSUE</th>
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