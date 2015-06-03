<?php 

require_once 'menu.php';
?>
<html>
<head>
    <title>Category</title>
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
	$query = "SELECT id, title, description, create_at FROM post WHERE categoty_id=$_GET[id]";
	$result = $connection->query($query);
	if (!$result) die($connection->error);
	$rows = $result->num_rows;
		for ($j = 0 ; $j < $rows ; ++$j)
			{
				$result->data_seek($j);
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$post_id = $row['id'];
				$post_title = $row['title'];
				//$post_text = $row['text'];
				$post_create = $row['create_at'];
				$post_description = $row['description'];
				//$post_author = $row['name'];
				echo "<div>";
				echo " <h2> <a href='post.php?id=$post_id'>$post_title</a> </h2>" ;  
				//echo " <h2> $post_title </h2>" ;
				echo "<p>$post_description</p>";
				echo "Опубликовано: $post_create .";
				echo "</div>";
				echo "<br />";
				echo "<a href=index.php>На главную</a>";
			}
	?>
</body>
</html> 
