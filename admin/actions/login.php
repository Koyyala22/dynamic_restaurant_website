<?php 
session_start();

include_once("../crudop/crud.php");
include_once("../crudop/securityHelpers.php");
$crud = new Crud();
$tableName = 'tbl_logins';

extract($_POST);
$username     = isset($username) ? emailsantize($username) :'';
$password     = isset($password) ? stringsantize($password) : '';
$old_password = isset($old_password) ? stringsantize($old_password) : '';

if (isset($_POST['action']) && $_POST['action'] == 'login') {

    $query = "SELECT PASSWORD FROM $tableName WHERE USERNAME = ?";
    $logData = $crud->getData($query, 's', [$username]);

    if (count($logData) > 0) {
        $stored_hash = $logData[0]['PASSWORD'];

        // Verify provided password with stored hash
        if (password_verify($password, $stored_hash)) {
            $_SESSION['username'] = $username;
            echo "true";
        } else {
            echo "false";
        }
    } else {
        echo "false";
    }
}


if (isset($_POST['action']) && $_POST['action'] == 'changePassword') {

    // Check if the old password is correct
    $query = "SELECT PASSWORD FROM $tableName WHERE USERNAME = ?";
    $logData = $crud->getData($query, 's', [$_SESSION['username']]);

    if (count($logData) > 0) {
        $stored_hash = $logData[0]['PASSWORD'];

        // Verify old password
        if (password_verify($old_password, $stored_hash)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Update with the new hashed password
            $query = "UPDATE $tableName SET PASSWORD = ? WHERE USERNAME = ?";
            $result = $crud->execute($query, 'ss', [$hashed_password, $_SESSION['username']]);

            if ($result) {
                echo 'true';
            } else {
                echo 'false';
            }
        } else {
            echo "Invalid";
        }
    } else {
        echo "Invalid";
    }
}


?>