<?php
require_once '../conf/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $duration_min = $_POST['duration'];
    $level = $_POST['level'];
    $target_muscle = $_POST['muscle'];
    $id_coach = 1;//becuase we have just one user in the database

    if(empty($title)||empty($description) || empty($duration_min)){
        die('all fields is required');
    }

    $stmt = $conn->prepare('SELECT id_group FROM muscle_groups WHERE name = ? ');
    $stmt->execute([$target_muscle]);

    $group = $stmt->fetch();

    $id_group = $group['id_group'];

    $sql = 'INSERT INTO workouts (title , description , duration_min, difficulty_level , id_coach,id_group) VALUES
     (:title , :description , :duration_min, :difficulty_level , :id_coach,:id_group)';

     $stmt = $conn->prepare($sql);
     $stmt->execute([
        ':title'=>$title,
        ':description'=>$description,
        ':duration_min'=>$duration_min,
        ':difficulty_level'=>$level,
        ':id_coach'=>$id_coach,
        ':id_group'=>$id_group
     ]);

     header('Location: dashboard.php');
     
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add workouts</title>
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body>
    <aside>
        <h1>Fitness</h1>
        <a href="dashboard.php">Dashboard</a>
        <a href="add_workouts">Add Workouts</a>
    </aside>

    <main>
        <header>New workouts</header>

        <form action="add_workouts.php" method="POST">
            <label>title</label>
            <input type="text" name="title" id="title" required>
            
            <label>Description</label>
            <input type="text" name="description" id="descripton" required>

            <label>Duration (min)</label>
            <input type="number" name="duration" id="duration" required>

            <label>Diffeculty level</label>
            <select name="level" id="level">
                <option value="beginner">Beginner</option>
                <option value="intermediate">intermediate</option>
                <option value="advanced">advanced</option>
            </select>
            <label>Target muscle</label>
            <select name="muscle" id="muscle">
                <option value="chest">Chest</option>
                <option value="back">back</option>
                <option value="legs">Legs</option>
                <option value="core">core</option>
            </select>
            <button type="submit">Submit</button>
        </form>
    </main>
</body>
</html>