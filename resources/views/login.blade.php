<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #bbbba9;
            margin: 0;
            padding: 0;
        }
        .log-form {
            margin: 100px auto;
            padding: 30px;
            border: 1px solid #ccc;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #ffffff;
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333;
            transition: all 0.3s ease-in-out;
            width: 100%;
            max-width: 400px; 
            opacity: 0.95;
        }
        h1, h5 {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-container {
            display: flex;
            height: 100vh;
            align-items: center; 
        }
        .login-img {
            background-image: url('{{ asset('images/login-img.png') }}');
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat;
            height: 100%; 
            width: 100%;
            max-width: 600px; 
            flex-shrink: 0;
        }
    </style>
</head>
<body>


<div class="container-fluid login-container">
    <div class="row flex-grow-1">
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="log-form">
                <form>
                    <h1>Smart-Store WMS</h1>
                    <h5>Use Your Credentials to Log In</h5>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="d-grid gap-2">
                       <button class="btn btn-primary" type="submit">Log In</button>
                       
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center">
           
            <div class="login-img"></div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
