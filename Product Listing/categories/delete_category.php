<?php
// Include functions
include('../includes/functions.php');

// Check if an ID is provided
$category = isset($_GET['id']) ?  deleteCategory($_GET['id']) : exit();



