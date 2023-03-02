<?php require('includes/config.php'); 
$stmt = $db->prepare('SELECT postID, postTitle, postCont,category, postDate FROM blog_posts_seo WHERE postSlug = :postSlug');
$stmt->execute(array(':postSlug' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['postID'] == ''){
	header('Location: ./');
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - <?php echo $row['postTitle'];?></title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
	<?php require('logo.php'); ?>
	<div id="wrapper">
			<?php
				
					
					echo '<div id="main">';
					echo '<h1>'.$row['postTitle'].'</h1>';
					echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).' in ';

						{
								    $links = "<a href='c-".$row['category']."'>".$row['category']."</a>";
								}
								echo  $links;


					echo '</p>';
					echo '<p>'.$row['postCont'].'</p>';
					echo '</div>';
							

				
			?>
		<div id="recent">
			<?php require('sidebar.php'); ?>
		</div>
		<div id='clear'></div>

	</div>

<?php require('footer.php'); ?>
</body>
</html>