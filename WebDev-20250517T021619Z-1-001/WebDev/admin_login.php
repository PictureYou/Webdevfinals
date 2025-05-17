<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Login | Skywings</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <section class="section__container">
    <div class="container-glass" style="max-width:400px;margin:auto;">
        <h2 class="section__header">Admin Login</h2>
        <form action="admin_login.php" method="POST" class="login-form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include 'includes/db.php';

            $username = $_POST['username'];
            $password = $_POST['password'];

            echo password_hash('password123', PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = :username");
            $stmt->execute(['username' => $username]);
            $admin = $stmt->fetch();

            if ($admin && password_verify($password, $admin['password'])) {
                session_start();
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $admin['id'];
                header("Location: admin_dashboard.php");
                exit();
            } else {
                echo "<p class='error'>Invalid username or password.</p>";
            }
        }
        ?>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>
</html>