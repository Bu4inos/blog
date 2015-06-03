<?php 

require_once 'menu.php';
?>
<html>
<head>
    <title>Post</title>
</head>
<body>
    <div id="menu">
    <?php
        $categorriesArray = getAllCategories();
        createMenu($categorriesArray);
    ?>
    </div>

     <?php


    $connection = new mysqli("localhost","root","","blog");
	if ($connection->connect_error) die($connection->connect_error);
	$query = "SELECT post.text AS text, post.title AS title, post.create_at AS create_at, users.name AS name FROM post JOIN users ON post.author_id=users.id WHERE post.id=$_GET[id]";
	//SELECT post.text AS text, post.title AS title, post.create_at AS create_at, users.name AS name FROM post JOIN users ON post.author_id=users.id WHERE post.id=2;  <-проверенно
	$result = $connection->query($query);
	if (!$result) die($connection->error);
	$rows = $result->num_rows;
		for ($j = 0 ; $j < $rows ; ++$j)
			{
				$result->data_seek($j);
				$row = $result->fetch_array(MYSQLI_ASSOC);
//				$post_id = $row['id'];
				$post_title = $row['title'];
				$post_text = $row['text'];
				$post_create = $row['create_at'];
				$post_author = $row['name'];
				echo "<div>";
				echo " <h2> $post_title </h2>" ;
				echo "<p>$post_text</p>";
				echo "Автор: $post_author , опубликовано: $post_create .";
				echo "</div>";
				echo "<br />";
				echo "<a href=index.php>На главную</a>";
			}
	?>
</body>
</html> 

