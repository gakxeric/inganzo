<h1>Recent Posts</h1>
<hr />

<div>
<?php
$stmt = $db->query('SELECT postTitle, postSlug, postimg FROM blog_posts_seo ORDER BY postID DESC LIMIT 3');
while($row = $stmt->fetch()){

							echo '<div id="rbullets">
							   <a href="'.$row['postSlug'].'"><div id="rbulletsimg">'.$row['postimg'].'</div></a>
								<a href="'.$row['postSlug'].'">'.$row['postTitle'].'</a>
							 </div><hr>
							';
	
}
?>
</div>

<!-- <h1>Catgories</h1>
<hr />

<ul>
<li><a href="c-drama">drama</a></li>

</ul>

<h1>Archives</h1>
<hr />

<ul>
<?php
$stmt = $db->query("SELECT Month(postDate) as Month, Year(postDate) as Year FROM blog_posts_seo GROUP BY Month(postDate), Year(postDate) ORDER BY postDate DESC");
while($row = $stmt->fetch()){
	$monthName = date("F", mktime(0, 0, 0, $row['Month'], 10));
	$slug = 'a-'.$row['Month'].'-'.$row['Year'];
	echo "<li><a href='$slug'>$monthName</a></li>";
}
?>
</ul>
 -->