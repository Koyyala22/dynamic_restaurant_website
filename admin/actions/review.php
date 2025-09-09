<?php 
session_start();
include_once("../crudop/crud.php");
include_once("../crudop/securityHelpers.php");
$crud = new Crud();
$tableName = 'tbl_review';

extract($_POST);

$Name          = isset($name) ? stringsantize($name) : '' ;
$Count         = isset($count) ? integersantize($count) : '';
$Review        = isset($review) ? stringsantize($review) : '';
$old_image   = isset($old_image) ? $old_image : '';
$altName       = isset($alt) ? stringsantize($alt) : '';

$hidId          = isset($hdn_id) ? stringsantize($hdn_id) : '';

$randomId  = generate_secure_string(20);
$image = '';
$image_targetDir = "../uploads/review/";

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
    

    $reviewData = "SELECT * FROM ".$tableName." ORDER BY ID DESC";
    $result = $crud->getData($reviewData);

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

    $insert = "INSERT INTO $tableName (NAME,STAR_COUNT,REVIEW,IMAGE,ALT_NAME,RANDOM_ID) VALUES (?,? ,?,?,?,?)";
    $result = $crud->execute($insert, 'sissss', [$Name, $Count, $Review,$image,$altName,$randomId]);

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

        $update = "UPDATE ".$tableName." SET NAME = ? , STAR_COUNT = ?, REVIEW = ?,IMAGE = ?,ALT_NAME = ? WHERE RANDOM_ID = ? ";
        $result = $crud->execute($update, 'sissss', [$Name, $Count, $Review,$image, $altName ,$hidId]);

        if ($result) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

/*--------------------------------------------------------------
                        Delete Data
--------------------------------------------------------------*/

if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    $id = isset($id) ? integersantize($id) : '';
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


