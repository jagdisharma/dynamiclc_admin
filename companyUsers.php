<?php
	$id = $_REQUEST['id'];
	include('include/config.php');
	include('Sidebars/sideBarforCompany.php');
?>
<body>


<!-- Modal -->
<div id="adduser" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add User</h4>
			</div>
			<div class="modal-body">
				<form class="add-content-form" action="" method="post" id="formAdd">
					<div class="form-group">
						<label>First Name :</label>
						<input type="hidden" name="hidden_ID" id="hidden_ID">
						<div class="input-group-div"><input type="text" class="form-control name" name="name" id="name"  placeholder=""/></div>
					</div><!-- FOR GROUP -->
					<div class="form-group">
						<label>Last Name :</label>
						<div class="input-group-div"><input type="text" class="form-control name" name="name" id="lastname"  placeholder=""/></div>
					</div><!-- FOR GROUP -->
					<div class="form-group">
						<label>Email :</label>
						<div class="input-group-div"><input type="email" class="form-control name" name="name" id="Email"  placeholder=""/></div>
					</div><!-- FOR GROUP -->
					<div class="form-group">
						<label>Password :</label>
						<div class="input-group-div"><input type="text" class="form-control name" name="name" id="pass"  placeholder=""/></div>
					</div><!-- FOR GROUP -->
					<div class="modal-footer text-center">
						<input type="submit" name="submitbtn" class="btn btn-default submit" value="Submit">
					</div>
				</form><!-- ADD CONTENT FORM -->
			</div>
		</div>
	</div>
</div>
<!-- Modal -->



<!-- Import Modal -->
<div id="multipleusers" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Register Multiple users</h4>
			</div>
			<div class="modal-body">
				<p>Upload a file containing the users you wish to register. Please note that a maximum of 100 users can be included in your file and it may take a few minutes to process.
					<a href="sample.csv" download>Download sample file</a></p>
				<form class="add-content-form" action="" method="post" enctype='multipart/form-data' id="formAddMultipleUsers">
					<!-- <div class="form-group">
						<label>Upload File :</label>
						<input type="hidden" name="companyID" id="company-import-id" value="<?php echo $id; ?>">
						<div class="input-group-div"><input type="file" class="form-control name" name="importUsers" accept=".csv" id="import-user-input"  placeholder=""/></div>
					</div>FOR GROUP -->
					<div class="form-group BrowseFile">
						<label>Upload File :</label>
						<div class="BrowseBtnInner">
							<input type="hidden" name="companyID" id="company-import-id" value="<?php echo $id; ?>">
							<input id="uploadFile" placeholder="Choose File" disabled="disabled" />
							<div class="fileUpload btn btn-primary">
							    <span>Browse</span>
							    <input id="import-user-input" type="file" class="upload name" onchange="myFunction()" name="importUsers" accept=".csv" />
							</div>
						</div><!-- BrowseBtnInner -->
					</div>
					<div class="modal-footer text-center">
						<input type="submit" name="submitbtn" class="btn btn-default submit" style="width: 150px;" value="Upload File" id="import-user-submit">
					</div>
					
				</form><!-- ADD CONTENT FORM -->
			</div>
		</div>
	</div>
	<img src="images/loader.gif" id="gif" style="display: none;" >
</div>
<!-- Import Modal -->

<?php

	
?>

<!-- Edit Modal -->
<div id="EditModel" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" id="editFormname"></h4>
			</div>
			<div class="modal-body">
				<form class="add-content-form" action="" method="post" id="formEdit">
					<div class="form-group">
						<label>First Name :</label>
						<input type="hidden" name="hiddenID" id="hiddenID">
						<div class="input-group-div"><input type="text" class="form-control name" name="name" id="editname"  placeholder="" readonly="" /></div>
					</div><!-- FOR GROUP -->
					<div class="form-group">
						<label>Last Name :</label>
						<div class="input-group-div"><input type="text" class="form-control name" name="name" id="editlastname"  placeholder="" readonly/></div>
					</div><!-- FOR GROUP -->
					<div class="form-group">
						<label>Email :</label>
						<div class="input-group-div"><input type="email" class="form-control name" name="name" id="editEmail"  placeholder="" readonly/></div>
					</div>
					<!-- <div class="modal-footer text-center">
						<input type="submit" name="submitbtn" class="btn btn-default submit" value="Update">
					</div> -->
				</form><!-- ADD CONTENT FORM -->
			</div>
		</div>
	</div>
</div>
<!--  Edit Modal  -->



<!-- <div class="accordionItem open">
<h2 class="accordionItemHeading">Uzeny</h2>
</div> -->

<script>



$(document).ready(function(){
	var id = "<?php echo $id ;?>";
    $('input[name="enableTextYourCoach"]').click(function(){
        if($(this).prop("checked") == true){
			db.collection("Companies").doc(id).update({
				enableTextYourCoach: true
			})
			.then(function() {		
				console.log("updated");
			});
        }
        else if($(this).prop("checked") == false){
            db.collection("Companies").doc(id).update({
				enableTextYourCoach: false
			})
			.then(function() {		
				console.log("updated");
			});
        }
    });
});

$(document).ready(function(){
	var id = "<?php echo $id ;?>";
    $('input[name="enableScheduleMeetings"]').click(function(){
        if($(this).prop("checked") == true){
			db.collection("Companies").doc(id).update({
				enableScheduleMeetings: true
			})
			.then(function() {		
				console.log("updated");
			});
        }
        else if($(this).prop("checked") == false){
            db.collection("Companies").doc(id).update({
				enableScheduleMeetings: false
			})
			.then(function() {		
				console.log("updated");
			});
        }
    });
});

$(document).ready(function(){
	var id = "<?php echo $id ;?>";
	db.collection("Companies").where("id", "==", id).get().then(function(querySnapshot) {
		querySnapshot.forEach(function(doc) {		
			var enableScheduleMeetings = doc.data().enableScheduleMeetings;
			var enableTextYourCoach = doc.data().enableTextYourCoach;

			console.log(enableTextYourCoach);
			console.log(enableScheduleMeetings);

			$('#enableTextYourCoach').prop("checked", enableTextYourCoach);
			$('#enableScheduleMeetings').prop("checked", enableScheduleMeetings);
			
			
		});
	});
});



var orders = '1';
$(document).ready(function ()
{	
	// show import button
	$('#button-import-user').show();
	var name1 = '';

	$("#name").keypress(function () {
		var _val = $("#name").val();
		var _txt = _val.charAt(0).toUpperCase() + _val.slice(1);
		$("#name").val(_txt);
	})

	$('body').on('keydown', '#name', function(e) {
		//console.log(this.value);
		if (e.which === 32 &&  e.target.selectionStart === 0) 
		{
			return false;
		}  
	});

	$('body').on('keydown', '#lastname , #pass', function(e) {
		//console.log(this.value);
		if (e.which === 32) 
		{
			return false;
		}  
	});

	function getAllusers()
	{
		$("#loader").show();
		//console.log("Data---------Start-----");
		var table = '';
		var companyID = "<?php echo $id ;?>";
		var table = '';
		db.collection("Users").where("companyId", "==", companyID).orderBy("name").get().then(function(querySnapshot) {
			querySnapshot.forEach(function(doc) {
				//console.log("Data--------------",querySnapdocshot.size);
				/*if(doc.data().companyId == companyID)
				{*/
				table += '<div class="accordionItem"><a href="<?php echo $sideurl;?>/userGraph.php?userid='+doc.data().id+'&companyId='+companyID+'"><h2 class="accordionItemHeading">'+doc.data().name+'</h2></a><div class="Audio-icons text-right"><a href="javascript:void(0)"  class="edit-dlt-icons" onclick="editUser(\''+doc.data().id+'\')"><img src="include/images/information.png"></a><a href="javascript:void(0)" class="edit-dlt-icons" onclick="deleteUser(\''+doc.data().id+'\')"><img src="include/images/dlt.png"></a></div></div>';
				/*}*/
				/*table = '<div class="accordionItem"><h2 class="accordionItemHeading">'+doc.data().name+'</h2><div class="Audio-icons text-right"><a href="javascript:void(0)" class="edit-dlt-icons" onclick="deleteUser(\''+doc.data().id+'\')"><img src="include/images/dlt.png"></a></div></div>';*/

				$("#loader").hide();
			});
			if(table == '') {
				table = '<div class="accordionItem_NoUsers">NO DATA FOUND</div>';
				$('#accordion_Wrapper').html(table);
				$("#loader").hide();
			} else {
				$('#accordion_Wrapper').append(table);
			}
		});
	}
	getAllusers();
});

$("#formAdd").submit(function(e){
	$("#loader").show();
	e.preventDefault();
	var companyID 	=	"<?php echo $id ;?>";
	var firstName	=	$("#name").val();
	//var firstName	=	name1;
	console.log("firstName----",firstName);
	var lastName	=	$("#lastname").val();
	var email		=	$("#Email").val();
	var password	=	$("#pass").val();
	var startDate	=	parseInt((new Date($('#survey_st_time').val()).getTime() / 1000).toFixed(0));
	var endDate 	=	parseInt((new Date($('#survey_end_time').val()).getTime() / 1000).toFixed(0));
	var createdAt	=	Math.round(new Date().getTime()/1000);
	var fullName	=	firstName+' '+lastName;

	/*console.log(fullName ,",",email , "," ,password);
	return false;*/

	if(firstName == '' || lastName == '' || email == '' || password == '')
	{
		$("#loader").hide();
		swal("Please fill the all fields");
	}else{

		console.log("companyID-----",companyID);
		firebase.auth().createUserWithEmailAndPassword(email, password).then(function(docRef) {

			db.collection("Users").add({
							companyId: companyID,
							createdAt : createdAt,
							email : email.toLowerCase(),
							id : '',
							name : fullName,
							profilePicUrl : '',
							updatedAt: createdAt
						})
						.then(function(docRef) {
							console.log("Document written with ID: ", docRef.id);      
							var parentDocId = docRef.id;
				
								/*********************** [ Add Id after insert data ] *************************/ 
								db.collection("Users").doc(parentDocId).set({
								  id: parentDocId
								}, { merge: true });

								/*firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
									// Handle Errors here.
									var errorCode = error.code;
									var errorMessage = error.message;
									console.log("errorMessage---------",errorMessage);
								});
								*/
								$("#loader").hide();
								$("#name").val('');
								$("#lastname").val('');
								$("#Email").val('');
								$("#pass").val('');
								$("#myModal").modal("hide");
								swal("New User has been added..!!!")
									.then((value) => {
										location.reload();
									});		

							})
							.catch(function(error) {
								console.error("Error adding document: ", error);
							});	

		}).catch(function(error) 
		{
			// Handle Errors here.
			var errorCode = error.code;
			var errorMessage = error.message;
			console.log("errorMessage---------",errorMessage);
			console.log("Error-----",errorCode);
			if(errorCode === "auth/email-already-in-use")
			{
				$("#loader").hide();
				$("#loader").hide();
				$("#name").val('');
				$("#lastname").val('');
				$("#Email").val('');
				$("#pass").val('');
				
				swal("Email already exist")
					.then((value) => {
						//location.reload();
						$("#myModal").modal("hide");
					});	
			}else if (errorCode === 'auth/weak-password'){

				$("#loader").hide();
				$("#loader").hide();
				$("#name").val('');
				$("#lastname").val('');
				$("#Email").val('');
				$("#pass").val('');
				
				swal("Password should be at least 6 characters")
					.then((value) => {
						//location.reload();
						$("#myModal").modal("hide");
					});	
						
			}

		});


	}


})

function deleteUser(userId)
{
	var collection = 'Users';

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
			db.collection(collection).doc(userId).delete().then(function(){
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

function editUser(userId)
{
	var newLink 	= '';
	var UID 		= userId;
	var  status 	= 0;
	var first_name	=	'';
	
	$("#hiddenID").val(UID);

	db.collection("Users").doc(UID).get().then(function(doc) {
		first_name		=	doc.data().name;
		var email			=	doc.data().email;
		
		data = first_name.split(' ')
		console.log(first_name);
		//return false;
		$("#editname").val(data[0]);
		$("#editlastname").val(data[1]);
		$("#editEmail").val(email);
		$("#editFormname").html(first_name);
		$("#EditModel").modal("show");
	});
}

$("#formEdit").submit(function(e){
	e.preventDefault();
	console.log("---Edit")
	console.log()

		var Fname		=	$("#editname").val();
		var Lname		=	$("#editlastname").val();
		//var email		=	$("#editEmail").val();
		var idU			=	$("#hiddenID").val();
		var updatedAt 	= 	Math.round(new Date().getTime()/1000);
		var finalName	=	Fname+' '+Lname;

		db.collection("Users").doc(idU).update({				
				name		:	finalName,				
				//email		:	email,
				updatedAt	:	updatedAt
			})
			.then(function() {
				$("#loader").hide();
				console.log("Document successfully updated!");
				swal(''+Fname+' has been updated to library')
					.then((value) => {
						location.reload();
					});
			});

})

$(document).ready(function ()
{

	var path 	= location.pathname;
	var id		= "<?php echo $id ;?>";
	console.log("Companyid-----",id);
	var finalPath = path+'?id='+id;
	console.log(path+'?id='+id)
	// filter menu items to find one that has anchor tag with matching href:

	$('.tabDiv > div').filter(function()
	{
		return '/' + $('a', this).attr('href') === finalPath;
		console.log(path)
		// add class active to the item:
	}).addClass('active');

	db.collection("Companies").doc(id).get().then(function(doc) {
		
			//console.log("name-----------",doc.data().name);
			$('#CompanyTag').html(doc.data().name);
			$('#Companynamecrumb').html(doc.data().name);
	});
})
$(".dropdown-menu li a").click(function(){
	$(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
	$(this).parents(".dropdown").find('.btn').val($(this).data('value'));
});

$(document).ready(function (){
	var origin 	= location.origin;
	var pathname 	= location.pathname;
	console.log('origin------>',origin);
	console.log('path------>',path);
	var path = origin+pathname
	path += '?id='+"<?php echo $id;?>";
    console.log("path------company-users", path);
	// filter menu items to find one that has anchor tag with matching href:
	$('#dropdown li').filter(function()
	{	
		console.log("$('a', this).attr('href')--------------", $('a', this).attr('href'));
		if($('a', this).attr('href') == path) {
			//console.log("enter in if");
			$('a', this).parent().addClass('active');
			$('#dropdown button').text($('a', this).text());
		} else {
			//console.log("enter in else");
		}
		// add class active to the item:
	})
})	

$(".Submit_Checkbox").hide();
$("#search").show();

$(document).ready(function (){
	var path 	= location.pathname;
	console.log("path-----------",path);

	// filter menu items to find one that has anchor tag with matching href:
	$('#sidebar li').filter(function()
	{
		return '/' + $('a', this).attr('href') === path;
		// add class active to the item:
	}).addClass('active');

	$('.tabDiv').filter(function()
	{
		return '/' + $('a', this).attr('href') === path;
		// add class active to the item:
	}).addClass('active');
})

function logout(obj)
{
	swal({
		title: "Confirm!",
		text: 'Do you want Logout..!!!',
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) 
		{
			localStorage.setItem("uid","");
			// window.location="http://enacteservices.com/VirtualStaging/";
			firebase.auth().signOut().then(function() {
			    // Sign-out successful.
			    window.location.href="/";
			    //window.location="/VirtualStaging/";
			}).catch(function(error) {
				// An error happened.
				var errorCode = error.code;
				alert(error);
			});
			
		} else {
			
		}
	});

} 
	$(document).on('click','#import-user-submit', function(e) {
		e.preventDefault();
		
		var importInput = document.getElementById("import-user-input");
		var reader = new FileReader();
        reader.onload = function () {
        	//console.log("reader.result-------->", reader.result);
        	processData(reader.result);
        	
        };
        // start reading the file. When it is done, calls the onload event defined above.
        reader.readAsBinaryString(importInput.files[0]);
		 
	})

	function processData(allText) {
			
			var allTextLines = allText.split(/\r\n|\n/);
			//console.log("allTextLines---------->", allTextLines);
			var lines = [];
			allTextLines = allTextLines.splice(0);
			if(allTextLines.length > 0) {
				
				for(var i =1; i<allTextLines.length; i++) {
					var currentRow = allTextLines[i];
					console.log("currentRow------>", currentRow);
					currentRow = currentRow.split(',');
					if(typeof currentRow[0] != "undefined" && currentRow[0] != undefined && currentRow[0] != null && currentRow[0] != "null" && currentRow[0] != "" && typeof currentRow[1] != "undefined" && currentRow[1] != undefined && currentRow[1] != null && currentRow[1] != "null" && currentRow[1] != "" && typeof currentRow[2] != "undefined" && currentRow[2] != undefined && currentRow[2] != null && currentRow[2] != "null" && currentRow[2] != "" && typeof currentRow[3] != "undefined" && currentRow[3] != undefined && currentRow[3] != null && currentRow[3] != "null" && currentRow[3] != "") {
						lines.push({first_name:currentRow[0],last_name:currentRow[1],email:currentRow[2],password:currentRow[3]});	
					}
				}	
			}
			
			if(lines.length > 0) {
				$("#import-user-submit").attr("disabled", true);
				//$("#gif").show(); 
				$("#loader").show();
				var emailExistArray=[];
				var index = 0;
				var createdAt	=	Math.round(new Date().getTime()/1000);
				function createMultipleUserImport(lines, index) {
					if(typeof lines[index] != "undefined" && lines[index] != undefined && lines[index] != "null" && lines[index] != "") {
						var email = lines[index].email.toLowerCase();
						var password = lines[index].password;
						var name = lines[index].first_name+" "+lines[index].last_name;
						firebase.auth().signInWithEmailAndPassword(email, password).then(function(docRe){
							//console.log('docRe------------>',docRe);
							emailExistArray.push(docRe.email);

							if(lines.length > index) {
								createMultipleUserImport(lines, index+1);
							}
						}).catch(error => { 
							var errorCode = error.code;
 							var errorMessage = error.message;
 							//console.log('errorCode----------->',errorCode);
 							//console.log('errorMessage----------->',errorMessage);
						  if (error.code === 'auth/user-not-found') {

						    // User doesn't exist yet, create it...
						    firebase.auth().createUserWithEmailAndPassword(email, password).then(function(docRef) {
								console.log('Email----------------------->',email);
								db.collection("Users").add({
									companyId: '<?php echo $id; ?>',
									createdAt : createdAt,
									email : email,
									id : '',
									name : name,
									profilePicUrl : '',
									updatedAt: createdAt
								})
								.then(function(docRef) {
									//console.log("Document written with ID: ", docRef.id);      
									var parentDocId = docRef.id;
									/*********************** [ Add Id after insert data ] *************************/ 
									db.collection("Users").doc(parentDocId).set({
									  id: parentDocId
									}, { merge: true });
									setTimeout(function(){
								        firebase.auth().signOut().then(function(){
								            // Call to create new user
								            if(lines.length > index) {
												createMultipleUserImport(lines, index+1);
										    }
								        });
								    }, 100);
									
								})
								.catch(function(error) {
									//console.error("Error adding document: ", error);
								});	

							})
							.catch(function(error) 
								{	console.log("email--- error --while creating user --->", error);
									var errorCode = error.code;
									var errorMessage = error.message;
									console.log("errorMessage-------->", errorMessage);
									if(errorCode === "auth/email-already-in-use")
									{
										//console.log("errorCode--------if---->", errorCode);	
									}else if (errorCode === 'auth/weak-password'){	
										//console.log("errorCode--------if---->", errorCode);
									}

							});
						  	}else if(error.code === 'auth/wrong-password'){
						  		//console.log('wrong password error------------------>',error);
						  		emailExistArray.push(lines[index].email);
						  		if(lines.length > index) {
									createMultipleUserImport(lines, index+1);
								}
						  	}
						})	
					} else {
				    	$("#multipleusers").modal("hide");
				    	console.log('email exist--------->',emailExistArray);
				    	setTimeout(function() {
				    		if(emailExistArray.length == lines.length){
				    			$("#loader").hide();
				    			swal("All users are already exists. ", {
									icon: "error",
								}).then(() => {
									window.location.href='<?php echo $sideurl;?>/companyUsers.php?id=<?php echo $id ?>';
								});
				    		}else if(emailExistArray.length > 0){
				    			$("#loader").hide();
				    			swal("Following users already exists:-\n"+emailExistArray.join(', ')+"\n\nOthers users (if any to above) have been imported successfully.",{
										icon: "warning",
										html: true ,
									}).then(() => {
									window.location.href='<?php echo $sideurl;?>/companyUsers.php?id=<?php echo $id ?>';
								});
								/*	swal({
										type:'warning',
										title:'Warning',
										html:"Following users already exists,<br>"+emailExistArray.join(', ')+"<br><br>Others users (if any to above) have been imported successfully."
								}).then(() => {
									window.location.href='companyUsers.php?id=<?php echo $id ?>';
								});*/
				    		} else{
				    			$("#loader").hide();
				    			swal("Provided users have been imported successfully!" ,{
									icon: "success",
								}).then(() => {
									window.location.href='<?php echo $sideurl;?>/companyUsers.php?id=<?php echo $id ?>';
								});
				    		}
				    		
						//	window.location.reload(); // window.location.href = 'url to be redirected'
				    	},20)
				    	
				    }
					
				}
				// call function to create user import csv
				createMultipleUserImport(lines, index);
				
			} else {
				alert("Your csv file is not in correct format. Please download sample file from above link.");
			}
			//console.log("all data when read successful---->", lines);


	}
			function myFunction() {
			    var x = document.getElementById("import-user-input").value;
			    var filename = $('#import-user-input').val().split('\\').pop();
			   // uploadFile
			   $('#uploadFile').val(filename);
			   //console.log("filename--------- file name --", filename);
			   
			}
</script>
<style>
.BrowseFile .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.BrowseFile .fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
input#uploadFile {
    background: #f5f5f5;
    height: 45px;
    border: 0;
    width: 100%;
    position: relative;
    float: right;
    padding: 2px 10px;
    font-size: 16px;
    color: #3f3f3f;
}
.BrowseBtnInner {
    position: relative;
    width: 76%;
    float: right;
}
.BrowseFile .fileUpload {
    position: absolute;
    overflow: hidden;
    margin: 0;
    right: 0;
    top: 0;
    height: 45px;
    line-height: 45px;
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
</body>
</html>




