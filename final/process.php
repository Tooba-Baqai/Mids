<?php
include("./config.php");

if (isset($_POST['process'])) {
    $name = $_POST['name'];
    $Num = $_POST['Num'];
    $material = $_POST['material'];
    $address = $_POST['address'];
    $type = $_POST['type'];
    $email = $_POST['email'];

    if ($stmt = $conn->prepare("INSERT INTO pottery (name, Num, material, address, type, email) VALUES (?, ?, ?, ?, ?, ?)")) {
        $stmt->bind_param("ssssss", $name, $Num, $material, $address, $type, $email);
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
