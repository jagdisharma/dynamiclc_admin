<!-- <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="include/js/jquery-1.12.4.js"></script>
<script src="include/js/jquery.nailthumb.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.11.0/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.11.0/firebase-firestore.js"></script>
<link href="include/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="include/css/style.css" type="text/css" rel="stylesheet" />
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<link rel="stylesheet" href="include/css/jquery-confirm.min.css">
<script src="include/js/jquery-confirm.min.js"></script>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<scipt src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.12/dist/sweetalert2.all.min.js">
<link href="include/css/jquery-ui.css" rel="stylesheet" type="text/css">
<link rel="icon" href="include/images/favicon.ico">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> -->
<script src="include/js/jquery-ui.js"></script>
<link href="include/css/jquery.nailthumb.1.1.min.css" rel="stylesheet" type="text/css">

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