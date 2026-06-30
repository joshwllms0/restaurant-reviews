<!DOCTYPE html>
<html>
<head>
    <title>Restaurant App</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<div class="page-wrapper">
    
<h1>Restaurant Review System</h1>

<?php
if (isset($_SESSION['message'])) {
    echo "<div style='padding: 10px
    background: #d4edda;
    color: #155724;
    margin-bottom: 15px;
    border-radius: 5px;'>";

    echo $_SESSION['message'];

    echo "</div>";

    unset ($_SESSION['message']);
}
?>