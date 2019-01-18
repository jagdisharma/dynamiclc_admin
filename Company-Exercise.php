<?php
	$id = $_REQUEST['id'];
	include('include/config.php');
?>
<!Doctype html>
<html>
<head>
<title>Dynamic LC</title>
</head>
<body>
<?php
	include('Sidebars/sideBarforCompany.php');
?>
						
<body>

<div id="myModalAudio" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Audio</h5>
				<input type="hidden" name="hidden" id="hiddenId">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<audio controls id="playAudio" width: 100%;>
					<source src="" type="audio/mp3">
				</audio>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<script src="include/js/custom-file-input.js"></script>
<script type="text/javascript">

$(document).ready(function ()
{
	var companyID 	= "<?php echo $id;?>";
	var updatedAt  	= Math.round(new Date().getTime()/1000);

	function getAllcontent()
	{
		$("#loader").show();
		var table	=	'';
		var myVid	=	[];
		var dataVal	=	db.collection("Contents").orderBy('order','asc');
		var company_ID ="<?php echo $id;?>";
		//var dataVal	=	db.collection("Contents").where('type', '==', 1);

		dataVal.get().then(function(querySnapshot) {
			querySnapshot.forEach(function(doc) {
				//console.log(doc.data().id ,doc.data().order);
				if(doc.data().type == 0)
				{		
					//console.log("assignToCompanies ======>", doc.data().assignToCompanies);

					//var curmin = "";
					var fileUrl = doc.data().fileUrl;
					//console.log(fileUrl)
					var assignToCompanies = doc.data().assignToCompanies;
					//console.log("assignToCompanies----------",assignToCompanies);
					var checked = '';
					if(typeof assignToCompanies == "object" && company_ID in assignToCompanies) {
						if(assignToCompanies[company_ID] == true) {
							checked = 'checked="checked"';
						}
					}
					table = '<div class="content-list content-section "><div class="AudUrl"><audio id="mytest_'+doc.data().id+'" controls><source src='+fileUrl+' type="audio/mp3"></audio></div><div class="Audio-section" onclick="playAudio(\''+doc.data().id+'\')"><img src='+doc.data().thumbUrl+'><div class="overLayBack"><img class="playIcon" src="include/images/play.png"></div></div><div class="Audio-detail"><h3>'+doc.data().title+'</h3><p id="mytime_'+doc.data().id+'"></p></div><div class="video-icons text-right"><label class="checkbox-container"><input name="checkbox[]" '+ checked +' type="checkbox" class="checkbox" value='+doc.data().id+'><span class="checkmark"></span></label></div></div></div><br>';


					$('#Content_DATA').append(table);
					
					var myVid=document.getElementById('mytest_'+doc.data().id);

					//console.log(myVid);

					myVid.onloadedmetadata = function() {
						var minutes = parseInt(myVid.duration / 60, 10);
							minutes = minutes >= 10 ? minutes : '0' + minutes; 
						var seconds = parseInt(myVid.duration % 60);
							seconds = seconds >= 10 ? seconds : '0' + seconds; 
						//console.log(minutes+":"+seconds)
						$('#mytime_'+doc.data().id).append(minutes+":"+seconds);
					};	
					$("#loader").hide();				
				}			
				
			});
		});
	}
	getAllcontent();
});

$("#updateChk").click(function(e)
{
	$("#loader").show();
	var companyID 	= "<?php echo $id;?>";
	console.log(companyID);
	e.preventDefault();
	console.log("update");
	var val = [];
	var uncheckVal = [];

/*=========================================== CODE FOR Checked Checkboxes START ===========================================*/
		$(':checkbox:checked').each(function(i){
			val[i] = $(this).val();
		});
		//console.log(val);
			var assignToCompanies = {};

			$.each(val, function( i, l )
			{
				//console.log("Array VAl-----", l );
			
				db.collection("Contents").doc(l).get().then(function(doc) {
					if (doc.exists) {
						//console.log("doc_Ref data:", doc.data());
						var title 		= doc.data().title;
						var videoLink 	= doc.data().fileUrl;
						var imageLink 	= doc.data().thumbUrl;
						var Id 			= doc.data().id;
						var order 		= doc.data().order;
						var duration 	= doc.data().duration;
						var createdAt 	= doc.data().createdAt;
						var updatedAt 	= doc.data().updatedAt;

						//console.log(title,videoLink,imageLink,Id,order,duration,createdAt,updatedAt);
						var assignToCompanies = doc.data().assignToCompanies;
			
						//console.log(assignToCompanies);

						assignToCompanies[companyID] = true;

						//console.log(assignToCompanies);

						//return false;
						
						db.collection("Contents").doc(Id).set({
							assignToCompanies 	: assignToCompanies,
							title 				:title,
							fileUrl 			:videoLink,
							thumbUrl			:imageLink,
							id 					:Id,
							order 				:order,
							duration 			:duration,
							type 				:0,
							createdAt 			:createdAt,
							updatedAt 			:updatedAt,
						})
						.then(function(docRef) {
							// this code for add QRcode without refresh page 
							//console.log("Document QRcode");
							$("#loader").hide();
							swal('Document has been updated to library')
							.then((value) => {
								location.reload();
							});

						})
						.catch(function(error) {
							console.error("Error adding document: ", error);
						});
					} 
				}).catch(function(error) {
					console.log("Error getting document:", error);
				});
			});
/*=========================================== CODE FOR Checked Checkboxes END ===========================================*/



/*=========================================== CODE FOR UnChecked Checkboxes START ===========================================*/
		$("input:checkbox:not(:checked)").each(function(i){
			uncheckVal[i] = $(this).val();
		});
		//console.log("uncheckVal--------------",uncheckVal);

		$.each(uncheckVal, function( i, uncheckVal )
		{
				//console.log("Array VAl-----", uncheckVal );
			
				db.collection("Contents").doc(uncheckVal).get().then(function(doc) {
					if (doc.exists) {
						//console.log("doc_Ref data:", doc.data());
						var title 		= doc.data().title;
						var videoLink 	= doc.data().fileUrl;
						var imageLink 	= doc.data().thumbUrl;
						var Id 			= doc.data().id;
						var order 		= doc.data().order;
						var duration 	= doc.data().duration;
						var createdAt 	= doc.data().createdAt;
						var updatedAt 	= doc.data().updatedAt;

						//console.log(title,videoLink,imageLink,Id,order,duration,createdAt,updatedAt);
						var assignToCompanies = doc.data().assignToCompanies;
			
						//console.log(assignToCompanies);

						assignToCompanies[companyID] = false;

						//console.log(assignToCompanies);

						//return false;
						
						db.collection("Contents").doc(Id).set({
							assignToCompanies 	: assignToCompanies,
							title 				:title,
							fileUrl 			:videoLink,
							thumbUrl			:imageLink,
							id 					:Id,
							order 				:order,
							duration 			:duration,
							type 				:0,
							createdAt 			:createdAt,
							updatedAt 			:updatedAt,
						})
						.then(function(docRef) {
							// this code for add QRcode without refresh page 
							$("#loader").hide();
							swal('Document has been updated to library...!!')
							.then((value) => {

								location.reload();
							});
							console.log("Document unckeckboxes updated");

						})
						.catch(function(error) {
							console.error("Error adding document: ", error);
						});
					} 
				}).catch(function(error) {
					console.log("Error getting document:", error);
				});
/*=========================================== CODE FOR UnChecked Checkboxes START ===========================================*/
			});
	})


	function playAudio(userId)
	{
		var newLink = '';
		var UID = userId;
		console.log(UID);
		$("#hiddenId").val(UID);
		var idval = $('#mytest_'+UID)
		

		db.collection("Contents").doc(UID).get().then(function(doc) {
			name = doc.data().title;	
			console.log(name);
			$("#exampleModalLabel").html(name);	

			$('#mytest_'+UID+' source').each(function(num,val)
				{
					newLink = $(this).attr('src');
				})
			$("#playAudio source").attr('src', newLink);
			$("#playAudio")[0].load();
			$("#myModalAudio").modal("show");
			$("#playAudio")[0].play();
		});
	}

	$('#myModalAudio').modal({
		show: false
	}).on('hidden.bs.modal', function(){
		$("#playAudio")[0].pause();
	});


$(".content-section").show();
$("#addBtn").hide();

$(document).ready(function ()
{

	var path 	= location.pathname;
	var id		= "<?php echo $id;?>";
	var finalPath = path+'?id='+id;
	console.log(path+'?id='+id)
	// filter menu items to find one that has anchor tag with matching href:

	$('.tabDiv > div').filter(function()
	{
		return $('a', this).attr('href') === finalPath;
		console.log(path)
		// add class active to the item:
	}).addClass('active');

	db.collection("Companies").doc(id).get().then(function(doc) {
		
			console.log(doc.data().name);
			$('#CompanyTag').html(doc.data().name);
			$('#Companynamecrumb').html(doc.data().name);
	});
})

$(".dropdown-menu li a").click(function(){
	$(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
	$(this).parents(".dropdown").find('.btn').val($(this).data('value'));
});

$(document).ready(function (){
	var path 	= location.pathname;
	path += '?id='+"<?php echo $id;?>";
	//console.log("path------", path);
	// filter menu items to find one that has anchor tag with matching href:
	$('#dropdown li').filter(function()
	{	//console.log("$('a', this).attr('href')--------------", $('a', this).attr('href'));
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

</script>
</body>
</html>
<?php
	include($basePath.'/footer.php');
?>