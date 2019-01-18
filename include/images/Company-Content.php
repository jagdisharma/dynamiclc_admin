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
	include('sideBarforCompany.php');
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
<script src="include/js/jquery.js"></script>
<script src="include/js/bootstrap.min.js"></script>
<script src="include/js/custom-file-input.js"></script>
<script type="text/javascript">
	var accItem = document.getElementsByClassName('accordionItem');
	var accHD = document.getElementsByClassName('accordionItemHeading');
	for (i = 0; i < accHD.length; i++)
	{
		accHD[i].addEventListener('click', toggleItem, false);
	}
	function toggleItem()
	{
		var itemClass = this.parentNode.className;
		for (i = 0; i < accItem.length; i++)
		{
			accItem[i].className = 'accordionItem close';
		}
		if (itemClass == 'accordionItem close')
		{
			this.parentNode.className = 'accordionItem open';
		}
	}

$(document).ready(function (){
	function getAllcontent()
	{
		console.log("DATA_IN");
		$("#loader").show();
		var table = '';
		var myVid = [];
		db.collection("Contents").orderBy('order','asc').get().then(function(querySnapshot) {
			querySnapshot.forEach(function(doc) {
				
				if(doc.data().type == 1)
				{		
					var curmin = "";
					var fileUrl = doc.data().fileUrl;
					//console.log(fileUrl)


					table = '<div class="content-list content-section "><div class="vidUrl"><video id="mytest_'+doc.data().id+'" width="320" height="240" controls><source src='+fileUrl+' type="video/mp4"></video></div><div class="video-section" onclick="playVideo(\''+doc.data().id+'\')"><img src='+doc.data().thumbUrl+'><img class="playIcon" src="include/images/play.png"></div><div class="video-detail"><h3>'+doc.data().title+'</h3><p id="mytime_'+doc.data().id+'"></p></div><div class="video-icons text-right"><label class="checkbox-container"><input type="checkbox"><span class="checkmark"></span></label></div></div></div><br>'; 

					/*table = '<div class="content-list"><div class="video-section"><img src="include/images/video1.png"><img class="playIcon" src="include/images/play.png"></div><div class="video-detail"><h3>Spa Relax (Armenian Duduk Flute Music)</h3><p>56.00</p></div><div class="video-icons text-right"><label class="checkbox-container"><input type="checkbox"><span class="checkmark"></span></label></div></div>';*/
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

	function playVideo(userId)
	{
		var newLink = '';
		var UID = userId;
		$("#hiddenId").val(UID);
		var idval = $('#mytest_'+UID);
		var name = '';

		db.collection("Contents").doc(UID).get().then(function(doc) {
			name = doc.data().title;	
			console.log(name);
			$("#exampleModalLabel").html(name);	

			$('#mytest_'+UID+' source').each(function(num,val)
			{
			newLink = $(this).attr('src');
			})
			$("#playvideo source").attr('src', newLink);
			$("#playvideo")[0].load();

			$("#myModalvideo").modal("show");
			$("#playvideo")[0].play();
		});


	}

$(".content-section").show();
</script>
</body>
</html>
<?php
	include('footer.php');
?>