<?php
$companyID = $_REQUEST["companyId"];
?>
<div class="content-wrapper">
	<!-- <button class="Backbtn"><a href="company.php">BACK</a></button> -->
	<h1 id="CompanyTag"></h1>

	<ul class="breadcrumb">
		<li><a href="content.php" id="Home">Home</a></li>
		<li><a href="company.php" id="Companycrumb">Company</a></li>
		<li><a href="companyUsers.php?id=<?php echo $companyID; ?>" id="Companynamecrumb"></a></li>
		<li style="display: none" id="userGraph_Name"><a id="userGraphName"></a></li>
	</ul>
	<div id="chartContainer" style="width: 100%;"></div>
	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

		<div class="row content-section">
			<div class="col-xl-12">
				<div class="" id="accordion_Wrapper_2">
					<div class="accordionItem"><a href="#"><h2 class="accordionItem_Heading">Days in a row &nbsp&nbsp&nbsp<span id="days-viewed">0 day(s)</span></h2></a></div>

					<div class="accordionItem"><a href="#"><h2 class="accordionItem_Heading">Cumulative minutes of practice &nbsp&nbsp&nbsp<span id="cumulative-minutes">0 min(s)</span></h2></a></div>
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
<!-- Loder -->
<style type="text/css">
#accordion_Wrapper_2 {
    margin-top: 200px;
}
#accordion_Wrapper_2 .accordionItem a{
	text-decoration: none;
}
#accordion_Wrapper_2 #days-viewed {
	margin-left:176px;
}
.accordionItem_Heading {
    cursor: pointer;
    margin: 0px 0px 0px 0px;
    background-color: #fff;
    color: #3f3f3f;
    border-left: 3px solid #1b82d0;
    font-size: 20px;
    padding: 20px 45px 20px 15px;
    position: relative;
}
</style>

