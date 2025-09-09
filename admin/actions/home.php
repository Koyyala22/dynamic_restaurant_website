<?php 
session_start();
include_once("../crudop/crud.php");
include_once("../crudop/securityHelpers.php");
$crud = new Crud();
$tableName = 'tbl_home';


extract($_POST);

$title          = isset($title) ? stringsantize($title) : '' ;
$subtitle       = isset($subtitle) ? stringsantize($subtitle) : '';
$buttonText     = isset($buttonText) ? stringsantize($buttonText) : '';
$old_image      = isset($old_image) ? $old_image : '';
$hidId          = isset($hdn_id) ? stringsantize($hdn_id) : '';

$randomId       = generate_secure_string(20);

$image = '';
$image_targetDir = "../uploads/home/";

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

    $homeData = "SELECT * FROM ".$tableName." ORDER BY ID DESC";
    $result = $crud->getData($homeData);

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

    $insert = "INSERT INTO $tableName (IMAGE, TITLE, SUBTITLE, BTN_TEXT, RANDOM_ID) VALUES (?, ?, ?, ?, ?)";
    $result = $crud->execute($insert, 'sssss', [$image, $title, $subtitle, $buttonText, $randomId]);

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

        $update = "UPDATE ".$tableName." SET IMAGE = ?, TITLE = ? , SUBTITLE = ?, BTN_TEXT = ? WHERE RANDOM_ID = ? ";
        $result = $crud->execute($update, 'sssss', [$image, $title, $subtitle, $buttonText, $hidId]);

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