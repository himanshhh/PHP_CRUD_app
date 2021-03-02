<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
$category_id = filter_input(INPUT_GET, 'category_id', 
FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
$category_id = 1;
}
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get dishes for selected category
$queryDishes = "SELECT * FROM dishes
WHERE categoryID = :category_id
ORDER BY dishID";
$statement3 = $db->prepare($queryDishes);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$dishes = $statement3->fetchAll();
$statement3->closeCursor();
?>
<div class="container">
<?php
include('includes/header.php');
?>
<h1>Dishes List</h1>

<aside>
<!-- display a list of categories -->
<h2>Categories</h2>
<nav>
<ul>
<?php foreach ($categories as $category) : ?>
<li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
<?php echo $category['categoryName']; ?>
</a>
</li>
<?php endforeach; ?>
</ul>
</nav>          
</aside>

<section>
<!-- display a table of dishes -->
<h2><?php echo $category_name; ?></h2>
<table>
<tr>
<th>Image</th>
<th>Name</th>
<th>Description</th>
<th>Price</th>
<th>Delete</th>
<th>Edit</th>
</tr>
<?php foreach ($dishes as $dish) : ?>
<tr>
<td><img src="image_uploads/<?php echo $dish['image']; ?>" width="100px" height="100px" /></td>
<td><?php echo $dish['name']; ?></td>
<td><?php echo $dish['description']; ?></td>
<td class="right"><?php echo $dish['price']; ?></td>
<td><form action="delete_dish.php" method="post"
id="delete_dish_form">
<input type="hidden" name="dishID"
value="<?php echo $dish['dishID']; ?>">
<input type="hidden" name="category_id"
value="<?php echo $dish['categoryID']; ?>">
<input type="submit" value="Delete">
</form></td>
<td><form action="edit_dish_form.php" method="post"
id="delete_dish_form">
<input type="hidden" name="dishID"
value="<?php echo $dish['dishID']; ?>">
<input type="hidden" name="category_id"
value="<?php echo $dish['categoryID']; ?>">
<input type="submit" value="Edit">
</form></td>
</tr>
<?php endforeach; ?>
</table>
<p><a href="add_dish_form.php">Add Dish</a></p>
<p><a href="category_list.php">Manage Categories</a></p>
</section>
<?php
include('includes/footer.php');
?>