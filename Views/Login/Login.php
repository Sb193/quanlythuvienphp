<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>ĐĂng nhập</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="index.php?action=login" method="post">
        <label for="username">Tên đăng nhập:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Mật khẩu:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
