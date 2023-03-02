<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Inganzo Media</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
	<?php require('logo.php'); ?>
	<div id="wrapper">

			<div id='sidesec'>
			<div id="vidtitle">
				<center>
				 <p> Video of the week</p>
				</center>
			</div>
			<div id="vidspace">
				<video controls> <source src="uploads/1.mp4" type="video/mp4"></video>
			</div>
			<div id="sidead"></div>
			<div id="sidead"></div>
		</div>
		
          
			<?php
				try {

					$pages = new Paginator('5','p');

					$stmt = $db->query('SELECT postID FROM blog_posts_seo');

					//pass number of records to
					$pages->set_total($stmt->rowCount());

					$stmt = $db->query('SELECT postID, postTitle, postSlug, postDesc,category, postDate, postimg FROM blog_posts_seo ORDER BY postID DESC '.$pages->get_limit());
					while($row = $stmt->fetch()){


							echo 
							'<div id="bullets">
							   <a href="'.$row['postSlug'].'"><div id="bulletsimg">'.$row['postimg'].'</div></a>
								<h3><a href="'.$row['postSlug'].'">'.$row['postTitle'].'</a></h3>
								<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).' in 
								<a href="c-'.$row['category'].'">'.$row['category'].'</a>
								</p>
								<p>'.$row['postDesc'].'</p>
								<p><a href="'.$row['postSlug'].'">Read More</a></p>
							 </div>
							';
							

								{
								    $links = "<a href='c-".$row['category']."'>".$row['category']."</a>";
								}
					
					}

					echo $pages->page_links();

				} catch(PDOException $e) {
				    echo $e->getMessage();
				}
			?>

		<div id='clear'></div>

	</div>

<?php require('footer.php'); ?>
</body>
</html>