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

<script src="include/js/custom-file-input.js"></script>
<script>

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
						//var imageLink 	= doc.data().thumbUrl;
						var Id 			= doc.data().id;
						var order 		= doc.data().order;
						var duration 	= doc.data().duration;
						var createdAt 	= doc.data().createdAt;
						var updatedAt 	= doc.data().updatedAt;

						
						var assignToCompanies = doc.data().assignToCompanies;
			
						//console.log(assignToCompanies);

						assignToCompanies[companyID] = true;

						//console.log(assignToCompanies);

						//return false;
						
						db.collection("Contents").doc(Id).set({
							assignToCompanies 	: assignToCompanies,
							title 				:title,
							fileUrl 			:videoLink,
							//thumbUrl			:imageLink,
							id 					:Id,
							order 				:order,
							duration 			:duration,
							type 				:2,
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
						//var imageLink 	= doc.data().thumbUrl;
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
							//thumbUrl			:imageLink,
							id 					:Id,
							order 				:order,
							duration 			:duration,
							type 				:2,
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

$(document).ready(function ()
{
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
				if(doc.data().type == 2)
				{		
					//console.log("assignToCompanies ======>", doc.data().id);

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
					table = '<div class="content-list resources"><div id="pdffile"><iframe id="frame_'+doc.data().id+'" src='+fileUrl+' type="application/pdf"></iframe></div><div class="resources-detail" onclick="openPdf(\''+doc.data().id+'\')"><h3 class="resources-hover">'+doc.data().title+'</h3></div><div class="video-icons text-right"><label class="checkbox-container"><input name="checkbox[]" '+ checked +' type="checkbox" class="checkbox" value='+doc.data().id+'><span class="checkmark"></span></label></div></div>';


					$('#Content_DATA').append(table);
					
					$("#loader").hide();				
				}			
				
			});
		});
	}
	getAllcontent();
});

function openPdf(userId)
{
	//console.log(userId);
	var newLink = '';
		var UID = userId;
		console.log(UID);
		$("#hiddenId").val(UID);
		var idval = $('#mytest_'+UID)
		

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

		});

}
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
	
	var origin 	= location.origin;
	var pathname 	= location.pathname;
	console.log('origin------>',origin);
	console.log('path------>',path);
	var path = origin+pathname
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
<?php include($basePath.'/footer.php'); ?>