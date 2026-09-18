<?php
require_once '../conf/db.php';

$sql = 'SELECT users.first_name , workouts.* , muscle_groups.name AS group_name FROM workouts 
        INNER JOIN users ON users.id = workouts.id_coach
        INNER JOIN muscle_groups ON  muscle_groups.id_group = workouts.id_group
        ORDER BY workouts.created_at DESC';

$stmt = $conn->prepare($sql);
$stmt->execute([]);

$results = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body>
    <aside>
        <h1>Fitness</h1>
        <a href="dashboard.php">Dashboard</a>
        <a href="add_workouts.php">Add Workouts</a>
    </aside>

    <main>
        <header>Dashboard</header>

        <table>
            <thead>
                <tr>
                    <th>title</th>
                    <th>description</th>
                    <th>Duration (min)</th>
                    <th>Diffeculty level</th>
                    <th>Target muscle</th>
                    <th>Date publication</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($results as $workout){ ?>
                <tr>
                    <td><?PHP echo htmlspecialchars($workout['title']);?></td>
                    <td><?PHP echo htmlspecialchars($workout['description'])?></td>
                    <td><?PHP echo htmlspecialchars($workout['duration_min'])?></td>
                    <td><?PHP echo htmlspecialchars($workout['difficulty_level'])?></td>
                    <td><?PHP echo htmlspecialchars($workout['group_name'])?></td>
                    <td><?PHP echo htmlspecialchars($workout['created_at'])?></td>
                </tr>
                <?php }; ?>
            </tbody>
        </table>
    </main>
</body>
</html>