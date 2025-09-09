<?php 
session_start();
include_once("../crudop/crud.php");
include_once("../crudop/securityHelpers.php");
$crud = new Crud();
$tableName = 'tbl_menus';

extract($_POST);

$altName            = isset($altName) ? stringsantize($altName) : '';
$dishTitle          = isset($dishTitle) ? stringsantize($dishTitle) : '' ;
$dishDescription    = isset($dishDescription) ? stringsantize($dishDescription) : '';
$btnText            = isset($btnText) ? stringsantize($btnText) : '';
$old_image          = isset($old_image) ? $old_image : '';
$hdn_id             = isset($hdn_id) ? ($hdn_id) : '';
$randomId           = generate_secure_string(20);

$image = '';
$image_targetDir = "../uploads/menus/";

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

    $menuData = "SELECT * FROM ".$tableName." ORDER BY ID DESC";
    $result = $crud->getData($menuData);

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

    $insert = "INSERT INTO $tableName (IMAGE, ALT_NAME, DISH_TITLE, DISH_DESCRIPTION,BTN_TEXT, RANDOM_ID) VALUES (?, ? ,?, ? ,?, ?)";
    $result = $crud->execute($insert, 'ssssss', [$image, $altName, $dishTitle, $dishDescription,$btnText, $randomId]);

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
        $update = "UPDATE ".$tableName." SET IMAGE = ?, ALT_NAME = ?, DISH_TITLE = ?, DISH_DESCRIPTION = ?, BTN_TEXT = ? WHERE RANDOM_ID = ?";
        $result = $crud->execute($update, 'ssssss', [$image, $altName, $dishTitle, $dishDescription,$btnText, $hdn_id]);

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