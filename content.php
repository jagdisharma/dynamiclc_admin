<?php
	include('include/config.php');
	//echo $basePath;exit();
?>
<!Doctype html>
<html>
<head>
<title>Dynamic LC</title>
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
        <h4 class="modal-title">Add Content</h4>
      </div>
      <div class="modal-body">
        <form class="add-content-form" action="" method="post" id="formAdd" enctype="multipart/form-data">
			<div class="form-group">
				<label>Title :</label>
				<div class="input-group-div"><input type="text" class="form-control name" name="name" id="name"  placeholder=""/></div>
			</div><!-- FOR GROUP -->
			<div class="form-group">
				<label>Video :</label>
				<div class="input-group-div">
					<input name="video" class="file fileVideo" id="fileVideo" type="file" >
					<div class="input-group col-xs-12">
					  <input class="form-control input-lg" disabled="" placeholder="Upload Video" type="text" id="placehoder_video_name" >
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
					<!-- <button type="button" class="btn btn-default submit" id="submitBtn">Submit</button> -->
					<input type="submit" name="submitbtn" class="btn btn-default submit" value="Submit">
				</div>
		</form><!-- ADD CONTENT FORM -->
      </div>
      <!-- <div class="modal-footer text-center">
        <button type="button" class="btn btn-default submit" id="submitBtn">Submit</button>
      </div> -->
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
				<label>Video :</label>
				<div class="input-group-div">
					<input type="hidden" name="StatusVideoHidden" id="StatusVideoHidden">
					<input name="videoEdit" class="file file_video" type="file" id="video_edit_link">
					<div class="input-group col-xs-12">
					  <input class="form-control input-lg" disabled="" placeholder="Upload Image" id="link_edit" value="" type="text">
					  <span class="input-group-btn">
						<button class="browsevideoEdit btn btn-primary input-lg" type="button"> Browse</button>
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
				<!-- <button type="button" class="btn btn-default submit" id="Submit_Edit">Submit</button> -->
				<input type="submit" name="submitbtn" class="btn btn-default submit" value="Submit">
			</div>
		</form><!-- ADD CONTENT FORM -->
      </div>
     <!--  <div class="modal-footer text-center">
        <button type="button" class="btn btn-default submit" id="Submit_Edit">Submit</button>
      </div> -->
    </div>

  </div>
</div>
<!-- Modal -->

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
<script src="include/js/bootstrap.min.js"></script>
<script>
var orders = '1';
$(document).on('click', '.browsevideo', function(){
  var file = $(this).parent().parent().parent().find('.fileVideo');
  file.trigger('click');
});

$(document).on('change', '#fileVideo ', function(){
	console.log($(this).val());
	$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	var valueData  = document.getElementById('fileVideo');
	var ext = valueData.files[0].name.split('.').pop().toLowerCase();
	if( ext == "MP4" || ext == "mp4")
	{

	} 
	else
	{
		$("#placehoder_video_name").val("");			
		swal("Please Upload MP4 video only");
	}
});

$(document).on('change', '#video_edit_link', function(){
	console.log($(this).val());
	$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	var valueData  = document.getElementById('video_edit_link');
	var ext = valueData.files[0].name.split('.').pop().toLowerCase();
	if( ext == "MP4" || ext == "mp4")
	{

	} 
	else
	{
		$("#link_edit").val("");
		$("#video_edit_link").val("");			
		swal("Please Upload MP4 video only");
	}
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


$(document).ready(function ()
{
	$('.video-section').nailthumb();

	function getAllcontent()
	{
		$("#loader").show();
		var table = '';
		var myVid = [];
		var count = 1;
		db.collection("Contents").orderBy('order','asc').get().then(function(querySnapshot) {
			querySnapshot.forEach(function(doc) {
				//console.log("DATA",doc.data().id);
				if(doc.data().type == 1)
				{		
					var curmin = "";
					var fileUrl = doc.data().fileUrl;
					var userDetailId = doc.data().id;
					orders = doc.data().order;
					console.log("orders--",orders)

							/*table = '<div class="content-list"><div class="vidUrl"><video id="mytest_'+doc.data().id+'" width="320" height="240" controls><source src='+fileUrl+' type="video/mp4"></video></div><div class="video-section square-thumb" onclick="playVideo(\''+doc.data().id+'\')"><img src='+doc.data().thumbUrl+' id="thumb"><div class="overLayBack"><img class="playIcon" src="include/images/play.png"></div></div><div class="video-detail"><h3>'+doc.data().title+'</h3><p id="mytime_'+doc.data().id+'"></p></div><div class="video-icons text-right"><a href="javascript:void(0)" class="edit-dlt-icons" onclick="EditContent(\''+doc.data().id+'\')"><img src="include/images/edit.png"></a><a href="javascript:void(0)" class="edit-dlt-icons" onclick="deleteContent(\''+doc.data().id+'\')"><img src="include/images/dlt.png"></a></div></div></div><br>';*/

						var sf = sformat(doc.data().duration); 

						table += '<div class="content-list"><div class="video-section square-thumb" onclick="playVideo(\''+doc.data().id+'\')"><img src='+doc.data().thumbUrl+' id="thumb"><div class="overLayBack"><img class="playIcon" src="include/images/play.png"></div></div><div class="video-detail"><h3>'+doc.data().title+'</h3><p id="mytime_'+doc.data().id+'">'+sf+'</p></div><div class="video-icons text-right"><a href="javascript:void(0)" class="edit-dlt-icons" onclick="EditContent(\''+doc.data().id+'\')"><img src="include/images/edit.png"></a><a href="javascript:void(0)" class="edit-dlt-icons" onclick="deleteContent(\''+doc.data().id+'\')"><img src="include/images/dlt.png"></a></div></div></div><br>';

						//$('#Table_content').append(table);
		
										
				}	
				
			});
			if(table == '')
			{
				table = '<div class="content-list">NO DATA FOUND</div>';
					$('#Table_content').html(table);
					$("#loader").hide();
			} else {
				$('#Table_content').append(table);
				$("#loader").hide();
			}
			
		});
	}

	getAllcontent();
});

function sformat( s ) {
	var fm = [
				//Math.floor(Math.floor(Math.floor(s/60)/60)/24)%24,      //DAYS
				//Math.floor(Math.floor(s/60)/60)%60,                          //HOURS
				Math.floor(s/60)%60,                                                //MINUTES
				s%60                                                                      //SECONDS
			];
	return $.map(fm,function(v,i) { return ( (v < 10) ? '0' : '' ) + v; }).join( ':' );
}

$(document).ready(function () {
	$('body').on('keydown', '#name, #name_edit', function(e) {
		////console.log(this.value);
		if (e.which === 32 &&  e.target.selectionStart === 0) 
		{
			return false;
		}
	});
});


	function deleteContent(userId)
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
				});
				//location.reload();
			} else {
				//swal("Your imaginary file is safe!");
			}
		});
	}


$("#formAdd").submit(function (e){
	console.log("orders--",orders);
	fnlorders = orders + 1;
	console.log("final----",fnlorders);
	//return false;
	$("#loader").show();
	e.preventDefault();

	var title 		= $("#name").val();
	var image 		= $("#fileimage").val();
	var video 		= $("#fileVideo").val();

	if(title == '' || image == '' || video == '')
	{
		$("#loader").hide();
		console.log(101);
		swal("Please fill the all feilds");
	}else{

			var final_Val 	= '';
			var startDate 	= parseInt((new Date($('#survey_st_time').val()).getTime() / 1000).toFixed(0));
			var endDate  	= parseInt((new Date($('#survey_end_time').val()).getTime() / 1000).toFixed(0));
			var createdAt 	= Math.round(new Date().getTime()/1000);
			var finalCount	= '';
			//result false;
			
			var formData = new FormData(this);
			console.log(formData);
			//return false;

			$.ajax({
				type:'POST',
				url: "<?php echo $sideurl;?>/upload.php",
				data:formData,
				cache:false,
				contentType: false,
				processData: false,
				timeout: 3000000,
				success:function(data){
					var data = JSON.parse(data);
					//console.log("success");
					//console.log(data);
					//console.log(data.data1);
					//return false;

					/****** ADD Contents ******/
					var data1 		= data.data1;
					var data2 		= data.data2;
					var uid 		= localStorage.getItem('id');
					var collection 	= 'Contents';
					
					/****** Add a new document in collection "Contents" **********/

					finalCount = $(".video-section").length+1;
					console.log(finalCount);

					var seconds = '';
					if(typeof data.videoDuration != "undefined" && data.videoDuration != undefined && data.videoDuration != "null" && data.videoDuration != "") {
						var hms = data.videoDuration;   // your input string
						var a = hms.split(':'); // split it at the colons	
						// minutes are worth 60 seconds. Hours are worth 60 minutes.
						seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 
					} 
					

					console.log(seconds);

					db.collection(collection).add({
						assignToCompanies: {"iR0LKpZjWo7lLG8fo20j" : true},
						createdAt: createdAt,
						duration : seconds,
						fileUrl : data2,
						id : '',
						order : fnlorders,
						thumbUrl : data1,
						title: title,
						type : 1,
						updatedAt:createdAt
					})
					.then(function(docRef) {
						console.log("Document written with ID: ", docRef.id);      
						var parentDocId = docRef.id;

						//$('#doccId').val(parentDocId);
							/*********************** [ Add Id after insert data ] *************************/ 
							db.collection(collection).doc(parentDocId).set({
							  id: parentDocId
							}, { merge: true });

						})
						.catch(function(error) {
							console.error("Error adding document: ", error);
						});

						$("#loader").hide();
						$("#name").val('');
						$("#placehoder_video_name").val('');
						$(".file").val('');
						$(".fileimage").val('');
						swal("New content has been added to library")
							.then((value) => {
								location.reload();
							});
						$("#myModal").modal("hide");
		 
						//location.reload();

				},
				error: function(data){
					// ajax error function
					console.log("error");
					console.log(data);
				}
			});

	}
})

	function playVideo(userId)
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
			console.log(doc.data().fileUrl);
			//return false;
			$("#exampleModalLabel").html(name);	

			/*$('#mytest_'+UID+' source').each(function(num,val)
			{
			newLink = $(this).attr('src');
			})*/
			$("#playvideo source").attr('src', vUrl);
			$("#playvideo")[0].load();

			$("#myModalvideo").modal("show");
			$("#playvideo")[0].play();
		});


	}

	function EditContent(userId)
	{
		var newLink = '';
		var UID = userId;
		console.log(UID);
		var  status = 0;
		
		$("#hidden_ID").val(UID);
		$("#StatusImageHidden").val(status);
		$("#StatusVideoHidden").val(status);

		db.collection("Contents").doc(UID).get().then(function(doc) {
			console.log(doc.data());
			var name = doc.data().title;
			var videoLink = doc.data().fileUrl;
			var thumbUrl = doc.data().thumbUrl;
			
			console.log(name);
			$("#name_edit").val(name);
			$("#link_edit").val(videoLink);
			$("#Edit_Content").html(name);
			$("#blah_edit").attr('src', thumbUrl);
			$("#editModal").modal("show");
		});
	}

$(document).on('click', '.browsevideoEdit', function(){
	var file = $(this).parent().parent().parent().find('.file_video');
	file.trigger('click');
});

$(document).on('change', '.file_video', function(){
	console.log("Video----",$(this).val());
	$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});

$(document).on('click', '.browse_edit', function(){
	var file = $("#img_edit");
	file.trigger('click');
});

$(document).on('change', '.file_edit', function(){
	console.log($(this).val());
	$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});


$("#formEdit").submit(function (e){
	$("#loader").show();
	e.preventDefault();
	var imageSrc 	= 	'';
	var videoSrc	=	'';
	var seconds		=	'';
	var title 		= 	$("#name_edit").val();
	var U_ID 		=	$("#hidden_ID").val();
	var collection 	= 	'Contents';
	/*var startDate = parseInt((new Date($('#survey_st_time').val()).getTime() / 1000).toFixed(0));
	var endDate   = parseInt((new Date($('#survey_end_time').val()).getTime() / 1000).toFixed(0));*/
	var updatedAt = Math.round(new Date().getTime()/1000);
	//result false;
	
	var formData = new FormData(this);
	/*console.log(formData);
	console.log("U_ID------",U_ID);*/

	$.ajax({
		type:'POST',
		url: "<?php echo $sideurl;?>/Editupload.php",
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
				videoSrc  = $("#link_edit").val();				
			}else{
				console.log("Fill");
				videoSrc  = data.data2;
			}
			//console.log("videoSrc----------",videoSrc);

			if (data.videoDuration == null)
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
						updatedAt:updatedAt
					})
					.then(function() {
						$("#loader").hide();
						console.log("Document successfully updated!");
						swal(''+title+' has been updated to library')
							.then((value) => {
								location.reload();
							});
					});
				});

			}else{
				var hms = data.videoDuration;   // your input string
				var a = hms.split(':'); // split it at the colons

				// minutes are worth 60 seconds. Hours are worth 60 minutes.
				seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 

				db.collection(collection).doc(U_ID).update({				
					duration : seconds,
					fileUrl : videoSrc,				
					thumbUrl : imageSrc,
					title: title,
					updatedAt:updatedAt
				})
				.then(function() {
					$("#loader").hide();
					console.log("Document successfully updated!");
					swal(''+title+' has been updated to library')
						.then((value) => {
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

	$('#myModalvideo').modal({
		show: false
	}).on('hidden.bs.modal', function(){
		$("#playvideo")[0].pause();
	});
</script>
</body>
</html>
<?php
	
	include($basePath.'/footer.php');
?>


