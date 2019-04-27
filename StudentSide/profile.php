
<?php 

session_start();

$_SESSION['user'] = $_POST['rfid'];
$user = $_SESSION['user'];
require './config.php';

$conn = connection();
$info = mysqli_query($conn, "SELECT * FROM `student` WHERE `studentRFID` ='$user'");
// print_r($info); die;
foreach ($info as $row) {
    // echo ucwords(strtolower($row['studentName']));
}

// die;

?>

<?php include('header.php') ?>

<div class="modal fade bd-example-modal-lg returnModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card">
                 <img class="card-img-top img-responsive" src="book-shelf.gif" alt="Card image cap" style="width: 600px">
                 <div class="body">              
                    <div class="msg"><center><strong>Swipe book to return...</strong></center></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">local_library</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="rfid" onchange="returnBook(this.value);" autofocus>
                        </div>
                    </div>
                    <div id="returnMsg">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg EnqModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md bg-black">
        <div class="modal-content modal-col-blue-grey">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Book Issue Records...</h4>
            </div>
            <div class="modal-body">
                <div id="enqMsg"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg issueModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="card">
                 <img class="card-img-top img-responsive" src="book-shelf.gif" alt="Card image cap" style="width: 600px">
                 <div class="body">              
                    <div class="msg"><center><strong>Swipe book to issue...</strong></center></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">local_library</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="rfid" onchange="issueBook(this.value);" autofocus>
                        </div>
                    </div>
                </div>
                <div id="issueMsg">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-3">
            <div class="card profile-card">
                <div class="profile-header" id="card-bg6">&nbsp;</div>
                <div class="profile-body">
                    <div class="image-area" >
                        <img src="images/avatar.png" alt="AdminBSB - Profile Image" />
                    </div>
                    <div class="content-area">
                        <h3><?php foreach ($info as $row) {
                             echo ucwords(strtolower($row['studentName']));
                        }
                        ?></h3>
                        <p><?php echo $_SESSION['user'] ?></p>
                    </div>
                </div>
                <div class="profile-footer">
                    <ul>
                        <li>
                            <span>Email :</span>
                            <span><?php echo $row['studentEmail']; ?></span>
                        </li>
                        <li>
                            <span>Mobile :</span>
                            <span><?php echo $row['studentMobile']; ?></span>
                        </li>
                    </ul>
                    <a class="btn btn-primary btn-lg waves-effect btn-block" href="./">LOGOUT</a>
                </div>
            </div>
        </div>
        <div id="kontent">
        <div class="col-xs-12 col-md-9 col-sm-9">
            <div class="card">
                <div class="row clearfix body">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="header bg-blue" id="card-bg1">
                            <h2>
                                <a onclick="issue();" style="color: white; cursor:pointer;" >
                                <strong>ISSUE</strong>
                                <i class="material-icons right" id="background-round">arrow_forward</i>
                                </a>
                            </h2>
                            <br><br><br><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="header bg-blue" id="card-bg2">
                            <h2>
                                <a data-toggle="modal" data-target=".returnModal" style="color: white; cursor:pointer;">
                                    <strong>RETURN</strong>
                                <i class="material-icons right">arrow_back</i>
                                <returnMsg/a>
                            </h2>
                            <br><br><br><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="header bg-blue" id="card-bg3">
                            <h2> 
                                <a onclick="enquiry('<?php echo $_SESSION['user']; ?>')" data-toggle="modal" data-target=".EnqModal" style="color: white; cursor:pointer;">
                                    <strong>ENQUIRY</strong>
                                <i class="material-icons right">info_outline</i>
                                </a>
                            </h2>
                            <br><br><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
    </div>
</div>

<script type="text/javascript">
    function issue() {
        $.ajax({
            type:"POST",
            url: 'issue.php',
            success:function(msg) {
              $('#kontent').html(msg);
          }
      });
    }
</script>
<script type="text/javascript">
    function returnBook(id) {
       $.ajax({
            type:"POST",
            url: './api/return.php',
            data:{rfid:id},
        success:function(msg) {
          $('#returnMsg').html(msg);
        }
        });
    }
 </script>
 <script type="text/javascript">
     function enquiry(user){
        $.ajax({
            type:"POST",
            url: './api/enquiry.php',
            data:{user:user},
            success:function(msg) {
              $('#enqMsg').html(msg);
          }
      });
     }
 </script>

<?php include('footer.php') ?>