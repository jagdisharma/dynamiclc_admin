<?php
	include('include/config.php');
	//echo'Working-------->';exit();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dynamic LC</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--[if IE 8]><link rel="stylesheet" type="text/css" href="css/iestyle.css"/><![endif]-->
		<!--[if IE 8]>
		<script src="js/html5shiv.js" type="text/javascript"></script>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<script src="js/respond.min.js" type="text/javascript"></script>
		<![endif]-->
	</head>
	<body>
		<div id="wrapper">
			<div class="login-page">
				<form class="form-signin p-4 pb-5 rounded" id="login-form" autocomplete="off">
					<div class="login-logo text-center mt-4 mb-5"><img src="include/images/logo.png" alt=""></div>
					<input type="text" class="form-control user mb-5" name="username" id="username" placeholder="Username" autocomplete="off" />
					<input type="password" class="form-control pass mb-5" name="password" id="password" placeholder="Password" autocomplete="off"/>
					<button class="btn signinBtn btn-primary mb-5" type="submit" id="submitbtn">Sign In</button> 
					<div id="message" style="color:red"></div>
					<!-- <a href="javascript:void(0)" class="forgot text-right">Forgot Password?</a> -->
				</form><!-- FORM SIGNIN -->
			</div><!-- LOGIN PAGE -->
		</div><!-- WRAPPER -->
		<!-- JQUERY FILES -->
	</body>
</html>

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

<script type="text/javascript">

$(document).ready(function () 
{
	jQuery('#username').keyup(function() {
		$(this).val($(this).val().toLowerCase());
	});	

	if(localStorage.getItem('uid')) 
	{
		window.location.href="<?php echo $sideurl;?>/content-main.php";
	}

	$("#submitbtn").click(function(e){		
		e.preventDefault();
		$('#loader').show();
        $('#submit').attr('disabled','disabled');
		var Email		= $("#username").val();
		var Password 	= $("#password").val();

		console.log(Email , "," , Password);

		if (Email == '' || Password == '') 
		{
			var msg = "<span style='color:red'>Please fill username & password!</span>";
			$("#message").html(msg);
			$('#loader').hide();
			$('#submitbtn').attr("disabled", false);
		}else{
				/*db.collection("Admin").where("name", "==", Email).where("Password", "==", Password).get().then((querySnapshot) => {
					querySnapshot.forEach((doc) => {
						console.log(doc.data().UserUID , "," , doc.data().name , "," , doc.data().Password );
						uid = doc.data().UserUID;

						localStorage.setItem("uid", uid);
						window.location.href="/DynamicLC/content.php";
					});
				}).catch(function(error) {
					// Handle Errors here.
					var errorCode = error.code;
					var errorMessage = error.message;
					
					//$("#message").html(errorMessage);
					console.log(errorMessage);
					console.log(errorCode);
				});*/
			db.collection("Admin").get().then(function(querySnapshot) {
				querySnapshot.forEach((doc) => {
						console.log("doc.data()==========>",doc.data());

						if (Email == doc.data().name && Password == doc.data().Password)
						{
							db.collection("Admin").where("name", "==", Email).where("Password", "==", Password).get().then(function(querySnapshot) {
								querySnapshot.forEach((doc) => {
									console.log(doc.data().UserUID , "," , doc.data().name , "," , doc.data().Password );
									uid = doc.data().UserUID;

									localStorage.setItem("uid", uid);
									window.location.href="<?php echo $sideurl;?>/content-main.php";
								});			
							})
						}else{
							var msg ='<span style="color:red">No account with this username.</span>';
							$('#message').html(msg);
							$('#loader').hide();
							$('#submit').attr("disabled", false);
						}

					});
			})
		}
	})
});
</script>