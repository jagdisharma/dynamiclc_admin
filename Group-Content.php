<?php
	$id = $_REQUEST['id'];
	include('include/config.php');
	include('Sidebars/sideBarforGroup.php');
	//include('Sidebars/sidebar.php');
?>
<body>


<!-- Modal -->
<div id="adduser" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add CONTENT</h4>
			</div>
			<div class="modal-body">
				<form class="add-content-form" action="" method="post" id="formAdd" enctype="multipart/form-data">
			<div class="form-group">
				<label>Title :</label>
				<div class="input-group-div"><input type="text" class="form-control name" name="name" id="name"  placeholder=""/></div>
			</div><!-- FOR GROUP -->
			<div class="form-group">
				<label>Type :</label>
				<div class="input-group-div input-group-div-checkbox" id="radioinput">
					<div class="radio-container">
						<input type="radio" class="form-control" name="contentType" id="audio" style="width:30px;" value="0"/>
						<span>Audio</span>
					</div>
					<div class="radio-container">
						<div><input type="radio" class="form-control" name="contentType" id="video" style="width:30px;" value="1"/></div>
						<span>Video</span>
					</div>
				</div>
			</div><!-- FOR GROUP -->
			<div class="form-group">
				<label>File :</label>
				<div class="input-group-div">
					<input name="contentFile" class="file fileVideo" id="fileContent" type="file" >
					<div class="input-group col-xs-12">
					  <input class="form-control input-lg" disabled="" placeholder="Upload File" type="text" id="uploadFile" >
					  <span class="input-group-btn">
						<button class="browsevideo btn btn-primary input-lg" type="button"> Browse</button>
					  </span>
					</div>
				</div>
			</div><!-- FOR GROUP -->
			<div class="form-group">
				<label>Cover Photo :</label>
				<div class="input-group-div">
					<input type='file' class="fileimage" id="fileimage" name="fileimage" onchange="readURL(this);"  />
					<div class="input-group cover">
					  <span class="input-group-btn">
						<button class="browseimage btn btn-primary input-lg" type="button"> Browse</button>
					  </span>
					</div>
					<div class="cover-img"><img id="blah" src="include/images/image-icon.png" alt="your image" /></div><!-- COVER IMAGE -->
				</div>
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

<!-- Edit Modal -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="Edit_Content">Edit Content</h4>
      </div>
      <div class="modal-body">
        <form class="add-content-form" action="" method="post" id="formEdit" enctype="multipart/form-data">
			<div class="form-group">
				<label>Title :</label>
				<div class="input-group-div"><input type="text" class="form-control name" name="name" id="name_edit" value=""  placeholder=""/></div>
				<input type="hidden" name="hidden_ID" id="hidden_ID">
			</div><!-- FOR GROUP -->
			<div class="form-group">
				<label>Type :</label>
				<div class="input-group-div input-group-div-checkbox" id="radioinput">
					<input type="hidden" name="fileType" id="fileType">
					<div class="radio-container">
						<input type="radio" class="form-control" name="contentType" id="content-0" style="width:30px;" value="0"/><span>Audio</span>
					</div>
					<div class="radio-container">
						<input type="radio" class="form-control" name="contentType" id="content-1" style="width:30px;" value="1"/><span>Video</span>
					</div>
				</div>
			</div><!-- FOR GROUP -->
			<div class="form-group">
				<label>File :</label>
				<div class="input-group-div">
					<input type="hidden" name="StatusFileHidden" id="StatusFileHidden">
					<!-- <input name="contentFile" class="file file_video" type="fileContent" id="video_edit_link">
					<div class="input-group col-xs-12">
					  <input class="form-control input-lg" disabled="" placeholder="Upload File" id="link_edit" value="" type="text">
					  <span class="input-group-btn">
						<button class="browsevideoEdit btn btn-primary input-lg" type="button"> Browse</button>
					  </span>
					</div> -->
					<input name="contentFile" class="file fileVideo" id="fileContent" type="file" >
					<div class="input-group col-xs-12">
					  <input class="form-control input-lg" disabled="" placeholder="Upload File" type="text" id="edit_file" >
					  <span class="input-group-btn">
						<button class="browsevideo btn btn-primary input-lg" type="button"> Browse</button>
					  </span>
					</div>

				</div>
			</div><!-- FOR GROUP -->
			<div class="form-group">
				<label>Cover Photo :</label>
				<div class="input-group-div">
					<input type="hidden" name="StatusImageHidden" id="StatusImageHidden">

					<input type="file" name="imageEdit" class="file file_edit" id="img_edit" onchange="readURL(this);"/>
					<div class="input-group cover">
					  <span class="input-group-btn">
						<button class="browse_edit btn btn-primary input-lg" type="button"> Browse</button>
					  </span>
					</div>
					<div class="cover-img"><img id="blah_edit" src="include/images/image-icon.png" alt="your image" /></div><!-- COVER IMAGE -->
				</div>
			</div><!-- FOR GROUP -->
			 <div class="modal-footer text-center">
				<input type="submit" name="submitbtn" class="btn btn-default submit" value="Submit">
			</div>
		</form><!-- ADD CONTENT FORM -->
      </div>
    </div>

  </div>
</div>
<!--  Edit Modal  -->
<div id="myModalvideo" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<input type="hidden" name="hidden" id="hiddenId">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			 		 <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<video width="100%" controls id="playvideo">
					<source src="" type="video/mp4">
				</video>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div id="myModalaudio" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<input type="hidden" name="hidden" id="hiddenId">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			 		 <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<audio controls id="playaudio" width: 100%;>
					<source src="" type="audio/mp3">
				</audio>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- Play Audio/Video  -->
<!-- Play Audio/Video  -->
<style>
.input-group-div-checkbox .radio-container {
	display: inline-block;
    width: 25%;
    position: relative;;
}
.input-group-div-checkbox .radio-container span {
    position: absolute;
    top: 13px;
    left: 40px;
    font-size: 16px;
}
.modal-header{
	padding: 25px;
}

#Table_content_video {
	padding-bottom: 40px;
	border-bottom: 1px solid #ccc;
	margin-bottom: 20px;
}
</style>
<script>

var orders = '1';

$(document).ready(function ()
{
	var path 	= location.pathname;
	var id		= "<?php echo $id ;?>";
	db.collection("Groups").doc(id).get().then(function(doc) {
			$('#Groupnamecrumb').html(doc.data().name);
	});
})

$(document).on('click', '.browsevideo', function(){
  var file = $(this).parent().parent().parent().find('.fileVideo');
  file.trigger('click');
});
/*----Remove file content on changing type in add form---*/
$('#radioinput input').on('change', function() {
	$("#uploadFile").val("");
});
/*----Remove file content on changing type in edit form---*/
$('#radioinput input').on('change', function() {
	$("#edit_file").val("");
});

$(document).on('click', '.browseimage', function(){
	var file = $(".fileimage");
	file.trigger('click');
});

$(document).on('change', '.fileimage', function(){
	console.log($(this).val());
	$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});

function readURL(input) 
{
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		var ext = input.files[0].name.split('.').pop().toLowerCase();

		if( ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "PNG" || ext == "png")
		{
			reader.onload = function (e) {
				$('#blah').attr('src', e.target.result);
				$('#blah_edit').attr('src', e.target.result);
			};
			reader.readAsDataURL(input.files[0]);			
		} 
		else
		{
			$(input).val("");
			$('#blah').attr('src', "include/images/image-icon.png");
			$('#blah_edit').attr('src', "include/images/image-icon.png");
			swal("Pleease Upload jpeg , Jpg , png images only");
		}
	}
}
/********************************--Validation of file type--*****************************************************/
$(document).on('change', '#fileContent', function(){
	console.log($('input[name="contentType"]:checked').val());
	$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	var valueData  = document.getElementById('fileContent');
	var typedata = $('input[name="contentType"]:checked').val();
	var ext = valueData.files[0].name.split('.').pop().toLowerCase();
	
	if(typedata == 1){
		if( ext == "MP4" || ext == "mp4")
		{

		}else{
			$("#uploadFile").val("");
			$("#fileContent").val("");			
			swal("You have selected type as Video. Please Upload MP4 video only");
		} 
	}else if(typedata == 0){
		if( ext == "MP3" || ext == "mp3" ){

		} 
		else
		{
			$("#uploadFile").val("");
			$("#fileContent").val("");			
			swal("You have selected type as Audio. Please Upload MP3 audio only");
		}
	}else{
		$("#uploadFile").val("");
		$("#fileContent").val("");			
		swal("Please select type first.");
		//$("#contentType").val("");
	}
});

/**********************************--Get all data--*******************************************/
$(document).ready(function ()
{
	function getAllexercise()
	{	
		var groupId =	"<?php echo $id ;?>";
		console.log('groupId------------->',groupId);
		$("#loader").show();
		var tablevideo = '';
		var tableaudio = '';
		db.collection("Contents").where("groupId", "==", groupId).orderBy('createdAt','asc').get().then(function(querySnapshot) {
			querySnapshot.forEach(function(doc) {				

				var fileUrl = doc.data().fileUrl;
				if(doc.data().type == 1){
					tablevideo = '<div class="content-list" id="'+doc.data().id+'"><div class="AudUrl"><audio id="mytest_'+doc.data().id+'" controls><source src='+fileUrl+' type="audio/mp3"></audio></div><div class="Audio-section" style="width:120px;height:120px" onclick="playFile(\''+doc.data().id+'\')"><img src='+doc.data().thumbUrl+'><div class="overLayBack"><img class="playIcon" src="include/images/play.png"></div></div><div class="Audio-detail"><h3 style="text-transform: uppercase;">'+doc.data().title+'</h3><p id="mytime_'+doc.data().id+'"></p></div><div class="video-icons text-right"><a href="javascript:void(0)"  class="edit-dlt-icons" onclick="editExercise(\''+doc.data().id+'\')"><img src="include/images/edit.png"></a><a href="javascript:void(0)" class="edit-dlt-icons" onclick="deleteExercise(\''+doc.data().id+'\')"><img src="include/images/dlt.png"></a></div></div>'; 
					$('#Table_content_video').append(tablevideo);
				}else if(doc.data().type == 0){
					tableaudio = '<div class="content-list" id="'+doc.data().id+'"><div class="AudUrl"><audio id="mytest_'+doc.data().id+'" controls><source src='+fileUrl+' type="audio/mp3"></audio></div><div class="Audio-section" style="width:120px;height:120px" onclick="playFile(\''+doc.data().id+'\')"><img src='+doc.data().thumbUrl+'><div class="overLayBack"><img class="playIcon" src="include/images/play.png"></div></div><div class="Audio-detail"><h3 style="text-transform: uppercase;">'+doc.data().title+'</h3><p id="mytime_'+doc.data().id+'"></p></div><div class="Audio-icons text-right"><a href="javascript:void(0)" class="edit-dlt-icons" onclick="editExercise(\''+doc.data().id+'\')"><img src="include/images/edit.png"></a><a href="javascript:void(0)" class="edit-dlt-icons" onclick="deleteExercise(\''+doc.data().id+'\')"><img src="include/images/dlt.png"></a></div></div>'; 
					$('#Table_content_audio').append(tableaudio);
				}
				$("#loader").hide();	
			});

			if(tablevideo == '')
			{
				tablevideo = '<div class="content-list"><h5>Videos</h5><br>NO DATA FOUND</div>';
				$('#Table_content_video').html(tablevideo);
				$('#Table_content_video').disableSelection();
			}

			if(tableaudio == ''){
				tableaudio = '<div class="content-list"><h5>Audios</h5><br>NO DATA FOUND</div>';
				$('#Table_content_audio').html(tableaudio);
				$('#Table_content_audio').disableSelection();
			}
			$("#loader").hide();
		});
	}
	getAllexercise();
});

/**********************************--Add Media File--*******************************************/
$("#formAdd").submit(function (e){
	//console.log("orders--",orders);
	fnlorders = orders + 1;
	//console.log("final----",fnlorders);
	$("#loader").show();
	e.preventDefault();
	var groupId 	=	"<?php echo $id ;?>";

	var title 		= $("#name").val();
	var type 		= $('input[name="contentType"]:checked').val();
	var image 		= $("#fileimage").val();
	var file 		= $("#fileContent").val();
	// console.log('title----------------->',title);
	// console.log('type----------------->',type);
	// console.log('image----------------->',image);
	// console.log('file----------------->',file);

	if(title == '' || image == '' || file == '' || type == '')
	{
		$("#loader").hide();
		//console.log(101);
		swal("Please fill the all fields");
	}else{
			var final_Val 	= '';
			var startDate 	= parseInt((new Date($('#survey_st_time').val()).getTime() / 1000).toFixed(0));
			var endDate  	= parseInt((new Date($('#survey_end_time').val()).getTime() / 1000).toFixed(0));
			var createdAt 	= Math.round(new Date().getTime()/1000);
			var finalCount	= '';
			type 		    = parseInt(type);
			var formData = new FormData(this);
			//console.log(formData);

			$.ajax({
				url: "<?php echo $sideurl;?>/uploadContent.php",
				type:'POST',
				data:formData,
				cache:false,
				contentType: false,
				processData: false,
				timeout: 3000000,
				success:function(data){
					data.replace(/\\/g, "");
					var data = JSON.parse(data);
					//return false;
					console.log('data--------------->',data);
					/****** ADD Contents ******/
					var data1 		= data.data1;
					var data2 		= data.data2;
					var uid 		= localStorage.getItem('id');
					var collection 	= 'Contents';
					/****** Add a new document in collection "Contents" **********/

					finalCount = $(".Audio-section").length+1;
					var hms = data.audioDuration;   // your input string
					var a 	= hms.split(':'); // split it at the colons
					// minutes are worth 60 seconds. Hours are worth 60 minutes.
					var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]);
					
					// console.log('groupId----------------->',groupId);
					// console.log('createdAt----------------->',createdAt);
					// console.log('duration----------------->',seconds);
					// console.log('fileUrl----------------->',data2);
					// console.log('order----------------->',fnlorders);
					// console.log('thumbUrl----------------->',data1);
					// console.log('title----------------->',title);
					// console.log('type----------------->',type);
					// console.log('updatedAt----------------->',createdAt);

					db.collection(collection).add({
						groupId: groupId,
						assignToCompanies: {"iR0LKpZjWo7lLG8fo20j" : true},
						createdAt: createdAt,
						duration : seconds,
						fileUrl : data2,
						id : '',
						order : fnlorders,
						thumbUrl : data1,
						title: title,
						type : type,
						updatedAt:createdAt,
					})
					.then(function(docRef) {
						console.log("Document written with ID: ", docRef.id);      
						var parentDocId = docRef.id;
							/********************** [ Add Id after insert data ] ************************/
							db.collection(collection).doc(parentDocId).set({
							  id: parentDocId
							}, { merge: true });

						})
						.catch(function(error) {
							console.error("Error adding document: ", error);
						});

						$("#loader").hide();
						$("#name").val('');
						$("#uploadFile").val('');
						$(".file").val('');
						//$('input[name="contentType"]:checked').val('');
						$(".fileimage").val('');
						
						swal("New content has been added to library")
							.then((value) => {
								$("#adduser").modal("hide");
								location.reload();
							});
				},
				error: function(data){
					// ajax error function
					console.log("error");
					console.log(data);
				}
			});
	}
})
/***********************************--Delete Item--*****************************************/
function deleteExercise(userId)
{
	console.log("---------ID");

	console.log("buttonId--"+userId);
	var collection = 'Contents';

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
			}).then((value) => {
				location.reload();
			});;
			
		} else {
			
		}
	});
}

/***********************************--Edit Item--********************************************/

$(document).on('click', '.browse_edit', function(){
	var file = $("#img_edit");
	file.trigger('click');
});

$(document).on('change', '.file_edit', function(){
	console.log($(this).val());
	$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});

function editExercise(userId)
{
	var newLink = '';
	var UID = userId;
	console.log(UID);
	var status = 0;
	
	$("#hidden_ID").val(UID);
	$("#StatusImageHidden").val(status);
	$("#StatusFileHidden").val(status);
	//$('fileType').val(status);

	db.collection("Contents").doc(UID).get().then(function(doc) {
		console.log(doc.data());
		var name = doc.data().title;
		var videoLink = doc.data().fileUrl;
		var thumbUrl = doc.data().thumbUrl;
		var type = doc.data().type;
		
		console.log(name);
		console.log('type--------------->', type);
		$("#name_edit").val(name);
		$("#edit_file").val(videoLink);
		$("#Edit_Content").html(name);
		$('#content-'+type).prop('checked',true);
		$("#blah_edit").attr('src', thumbUrl);
		$("#editModal").modal("show");
	});
}


$("#formEdit").submit(function (e){
	$("#loader").show();
	e.preventDefault();
	var imageSrc 	= 	'';
	var fileSrc 	=	'';
	var seconds		=	'';
	var type 		=	$('input[name="contentType"]:checked').val();
	var title 		= 	$("#name_edit").val();
	var U_ID 		=	$("#hidden_ID").val();
	var collection 	= 	'Contents';

	var updatedAt = Math.round(new Date().getTime()/1000);
	//result false;
	
	var formData = new FormData(this);
	type 		 = parseInt(type);

	$.ajax({
		type:'POST',
		url: "<?php echo $sideurl;?>/EditUploadContent.php",
		data:formData,
		cache:false,
		contentType: false,
		processData: false,
		timeout: 3000000,
		success:function(data){
			var data = JSON.parse(data);

			console.log(data);
			if (data.data1 == ''){
				console.log("blank");
				imageSrc  = $("#blah_edit").attr('src');
				
			}else{
				console.log("Fill");
				imageSrc  = data.data1;
			}
			//console.log("imageSrc----------",imageSrc);

			if (data.data2 == ''){
				console.log("blank");
				videoSrc  = $("#edit_file").val();				
			}else{
				console.log("Fill");
				videoSrc  = data.data2;
			}
			//console.log("videoSrc----------",videoSrc);

			if (data.audioDuration == null)
			{

				db.collection("Contents").doc(U_ID).get().then(function(doc) {
					console.log(doc.data().duration);
					seconds = doc.data().duration;
					console.log(seconds);

					db.collection(collection).doc(U_ID).update({				
						duration : seconds,
						fileUrl : videoSrc,				
						thumbUrl : imageSrc,
						title: title,
						type : type,
						updatedAt:updatedAt
					})
					.then(function() {
						$("#loader").hide();
						console.log("Document successfully updated!");
						swal(''+title+' has been updated to library')
							.then((value) => {
								$("#editModal").modal("hide");
								location.reload();
							});
					});
				});

			}else{
				var hms = data.audioDuration;   // your input string
				var a = hms.split(':'); // split it at the colons

				// minutes are worth 60 seconds. Hours are worth 60 minutes.
				seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 

				db.collection(collection).doc(U_ID).update({				
					duration : seconds,
					fileUrl : videoSrc,				
					thumbUrl : imageSrc,
					title: title,
					type : type,
					updatedAt:updatedAt
				})
				.then(function() {
					$("#loader").hide();
					console.log("Document successfully updated!");
					swal(''+title+' has been updated to library')
						.then((value) => {
							$("#editModal").modal("hide");
							location.reload();
						});
				});
			}

		},
		error: function(data){
			console.log("error");
			console.log(data);
		}
	});
})

/*************************--Play Audio/Video--*************************************/
function playFile(userId)
{	
	var newLink = '';
		var UID = userId;
		$("#hiddenId").val(UID);
		var idval = $('#mytest_'+UID);
		var name = '';
		var vUrl = '';

		db.collection("Contents").doc(UID).get().then(function(doc) {
			name = doc.data().title;
			vUrl = doc.data().fileUrl;
			if(doc.data().type == 0){
				$("#exampleModalLabel").html(name);	
				$("#playaudio source").attr('src', vUrl);
				$("#playaudio")[0].load();

				$("#myModalaudio").modal("show");
				$("#playaudio")[0].play();
			}else if(doc.data().type == 1){
				$("#exampleModalLabel").html(name);	
				$("#playvideo source").attr('src', vUrl);
				$("#playvideo")[0].load();

				$("#myModalvideo").modal("show");
				$("#playvideo")[0].play();
			}
		});

}

$('#myModalaudio').modal({
	show: false
}).on('hidden.bs.modal', function(){
	$("#playaudio")[0].pause();
});
$('#myModalvideo').modal({
	show: false
}).on('hidden.bs.modal', function(){
	$("#playvideo")[0].pause();
});

$('#adduser').modal({
	show: false
}).on('hidden.bs.modal', function(){
	$("#name").val('');
	$("#uploadFile").val('');
	$(".file").val('');
	$(".file").val('');
	$(".fileimage").val('');
	$("#radioinput input").prop('checked',false);
});

</script>
</body>

</html>




