<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Add Post</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
</head>
<body>
<?php require('adlogo.php'); ?>
<div id="wrapper">

	

	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation
		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}

		if($postDesc ==''){
			$error[] = 'Please enter the description.';
		}

		if($postCont ==''){
			$error[] = 'Please enter the content.';
		}

		if(!isset($error)){

			try {

				$postSlug = slug($postTitle);

				//insert into database
				$stmt = $db->prepare('INSERT INTO blog_posts_seo (postTitle,postSlug,postDesc,postCont,category, postDate, postimg) VALUES (:postTitle, :postSlug, :postDesc, :postCont,:category, :postDate, :postimg)') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postSlug' => $postSlug,
					':postDesc' => $postDesc,
					':postCont' => $postCont,
					':category' => $category,
					':postDate' => date('Y-m-d H:i:s'),
					':postimg' => $postimg
				));
				$postID = $db->lastInsertId();
				//redirect to index page
				header('Location: index.php?action=added');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>

	<form action='' method='post' name="form">
		<input type="button" name='upload' value='add image' class="btn btn-primary" onclick="addimg();">
		
		<span><input type="button" name='upload' value='add Paragraph' class="btn btn-primary" onclick="addvid();"></span>
		
		<span><input type="button"  name='upload' value='add audio' class="btn btn-primary" onclick="addaud();"></span>
		
		<p><label>Title</label><br />
		<input type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>

		<p><label>Description</label><br />
		<textarea name='postDesc' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postDesc'];}?></textarea></p>

		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea></p>
		
		<input type="button"  name='upload' value='add post image' class="btn btn-primary" onclick="addpimg();">
		<p><label>Post image</label><br />
		<input type='text' name='postimg' value='<?php if(isset($error)){ echo $_POST['postimg'];}?>'></p>

		<fieldset>
			<?php
			echo '<label for="category">CATEGORIES</label><br/>';
			try {

				$stmt = $db->query('SELECT catID, catTitle, catSlug FROM blog_cats ORDER BY catTitle DESC');
				while($row = $stmt->fetch()){
				
			echo '
             <input type="radio" name="category" value='.$row['catTitle'].'>'.$row['catTitle'].'<br/>';
         }
	     } catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>
		</fieldset>

		<p><input type='submit' name='submit' value='Submit' class="btn btn-primary "></p>

	</form>

</div>
<script type="text/javascript">
	function addimg(){
		document.form.postCont.value +="\x3Cimg src=\x22uploads/1.png\x22 \x3E";
		
	}
	function addpimg(){
		document.form.postimg.value +="\x3Cimg src=\x22uploads/1.png\x22 \x3E";
		
	}
	function addvid(){
		document.form.postCont.value +="\x3Cp\x3E \x3C/p\x3E";
		
	}
	function addaud(){
		document.form.postCont.value +="\x3Caudio controls\x3E \x3Csource src=\x22uploads/1.mp3\x22 type=\x22audio/mpeg\x22\x3E\x3C/audio\x3E";
		
	}
</script>