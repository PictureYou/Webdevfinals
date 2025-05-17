<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $pdo->prepare("DELETE FROM bookings WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: admin_dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $id = intval($_POST['edit_id']);
    $destination = $_POST['destination'];
    $booking_date = $_POST['booking_date'];
    $num_people = intval($_POST['num_people']);
    $stmt = $pdo->prepare("UPDATE bookings SET destination=?, booking_date=?, num_people=? WHERE id=?");
    $stmt->execute([$destination, $booking_date, $num_people, $id]);
    header("Location: admin_dashboard.php");
    exit();
}

$stmt = $pdo->query("SELECT bookings.*, users.username FROM bookings JOIN users ON bookings.user_id = users.id ORDER BY bookings.id DESC");
$bookings = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>

<div class="container-glass">
    <h2 class="section__header">Admin Dashboard</h2>
    <h3>All Bookings</h3>
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Destination</th>
                <th>Date</th>
                <th>People</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?php echo $booking['id']; ?></td>
                <td><?php echo htmlspecialchars($booking['username']); ?></td>
                <td><?php echo htmlspecialchars($booking['destination']); ?></td>
                <td><?php echo htmlspecialchars($booking['booking_date']); ?></td>
                <td><?php echo htmlspecialchars($booking['num_people']); ?></td>
                <td>
                    <button onclick="showEditForm(<?php echo $booking['id']; ?>, '<?php echo htmlspecialchars($booking['destination'], ENT_QUOTES); ?>', '<?php echo $booking['booking_date']; ?>', <?php echo $booking['num_people']; ?>)">Edit</button>
                    <a href="?delete=<?php echo $booking['id']; ?>" onclick="return confirm('Delete this booking?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div id="editModal" class="modal-glass" style="display:none;">
        <form method="POST" class="container-glass" style="max-width:400px;">
            <input type="hidden" name="edit_id" id="edit_id">
            <label>Destination:</label>
            <input type="text" name="destination" id="edit_destination" required>
            <label>Date:</label>
            <input type="date" name="booking_date" id="edit_date" required>
            <label>People:</label>
            <input type="number" name="num_people" id="edit_people" min="1" required>
            <div style="margin-top:1rem;">
                <button type="submit" class="btn">Save</button>
                <button type="button" class="btn" onclick="closeEditForm()">Cancel</button>
            </div>
        </form>
    </div>
</div>
<script>
function showEditForm(id, destination, date, people) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_destination').value = destination;
    document.getElementById('edit_date').value = date;
    document.getElementById('edit_people').value = people;
    document.getElementById('editModal').style.display = 'block';
}
function closeEditForm() {
    document.getElementById('editModal').style.display = 'none';
}
</script>
<?php include 'includes/footer.php'; ?>