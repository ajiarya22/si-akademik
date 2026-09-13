<!-- app/Views/login.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Praktikum Acara 6</title>
</head>
<body>
    <h2>Form Login</h2> <!-- Fitur Login si-akademik -->

    <!-- Tampilkan Flash Message jika ada -->
    <?php if (isset($_SESSION['flash'])): ?>
        <p style="color: blue;"><?= $_SESSION['flash']; ?></p>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <!-- Tampilkan Error Message jika login gagal -->
    <?php if (isset($_SESSION['error'])): ?>
        <p style="color: red;"><?= $_SESSION['error']; ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form action="/acara-6/public/login" method="POST">
        <div>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required>
        </div>
        <br>
        <div>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required>
        </div>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>