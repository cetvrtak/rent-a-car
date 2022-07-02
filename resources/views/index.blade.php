<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5&#9734; Rent-a-Car</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn--add-car:link,
        .btn--add-car:visited {
            display: inline-block;
            text-decoration: none;
            background-color: rgb(43, 43, 223);
            color: white;
            padding: 16px 32px;
            border-radius: 9px;
            transition: all 0.3s;
        }

        .btn--add-car:hover,
        .btn--add-car:active {
            background-color: blue;
        }
</style>
</head>
<body>
    <div class="container">
        <a href="/new" class="btn--add-car">Add Car</a>
    </div>
</body>
</html>