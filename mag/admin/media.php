<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Add Category</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
</head>
<body>
<?php require('adlogo.php'); ?>
		<div id="wrapper">
			 <form method="post" enctype="multipart/form-data" action="upload.php" id="form">
			    <input style="background-color:grey;" type="file" name="uploadFile" id="image" ><br/>
			    <span><input type="submit" class="btn btn-primary" value="Upload" name="upload"></span>
			     
			  </form>

		</div>
</body>
</html>