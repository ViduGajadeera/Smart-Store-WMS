<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two Divs Side by Side - Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .log-form{
        margin: 150px;
        margin-left: 250px;
        width: 500px;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        border-radius: 5px;
        background-color: #f9f9f9;
        font-family: Arial, sans-serif;
        font-size: 16px;
        color: #333;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        height:100%;
    }
    h1{
        text-align: center;
    }
    h5{
        text-align:center;
    }
    body{
       // background-color:#040e52;
    }
    div{
        border: 2px solid;
    }
    .login-img{
            margin-left:75%;
          padding-top: 20px;
            width:100px;
    }
 
</style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 left" style="height:300px;">
        
        
        <div class="log-form">

<form>

  
    <h1>Welcome Back Again</h1>
    <h5>Please Enter Your Credentials</h5>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-5">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="d-grid gap-2">
  <button class="btn btn-primary" type="submit">Log In</button>
  
</div>
  
</form>


</div>


        </div>
        <div class="col-md-6 right">
            <h2>Right Side</h2>
            <p>Content for the right side.</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
