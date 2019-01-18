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

<!-- JQUERY FILES -->

<script src="include/js/custom-file-input.js"></script>
<script type="text/javascript">

$(document).ready(function ()
{
	var companyID 	= "<?php echo $id;?>";
	var updatedAt  	= Math.round(new Date().getTime()/1000);
	//console.log("company------",companyID);
/*	$(document).on('change','.checkbox',function(){
		console.log("checkbox");
		//var val = [];
		$(':checkbox:checked').each(function(i){
			//val[i] = $(this).val();
			val = $(this).val();
		});
		//console.log(val);

		var assignToCompanies = {};
		assignToCompanies["hhdsusad723762367gahg"] = true;

		//console.log(assignToCompanies);
		//return false;

		db.collection("Contents").doc(val).get().then(function(doc) {
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
	
				//var randomStringCustomValue = randomStringCustom();

				assignToCompanies[vals] = true;

				console.log(assignToCompanies);
				//return false;	

				db.collection("Contents").doc(Id).set({
					assignToCompanies 	: assignToCompanies,
					title 				:title,
					fileUrl 			:videoLink,
					thumbUrl			:imageLink,
					id 					:Id,
					order 				:order,
					duration 			:duration,
					type 				:1,
					createdAt 			:createdAt,
					updatedAt 			:updatedAt,
				})
				.then(function(docRef) {
					// this code for add QRcode without refresh page 
					console.log("Document QRcode");

				})
				.catch(function(error) {
					console.error("Error adding document: ", error);
				});
			} 
		}).catch(function(error) {
			console.log("Error getting document:", error);
		});

	})*/


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
				if(doc.data().type == 1)
				{		
					//console.log("assignToCompanies ======>", doc.data().assignToCompanies);

					//var curmin = "";
					var fileUrl = doc.data().fileUrl;
					//console.log(fileUrl)

					var assignToCompanies = doc.data().assignToCompanies;
					var checked = '';
					if(typeof assignToCompanies == "object" && company_ID in assignToCompanies) {
						if(assignToCompanies[company_ID] == true) {
							checked = 'checked="checked"';
						}
					}
					/*table = '<div class="content-list content-section "><div class="vidUrl"><video id="mytest_'+doc.data().id+'" width="320" height="240" controls><source src='+fileUrl+' type="video/mp4"></video></div><div class="video-section" onclick="playVideo(\''+doc.data().id+'\')"><img src='+doc.data().thumbUrl+'><img class="playIcon" src="include/images/play.png"></div><div class="video-detail"><h3>'+doc.data().title+'</h3><p id="mytime_'+doc.data().id+'"></p></div><div class="video-icons text-right"><label class="checkbox-container"><input name="checkbox[]" '+ checked +' type="checkbox" class="checkbox" value='+doc.data().id+'><span class="checkmark"></span></label></div></div></div><br>';*/ 


					var sf = sformat(doc.data().duration); 

					console.log(sf);

					table = '<div class="content-list content-section "><div class="video-section" onclick="playVideo(\''+doc.data().id+'\')"><img src='+doc.data().thumbUrl+'><div class="overLayBack"><img class="playIcon" src="include/images/play.png"></div></div><div class="video-detail"><h3>'+doc.data().title+'</h3><p id="mytime_'+doc.data().id+'">'+sf+'</p></div><div class="video-icons text-right"><label class="checkbox-container"><input name="checkbox[]" '+ checked +' type="checkbox" class="checkbox" value='+doc.data().id+'><span class="checkmark"></span></label></div></div></div><br>';

					$('#Content_DATA').append(table);
					
					/*var myVid=document.getElementById('mytest_'+doc.data().id);

					//console.log(myVid);

					myVid.onloadedmetadata = function() {
						var minutes = parseInt(myVid.duration / 60, 10);
							minutes = minutes >= 10 ? minutes : '0' + minutes; 
						var seconds = parseInt(myVid.duration % 60);
							seconds = seconds >= 10 ? seconds : '0' + seconds; 
						//console.log(minutes+":"+seconds)
						$('#mytime_'+doc.data().id).append(minutes+":"+seconds);
					};	*/
					$("#loader").hide();				
				}			
				
			});
		});
	}
	getAllcontent();
});

function sformat( s ) {
	var fm = [
				//Math.floor(Math.floor(Math.floor(s/60)/60)/24)%24,//DAYS
				//Math.floor(Math.floor(s/60)/60)%60,//HOURS
				Math.floor(s/60)%60,//MINUTES
				s%60//SECONDS
			];
	return $.map(fm,function(v,i) { return ( (v < 10) ? '0' : '' ) + v; }).join( ':' );
}

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
							type 				:1,
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
							type 				:1,
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


$('.checkmark').on('click',function() {

    console.log("A123");
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

	$('#myModalvideo').modal({
		show: false
	}).on('hidden.bs.modal', function(){
		$("#playvideo")[0].pause();
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
		return '/' + $('a', this).attr('href') === finalPath;
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
	{	console.log("$('a', this).attr('href')--------------", $('a', this).attr('href'));
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