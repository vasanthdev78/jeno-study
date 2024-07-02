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
    <div id="content" class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1>Main Content Area</h1>
                    <button class="btn btn-primary">Add New</button>
                </div>

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Developer</td>
                                <td>
                                    <button class="btn btn-sm btn-info">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>Designer</td>
                                <td>
                                    <button class="btn btn-sm btn-info">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
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
