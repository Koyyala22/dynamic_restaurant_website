<?php 
session_start();
include_once("../crudop/crud.php");
include_once("../crudop/securityHelpers.php");
$crud = new Crud();
$tableName = 'tbl_contact';

extract($_POST);

$address          = isset($address) ? stringsantize($address) : '' ;
$phone_Contact    = isset($phoneContact) ? integersantize($phoneContact) : '';
$whatsapp_Contact = isset($whatsAppContact) ? integersantize($whatsAppContact) : '';
$email            = isset($email) ? emailsantize($email) : '';
$hidId            = isset($hdn_id) ? stringsantize($hdn_id) : '';

$randomId  = generate_secure_string(20);

/*--------------------------------------------------------------
                        Display Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'show') {

    $conactData = "SELECT * FROM ".$tableName." ORDER BY ID DESC";
    $result = $crud->getData($conactData);

    $response = array(
        "draw" => 1,
        "recordsTotal" => count($result),
        "data" => $result
    );

    echo json_encode($response);
}

/*--------------------------------------------------------------
                        Save Data
--------------------------------------------------------------*/

if(isset($_POST['action']) && $_POST['action'] == 'save'){

    $insert = "INSERT INTO $tableName (ADDRESS, PHONE_CONTACT, WHATSAPP_CONTACT, EMAIL, RANDOM_ID) VALUES (?, ? ,? ,? ,?)";
    $result = $crud->execute($insert, 'siiss', [$address, $phone_Contact, $whatsapp_Contact, $email, $randomId]);

    if ($result) {
        echo 'true';
    } else {
        echo 'false';
    }

}

/*--------------------------------------------------------------
                        Update Data
--------------------------------------------------------------*/
    if(isset($_POST['action']) && $_POST['action'] == 'update') {

        $update = "UPDATE ".$tableName." SET ADDRESS = ? , PHONE_CONTACT = ?, WHATSAPP_CONTACT = ?, EMAIL = ? WHERE RANDOM_ID = ? ";
        $result = $crud->execute($update, 'siiss', [$address, $phone_Contact, $whatsapp_Contact, $email, $hidId]);

        if ($result) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

/*--------------------------------------------------------------
                        Delete Data
--------------------------------------------------------------*/
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $id = isset($id) ? integersantize($id) : '';

        $Del_Data = $crud->delete($id, $tableName);

        if ($Del_Data) {
            echo 'true';
        } else {
            echo 'false';
        }
    }
 ?>