<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Edit User</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
</head>
<body>
<?php require('adlogo.php'); ?>
	<div id="wrapper" style="text">
		<?php 
		
		move_uploaded_file($_FILES['uploadFile']['tmp_name'],"../images/{$_FILES['uploadFile']['name']}");
		
		$file_name=$_FILES['uploadFile']['name'];
		$add="images/$file_name";
		echo "$add has been successfuly uploaded";
		 ?>
	 </div>
</body>
</html>