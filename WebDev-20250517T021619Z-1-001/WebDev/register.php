<?php
include 'includes/db.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if ($password === $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);

            if ($stmt->execute()) {
                echo "<p>Registration successful! You can now <a href='login.php'>log in</a>.</p>";
            } else {
                echo "<p>Something went wrong. Please try again later.</p>";
            }
        }
    } else {
        echo "<p>Passwords do not match.</p>";
    }
}
?>

<section class="section__container">
    <div class="container-glass" style="max-width:400px;margin:auto;">
        <h2 class="section__header">Register</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit" class="btn">Register</button>
    </form>
</section>

<?php include 'includes/footer.php'; ?>