<?php
include("./config.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['deletedata'])) {
    $id = intval($_POST['delete_id']);

    $sql = "DELETE FROM pottery WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            header('Location: ./order.php?status=success'); // Changed from index.php to order.php
            exit;
        } else {
            header('Location: ./order.php?status=failure'); // Changed from index.php to order.php
            exit;
        }
        $stmt->close();
    } else {
        die('Query preparation failed: ' . $conn->error);
    }
} else {
    die("Access denied...");
}
?>
