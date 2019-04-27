<?php //include('header.php')
session_start();
?>

<div class="container">
    <div class="row clearfix">
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
                                </a>
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
<?php //include('footer.php') ?>