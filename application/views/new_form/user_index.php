<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
</head>
<body>
    <h2>All Users</h2>
    <ul>
    <?php foreach ($users as $user): ?>
        <li>
            <?php echo $user['name']; ?> - <?php echo $user['email']; ?>
        </li>
    <?php endforeach; ?>
    </ul>
</body>
</html>
