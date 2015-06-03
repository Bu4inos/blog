<?php 

require_once 'menu.php';
?>
<html>
<head>
    <title>Blog</title>
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
	$query = "SELECT id, title, description FROM post ORDER BY create_at DESC LIMIT 5";
	$result = $connection->query($query);
	if (!$result) die($connection->error);
	$rows = $result->num_rows;
		for ($j = 0 ; $j < $rows ; ++$j)
			{
				$result->data_seek($j);
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$post_id = $row['id'];
				$post_title = $row['title'];
				$post_description = $row['description'];
				echo "<div>";
				echo " <h2> <a href='post.php?id=$post_id'>$post_title</a> </h2>" ;
				echo "<p>$post_description</p>";
				echo "</div>";
				echo "<br />";
			}
	?>
</body>
</html> 