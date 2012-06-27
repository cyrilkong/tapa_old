<?php
	if($_GET['pwd'] != 'thisisfortapamarketingonly'){
		exit();
	}
?>
<html>
	<body>
		1) Previewer - Do it before you send
		<form action="massMailSenderPreview.php" method="post" enctype="multipart/form-data">
		<label for="file">Filename(.csv):</label>
			<input type="file" name="file" id="file" /> 
			<br />
			<input type="submit" name="submit" value="Submit" />
		</form>	
	
		2) Sender
		<form action="massMailSender.php" method="post" enctype="multipart/form-data">
		<label for="file">Filename(.csv):</label>
			<input type="file" name="file" id="file" /> 
			<br />
			<input type="submit" name="submit" value="Submit" />
		</form>
		<br>
		Preparing .csv file:<br>
		1) export data from <a href="https://docs.google.com/spreadsheet/ccc?key=0AopvXsJKVAZcdG5GQjFRM3JpYjFnSUxiTmFhT3R4Znc&hl=en_US#gid=0">Google Spread Sheet</a> - Download as -> CSV<br>
		2) wrap chinese words with double quote in the csv, example:
		<p><span style="color:blue">
		"星巴克","朱生",lawrence.csy@gmail.com 	
		</span></p>
		
		
	</body>
</html>