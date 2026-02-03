<?php
// Connect to server and select database.
include("config.php");

$datetime = date("Y-m-d H:i:s");

if (!isset($_POST['name'], $_POST['email'], $_POST['comment'])) {
	echo "Missing required fields.";
	exit;
}

$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];

// Prepare and execute statement to avoid SQL injection
$stmt = mysqli_prepare($objCon, "INSERT INTO guestbook (name, email, comment, datetime) VALUES (?, ?, ?, ?)");
if (!$stmt) {
	echo "Prepare failed: " . mysqli_error($objCon);
	exit;
}

mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $comment, $datetime);
$ok = mysqli_stmt_execute($stmt);

if ($ok) {
	echo "Successful" . "<br>";
	echo "<a href='viewguestbook.php'>View guestbook</a>";
} else {
	echo "ERROR: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
?>