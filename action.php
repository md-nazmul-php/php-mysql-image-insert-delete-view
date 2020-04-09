<?php


// Database query below :

// CREATE TABLE bgimae(

// id int(11) not null PRIMARY key AUTO_INCREMENT,
// image varchar(255)    


// )



  // Create database connection using Procedural method where database name is 'global'
  $db = mysqli_connect("localhost", "root", "", "global");

  // Initialize message variable

  $msg = "";

  // If upload button request post ...

  if (isset($_POST['upload'])) {

		  	// Get image name
		  	$image = $_FILES['image']['name'];
		  	// Get text
		  	//$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

		  	// image file directory
		  	$target = "images/".basename($image);

		  	$sql = "INSERT INTO bgimae (image) VALUES ('$image')";
		  	// execute query
		  	mysqli_query($db, $sql);

		  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		  		$msg = "Image uploaded successfully";
		  	}else{
		  		$msg = "Failed to upload image";
		  	}

		  	// redirect to main page
		  header('location: index.php'); 
  }

  // Now if we will get delete request we are using Get method and query_string

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM bgimae WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.php');
}

    
?>