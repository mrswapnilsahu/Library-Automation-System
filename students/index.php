<?php include('header.php'); ?>
<?php

require '../config.php';

$conn = connection();

$studentDetails = mysqli_query($conn, "SELECT * FROM `student` ORDER BY `student`.`studentName` ASC");

?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-deep-orange">
                <h3 id="defaultModalLabel">Register Student</h3>
            </div>
            <div class="modal-body">
                <br>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <strong><p class="card-inside-title">Full Name :</p></strong>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="name">
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-12">
                        <strong><p class="card-inside-title">Mobile Number :</p></strong>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" class="form-control" id="mobile">
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-12">
                        <strong><p class="card-inside-title">Email :</p></strong>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-12">
                        <strong><p class="card-inside-title">RFID Number :</p></strong>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="rfid" onchange="disRFID()">
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-12" id="msg">
                        <br>
                    </div>                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="addStudent();">SAVE</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-info-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-deep-orange">
                <h3 id="defaultModalLabel">Register Student</h3>
            </div>
            <div class="modal-body">
                <div id="info">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header bg-green">
                            <h2>
                                <strong>STUDENTS</strong><small>All the students records shows here...</small>
                            </h2>
                            <ul class="header-dropdown m-r-0">
                                <li>
                                    <button type="button" class="btn bg-pink waves-effect" data-toggle="modal" data-target=".bd-example-modal-lg">
                                        <i class="material-icons">person_add</i>
                                        <span>Register</span>
                                    </button>
                                </li>
                                <li>
                                    <a type="button" href="./" class="btn bg-pink waves-effect">
                                        <i class="material-icons">sync</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAME</th>
                                        <th>MOBILE</th>
                                        <th>EMAIL</th>
                                        <th>RFID NUMBER</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $s=0; foreach ($studentDetails as $row) { $s++; ?>
                                        <tr>
                                            <td><?php echo $s; ?></td>
                                            <td><?php echo ucfirst(strtolower($row['studentName'])); ?></td>
                                            <td><?php echo $row['studentMobile']; ?></td>
                                            <td><?php echo $row['studentEmail']; ?></td>
                                            <td><?php echo $row['studentRFID']; ?></td>
                                            <td>
                                                <center>
                                                    <button type="button" class="btn bg-light-blue waves-effect btn-block" data-toggle="modal" data-target=".bd-info-modal-lg" onclick="getStudentInfo(<?php echo $row['studentRFID']; ?>)">VIEW</button>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>
        </div>
    </section>

<script type="text/javascript">
    function addStudent(){
        // alert($('#name').val());
        $('#msg').html('<center><div class="preloader"><div class="spinner-layer pl-deep-purple"><div class="circle-clipper left"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div></center>');
         $.ajax({
            type: "POST",
            url: './api/addStudent.php',
            data: {name:$('#name').val(),email:$('#email').val(),mobile:$('#mobile').val(),rfid:$('#rfid').val()},
            success:function(msg) {
                $('#msg').html(msg);
                }
            });
        }
</script>
<script type="text/javascript">
    function disRFID(){
        $('#textInput').prop( "disabled", true );
    }
</script>
<script type="text/javascript">
    function getStudentInfo(rfid){
        $('#info').html('<br><div class="alert alert-info"><strong>Please wait while we are fetching the records...</strong></div>');
        $.ajax({
            type: "POST",
            url: './api/profile.php',
            data: {rfid:rfid},
            success:function(msg) {
                $('#info').html(msg);
            }
        });
    }
</script>


<?php include('footer.php'); ?>