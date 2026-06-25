<?php include __DIR__ . '/../layouts/header.php'; ?>


<h1>Add Restaurant</h1>

<form method="POST" action="index.php?action=store">

    <label>Name</label><br>
    <input type="text" name="name" required><br><br>

    <label>Address</label><br>
    <input type="text" name="address" required><br><br>

    <label>Cuisine Type</label><br>
    <input type="text" name="cuisine_type" required><br><br>

    <button type="submit">Save</button>

</form>

<?php include __DIR__ . '/../layouts/footer.php'; ?>