<?php 
session_start();

include_once("../crudop/crud.php");
include_once("../crudop/securityHelpers.php");
$crud = new Crud();
$tableName = 'tbl_logins';

extract($_POST);
$username     = isset($username) ? emailsantize($username) :'';
$password     = isset($password) ? stringsantize($password) : '';
$randomId     = generate_secure_string(20);

if (isset($_POST['action']) && $_POST['action'] == 'register') {

    $query   = "SELECT USERNAME FROM $tableName WHERE USERNAME = ?";
    $existedData = $crud->getData($query, 's', [$username]);

    if (count($existedData) > 0) {
       echo "Already exists!";
    } 
    else {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insertquery = "INSERT INTO $tableName (USERNAME, PASSWORD, RANDOM_ID) VALUES (?, ?, ?)";
        $insertData  = $crud->execute($insertquery, 'sss', [$username, $hashed_password, $randomId]);

        if ($insertData) {
            echo "Registration successful!";
        } else {
            echo "Registration failed!";
        }
    }
}

?>
