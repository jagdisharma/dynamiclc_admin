<script type="text/javascript">
$(document).ready(function (){
	//console.log('footer called------>');
	var origin 	= location.origin;
	var path 	= location.pathname;
	
	var fullpath = origin+path;
	// filter menu items to find one that has anchor tag with matching href:
	$('#sidebar li').filter(function()
	{
		return  $('a', this).attr('href') === fullpath;
		// add class active to the item:
	}).addClass('active');

	$('.tabDiv').filter(function()
	{
		return  $('a', this).attr('href') === fullpath;
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
			    window.location.href="<?php echo $sideurl;?>";
			    //window.location="/VirtualStaging/";
			}).catch(function(error) {
				// An error happened.
				var errorCode = error.code;
				alert(error);
			});
			
		} else {
			
		}
	});
	return false;
    /*localStorage.setItem("uid","");
    // window.location="http://enacteservices.com/VirtualStaging/";
    firebase.auth().signOut().then(function() {
	    // Sign-out successful.
	    window.location.href="/DynamicLC";
	    //window.location="/VirtualStaging/";
	}).catch(function(error) {
		// An error happened.
		var errorCode = error.code;
		alert(error);
	});*/

} 

</script>