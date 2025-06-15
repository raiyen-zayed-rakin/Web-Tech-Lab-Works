<?php
session_start();
require "../model/db.php";

// Check if admin is logged in using admin_id
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = createCon();
    
    // Create operation
    if (isset($_POST['create'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO admins (username, password_hash) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password_hash);
        $result = mysqli_stmt_execute($stmt);
        
        if ($result) {
            $_SESSION['message'] = "Admin created successfully";
        } else {
            $_SESSION['error'] = "Error creating admin: " . mysqli_error($conn);
        }
    }
    
    // Update operation
    if (isset($_POST['update'])) {
        $admin_id = $_POST['admin_id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if (!empty($password)) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE admins SET username = ?, password_hash = ? WHERE admin_id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssi", $username, $password_hash, $admin_id);
        } else {
            $sql = "UPDATE admins SET username = ? WHERE admin_id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "si", $username, $admin_id);
        }
        
        $result = mysqli_stmt_execute($stmt);
        
        if ($result) {
            $_SESSION['message'] = "Admin updated successfully";
        } else {
            $_SESSION['error'] = "Error updating admin: " . mysqli_error($conn);
        }
    }
    
    // Delete operation
    if (isset($_POST['delete'])) {
        $admin_id = $_POST['admin_id'];
        
        $sql = "DELETE FROM admins WHERE admin_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $admin_id);
        $result = mysqli_stmt_execute($stmt);
        
        if ($result) {
            $_SESSION['message'] = "Admin deleted successfully";
        } else {
            $_SESSION['error'] = "Error deleting admin: " . mysqli_error($conn);
        }
    }
    
    closeCon($conn);
    header("Location: admin_panel.php");
    exit();
}

// Read operation - get all admins
$conn = createCon();
$current_admin_id = $_SESSION['admin_id'];
$sql = "SELECT * FROM admins WHERE admin_id != $current_admin_id ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
$admins = mysqli_fetch_all($result, MYSQLI_ASSOC);
closeCon($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/admin_panel.css">
</head>
<body>
    <div class="admin-container">
        <h1>Admin Panel</h1>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="message"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        
        <div class="admin-actions">
            <h2>Add New Admin</h2>
            <form method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="create">Create Admin</button>
            </form>
        </div>
        
        <div class="admin-list">
            <h2>Admin List</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admins as $admin): ?>
                    <tr>
                        <td><?php echo $admin['admin_id']; ?></td>
                        <td><?php echo htmlspecialchars($admin['username']); ?></td>
                        <td><?php echo $admin['created_at']; ?></td>
                        <td>
                            <form method="post" class="inline-form">
                                <input type="hidden" name="admin_id" value="<?php echo $admin['admin_id']; ?>">
                                <input type="text" name="username" value="<?php echo htmlspecialchars($admin['username']); ?>" required>
                                <input type="password" name="password" placeholder="New password (leave blank to keep current)">
                                <button type="submit" name="update">Update</button>
                                <button type="submit" name="delete" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="logout">
            <a href="admin_logout.php">Logout</a>
        </div>
    </div>
</body>
</html>