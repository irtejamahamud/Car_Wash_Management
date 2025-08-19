<?php
session_start();
include_once('includes/config.php');
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$email = 'Not Provided';
$p_no = 'Not Provided';

if ($username) {
    $sql = "SELECT * FROM users WHERE username = :username";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_OBJ);
    if ($user) {
        $email = $user->email;
        $p_no = $user->p_no;
    }
}

// Connect header (use include_once for consistency)
include_once('includes/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <!-- Bootstrap 4 CSS (codebase style) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .profile-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            padding: 2rem 2.5rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        .profile-card h4 {
            font-weight: 700;
            color: #00062cff;
        }
        .profile-card .table th {
            width: 40%;
            background: #f8f9fa;
        }
        .profile-avatar {
            font-size: 5rem;
            color: #ff7b7bff;
        }
        @media (max-width: 768px) {
            .profile-card { padding: 1rem; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="profile-card shadow">
                    <div class="text-center mb-4">
                        <span class="profile-avatar"><i class="fas fa-user-circle"></i></span>
                    </div>
                    <h4 class="mb-4 text-center"><i class="fas fa-user"></i> Profile Information</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Username</th>
                            <td><?php echo htmlspecialchars($username); ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo htmlspecialchars($email); ?></td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td><?php echo htmlspecialchars($p_no); ?></td>
                        </tr>
                    </table>
                    <div class="text-center mt-3">
                        <a href="edit_profile.php" class="btn btn-custom btn-primary"><i class="fas fa-edit"></i> Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (codebase style) -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
