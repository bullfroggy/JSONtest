<html>
	<head><link rel="stylesheet" type="text/css" href="testStyle.css"></head>
	<body>
		<center>
			</br>
				<h3>Json String:</h3>
				<form action='' id='inputform' method='POST'>
					<textarea id='textfield' name='json-string' form='inputform'>{"fieldname1":{"type":"text","label":"field 1 display name"},"fieldname2":{"type":"select","label":"field 2 display name","items":["item1","item2"]},"fieldname3":{"type":"text","label":"field 3 display name"}}</textarea>
					</br><input id='submitting' name='submitter' type='submit' value='Submit'>
				</form>
				
				<h3>Output:</h3>
				<hr>
				
			</center>
			<?php include 'jsonTest.php'; ?>
			</br>
	</body>
</html>