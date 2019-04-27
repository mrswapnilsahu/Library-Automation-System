<?php include('header.php') ?>
<div id="output">

<div class="login-page" style="background-color: #0000">
	<div class="login-box">
		<div class="card">
			<img class="card-img-top" src="card.gif" alt="Card image cap" style="height:274px">
			<div class="body">				
				<div class="msg">Swipe card to start your session</div>
				<div class="input-group">
					<span class="input-group-addon">
						<i class="material-icons">person</i>
					</span>
					<div class="form-line">
						<input type="text" class="form-control" id="rfid" name="username" placeholder="RFID card number" required autofocus onchange="scan();gotoProfile(this.value);">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
  	<!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="../plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="../plugins/flot-charts/jquery.flot.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="../plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/particle.min.js"></script>
    <script src="../js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>

    <script type="text/javascript">
    	function scan(){
    		var id = document.getElementById('rfid');
    		document.getElementById('rfid').disabled = true;
    	}
    </script>
    <script type="text/javascript">
    	function gotoProfile(rfid){
    		$.ajax({
    			type: "POST",
    			url: 'profile.php',
    			data: {rfid:rfid},
    			success:function(msg) {
            		$('#output').html(msg);
            		}
            	});
    		}
    </script>
</body>

</html>
