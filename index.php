<?php
    // include_once 'includes/dbh.inc.php';
   
?>

<!DOCTYPE html>
<html>
<head>
    <!-- <script src="jquery-2.1.4.js"></script>
	<script src="requests.js"></script> -->
    <title>Log report</title>
</head>

<body>

    <div id="display-all">
    <p style="font-size: 20px;"><b>Recipes</b></p>
    <table id="log_reports" border="1" style="text-align: center">
        <thead>
        <tr>
            <th>Id</th>
            <th>Type</th>
            <th>Severity</th>
            <th>Date</th>
            <th>Message</th>
            <th>User</th>

        </tr>
        </thead>
    </table>
    </div>

    <div id="add-form">
		<p style="font-size: 20px;"><b>Add a log</b></p>
		<label for="add-type" id="add-type-label">Type</label><br>
		<input type="text" name="type" id="add-type"><br>
		<label for="add-severity" id="add-severity-label">Severity</label><br>
		<input type="text" name="severity" id="add-severity"><br>
		<label for="add-date" id="add-date-label">Date</label><br>
		<input type="text" name="type" id="add-date"><br>
		<label for="add-message" id="add-message-label">Message</label><br>
		<input type="text" name="type" id="add-message"><br>
		<input type="button" value="Add" id="add-button">
	</div>





</body>

</html>