<?php
// Get the category data
$comment = $comment = filter_input(INPUT_POST, 'comment');
$name = $name = filter_input(INPUT_POST, 'name');

// Validate inputs
if ($comment == null || $name == null) {
    $error = "Invalid feedback data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database
    $query = "INSERT INTO feedback (username,comment)
              VALUES (:name,:comment)";
    $statement = $db->prepare($query);
    $statement->bindValue(':comment', $comment);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();

    // Display the Category List page
    include('feedback.php');
}
?>