<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add University</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h3 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-center">Add University</h3>
        <form action="act_university.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="uni_id">University ID</label>
                <input type="hidden" class="form-control" id="uni_add" name="uni_add" value="uni_add" required>
                <input type="text" class="form-control" id="uni_id" name="uni_uni_id" required>
            </div>
            <div class="form-group">
                <label for="uni_name">University Name</label>
                <input type="text" class="form-control" id="uni_name" name="uni_name" required>
            </div>
            <div class="form-group">
                <label for="uni_description">Description</label>
                <textarea class="form-control" id="uni_description" name="uni_description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="uni_image">Upload Image</label>
                <input type="file" class="form-control-file" id="uni_image" name="uni_image" required>
            </div>
            <button type="submit" name="add_university" class="btn btn-primary btn-block">Add University</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 