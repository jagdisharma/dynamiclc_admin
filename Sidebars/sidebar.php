<script type="text/javascript">
var uid = localStorage.getItem('uid');
if(typeof uid != "null" &&  uid != null  && uid.length != 0 )
{

}else{
	window.location.href="/";
	//return false;
}
</script>


</body>
</html>
<div id="wrapper">
	<div class="dashboard-section">
		<div class="container-fluid">
			<div class="row">
				<nav id="sidebar" class="sidebar-canvas">
					<a href="<?php echo $sideurl;?>/content-main.php" class="dashboard-logo text-center mb-2 p-3"><img src="include/images/admin-logo.png"></a>
					<ul class="navigation mt-4">
						<li ><a href="<?php echo $sideurl;?>/content-main.php"><span class="icon-nav"><img class="normal-icon" src="include/images/content-menu.png"><img class="active-icon" src="include/images/content-menu-active.png"></span> Content Main</a></li>
						<li><a href="<?php echo $sideurl;?>/additionalResources.php"><span class="icon-nav"><img class="normal-icon" src="include/images/pdf-menu.png"><img class="active-icon" src="include/images/pdf-menu-active.png"></span> Additional Resources</a></li>
						<li><a href="<?php echo $sideurl;?>/company.php"><span class="icon-nav"><img class="normal-icon" src="include/images/company-menu.png"><img class="active-icon" src="include/images/company-menu-active.png"></span> Company</a></li>
						<li><a href="#" data-toggle="modal" data-target="#modelExportData"><span class="icon-nav"><img class="normal-icon" src="include/images/export-file.png"><img class="active-icon" src="include/images/export-file-active.png"></span> Export</a></li>
						<li class=""><a href="javascript:void(0)" onclick="logout(this)"><span class="icon-nav"><img class="normal-icon" src="include/images/logout.png"><img class="active-icon" src="include/images/logout-active.png"></span>Log Out</a></li>
					</ul><!-- NAVIGATION -->
				</nav><!-- SIDEBAR -->
				<div class="content-wrapper">
					<div class="row">
						<div class="col-sm-4">
							<div class="tabDiv">
								<a href="<?php echo $sideurl;?>/content-main.php" >
									<div class="card-box text-center">
										
											<span class="card-box-icon"><img class="normal-icon" src="include/images/content.png"><img class="active-icon" src="include/images/content-active.png"></span>
											<p>Content Main</p>
										
									</div><!-- CARD BOX -->
								</a>
							</div>
						</div>
						<!-- <div class="col-sm-3">
							<div class="tabDiv">
								<a href="<?php echo $sideurl;?>/content.php" >
									<div class="card-box text-center ">
											<span class="card-box-icon"><img class="normal-icon" src="include/images/content.png"><img class="active-icon" src="include/images/content-active.png"></span>
											<p>Content</p>
										
									</div> --><!-- CARD BOX -->
								<!-- </a>
							</div>
						</div> --><!-- COL-SM -->
						<!-- <div class="col-sm-3">
							<div class="tabDiv">
								<a href="<?php echo $sideurl;?>/Dashboard-exercise.php" >
									<div class="card-box text-center">
										
											<span class="card-box-icon"><img class="normal-icon" src="include/images/guided-exr.png"><img class="active-icon" src="include/images/guided-exr-active.png"></span>
											<p>Guided Exercises</p>
										
									</div> CARD BOX -->
							<!-- 	</a>
							</div>
						</div> --> <!-- COL-SM -->
						<div class="col-sm-4">
							<div class="tabDiv">
								<a href="<?php echo $sideurl;?>/additionalResources.php" >
									<div class="card-box text-center">
										
											<span class="card-box-icon"><img class="normal-icon" src="include/images/pdf.png"><img class="active-icon" src="include/images/pdf-active.png"></span>
											<p>Additional Resources</p>
										
									</div><!-- CARD BOX -->
								</a>
							</div>
						</div><!-- COL-SM -->
						<div class="col-sm-4 ">
							<div class="tabDiv">
								<a href="<?php echo $sideurl;?>/company.php" >
									<div class="card-box text-center">
										
											<span class="card-box-icon"><img class="normal-icon" src="include/images/user.png"><img class="active-icon" src="include/images/user-active.png"></span>
											<p>Company</p>
										
									</div><!-- CARD BOX -->
								</a>
							</div>
						</div><!-- COL-SM -->
					</div><!-- 	ROW -->
							<div class="row content-section">
								<div id="videoduration"></div>
								<div class="col-xl-12" id="Table_content">

								</div><!-- COL-XL -->								

							</div><!-- ROW -->
							<div class="add-content" data-toggle="modal" data-target="#myModal"><img src="include/images/plus.png" alt=""></div>
						</div><!-- CONTENT WRAPPER -->
					</div><!-- ROW -->
		</div><!-- CONTAINER FLUID -->
	</div><!-- DASHBOARD SECTION -->
</div><!-- WRAPPER -->
<!-- <script src="http://d3js.org/d3.v3.min.js"></script> -->
<div id="modelExportData" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Export</h5>
			</div>
			<div class="modal-body">
				<a href="<?php echo $sideurl;?>/exportUserCsv.php" class="btn btn-default export-data" style="background: #1883d3;color: #fff; margin-right:10px;">Export Users</a>
				<a href="<?php echo $sideurl;?>/phpExportDatabase.php" class="btn btn-default export-data" style="background: #1883d3;color: #fff;">Export Events</a>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).on('click', '.export-data', function(e) {
		e.preventDefault();
		var href = $(this).attr('href');
		var timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
		console.log(href+'?z='+ window.btoa(timeZone));
		window.location.href = href+'?z='+ window.btoa(timeZone);
	});
</script>