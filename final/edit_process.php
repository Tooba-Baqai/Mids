<?php
include("./config.php");

if (isset($_POST['edit_data'])) {
    $id = intval($_POST['edit_id']);
    $name = $_POST['edit_name'];
    $Num = $_POST['edit_Num'];
    $material = $_POST['edit_material'];
    $address = $_POST['edit_address'];
    $type = $_POST['edit_type'];
    $email = $_POST['edit_email'];

    if ($stmt = $conn->prepare("UPDATE pottery SET name=?, Num=?, material=?, address=?, type=?, email=? WHERE id=?")) {
        $stmt->bind_param("ssssssi", $name, $Num, $material, $address, $type, $email, $id);
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
