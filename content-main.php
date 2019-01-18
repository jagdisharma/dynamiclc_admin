<?php
	include('include/configGroupForm.php');
	// include('include/config.php');

?>

</head>
<body>
<?php
	include('Sidebars/sidebar.php');
?>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Group Name</h4>
      </div>
      <div class="modal-body">
        <form class="add-content-form" action="" method="post" enctype="multipart/form-data" id="formAdd">
			<div class="form-group">
				<label>Title :</label>
				<div class="input-group-div"><input type="text" class="form-control name" name="name" id="name"  placeholder=""/></div>
			</div><!-- FOR GROUP -->
       		
       		<div class="form-group">
       			<label>Available On :</label>
                <div class='input-group data input-group-div' >
                    <input type='text' class="form-control" onkeydown="return false" id='datetimepicker1'/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
			<!-- <div class="form-group">
				<label>Available On :</label>
				<div class="input-group-div"><input type="text" class="form-control" readonly="true" id="datepicker" placeholder=""> </div>
			</div> --><!-- FOR GROUP -->

			<div class="modal-footer text-center">
				<input type="submit" name="submitbtn" class="btn btn-default submit" value="Submit">
			</div>
		</form><!-- ADD CONTENT FORM -->
      </div>
    </div>

  </div>
</div>
<!-- Modal -->

<!-- EDIT MODAL -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="Edit_Content">Edit Group</h4>
      </div>
      <div class="modal-body">
        <form class="add-content-form" action="" method="post" id="formEdit" enctype="multipart/form-data">
			<div class="form-group">
				<label>Group Name :</label>
				<input type="hidden" name="hidden_ID" id="hidden_ID">
				<div class="input-group-div"><input type="text" class="form-control name" name="name" id="name_edit" value=""  placeholder=""/></div>
				<input type="hidden" name="hidden_ID" id="hidden_ID">
			</div><!-- FOR GROUP -->

			<div class="form-group">
       			<label>Available On :</label>
                <div class='input-group data input-group-div' >
                    <input type='text' class="form-control" onkeydown="return false" id='datepicker_edit'/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

			<!-- <div class="form-group">
				<label>Available On :</label>
				<div class="input-group-div"><input type="text" class="form-control" readonly="true" id="datepicker_edit" placeholder=""> </div>
			</div> --><!-- FOR GROUP -->

			 <div class="modal-footer text-center">
				<input type="submit" name="submitbtn" class="btn btn-default submit" value="Submit">
			</div>
		</form><!-- ADD CONTENT FORM -->
      </div>
    </div>

  </div>
</div>
<!--Edit Modal -->

<!--Copy Modal-->
<div id="copyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Group Name</h4>
      </div>
      <div class="modal-body">
        <form class="add-content-form" action="" method="post" enctype="multipart/form-data" id="formCopy">
			<div class="form-group">
				<label>Title :</label>
				<div class="input-group-div"><input type="text" class="form-control name" name="name" id="name_copy"  placeholder=""/></div>
			</div><!-- FOR GROUP -->
       		
       		<div class="form-group">
       			<label>Available On :</label>
                <div class='input-group data input-group-div' >
                    <input type='text' class="form-control" onkeydown="return false" id='datetimepickercopy'/>
                    <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

			<div class="modal-footer text-center">
				<input type="submit" name="submitbtn" class="btn btn-default submit" value="Submit">
			</div>
		</form><!-- ADD CONTENT FORM -->
      </div>
    </div>

  </div>
</div>
<!--Copy Modal-->

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


<!-- JQUERY FILES -->


<!-- <script src="include/js/bootstrap.min.js"></script> -->
<script src="include/js/moment.min.js"></script>
<script src="include/js/moment-timezone-with-data.js"></script>
<!-- <script src="moment-timezone.min.js"></script> -->
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
 <!--  <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
 <!--  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<script>
	 $(function () {
                $('#datetimepicker1').datetimepicker({
                	minDate: new Date(),
                });
            });
	 $(function () {
                $('#datetimepickercopy').datetimepicker({
                	minDate: new Date(),
                });
            });
// $( function() {
//     $( "#datepicker" ).datepicker({
//     	//dateFormat: 'dd/mm/yy',
//     	minDate: new Date(),
//     	changeMonth: true,
//         changeYear: true,
//     });
//   });
$(function () {
                $('#datepicker_edit').datetimepicker({
                	minDate: new Date()
                });
            });
/*$( function() {
    $( "#datepicker_edit" ).datepicker({
    	//dateFormat: 'dd/mm/yy',
    	minDate: new Date(),
    	changeMonth: true,
     	changeYear: true,
    });
  } );*/
/*****************************************--Fetch All Data--*****************************************/
$(document).ready(function ()
{
	function getAllexercise()
	{
		$("#loader").show();
		var table = '';
		db.collection("Groups").orderBy('createdAt','asc').get().then(function(querySnapshot) {
			querySnapshot.forEach(function(doc) {				
				var availability =	doc.data().availability;
				//console.log('availability--------->',availability);


				//moment.tz.setDefault("America/Denver");

				//var convertdate = moment(new Date(availability*1000)).format('MM/DD/YYYY hh:mm a');
				
				var convertdate = moment(availability*1000).tz('America/Denver').format('MM/DD/YYYY hh:mm a')

				table = '<div class="accordionItem close comapnies"><div class="outerDiv" onclick="assignEvents(\''+doc.data().id+'\')"><h3 style="text-transform: uppercase;" id="groupid_'+doc.data().id+'">'+doc.data().name+'</h3><p style="margin-top: 2px;font-size:15px;font-weight: normal;">Available On:-'+convertdate+'</p></div><div class="text-right"><a href="javascript:void(0)"  class="edit-dlt-icons" onclick="editGroup(\''+doc.data().id+'\')"><img src="include/images/edit.png"></a><a href="javascript:void(0)" class="edit-dlt-icons" onclick="deleteGroup(\''+doc.data().id+'\')"><img src="include/images/dlt.png"></a><a href="javascript:void(0)" class="edit-dlt-icons" onclick="copyGroup(\''+doc.data().id+'\')"><img src="include/images/copy.png" style="height:30px; width: 30px;"></a></div></div>';

				/*<a href="javascript:void(0)" class="edit-dlt-icons" onclick="copyGroup(\''+doc.data().id+'\')"><img src="include/images/.png"></a>*/

				$('#Table_content').append(table);
				$("#loader").hide();			
				
			});
			if(table == '')
			{
				table = '<div class="content-list">NO DATA FOUND</div>';
					$('#Table_content').html(table);
					$("#loader").hide();
			}
			//$('#Table_content').disableSelection();
		});
	}
	getAllexercise();
});

/*****************************************--Add Group--*********************************************/
$("#formAdd").submit(function(e){
	e.preventDefault();
	var name =	$("#name").val();
	var image = '';
	var availability = $("#datetimepicker1").val();

	moment.tz.setDefault("America/Denver");

	var zone  = "America/Denver";
	var fmt = 'MM/DD/YYYY h:mm A';
	var datestring = (moment.tz(availability, fmt, zone).utc().valueOf())/1000;

	/*var datestring = (moment(availability).utc().valueOf())/1000; //store in utc according to timezone
	console.log('datestring---->',datestring);*/


	// console.log('final string---', moment(availability).utc().valueOf());
	
	// console.log('string------->',string);
		//return false;
	
	// var datestring = string/1000;
	// console.log('datestring------------->',datestring);
	//return false;

	var createdAt =	Math.round(new Date().getTime()/1000);
	if(name == '' || availability == '')
	{
		$("#loader").hide();
		swal("Please fill the all fields");
	}else{
		console.log('createdAt------------------->',createdAt);
		var collection	= 'Groups';
		//var groupCreate = db.collection(collection).doc();

		const ref = db.collection(collection).doc();
		var groupId = ref.id;
		ref.set(
		{
			assignToCompanies:{"iR0LKpZjWo7lLG8fo20j" : false},
			name: name,
			image:image,
			id:groupId,
			availability:datestring,
			createdAt : createdAt,
			updatedAt : createdAt
		})  // sets the contents of the doc using the id
		.then((docRef) => {  // fetch the doc again and show its data
		   console.log("group Added successfully-->", docRef)
		}).catch(function(error) {
			console.error("Error adding document: ", error);
		})
		/*groupCreate.add({
			assignToCompanies:{"iR0LKpZjWo7lLG8fo20j" : false},
			name : name,
			image : image,
			id : groupId,
			availability : datestring,
			createdAt : createdAt,
			updatedAt : createdAt
		})
		.then(function(docRef) {
			// var parentDocId = docRef.id;
			// console.log('parentDocId------>',parentDocId);
			// db.collection(collection).doc(parentDocId).set({
			//   id: parentDocId
			// }, { merge: true });

		})
		.catch(function(error) {
			console.error("Error adding document: ", error);
		});*/

		$("#loader").hide();
		$("#name").val('');
		swal("New content has been added to library")
			.then((value) => {
				location.reload();
			});
		$("#myModal").modal("hide");
	}
})
/*****************************************--Edit Group--********************************************/

/*--------Fetch data in form--------------*/
function editGroup(id)
{
	var newLink = '';
	var ID = id;
	var name =	'';
	
	$("#hidden_ID").val(ID);
	db.collection("Groups").doc(ID).get().then(function(doc) {
		name = doc.data().name;
		var groupname =	doc.data().name;
		var availability =	doc.data().availability;
		console.log("availability-- show edit----", availability);
		//var datestring = moment(new Date(availability*1000)).format('MM/DD/YYYY h:mm A');
		var datestring = moment(availability*1000).tz('America/Denver').format('MM/DD/YYYY hh:mm a');
		console.log("datestring-----fgfgfg----------------->",datestring);
		//var date = Date.parse("March 21, 2012");
		$("#datepicker_edit").val(datestring);
		$("#name_edit").val(groupname);
		$("#Edit_Content").html(name);
		$("#editModal").modal("show");
	});
}
/*---------Update Form----------*/
$("#formEdit").submit(function(e){
	e.preventDefault();
		var name = $("#name_edit").val();
		var image = '';
		var availability = $("#datepicker_edit").val();
		console.log('availability------->',availability);
		// var lastDate = new Date(availability); 
		// var offset = lastDate.getTimezoneOffset();
		moment.tz.setDefault("America/Denver");

		var zone  = "America/Denver";
		var fmt = 'MM/DD/YYYY h:mm A';
		var datestring = (moment.tz(availability, fmt, zone).utc().valueOf())/1000;

		//var datestring = (moment(new Date(availability)).add(-(offset), 'minutes').valueOf())/1000;
		var updatedAt 	= 	Math.round(new Date().getTime()/1000);
		var id = $("#hidden_ID").val();
		if(name == '' || availability == '')
		{
			$("#loader").hide();
			swal("Please fill the all fields");
		}else{
			db.collection("Groups").doc(id).update({
				assignToCompanies:{"iR0LKpZjWo7lLG8fo20j" : false},
				name : name,
				image:image,
				availability:datestring,
				updatedAt : updatedAt	
			})
			.then(function() {
				$("#loader").hide();
				swal(''+name+' has been updated to library')
					.then((value) => {
						location.reload();
					});
				$("#editModal").modal("hide");
			});
		}
})

/*****************************************--Delete Group--*******************************************/
function deleteGroup(id)
{
	var collection = 'Groups';
	swal({
		title: "Confirm!",
		text: 'Do you want delete..!!!',
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) 
		{
			db.collection(collection).doc(id).delete().then(function(){
				console.log("Document successfully deleted!");
				location.reload();
			}).catch(function(error) {
				console.error("Error removing document: ", error);
			});
			swal("successfully deleted!", {
				icon: "success",
			});
			
		} else {
			
		}
	});
}

/*****************************************--Copy Group--*******************************************/
function copyGroup(id)
{	
	var groupid = id;
	console.log('groupId----->',groupid);
	
	$("#copyModal").modal("show");
	//$("#hidden_ID").val(groupid);

	$("#formCopy").submit(function(e){
		e.preventDefault();
		var name =	$("#name_copy").val();
		var image = '';
		var availability = $("#datetimepickercopy").val();
		
		moment.tz.setDefault("America/Denver");

		var zone  = "America/Denver";
		var fmt = 'MM/DD/YYYY h:mm A';
		var datestring = (moment.tz(availability, fmt, zone).utc().valueOf())/1000;
		
		var createdAt =	Math.round(new Date().getTime()/1000);
		console.log('Inside FormCopy');
		if(name == '' || availability == '')
		{	
			console.log('Inside FormCopy If');
			$("#loader").hide();
			swal("Please fill the all fields");
		}else{
			console.log('Inside FormCopy Else');
			console.log('createdAt------------------->',createdAt);
			var collection	= 'Groups';
			var groupCreate = db.collection(collection).doc();

			const ref = db.collection(collection).doc();
			var groupId = ref.id;

			db.collection("Contents").where("groupId", "==", groupid).get().then(function(querySnapshot) {
				querySnapshot.forEach(function(doc) {				

					var id = doc.data().id;
					console.log('Inside finding contents-----id------',id);

					var createdAt 	= doc.data().createdAt;
					var duration = doc.data().duration;
					var fileUrl = doc.data().fileUrl;
					var order = doc.data().order;
					var thumbUrl = doc.data().thumbUrl;
					var title = doc.data().title;
					var type = doc.data().type;

					const refCopy = db.collection("Contents").doc();
					var refCopyId = refCopy.id;

					refCopy.set(
					{
						groupId: groupId,
						assignToCompanies: {"iR0LKpZjWo7lLG8fo20j" : true},
						createdAt: createdAt,
						duration : duration,
						fileUrl : fileUrl,
						id : refCopyId,
						order : order,
						thumbUrl : thumbUrl,
						title: title,
						type : type,
						updatedAt:createdAt,
					})  // sets the contents of the doc using the id
					.then((docRef) => {  // fetch the doc again and show its data
					   console.log("group Added successfully-->", docRef)
					}).catch(function(error) {
						console.error("Error adding document: ", error);
					});



					// db.collection("Contents").add({
					// 	groupId: groupId,
					// 	assignToCompanies: {"iR0LKpZjWo7lLG8fo20j" : true},
					// 	createdAt: createdAt,
					// 	duration : duration,
					// 	fileUrl : fileUrl,
					// 	id : '',
					// 	order : order,
					// 	thumbUrl : thumbUrl,
					// 	title: title,
					// 	type : type,
					// 	updatedAt:createdAt,
					// })
					// .then(function(docRef) {
					// 	console.log("Document written with ID: ", docRef.id);      
					// 	var parentDocId = docRef.id;
					// 		/********************** [ Add Id after insert data ] ************************/
					// 		db.collection("Contents").doc(parentDocId).set({
					// 		  id: parentDocId
					// 		}, { merge: true });

					// 	})
					// 	.catch(function(error) {
					// 		console.error("Error adding document: ", error);
					// 	});

					
				});

				console.log('Copy data');
			});

			ref.set(
			{
				assignToCompanies:{"iR0LKpZjWo7lLG8fo20j" : false},
				name: name,
				image:image,
				id:groupId,
				availability:datestring,
				createdAt : createdAt,
				updatedAt : createdAt
			})  // sets the contents of the doc using the id
			.then((docRef) => {  // fetch the doc again and show its data
			   console.log("group Added successfully-->", docRef)
			}).catch(function(error) {
				console.error("Error adding document: ", error);
			})
		

			$("#loader").hide();
			$("#name").val('');
			swal("New content has been added to library")
				.then((value) => {
					location.reload();
				});
			$("#copyModal").modal("hide");
		}
	});

}


/***********************************Show contents of group******************************************/
function assignEvents(id)
{
	console.log(id);
	window.location.href = "<?php echo $sideurl;?>/Group-Content.php?id="+id+"";
}

$('#myModal').modal({
	show: false
}).on('hidden.bs.modal', function(){
	$("#name").val('');
	$("#datetimepicker1").val('');
	$("#datetimepickercopy").val('');
});
$('#copyModal').modal({
	show: false
}).on('hidden.bs.modal', function(){
	$("#name").val('');
	$("#datetimepickercopy").val('');
});

</script>
</body>
<style type="text/css">
.accordionItem.close.comapnies a.edit-dlt-icons {
    margin: 2px 10px 0px;
    float: left;
}
.accordionItem.close.comapnies .outerDiv {
    width: 82%;
}
.accordionItem.close.comapnies {
    margin-bottom: -10px;
    border-left: 3px solid #1b82d0;
    background: #fff;
    margin-top: 26px;
    padding: 15px 50px 0px 15px;
}




.add-content-form label {
    float: left;
    width: 24%;
    text-align: right;
    font-size: 18px;
    color: #3f3f3f;
    font-weight: normal;
    margin-top: 8px;
}
.input-group-div {
    float: right;
    width: 72%;
}
.modal-body, .modal-content {
    float: left;
}
.input-group {
    position: relative;
    display: table;
    border-collapse: separate;
    float: right;
    width: 72%;
}
.modal-footer{float: left; width: 100%;}
.input-group-addon {
 background-color: #1883d3;
border: 0px solid #ccc; 
}
.input-group-addon .glyphicon {
    color: #fff;
}
.input-group .form-control, .input-group-addon, .input-group-btn {
    display: block;
}
.form-control {
    -webkit-box-shadow: none; 
    box-shadow: none; 
}
span.input-group-addon {
    position: absolute;
    top: 0;
    z-index: 2;
    right: 0px;
    padding: 18px 30px 18px 20px;
    pointer-events: none;
}
h3 {
    font-size: 20px;
    font-weight: normal;
}
</style>>
</html>
<?php
	include($basePath.'/footer.php');
?>