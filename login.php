<?php
session_start();
$admin_user = "admin";
$admin_pass = "12345"; // Ganti password sesuai keinginan

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user == $admin_user && $pass == $admin_pass) {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background: #f1f1f1; }
        .box { background: white; padding: 20px; margin: 50px auto; width: 300px; border-radius: 10px; }
        input, button { padding: 10px; width: 90%; margin-top: 10px; }
    </style>
</head>
<body>
<div class="box">
    <h2>Login Admin</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="login">Login</button>
    </form>
</div>
</body>
</html>