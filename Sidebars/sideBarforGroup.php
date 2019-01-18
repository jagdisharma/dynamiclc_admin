<script src="include/js/bootstrap.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script type="text/javascript">
var uid = localStorage.getItem('uid');
if(typeof uid != "null" &&  uid != null  && uid.length != 0 )
{

}else{
	window.location.href="/";
	//return false;
}
//$userId = <?php $_REQUEST['id']; ?>;
</script>
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
					</ul>
				</nav>
				<div class="content-wrapper">
						<!-- <button class="Backbtn"><a href="company.php">BACK</a></button> -->
						<h1 id="CompanyTag"></h1>

						<ul class="breadcrumb">
							<li><a href="<?php echo $sideurl;?>/content-main.php" id="Home">Home</a></li>
							<li><a href="#" id="Groupnamecrumb"></a></li>
							<li style="display: none" id="userGraph_Name"><a href="javascript:void(0)" id="userGraphName"></a></li>
						</ul>


					<div class="row content-section">

						<div class="col-xl-12">
							<div class="search-div">
								<!-- <input type="text" class="form-control search" name="name" id="search"  style="display: none" placeholder="Search"/> -->
							</div>

							<div class="accordionWrapper" id="accordion_Wrapper">

							</div>

						</div>
					
					</div>

	<!-- ***************************** HTML for checkBox contentsn ***************************** -->
					<div class="row content-section">
						<div id="videoduration"></div>
						<div class="col-xl-12" id="Table_content_video">
							<!-- <span><h5><b>Video Lessons</b></h5></span> -->
							<span><h5><b>Lessons</b></h5></span>

						</div>
						<div class="col-xl-12" id="Table_content_audio">
							<!-- <span><h5><b>Audio Lessons</h5></b></span> -->
							<span><h5><b>Lessons</h5></b></span>

						</div><!-- COL-XL -->								

					</div><!-- ROW -->
	<!-- ***************************** HTML for checkBox contentsn ***************************** -->

					<div class="add-content" data-toggle="modal" data-target="#adduser"><img src="include/images/plus.png" alt="" id="addBtn"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Loder -->
<div class="loading" id="loader" style="display: none">
	<div class="innerloader">
		<div class="loading-bar"></div>
		<div class="loading-bar"></div>
		<div class="loading-bar"></div>
		<div class="loading-bar"></div>
	</div>
</div>
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
<!-- Loder -->
<script type="text/javascript">
	$(document).on('click', '.export-data', function(e) {
		e.preventDefault();
		var href = $(this).attr('href');
		var timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
		console.log(href+'?z='+ window.btoa(timeZone));
		window.location.href = href+'?z='+ window.btoa(timeZone);
	});
</script>
<style>
#dropdown li.active a {
    background-color: #025aa5;
    color: #fff;
}
#button-import-user {
    position: relative;
    height: 45px;
    float: left;
}
/*.dropdown.SelectUsers {
    float: left;
    width: 25%;
    margin: 0;
}*/
.dropdown.SelectUsers {
    float: left;
    width: auto;
    margin: 0 20px 0 0;
}
.dropdown.SelectUsers label#SelectLable {
    float: left;
    width: auto;
    padding-right: 20px;
    line-height: 40px;
}
</style>
