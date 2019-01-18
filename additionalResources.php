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
	include($basePath.'Sidebars/sidebar.php');
?>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Additional Resources</h4>
      </div>
      <div class="modal-body">
        <form class="add-content-form" action="" method="post" enctype="multipart/form-data" id="formAdd">
			<div class="form-group">
				<label>Title :</label>
				<div class="input-group-div"><input type="text" class="form-control name" name="name" id="name"  placeholder=""/></div>
			</div><!-- FOR GROUP -->
			<div class="form-group">
				<label>Choose File :</label>
				<div class="input-group-div">					
					<input name="pdf" class="file file_pdf" id="file_pdf" type="file" id="audio_edit_link">
					<div class="input-group col-xs-12">
					  <input class="form-control input-lg" disabled="" placeholder="Upload Pdf" id="link_pdf" value="" type="text">
					  <span class="input-group-btn">
						<button class="browsepdf btn btn-primary input-lg" type="button"> Browse</button>
					  </span>
					</div>
				</div>
			</div><!-- FOR GROUP -->
			<div class="modal-footer text-center">
				<!-- <button type="button" class="btn btn-default submit" id="submitBtn">Submit</button> -->
				<input type="submit" name="submitbtn" class="btn btn-default submit" value="Submit">
			</div>
		</form><!-- ADD CONTENT FORM -->
      </div>
      <!-- <div class="modal-footer text-center">
        <button type="button" class="btn btn-default submit">Submit</button>
      </div> -->
    </div>

  </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="edit_name">Add Additional Resources</h4>
      </div>
      <div class="modal-body">
        <form class="add-content-form" id="formEdit" method="post" action=""> 
			<div class="form-group">
				<label>Title :</label>
				<input type="hidden" name="hidden_ID" id="hidden_ID">
				<div class="input-group-div"><input type="text" class="form-control name" name="name" id="nameeditmodel" value=""/></div>
			</div><!-- FOR GROUP -->
			<div class="form-group">
				<label>Choose File :</label>
				<div class="input-group-div">					
					<input name="pdf" class="file filePdf" type="file" id="audio_edit_link">
					<div class="input-group col-xs-12">
					  <input class="form-control input-lg" disabled="" placeholder="upload Pdf" id="link_edit" value="" type="text">
					  <span class="input-group-btn">
						<button class="browsepdf btn btn-primary input-lg" type="button"> Browse</button>
					  </span>
					</div>
				</div>
			</div><!-- FOR GROUP -->
			<div class="modal-footer text-center">
				<!-- <button type="button" class="btn btn-default submit" id="submitBtn">Submit</button> -->
				<input type="submit" name="submitbtn" class="btn btn-default submit" value="Submit">
			</div>
		</form><!-- ADD CONTENT FORM -->
      </div>
      <!-- <div class="modal-footer text-center">
        <button type="button" class="btn btn-default submit">Submit</button>
      </div> -->
    </div>

  </div>
</div>
<!-- Modal -->

<div id="myModalPdf" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				<div id="pdffile_load">
					<iframe id="frame" src="" type="application/pdf"></iframe>
				</div>
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
<script src="include/js/jquery.js"></script>
<script src="include/js/bootstrap.min.js"></script>
<script src="include/js/custom-file-input.js"></script>
<script>
	var orders = '1';
$(document).on('click', '.browsepdf', function(){
  var file = $(this).parent().parent().parent().find('.file');
  file.trigger('click');
});


$(document).on('change', '#file_pdf', function(){
	console.log($(this).val());
  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));

	var valueData  = document.getElementById('file_pdf');

	var ext = valueData.files[0].name.split('.').pop().toLowerCase();

		if( ext == "PDF" || ext == "pdf")
		{

		} 
		else
		{
			$("#link_pdf").val("");			
			swal("Please Upload Pdf file only");
		}
});

$(document).ready(function () {
	$('body').on('keydown', '#name, #nameeditmodel', function(e) {
		////console.log(this.value);
		if (e.which === 32 &&  e.target.selectionStart === 0) 
		{
			return false;
		}
	});
});

$(document).on('change', '#audio_edit_link', function(){
	console.log($(this).val());
  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));

	var valueData  = document.getElementById('audio_edit_link');

	var ext = valueData.files[0].name.split('.').pop().toLowerCase();

		if( ext == "PDF" || ext == "pdf")
		{

		} 
		else
		{
			$("#link_edit").val("");	
			$("audio_edit_link").val();		
			swal("Please Upload Pdf file only");
		}
});


$(document).ready(function ()
{
	function getAllexercise()
	{
		$("#loader").show();
		var table = '';
		var myVid = [];
		db.collection("Contents").orderBy('order','asc').get().then(function(querySnapshot) {
			querySnapshot.forEach(function(doc) {
				
				if(doc.data().type == 2)
				{		
					var curmin = "";
					var fileUrl = doc.data().fileUrl;
					orders = doc.data().order;
					console.log(orders)
					if (doc.data().id != '')
					{
						table = '<div class="content-list resources"><div id="pdffile"><iframe id="frame_'+doc.data().id+'" src='+fileUrl+' type="application/pdf"></iframe></div><div class="resources-detail" data-name="'+doc.data().title+'" data-url="'+fileUrl+'" onclick="openPdf(this)"><h3 class="resources-hover">'+doc.data().title+'</h3></div><div class="resources-icons text-right"><a href="javascript:void(0)" data-toggle="modal" data-target="#editpdfModal" class="edit-dlt-icons" onclick="editResource(\''+doc.data().id+'\')"><img src="include/images/edit.png"></a><a href="javascript:void(0)" class="edit-dlt-icons" onclick="deleteResource(\''+doc.data().id+'\')"><img src="include/images/dlt.png"></a></div></div>';


						$('#Table_content').append(table);

						$("#loader").hide();
					}else{
						table = '<div class="notfound">No Data Found</div>';

						$('#Table_content').html(table);
						$("#loader").hide();	
					}
					 
									
				}/*else{
					table = '<div class="notfound">No Data Found</div>';

					$('#Table_content').html(table);
					$("#loader").hide();	
				}*/			
				
			});
		});
	}
	getAllexercise();
});

function openPdf(obj)
{
	//console.log(userId);
	//var newLink = '';
		//var UID = userId;
		//console.log(UID);
		//$("#hiddenId").val(UID);
		//var idval = $('#mytest_'+UID)
		var Url = obj.dataset.url;
		var Name_sample = obj.dataset.name;
		//console.log(Url);
		$("#exampleModalLabel").html(Name_sample);
		$('#frame').attr('src', Url);
		$("#myModalPdf").modal("show");
		return false;
		
/*
		db.collection("Contents").doc(UID).get().then(function(doc) {
			name = doc.data().title;	
			console.log(name);
			$("#exampleModalLabel").html(name);	

			$('#frame_'+UID+'').each(function(num,val)
				{
					newLink = $(this).attr('src');
				})
			//$("#pdffile").show();
			console.log(newLink);
			$('#frame').attr('src', newLink);
			$("#myModalPdf").modal("show");

		});*/

}

	function deleteResource(userId)
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
				
			} else {
				
			}
		});
	}

$("#formAdd").submit(function (e){
	console.log("orders--",orders);
	fnlorders = orders + 1;
	console.log("final----",fnlorders);
	$("#loader").show();
	e.preventDefault();

	var title 		= $("#name").val();
	var file 		= $("#file-7").val();

	if(title == '' || file == '' )
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

		$.ajax({
			type:'POST',
			url: "<?php echo $sideurl;?>/uploadPdf.php",
			data:formData,
			cache:false,
			contentType: false,
			processData: false,
			timeout: 3000000,
			success:function(data){
				//console.log(data);

				var data = JSON.parse(data);
				//console.log("success");
				
				/****** ADD Contents ******/
				var data1 		= data.data;
				//var data2 		= '';
				var uid 		= localStorage.getItem('id');
				var collection 	= 'Contents';
				
				/****** Add a new document in collection "Exercise" **********/

				finalCount = $(".resources-detail").length+1;
				console.log(finalCount);

				db.collection(collection).add({
					assignToCompanies: {"iR0LKpZjWo7lLG8fo20j" : true},
					createdAt: createdAt,
					duration : 0,
					fileUrl : data1,
					id : '',
					order : fnlorders,
					title: title,
					type : 2,
					updatedAt:createdAt
				})
				.then(function(docRef) {
					console.log("Document written with ID: ", docRef.id);      
					var parentDocId = docRef.id;

						db.collection(collection).doc(parentDocId).set({
						  id: parentDocId
						}, { merge: true });

					})
					.catch(function(error) {
						console.error("Error adding document: ", error);
					});

					$("#loader").hide();
					$("#name").val('');
					//$("#placehoder_video_name").val('');
					/*$(".file").val('');
					$(".fileimage").val('');*/
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

function editResource(userId)
{
	var newLink = '';
	var UID = userId;
	console.log(UID);
	
	$("#hidden_ID").val(UID);

	db.collection("Contents").doc(UID).get().then(function(doc) {
		console.log(doc.data());
		var name = doc.data().title;
		var videoLink = doc.data().fileUrl;
				
		console.log(name);
		$("#nameeditmodel").val(name);
		$("#link_edit").val(videoLink);
		$("#edit_name").html(name);
		
		$("#editModal").modal("show");
	});
}

$("#formEdit").submit(function (e){
	$("#loader").show();
	e.preventDefault();
	var pdfSrc 	= 	'';
	var title 		= 	$("#nameeditmodel").val();
	var U_ID 		=	$("#hidden_ID").val();
	var collection 	= 	'Contents';
	var  pdfFile = $("#link_edit").val();
	/*var startDate = parseInt((new Date($('#survey_st_time').val()).getTime() / 1000).toFixed(0));
	var endDate   = parseInt((new Date($('#survey_end_time').val()).getTime() / 1000).toFixed(0));*/
	var updatedAt = Math.round(new Date().getTime()/1000);
	//result false;
	
	if(title == '' || pdfFile == '' )
	{
		$("#loader").hide();
		console.log(101);
		swal("Please fill the all feilds");
	}else{
			var formData = new FormData(this);
			/*console.log(formData);
			console.log("U_ID------",U_ID);*/

			$.ajax({
				type:'POST',
				url: "<?php echo $sideurl;?>/uploadPdf.php",
				data:formData,
				cache:false,
				contentType: false,
				processData: false,
				timeout: 3000000,
				success:function(data){
					var data = JSON.parse(data);

					console.log(data);
					//console.log("imageSrc----------",imageSrc);

					if (data.data == ''){
						console.log("blank");
						pdfSrc  = $("#link_edit").val();
						
					}else{
						console.log("Fill");
						pdfSrc  = data.data;
					}
					//console.log("videoSrc----------",videoSrc);

					db.collection(collection).doc(U_ID).update({				
						duration : 0,
						fileUrl : pdfSrc,				
						
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

				},
				error: function(data){
					console.log("error");
					console.log(data);
				}
			});
	}



})
</script>
</body>
</html>
<?php
	
	include($basePath.'/footer.php');
?>











