<?php

require_once "koneksi.php";

$username = $_GET['username'] ?? '';
$users = [];

if ($username !== '') {
    $stmt = $pdo->prepare(
        "SELECT id, username, email FROM users WHERE username = ?"
    );

    $stmt->execute([$username]);

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prepared Statement</title>
</head>
<body>

    <h1>Pencarian User - Prepared Statement</h1>

    <form method="GET">
        <label for="username">Username:</label>
        <input
            type="text"
            name="username"
            id="username"
            value="<?= htmlspecialchars($username) ?>"
        >

        <button type="submit">Cari</button>
    </form>

    <hr>

    <?php if ($username !== ''): ?>

        <?php if (count($users) > 0): ?>

            <h2>Hasil Pencarian</h2>

            <table border="1" cellpadding="8">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>

                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                    </tr>
                <?php endforeach; ?>

            </table>

        <?php else: ?>

            <p>User tidak ditemukan.</p>

        <?php endif; ?>

    <?php endif; ?>

</body>
</html>