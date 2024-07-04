<?php require_once '_config.php'; ?>
<?php require_once 'lib/db.php'; ?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!-- Any errors -->




<!--  -->
<?php

$priorityFilter = $_GET['priority'] ?? 'all';
consoleLog($priorityFilter, 'Priority filter');

// See if we have a filter set
$sortFilter = $_GET['sort'] ?? 'desc';
consoleLog($sortFilter, 'Sort filter');

$query = 'SELECT * FROM subjects ';

// Add in any filtering
if ($priorityFilter !== 'all') {
    $query .= 'WHERE priority = ? ';
    $data = [$priorityFilter];
}
else {
    // No filter, just get anything
    $data = [];
}

if($sortFilter == 'asc') {
    $query .= 'ORDER BY priority ASC';
}
else {
    $query .= 'ORDER BY priority DESC';
}

// Connect to db
$db = connectToDB();

// Elegant way of deflecting errors into the console
try {
$stmt = $db->prepare($query);
$stmt -> execute($data);
$tasks = $stmt->fetchALL();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error when getting data from the database');
}

consoleLog($tasks);

echo '<ul>';
foreach($tasks as $task) {
    echo '<li>' . $task['priority'] . ' ' . $task['title'] .': ' . $task['description'] . '</li>';  
}
echo '</ul>';