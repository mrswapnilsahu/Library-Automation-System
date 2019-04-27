<?php
// include('header.php'); 
session_start();
require './config.php';
$user = $_SESSION['user'];
$conn = connection();

$issueInfo = mysqli_query($conn, "SELECT * FROM `issuerecord` i INNER JOIN book b ON b.bookRFID=i.issueBookId where issueStudentId = '$user' AND issueStatus = 0");

$count = mysqli_query($conn, "SELECT count(*) bookCount FROM `issuerecord` where issueStudentId = '0001232113' AND issueStatus = 0");
foreach ($count as $count) {}
?>



<div class="col-xs-12 col-md-9 col-sm-9">
  <button class="btn bg-red waves-effect" type="button" onclick="goBackProfile();"><i class="material-icons left" id="background-round">arrow_back</i><span>Back</span></button>
   <button class="btn bg-green waves-effect" type="button" onclick="goBackProfile();"><i class="material-icons left" id="background-round">sync</i><span>Refresh</span></button>
</div>


<div class="col-xs-12 col-md-9 col-sm-9">
  <div class="card">          
    <div class="row clearfix body">
      <?php foreach ($issueInfo as $row) { ?>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="card">
            <div class="header bg-blue" id="card-bg1">
              <h2>
                Book Details
                <i class="material-icons right" id="background-round">library_books</i>
              </h2>
            </div>
            <div class="body">
              <p>Book Name :&nbsp;<strong><?php echo ucwords(strtolower($row['bookName']));?></strong></p>
              <p>Issue Date:&nbsp;<strong><?php echo ($row['issueDate']);?></strong></p>
            </div>
          </div>
        </div>
      <?php } ?>
      <?php for ($i=0; $i < 6 - $count['bookCount']; $i++) { ?>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="card">
            <div class="header bg-blue" id="card-bg1">
              <br>
              <h2>
                Book Details
                <i class="material-icons right" id="background-round">library_books</i>
              </h2>
            </div>
            <div class="body">
              <button type="button" class="btn bg-brown btn-lg btn-block waves-effect" data-toggle="modal" data-target=".issueModal" style="color: white; cursor:pointer;">
                <i class="material-icons">note_add</i>
                <span>ISSUE BOOK</span>
              </button>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>



<script type="text/javascript">
    function goBackProfile() {
        $.ajax({
            type:"POST",
            url: 'profileBack.php',
            success:function(msg) {
              $('#kontent').html(msg);
          }
      });
    }
</script>
<script type="text/javascript">
    function issueBook(rfid) {
      $.ajax({
        type: "POST",
        url: './api/issueApi.php',
        data: {rfid:rfid},
        success:function(msg) {
          $('#issueMsg').html(msg);
        }
      });
    }
</script>
<!-- <script type="text/javascript">
    function returnBook(id) {
     $.ajax({
        type:"POST",
        url: './api/return.php',
        data:{rfid:id},
        success:function(msg) {
          $('#kontent').html(msg);
      }
  });
 }
</script> -->
<?php //include('footer.php') ?>