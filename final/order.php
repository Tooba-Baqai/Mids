<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Learning Basic CRUD with PHP and MySQL">
    <title>Pottery Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="require.css">
    <link rel="stylesheet" href="main.css">
</head>

<style>
    header {
        text-align: center;
        background-color: #533b37;
        padding: 50px 20px;
        color: white;
        border-bottom: 5px solid #533b37;
    }

    .order-container {
        margin-top: 100px; /* Adds space between the header and the order container */
        padding: 20px; /* Optional: Adds some padding inside the order container */
    }

    /* Increase padding for input fields */
    .form-control {
        padding: 12px 15px; /* Adjust the padding values as needed */
        font-size: 16px; /* Increase font size for the input fields */
    }

    /* Increase padding for select fields */
    .form-select {
        padding: 12px 15px; /* Add padding to the select field */
        font-size: 16px; /* Increase font size for the select field */
    }
    html, body {
    height: 100%;
    overflow-y: auto; /* Ensure vertical scrolling is allowed */
}

    /* Placeholder text styling */
    .form-control::placeholder {
        font-size: 16px; /* Increase placeholder text size */
        color: #888; /* Optional: Change placeholder text color */
    }
</style>

<header class="header" data-header>
    <div class="container">
        <a href="./index.html" class="logo">
            <img src="./images/logo-SyedIsmail.png" width="190" height="28" alt="home">
        </a>
        <nav class="navbar" data-navbar>
            <ul class="navbar-list">
                <li class="navbar-item"><a href="./index.html" class="label-lg navbar-link has-after">Home</a></li>
                <li class="navbar-item"><a href="./h.html" class="label-lg navbar-link has-after">About Us</a></li>
                <li class="navbar-item"><a href="./s.html" class="label-lg navbar-link has-after">Services</a></li>
               <li class="navbar-item"><a href="./gallery.html" class="label-lg navbar-link has-after">Gallery</a></li>
               <li class="navbar-item"><a href="./order.php" class="label-lg navbar-link has-after active">Place Order</a></li>
               <li class="navbar-item"><a href="./contact.html" class="label-lg navbar-link has-after">Contact</a></li>
            </ul>
        </nav>
        <div style="display: flex; align-items: center;">
            <a href="./order.php" class="btn btn-primary" style="background-color: #593E31; color:white; padding:10px 20px;">Order Now</a>
            <button class="nav-open-btn nav-toggle-btn" aria-label="menu" data-nav-toggler>
                <i class="fa-solid fa-bars" id="menuIcon"></i>
            </button>
        </div>
    </div>
</header>

<div class="container order-container"> <!-- Separate container for the order section -->
    <div class="card mb-5">
        <div class="card-body">
            <h3 class="card-title">Add Pottery Order</h3>

            <?php if (isset($_GET['status'])) : ?>
                <div class='alert alert-<?php echo $_GET['status'] == 'success' ? 'success' : 'danger'; ?> alert-dismissible fade show' role='alert'>
                    <strong><?php echo $_GET['status'] == 'success' ? 'Success!' : 'Oops!'; ?></strong> Data has been <?php echo $_GET['status'] == 'success' ? 'successfully' : 'failed to'; ?> added!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            <?php endif; ?>

            <form class="row g-3" action="process.php" method="POST">
                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                </div>
                <div class="col-md-4">
                    <label for="Num" class="form-label">Phone Number</label>
                    <input type="text" name="Num" class="form-control" placeholder="Enter your phone number" required>
                </div>
                <div class="col-md-4">
                    <label for="type" class="form-label">Select Type</label>
                    <select class="form-select" name="type" required>
                        <option value="vase">Vase</option>
                        <option value="ptry">Pottery</option>
                        <option value="clay plate">Clay Plate</option>
                        <option value="clay matka">Clay Matka</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Select Material</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="material" value="clay" required>
                        <label class="form-check-label">Clay</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="material" value="ceramic" required>
                        <label class="form-check-label">Ceramic</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter your address" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="process"><i class="fa fa-plus"></i><span class="ms-2">Place Order</span></button>
                </div>
            </form>
        </div>
    </div>

    <h5 class="mb-3">Order List</h5>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Type</th>
                <th scope="col">Material</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col" style="width: 15%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM pottery");

            if ($query && mysqli_num_rows($query) > 0) {
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                    echo "<tr>
                            <th scope='row'>{$no}</th>
                            <td>{$data['name']}</td>
                            <td>{$data['Num']}</td>
                            <td>{$data['type']}</td>
                            <td>{$data['material']}</td>
                            <td>{$data['address']}</td>
                            <td>{$data['email']}</td>
                            <td>
                                <a href='edit.php?id={$data['id']}' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>
                                <form action='delete.php' method='POST' style='display:inline;'>
                                    <input type='hidden' name='delete_id' value='{$data['id']}'>
                                    <button type='submit' name='deletedata' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this data?');\"><i class='fa fa-trash'></i></button>
                                </form>
                            </td>
                          </tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<footer class="footer">
        <div class="container">

            <ul class="social-list">
                <li>
                    <a href="https://www.facebook.com/" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="https://www.twitter.com/" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="https://www.instagram.com/" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="https://www.linkedin.com/" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="https://www.pineterest.com/" class="social-link">
                        <ion-icon name="logo-pinterest"></ion-icon>
                    </a>
                </li>
                
            </ul>
            <p id="author" class="text-center">Created by Tooba Baqai and Faareha Raza</p>
            

        </div>
    </footer>

    <script src="script.js"></script>
   
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
