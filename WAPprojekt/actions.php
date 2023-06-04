<?php

require_once 'mysql.php';

$db = new MySQL();
$db->connect('localhost', 'root', '', 'mydatabase');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $table = $_POST['table'];

    if ($action === 'edit') {
        $id = $_POST['id'];

        if ($table === 'users') {
            $name = $_POST['name'];
            $email = $_POST['email'];

            $data = ['name' => $name, 'email' => $email];
            $success = $db->update($table, $id, $data);

            if ($success) {
                // Prepare the response
                $response = [
                    'success' => true,
                    'id' => $id,
                    'name' => $name,
                    'email' => $email
                ];
                echo json_encode($response);
                exit;
            }
        } elseif ($table === 'posts') {
            $title = $_POST['title'];
            $content = $_POST['content'];

            $data = ['title' => $title, 'content' => $content];
            $success = $db->update($table, $id, $data);

            if ($success) {
                // Prepare the response
                $response = [
                    'success' => true,
                    'id' => $id,
                    'title' => $title,
                    'content' => $content
                ];
                echo json_encode($response);
                exit;
            }
        }
    } elseif ($action === 'new') {
        if ($table === 'posts') {
            $title = $_POST['title'];
            $content = $_POST['content'];

            $data = ['title' => $title, 'content' => $content];
            $success = $db->insert($table, $data);

            if ($success) {
                // Get the inserted ID
                $id = $db->getLastInsertId();

                // Prepare the response
                $response = [
                    'success' => true,
                    'id' => $id,
                    'title' => $title,
                    'content' => $content
                ];
                echo json_encode($response);
                exit;
            }
        }
    }
}

// If no successful response was sent, return an error message
$response = [
    'success' => false,
    'message' => 'An error occurred while updating the record.'
];
echo json_encode($response);

?>
