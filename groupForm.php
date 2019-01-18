<?php
	include('include/configGroupForm.php');
?>

<div class="form-group">
	<label>Available On :</label>
    <div class='input-group date' id='datetimepicker1'>
        <input type='text' class="form-control" />
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>
<script>
$(function () {
    $('#datetimepicker1').datetimepicker();
});
</script>