<?php

require_once 'mysql.php';

$db = new MySQL();
$db->connect('localhost', 'root', '', 'mydatabase');

$users = $db->select('SELECT * FROM users');
$posts = $db->select('SELECT * FROM posts');

// Zpracování požadavků na úpravy dat
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        $table = $_POST['table'];
        $id = $_POST['id'];

        if ($action === 'new') {
            if ($table === 'users') {
                $name = $_POST['name'];
                $email = $_POST['email'];

                $data = [
                    'name' => $name,
                    'email' => $email
                ];

                $success = $db->insert($table, $data);

                if ($success) {
                    echo "New user created successfully!";
                } else {
                    echo "Failed to create a new user.";
                }
            } elseif ($table === 'posts') {
                $user_id = $_POST['user_id'];
                $title = $_POST['title'];
                $content = $_POST['content'];

                $data = [
                    'user_id' => $user_id,
                    'title' => $title,
                    'content' => $content
                ];

                $success = $db->insert($table, $data);

                if ($success) {
                    echo "New post created successfully!";
                } else {
                    echo "Failed to create a new post.";
                }
            }
        } elseif ($action === 'edit') {
            if ($table === 'users') {
                $name = $_POST['name'];
                $email = $_POST['email'];

                $data = [
                    'name' => $name,
                    'email' => $email
                ];

                $success = $db->update($table, $id, $data);

                if ($success) {
                    echo "User updated successfully!";
                } else {
                    echo "Failed to update the user.";
                }
            } elseif ($table === 'posts') {
                $user_id = $_POST['user_id'];
                $title = $_POST['title'];
                $content = $_POST['content'];

                $data = [
                    'user_id' => $user_id,
                    'title' => $title,
                    'content' => $content
                ];

                $success = $db->update($table, $id, $data);

                if ($success) {
                    echo "Post updated successfully!";
                } else {
                    echo "Failed to update the post.";
                }
            }
        } elseif ($action === 'delete') {
            $success = $db->delete($table, $id);

            if ($success) {
                echo "Record deleted successfully!";
            } else {
                echo "Failed to delete the record.";
            }
        }
    }
}

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
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {background-color: #f5f5f5;}
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="table" value="users">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <button type="submit" name="action" value="edit">Edit</button>
                            <button type="submit" name="action" value="delete">Delete</button>
                        </form>
                    </td>
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
                <th>Actions</th>
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
                    <td>
                        <form method="POST">
                            <input type="hidden" name="table" value="posts">
                            <input type="hidden" name="id" value="<?= $post['id'] ?>">
                            <button type="submit" name="action" value="edit">Edit</button>
                            <button type="submit" name="action" value="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <h2>New User</h2>
    <form method="POST">
        <input type="hidden" name="table" value="users">
        <input type="hidden" name="action" value="new">
        <input type="hidden" name="id" value=""> <!-- Skryté pole pro "id" -->
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Create</button>
    </form>

    <h2>New Post</h2>
    <form method="POST">
        <input type="hidden" name="table" value="posts">
        <input type="hidden" name="action" value="new">
        <label>User ID:</label>
        <input type="number" name="user_id" required>
        <label>Title:</label>
        <input type="text" name="title" required>
        <label>Content:</label>
        <textarea name="content" required></textarea>
        <button type="submit">Create</button>
    </form>
</body>
</html>
