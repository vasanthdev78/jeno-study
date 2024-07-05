
<?php
       if(!isset($_SESSION['user']))
    {
        header("Location:index.php");
    }
?>
<head>
    <meta charset="utf-8" />
    <title>JENO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Datatables css -->
    <link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/sweetalert.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"> -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/boostrap452.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    



    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <style>
    .modal-lg-custom {
    max-width: 90%; /* Adjust the width as needed, e.g., 70%, 80%, 900px, etc. */
    }
    .content {
        background-color: #fcf5ff;
    }
    .addEnqury{
        background-color: #A912E4;
        color: white;
    }
    #addClientBtn:hover {
    background-color: #553263;
    color: white;
    }
   
    .color{
        
        font-size: 18px;
        font-weight: 500;
        font-family: 'Poppins', sans-serif;
    }
    .color:hover{
        color: #B863DA;
        font-size: 20px;
        font-family: 'Poppins', sans-serif;
    }
    .side-nav .menuitem-active>a {
    color: #B863DA ;
    font-weight: 500;
    }

    .back{
        background-color: #F3E4F9 ;
    }
    .side-nav-link {
      display: flex;
      align-items: center;
    }
    .side-nav-link i {
      margin-right: 10px;
    }
    
</style>
</head>