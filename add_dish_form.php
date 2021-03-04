<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC&display=swap" rel="stylesheet">

<script src="validation.js"></script>

<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Add Dish</h1>
        <form action="add_dish.php" method="post" enctype="multipart/form-data"
              id="add_dish_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>*Name:</label>
            <input type="input" name="name" id="name" onBlur="dish_validation();" placeholder="Enter Dish name here" required/>
            <span id="name_err"></span>
            <br>

            <label>Description:</label>
            <textarea name="description" rows="4"> </textarea>
            <br>
            <br>

            <label>*List Price:</label>
            <input type="input" name="price" id="price" onBlur="price_validation();" placeholder="Enter Dish price here" required pattern="^(?:[3-9]|[1-4][0-9])$">
            <span id="price_err"></span>
            <br>        
            
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Dish">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>