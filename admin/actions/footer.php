<?php 
session_start();
include_once("../crudop/crud.php");
include_once("../crudop/securityHelpers.php");
$crud = new Crud();
$tableName = 'tbl_footer';

extract($_POST);

$Facebook       = isset($facebook) ? urlsanitize($facebook) :'';
$Insta       = isset($insta) ? urlsanitize($insta) : '';
$Twitter     = isset($twitter) ? urlsanitize($twitter) : '';
$Google     = isset($google) ? urlsanitize($google) : '';
$hdn_id      = isset($hdn_id) ? $hdn_id : '';
$randomId    = generate_secure_string(20);


/*--------------------------------------------------------------
                        Display Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'show') {

    $Service_Qry = "SELECT * FROM ".$tableName." ORDER BY ID DESC";
    $Service_Data = $crud->getData($Service_Qry);

    $response = array(
        "draw" => 1,
        "recordsTotal" => count($Service_Data),
        "data" => $Service_Data
    );

    echo json_encode($response);
}

/*--------------------------------------------------------------
                        Save Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'save') {

    $query = "INSERT INTO $tableName (FACEBOOK,INSTA,TWITTER,GOOGLE, RANDOM_ID) VALUES (?, ? ,? ,?,?)";
    $result = $crud->execute($query, 'sssss', [$Facebook, $Insta, $Twitter,$Google, $randomId]);

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
    
    $Footer_Qry = "UPDATE ".$tableName." SET FACEBOOK = ?, INSTA = ?, TWITTER = ?,GOOGLE=? WHERE RANDOM_ID = ?";
   
    $Footer_Data = $crud->execute($Footer_Qry, 'sssss',[$Facebook, $Insta, $Twitter,$Google, $hdn_id]);

    if ($Footer_Data) {
        echo 'true';
    } else {
        echo 'false';
    }
}

/*--------------------------------------------------------------
                        Delete Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'delete') {

    $id        = $_POST['id'];
    $Del_Data = $crud->delete($id, $tableName);

    if ($Del_Data) {
        echo 'true';
    } else {
        echo 'false';
    }
}

?>