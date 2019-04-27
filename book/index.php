<?php include('header.php'); ?>

<?php 

require '../config.php';

$conn = connection();

$bookDetails = mysqli_query($conn, "SELECT * FROM `book` ORDER BY `book`.`bookName` ASC");
$count = mysqli_query($conn, " SELECT COUNT(*) as total FROM `book` ");
foreach ($count as $key) {}


?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-deep-orange">
                <h3 id="defaultModalLabel">Add New Book</h3>
            </div>
            <div class="modal-body">
                <br>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <strong><p class="card-inside-title">Book Name :</p></strong>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="name">
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-12">
                        <strong><p class="card-inside-title">RFID Number :</p></strong>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="rfid">
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-12">
                        <strong><p class="card-inside-title">Shelf Information :</p></strong>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="info">
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-12" id="msg">
                        <br>
                    </div>                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="addBook();">SAVE</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>BOOKS</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-purple hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL BOOKS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $key['total'] ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">book</i>
                        </div>
                        <div class="content">
                            <div class="text">BOOKS AVAILABLE</div>
                            <div class="number count-to" data-from="0" data-to="563" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div> -->
            </div>

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header bg-green">
                            <h2>
                                <strong>BOOKS</strong><small></small>
                            </h2>
                            <ul class="header-dropdown m-r-0">
                                <li>
                                    <button type="button" class="btn bg-pink waves-effect" data-toggle="modal" data-target=".bd-example-modal-lg">
                                        <i class="material-icons">note_add</i>
                                        <span>ADD BOOK</span>
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
                                        <th>BOOK NAME</th>
                                        <th>RFID NUMBER</th>
                                        <th>SHELF INFORMATION</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $s=0; foreach ($bookDetails as $row) { $s++; ?>
                                        <tr>
                                            <td><?php echo $s; ?></td>
                                            <td><?php echo ucfirst(strtolower($row['bookName'])); ?></td>
                                            <td><?php echo $row['bookRFID']; ?></td>
                                            <td><?php echo ucfirst(strtolower($row['bookInfo'])); ?></td>
                                            <td>
                                                <center>
                                                    <button type="button" class="btn btn-info">VIEW</button>
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
        function addBook(){
            $('#msg').html('<center><div class="preloader"><div class="spinner-layer pl-deep-purple"><div class="circle-clipper left"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div></center>');
            $.ajax({
                type: "POST",
                url: './api/addBook.php',
                data: {name:$('#name').val(),rfid:$('#rfid').val(),info:$('#info').val()},
                success:function(msg) {
                    $('#msg').html(msg);
                }
            });
        }
    </script>

<?php include('footer.php'); ?>