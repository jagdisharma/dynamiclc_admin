<?php 
	$sideurl = 'http://18.188.241.59/stage';
	$basePath = __DIR__ . '/../';

?>
<!-- <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="include/js/jquery-1.12.4.js"></script>
<script src="include/js/jquery.nailthumb.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.11.0/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.11.0/firebase-firestore.js"></script>

<link href="include/css/style.css" type="text/css" rel="stylesheet" />
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<link rel="stylesheet" href="include/css/jquery-confirm.min.css">
<script src="include/js/jquery-confirm.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href="include/css/jquery-ui.css" rel="stylesheet" type="text/css">
<link rel="icon" href="include/images/favicon.ico">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> -->
<script src="include/js/jquery-ui.js"></script>
<link href="include/css/jquery.nailthumb.1.1.min.css" rel="stylesheet" type="text/css">


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>
<link href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css" rel="stylesheet"/>







<script type="text/javascript">

		/*// Initialize Firebase
	var config = {
	apiKey: "AIzaSyBfyKfTzWx7OONmZhTu9tDlF2h1fmAf6hs",
	authDomain: "dynamiclc-809a1.firebaseapp.com",
	databaseURL: "https://dynamiclc-809a1.firebaseio.com",
	projectId: "dynamiclc-809a1",
	storageBucket: "dynamiclc-809a1.appspot.com",
	messagingSenderId: "726757693676"
	};
	firebase.initializeApp(config);*/
	
firebase.initializeApp({
	apiKey: 'AIzaSyBfyKfTzWx7OONmZhTu9tDlF2h1fmAf6hs',
	authDomain: 'dynamiclc-809a1.firebaseapp.com',
	projectId: 'dynamiclc-809a1'
});

// Initialize Cloud Firestore through Firebase
var db = firebase.firestore();

</script>
<!DOCTYPE html>
<html>
<head>
	<title>DynamicLC</title>
</head>
<body>