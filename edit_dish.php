<?php

// Get the dish data
$dishID = filter_input(INPUT_POST, 'dishID', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$description = filter_input(INPUT_POST, 'description');


// Validate inputs
if ($dishID == NULL || $dishID == FALSE || $category_id == NULL ||
$category_id == FALSE || empty($name) ||
$price == NULL || $description == NULL || $price == FALSE) {
$error = "Invalid dish data. Check all fields and try again.";
include('error.php');
} else {

/**************************** Image upload ****************************/

$imgFile = $_FILES['image']['name'];
$tmp_dir = $_FILES['image']['tmp_name'];
$imgSize = $_FILES['image']['size'];
$original_image = filter_input(INPUT_POST, 'original_image');

if ($imgFile) {
$upload_dir = 'image_uploads/'; // upload directory	
$imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$image = rand(1000, 1000000) . "." . $imgExt;
if (in_array($imgExt, $valid_extensions)) {
if ($imgSize < 5000000) {
if (filter_input(INPUT_POST, 'original_image') !== "") {
unlink($upload_dir . $original_image);                    
}
move_uploaded_file($tmp_dir, $upload_dir . $image);
} else {
$errMSG = "Sorry, your file is too large it should be less then 5MB";
}
} else {
$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}
} else {
// if no image selected the old image remain as it is.
$image = $original_image; // old image from database
}

/************************** End Image upload **************************/

// If valid, update the dish in the database
require_once('database.php');

$query = 'UPDATE dishes
SET categoryID = :category_id,
name = :name,
description = :description,
price = :price,
image = :image
WHERE dishID = :dishID';
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->bindValue(':name', $name);
$statement->bindValue(':description', $description);
$statement->bindValue(':price', $price);
$statement->bindValue(':image', $image);
$statement->bindValue(':dishID', $dishID);
$statement->execute();
$statement->closeCursor();

// Display the Product List page
include('index.php');
}
?>