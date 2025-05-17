<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $destination = $_POST['destination'];
    $booking_date = $_POST['date'];
    $num_people = $_POST['num_people'];

    $stmt = $pdo->prepare("INSERT INTO bookings (user_id, destination, booking_date, num_people) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $destination, $booking_date, $num_people]);

    echo "<p>Booking successful! Your reservation has been made.</p>";
}
?>

<section class="section__container booking__container">
    <div class="container-glass" style="max-width:400px;margin:auto;">
        <h2 class="section__header">Book Your Trip</h2>
        <form action="" method="POST">
        <div class="form-group">
            <label for="destination">Destination:</label>
            <select name="destination" id="destination" required>
                <option value="New York City, USA">New York City, USA</option>
                <option value="Paris, France">Paris, France</option>
                <option value="Bali, Indonesia">Bali, Indonesia</option>
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required>
        </div>
        <div class="form-group">
            <label for="num_people">Number of People:</label>
            <input type="number" name="num_people" id="num_people" min="1" required>
        </div>
        <button type="submit" class="btn">Confirm Booking</button>
    </form>
</section>

<?php include 'includes/footer.php'; ?>