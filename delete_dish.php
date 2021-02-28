<?php
require_once('database.php');

// Get IDs
$dishID = filter_input(INPUT_POST, 'dishID', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($dishID != false && $category_id != false) {
    $query = "DELETE FROM dishes
              WHERE dishID = :dishID";
    $statement = $db->prepare($query);
    $statement->bindValue(':dishID', $dishID);
    $statement->execute();
    $statement->closeCursor();
}

// display the Product List page
include('index.php');
?>