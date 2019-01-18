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
		var company_ID ="<?php echo $id;?>";

		db.collection("Groups").orderBy('createdAt','asc').get().then(function(querySnapshot) {
			querySnapshot.forEach(function(doc) {
						
					var assignToCompanies = doc.data().assignToCompanies;
					
					var checked = '';
					if(typeof assignToCompanies == "object" && company_ID in assignToCompanies) {
						if(assignToCompanies[company_ID] == true) {
							checked = 'checked="checked"';
						}
					}
					table = '<div class="content-list content-section "><div class="Audio-detail"><h3 style="text-transform: uppercase;">'+doc.data().name+'</h3><p id="mytime_'+doc.data().id+'"></p></div><div class="video-icons text-right"><label class="checkbox-container"><input name="group" '+ checked +' type="checkbox" class="checkbox"  value='+doc.data().id+'><span class="checkmark"></span></label></div></div></div><br>';

					$('#Content_DATA').append(table);
						
					$("#loader").hide();						
			});
		});
	}
	getAllcontent();
});

// $("#updateChk").click(function(e)
// {
// 	$("#loader").show();
// 	var companyID 	= "<?php echo $id;?>";
// 	console.log(companyID);
// 	e.preventDefault();
// 	var assignGroups ={};

// 	$("input:checkbox[name=group]:checked").each(function(){
//     	assignGroups[$(this).val()]= true;
// 	});

// 	db.collection("Groups").doc(companyID).update({			
// 		assignGroups : assignGroups
// 	})
// 	.then(function() {
// 		$("#loader").hide();
// 		swal('Groups has been updated to library')
// 			.then((value) => {
// 				location.reload();
// 			});
// 	});
// });

/*-----------------------------------------------------------------------------------------------------------------------------*/
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
				db.collection("Groups").doc(l).get().then(function(doc) {
					if (doc.exists) {
						var name 		= doc.data().name;
						var availability= doc.data().availability;
						var image 		= doc.data().image;
						var Id 			= doc.data().id;
						var createdAt 	= doc.data().createdAt;
						var updatedAt 	= doc.data().updatedAt;
						var assignToCompanies = doc.data().assignToCompanies;

						assignToCompanies[companyID] = true;
						
						db.collection("Groups").doc(Id).set({
							assignToCompanies 	: assignToCompanies,
							availability		:availability,
							name 				:name,
							image 				:image,
							id 					:Id,
							createdAt 			:createdAt,
							updatedAt 			:updatedAt,
						})
						.then(function(docRef) {
							//$("#loader").hide();
							// swal('Document has been updated to library...!!')
							// .then((value) => {
							// 	location.reload();
							// });
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
				db.collection("Groups").doc(uncheckVal).get().then(function(doc) {
					if (doc.exists) {
						//console.log("doc_Ref data:", doc.data());
						var name 		= doc.data().name;
						var availability= doc.data().availability;
						var image 		= doc.data().image;
						var Id 			= doc.data().id;
						var createdAt 	= doc.data().createdAt;
						var updatedAt 	= doc.data().updatedAt;

						//console.log(title,videoLink,imageLink,Id,order,duration,createdAt,updatedAt);
						var assignToCompanies = doc.data().assignToCompanies;
						assignToCompanies[companyID] = false;
						
						db.collection("Groups").doc(Id).set({
							assignToCompanies 	:assignToCompanies,
							availability		:availability,
							name 				:name,
							image 				:image,
							id 					:Id,
							createdAt 			:createdAt,
							updatedAt 			:updatedAt,
						})
						.then(function(docRef) {
							// this code for add QRcode without refresh page 
							
							swal('Document has been updated to library...!!')
							.then((value) => {
								location.reload();
							});
							$("#loader").hide();
							//console.log("Document unckeckboxes updated");

						})
						.catch(function(error) {
							console.error("Error adding document: ", error);
						});
					} 
				}).catch(function(error) {
					console.log("Error getting document:", error);
				});
/*=========================================== CODE FOR UnChecked Checkboxes END ===========================================*/
			});
				// swal('Document has been updated to library.')
				// .then((value) => {
				// 	location.reload();
				// });
	})


/*-----------------------------------------------------------------------------------------------------------------------------*/

// $(document).ready(function (){
// 	var companyID 	= "<?php echo $id;?>";
// 	db.collection("Companies").doc(companyID).get().then(function(doc) {
// 		name = doc.data().name;
// 		assignGroups = doc.data().assignGroups;
// 		console.log("Name------>",name);
// 		console.log("assignGroups------>",assignGroups);
// 		console.log('assignGroups.length--------------->',Object.keys(assignGroups).length);
// 		if(Object.keys(assignGroups).length){
// 			for(var group in assignGroups){
// 				$("input:checkbox[value="+group+"]").prop('checked', true);		
// 			}	
// 		}
// 	});
// });


$(".content-section").show();
$("#addBtn").hide();

$(document).ready(function ()
{

	var path 	= location.pathname;
	var id		= "<?php echo $id;?>";
	var finalPath = path+'?id='+id;
	//console.log(path+'?id='+id)
	// filter menu items to find one that has anchor tag with matching href:

	$('.tabDiv > div').filter(function()
	{
		return $('a', this).attr('href') === finalPath;
		//console.log(path)
		// add class active to the item:
	}).addClass('active');

	db.collection("Companies").doc(id).get().then(function(doc) {
		
			//console.log(doc.data().name);
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
	//console.log('origin------>',origin);
	//console.log('path------>',path);
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
</body>
</html>
<?php
	include($basePath.'/footer.php');
?>