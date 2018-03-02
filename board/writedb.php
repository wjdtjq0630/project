	<?php 
 		include 'config.php';
 		
 		$date = $_POST['date'];
 		$title = mysqli_real_escape_string($conn, $_POST['title']);
 		$content = mysqli_real_escape_string($conn, $_POST['content']);
        $writer = $_POST['writer'];
 		$sql = "INSERT INTO writing_board (title, content, writer, date) VALUES ('$title', '$content', '$writer', '$date')";
    	mysqli_query($conn, $sql);
    	
    	$sql = "SELECT MAX(id) from writing_board";
    	$id = mysqli_query($conn, $sql);

    	$row = mysqli_fetch_array($id);
    	$id = $row['MAX(id)'];
    	mysqli_close($conn);

    	$new_URL = "./content.php?id=$id";
    	header('Location: '.$new_URL);
 	 ?>