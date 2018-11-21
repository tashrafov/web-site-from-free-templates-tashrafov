<?php
if(isset($_POST['uname'])&&isset($_POST['pass'])) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');

// database connection will be here
// include database and object files
    include_once './api/config/database.php';
    include_once './api/objects/users.php';

// instantiate database and product object
    $database = new Database();
    $db = $database->getConnection();
// initialize object
    $user = new Users($db);
    $user->username = isset($_POST['uname']) ? $_POST['uname'] : die();
    $user->password = isset($_POST['pass']) ? $_POST['pass'] : die();


    $stmt = $user->getLogin();
    if ($user->username != null) {
        if ($user->admin == 1) {
            header('Location: ./adminpanel.php');
            exit;
        } else {
            header('Location: ./admin.php');
            exit;
        }

    } else {
        header('Location: ./admin.php');
        exit;
    }
}
?>