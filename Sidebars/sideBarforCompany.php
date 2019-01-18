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
							<li><a href="<?php echo $sideurl;?>/company.php" id="Companycrumb">Company</a></li>
							<li><a href="<?php echo $sideurl;?>/company.php" id="Companynamecrumb"></a></li>
							<li style="display: none" id="userGraph_Name"><a href="javascript:void(0)" id="userGraphName"></a></li>
						</ul>

						<div class="dropdown SelectUsers" id="dropdown">
							<label id="SelectLable">SELECT :</label>
							<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select
							<span class="caret"></span></button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a href="<?php echo $sideurl;?>/companyUsers.php?id=<?php echo $id;?>" data-value="action">Users</a></li>
								<li><a href="<?php echo $sideurl;?>/Company-Groups.php?id=<?php echo $id;?>" data-value="another action">Groups</a></li>
								<!-- <li><a href="<?php echo $sideurl;?>/Company-Exercise.php?id=<?php echo $id;?>" data-value="something else here">Exercise</a></li> -->
								<li><a href="<?php echo $sideurl;?>/Company-Resources.php?id=<?php echo $id;?>" data-value="separated link">Resources</a></li>
							</ul>	
						</div>

					<button class="btn btn-primary button-import-user" id="button-import-user" data-toggle="modal" data-target="#multipleusers" style="display:none;cursor: pointer;">Import Users</button>
					<div id="togglediv">
						<div id="togglebutton1">
							<label>Text Your Coach :</label>
							<label class="switch"><input type="checkbox"  name="enableTextYourCoach" id="enableTextYourCoach" class="toggle"><span class="slider round"></span></label>
						</div>

						<div id="togglebutton2">
							<label>Schedule Meetings With Coach:</label>
							<label class="switch"><input type="checkbox" name="enableScheduleMeetings" id="enableScheduleMeetings" class="toggle"><span class="slider round"></span></label>
						</div>
					</div>

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
					<div class="row content-section" style="display: none" >
						<div class="col-xl-12" id="Content_DATA">

						</div>

						<!-- <div class="col-xl-12">
							<a href="#" class="readmore text-right">Read More</a>
						</div> -->
					</div>
	<!-- ***************************** HTML for checkBox contentsn ***************************** -->

					<div class="add-content" data-toggle="modal" data-target="#adduser"><img src="include/images/plus.png" alt="" id="addBtn"></div>

					<div class="Submit_Checkbox"><button class="updateChk" id="updateChk">Update</button></div>
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


div#togglediv {
    float: right;
    text-align: right;
}
div#togglebutton1 label, div#togglebutton2 label {
    font-size: 18px;
    float: left;
    margin-right: 10px;
    margin-bottom: 0;
    margin-top: 0;
    line-height: 32px;
}
div#togglebutton1 {
    margin-right: 40px;
}
div#togglebutton1, div#togglebutton2 {
    display: inline-block;
}



	/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
