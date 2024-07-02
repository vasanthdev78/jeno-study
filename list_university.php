<?php
session_start();
if (!isset($_SESSION['ur_id'])) {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-color: rgb(247, 233, 235);
        }

        .container-fluid {
            transition: margin-left 0.3s ease;
            /* Optional: smooth transition */
        }
        .container-fluid{
            
            margin-left: 280px; /* Adjust as per your sidebar width */
        }
        .container-active {
            margin-left: 200px;
        }
        
    </style>
</head>

<body>

    <?php include "top_bar.php"; ?>

    <div class="wrapper">
        <!-- Sidebar -->
        <?php include "side_bar.php"; ?>

      <!-- Page Content -->
      <div class="container-fluid" id="content">
        <div class="row">


                <div class="row">
                    <!-- Card 1 -->
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Image 1">
                            <div class="card-body">
                                <h5 class="card-title">Card 1</h5>
                                <p class="card-text">This is a description for card 1.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Image 2">
                            <div class="card-body">
                                <h5 class="card-title">Card 2</h5>
                                <p class="card-text">This is a description for card 2.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Image 3">
                            <div class="card-body">
                                <h5 class="card-title">Card 3</h5>
                                <p class="card-text">This is a description for card 3.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Image 4">
                            <div class="card-body">
                                <h5 class="card-title">Card 4</h5>
                                <p class="card-text">This is a description for card 4.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 5 -->
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Image 5">
                            <div class="card-body">
                                <h5 class="card-title">Card 5</h5>
                                <p class="card-text">This is a description for card 5.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>


    <script>
        const sidebar = document.querySelector('.sidebar');
        const toggleBtn = document.querySelector('.toggle-btn');
        const container = document.querySelector('#content');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            container.classList.toggle('container-active');
        });
    </script>

</body>

</html>
