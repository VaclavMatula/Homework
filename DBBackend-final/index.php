<?php

require_once 'mysql.php';

$db = new MySQL();
$db->connect('localhost', 'root', '', 'mydatabase');

$users = $db->select('SELECT * FROM users');
$posts = $db->select('SELECT * FROM posts');

include 'entities.php';

?>