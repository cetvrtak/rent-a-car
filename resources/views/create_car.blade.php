<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <style>
        form {
            width: 200px;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="/insert" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

            <input type="text" placeholder="License" name="registration_license">
            <input type="text" placeholder="Brand" name="brand">
            <input type="text" placeholder="Model" name="model">
            <input type="text" placeholder="Manufacture Date" name="manufacture_date">
            <input type="text" placeholder="Description" name="description">
            <input type="text" placeholder="Category ID" name="category_id">
            <button type="submit" value="Add Car">Submit</button>
        </form>
    </div>
</body>
</html>