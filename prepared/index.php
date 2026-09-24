<?php

require_once "koneksi.php";

$id = $_GET['id'] ?? '';

$result = null;
$error = null;

if ($id !== '') {

    $stmt = $pdo->prepare(
        "SELECT id, username, email FROM users WHERE id = ?"
    );

    try {
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $error = $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prepared Statement - Mini Riset SQL Injection</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
        }

        form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 18px;
            border: none;
            background-color: #333;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }

        .error {
            margin-top: 20px;
            padding: 12px;
            background-color: #ffe0e0;
            border: 1px solid #ff9999;
            color: #990000;
        }

        .info {
            margin-top: 20px;
            padding: 12px;
            background-color: #eeeeee;
            border-left: 4px solid #333;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Prepared Statement</h1>

    <p>
        Implementasi ini menggunakan Prepared Statement
        untuk mengambil data berdasarkan ID.
    </p>

    <form method="GET" action="">
        <input
            type="text"
            name="id"
            placeholder="Masukkan ID"
            value="<?= htmlspecialchars($id) ?>"
        >

        <button type="submit">Cari</button>
    </form>

    <?php if (isset($error)): ?>

        <div class="error">
            <?= htmlspecialchars($error) ?>
        </div>

    <?php endif; ?>

    <?php if ($result !== null && count($result) > 0): ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>

            <?php foreach ($result as $row): ?>

                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                </tr>

            <?php endforeach; ?>

            </tbody>
        </table>

    <?php elseif ($result !== null): ?>

        <div class="info">
            Data tidak ditemukan.
        </div>

    <?php endif; ?>

</div>

</body>
</html>