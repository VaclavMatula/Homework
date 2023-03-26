<?php

require_once 'mysql.php';

$db = new MySQL();
$db->connect('localhost', 'root', '', 'mydatabase');

$users = $db->select('SELECT * FROM users');
$posts = $db->select('SELECT * FROM posts');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Entities</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <h1>Users</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <h1>Posts</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?= $post['id'] ?></td>
                    <td><?= $post['user_id'] ?></td>
                    <td><?= $post['title'] ?></td>
                    <td><?= $post['content'] ?></td>
                    <td><?= $post['created_at'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>