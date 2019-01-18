<?php
	include('include/config.php');
	include('Sidebars/sidebar.php');
?>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" id="edit_name">Add Company</h4>
			</div>
			<div class="modal-body">
				<form class="add-content-form" id="formEdit" method="post" action=""> 
					<div class="form-group">
						<label>Company Name :</label>
						<input type="hidden" name="hidden_ID" id="hidden_ID">
						<div class="input-group-div"><input type="text" class="form-control name" name="name" id="name" value="" required="required" /></div>
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

<script src="include/js/jquery.js"></script>
<script src="include/js/bootstrap.min.js"></script>
<script>
var orders = 1;
$(document).ready(function ()
{

	$("#name").keypress(function ()
	{
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
	function getAllexercise()
	{
		$("#loader").show();
		var table = '';
		var myVid = [];
		db.collection("Companies").orderBy('name','asc').get().then(function(querySnapshot) {
			querySnapshot.forEach(function(doc) {
				
				orders = doc.data().order;
				console.log("orders--",orders)
				/*table = '<div class="accordionItem close comapnies" onclick="assignEvents(\''+doc.data().id+'\')"><h2 class="accordionItemHeading" id="company_'+doc.data().id+'">'+doc.data().name+'</h2></div>';*/

				table = '<div class="accordionItem close comapnies" ><div class="outerDiv" onclick="assignEvents(\''+doc.data().id+'\')"><h2 class="accordionItemHeading" id="company_'+doc.data().id+'">'+doc.data().name+'</h2></div><a href="javascript:void(0)" class="edit-dlt-icons" onclick="deleteUser(\''+doc.data().id+'\')"><img src="include/images/dlt.png"></a></div>';

				$('#Table_content').append(table);

				$("#loader").hide();
			});
		});
	}
	getAllexercise();
});


$(".submit").click(function(e){
	e.preventDefault();
	finalorder = orders + 1;
	var name 		=	$("#name").val();
	var finalCount	= 	'';
	

	if(name == '')
	{
		$("#loader").hide();
		swal("Please fill the all feilds");
	}else{

			var startDate 	= parseInt((new Date($('#survey_st_time').val()).getTime() / 1000).toFixed(0));
			var endDate  	= parseInt((new Date($('#survey_end_time').val()).getTime() / 1000).toFixed(0));
			var createdAt 	= Math.round(new Date().getTime()/1000);
			var collection	= 'Companies';


				finalCount = $(".comapnies").length+1;
				console.log(finalCount);

				db.collection(collection).add({
					createdAt: createdAt,
					id : '',
					order : finalorder,
					name: name,
					
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
				
				swal("New content has been added to library")
					.then((value) => {
						location.reload();
					});
				$("#myModal").modal("hide");
		}
});

function deleteUser(userId)
{
	var collection = 'Companies';
	console.log("userId------",userId);

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

function assignEvents(userId)
{
	console.log(userId);
	//return false;
	window.location.href = "<?php echo $sideurl;?>/companyUsers.php?id="+userId+"";
}

</script>
<?php
	include($basePath.'/footer.php');
?>
