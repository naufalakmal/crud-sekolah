<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(90deg, #272727 50%, #ff5472 50%);
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            box-shadow: 0 0 6px 2px rgba(0, 0, 0, .2);
            border-radius: 10px;
            transform: translateY(70%);
            padding: 15px;
        }

        .btn {
            width: 250px;
            background-color: #ff5472;
            border: none;
        }

        .btn:hover {
            background-color: #272727;
        }

        .log {
            font-size: 30px;
            color: #ff5472;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <form action="login.php" method="post" class="form-horizontal">
        <div class="container">
            <div class="card">
                <div class="form-group">
                    <div class="col-sm-10">
                        <label class="log">Login</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
                
            </div>
        </div>
    </form>
</body>

</html>
