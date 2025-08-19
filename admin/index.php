<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
    $uname=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':uname', $uname, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        $_SESSION['alogin']=$_POST['username'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else{
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>CWMS | Admin Sign in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@500;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 4 -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #007bff 0%, #00c6ff 100%);
            font-family: 'Barlow', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .glass-card {
            background: rgba(255,255,255,0.15);
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.37);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.18);
            padding: 2.5rem 2rem;
            max-width: 370px;
            width: 100%;
            margin: 2rem auto;
        }
        .glass-card h2 {
            font-weight: 700;
            color: #fff;
            margin-bottom: 2rem;
            letter-spacing: 1px;
        }
        .glass-card .form-group label {
            color: #fff;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        .glass-card .form-control {
            background: rgba(255,255,255,0.25);
            border: none;
            border-radius: 8px;
            color: #333;
            font-size: 1rem;
            margin-bottom: 1rem;
        }
        .glass-card .form-control:focus {
            background: rgba(255,255,255,0.35);
            box-shadow: none;
            outline: none;
        }
        .glass-card .btn-custom {
            background: #fff;
            color: #007bff;
            font-weight: 700;
            border-radius: 8px;
            padding: 0.6rem 2rem;
            font-size: 1.1rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: background 0.2s, color 0.2s;
        }
        .glass-card .btn-custom:hover {
            background: #007bff;
            color: #fff;
        }
        .glass-card .back-link {
            color: #fff;
            opacity: 0.85;
            font-size: 1rem;
            margin-top: 1.5rem;
            display: inline-block;
            transition: color 0.2s;
        }
        .glass-card .back-link:hover {
            color: #fff;
            text-decoration: underline;
            opacity: 1;
        }
        .glass-card .fa-user-lock {
            font-size: 2.5rem;
            color: #fff;
            margin-bottom: 1.5rem;
            opacity: 0.85;
        }
        @media (max-width: 480px) {
            .glass-card { padding: 1.5rem 0.5rem; }
        }
    </style>
</head>
<body>
    <div class="glass-card text-center">
        <span class="fa fa-user-lock"></span>
        <h2>Admin Login</h2>
        <form method="post" autocomplete="off">
            <div class="form-group text-left">
                <label for="username"><i class="fa fa-user"></i> Username</label>
                <input type="text" name="username" id="username" class="form-control" required placeholder="Enter username">
            </div>
            <div class="form-group text-left">
                <label for="password"><i class="fa fa-lock"></i> Password</label>
                <input type="password" name="password" id="password" class="form-control" required placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-custom btn-block" name="login">Sign In</button>
        </form>
        <a href="../index.php" class="back-link"><i class="fa fa-arrow-left"></i> Back to home</a>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>