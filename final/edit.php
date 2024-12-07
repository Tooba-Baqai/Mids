<?php 
include("./config.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = mysqli_query($conn, "SELECT * FROM pottery WHERE id = $id");
    $data = mysqli_fetch_assoc($query);
    if (!$data) {
        die("Record not found.");
    }
} else {
    die("No ID provided.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pottery Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h3>Edit Pottery Order</h3>
        <form action="edit_process.php" method="POST">
            <input type="hidden" name="edit_id" value="<?php echo $data['id']; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="edit_name" class="form-control" value="<?php echo $data['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Num" class="form-label">Phone Number</label>
                <input type="text" name="edit_Num" class="form-control" value="<?php echo $data['Num']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select" name="edit_type" required>
                    <option value="vase" <?php echo $data['type'] == 'vase' ? 'selected' : ''; ?>>Vase</option>
                    <option value="ptry" <?php echo $data['type'] == 'ptry' ? 'selected' : ''; ?>>Pottery</option>
                    <option value="clay plate" <?php echo $data['type'] == 'clay plate' ? 'selected' : ''; ?>>Clay Plate</option>
                    <option value="clay matka" <?php echo $data['type'] == 'clay matka' ? 'selected' : ''; ?>>Clay Matka</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Material</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="edit_material" value="clay" <?php echo $data['material'] == 'clay' ? 'checked' : ''; ?> required>
                    <label class="form-check-label">Clay</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="edit_material" value="ceramic" <?php echo $data['material'] == 'ceramic' ? 'checked' : ''; ?> required>
                    <label class="form-check-label">Ceramic</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="edit_address" class="form-control" value="<?php echo $data['address']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="edit_email" class="form-control" value="<?php echo $data['email']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="edit_data">Update Order</button>
            <a href="order.php" class="btn btn-secondary">Cancel</a> <!-- Changed from index.php to order.php -->
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
</body>

</html>
