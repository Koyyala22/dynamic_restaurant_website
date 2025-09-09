<?php 
session_start();
include_once("../crudop/crud.php");
include_once("../crudop/securityHelpers.php");
$crud = new Crud();
$tableName = 'tbl_service';

extract($_POST);

$title       = isset($title) ? stringsantize($title) :'';
$description = isset($description) ? stringsantize($description) : '';
$old_image   = isset($old_image) ? $old_image : '';
$hdn_id      = isset($hdn_id) ? $hdn_id : '';

$randomId  = generate_secure_string(20);
$image = '';
$image_targetDir = "../uploads/service/";

if(isset($_FILES['image'])) {

    $imagefileName = basename($_FILES["image"]["name"]);
    $targetimageFilePath = $image_targetDir.$randomId. "image".$imagefileName;
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetimageFilePath)) {
        $image = $targetimageFilePath;
        if ($_POST['action'] == 'update') {
            unlink($old_image);
        }
    }
} else {
    $image = $old_image;
}

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

    $query = "INSERT INTO $tableName (TITLE, DESCRIPTION, IMAGE, RANDOM_ID) VALUES (?, ? ,? ,?)";
    $result = $crud->execute($query, 'ssss', [$title, $description, $image, $randomId]);

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
    
    $Service_Qry = "UPDATE ".$tableName." SET TITLE = ?, DESCRIPTION = ?, IMAGE = ? WHERE RANDOM_ID = ?";
   
    $Service_Data = $crud->execute($Service_Qry, 'ssss',[$title,$description, $image, $hdn_id]);

    if ($Service_Data) {
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
    $imagePath = $_POST['image'];

    $RemovedImage = false;
    if (file_exists($imagePath)) {
        $RemovedImage = unlink($imagePath);
    }

    $Del_Data = $crud->delete($id, $tableName);

    if ($Del_Data && $RemovedImage ) {
        echo 'true';
    } else {
        echo 'false';
    }
}

?>