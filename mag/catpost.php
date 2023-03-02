<?php require('includes/config.php'); 
$stmt = $db->prepare('SELECT category FROM blog_posts_seo WHERE category= :category');
$stmt->execute(array(':category' => $_GET['id']));
$row = $stmt->fetch();
//if post does not exists redirect user.

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - <?php echo $row['category'];?></title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
<?php require('logo.php'); ?>
	<div id="wrapper">

		<div id='main'>

			<?php	
			try {

				$pages = new Paginator('3','p');

				$stmt = $db->prepare('SELECT * FROM blog_posts_seo WHERE category= :category');
				$stmt->execute(array(':category' => $row['category']));

				//pass number of records to
				$pages->set_total($stmt->rowCount());

				$stmt = $db->prepare('
					SELECT 
						blog_posts_seo.postID, blog_posts_seo.postTitle, blog_posts_seo.postSlug, blog_posts_seo.postDesc,blog_posts_seo.category, blog_posts_seo.postDate 
					FROM 
						blog_posts_seo
					WHERE
						category= :category
					ORDER BY 
						postID DESC
					'.$pages->get_limit());
				$stmt->execute(array(':category' => $row['category']));
				while($row = $stmt->fetch()){
					
					echo '<div>';
						echo '<h1><a href="'.$row['postSlug'].'">'.$row['postTitle'].'</a></h1>';
						echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).' in ';

							{
								    $links = "<a href='c-".$row['category']."'>".$row['category']."</a>";
								}
								echo $links;

						echo '</p>';
						echo '<p>'.$row['postDesc'].'</p>';				
						echo '<p><a href="'.$row['postSlug'].'">Read More</a></p>';				
					echo '</div>';

				}

				echo $pages->page_links('c-'.$_GET['id'].'&');

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

			?>

		</div>

		

		<div id='clear'></div>

	</div>

<?php require('footer.php'); ?>
</body>
</html>