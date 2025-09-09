<?php 
session_start();
include_once("../crudop/crud.php");
include_once("../crudop/securityHelpers.php");
$crud = new Crud();
$tableName = 'tbl_gallery';

extract($_POST);

$alt_Name = isset($altName) ? stringsantize($altName) : '';
$old_image= isset($old_image) ? $old_image : '';
$hdn_id   = isset($hdn_id) ? $hdn_id : '';

$randomId  = generate_secure_string(20);


$image = '';
$image_targetDir = "../uploads/gallery/";

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
                        Save Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'save') {

    $query = "INSERT INTO $tableName (IMAGE, ALT_NAME, RANDOM_ID) VALUES (?, ? ,? )";
    $result = $crud->execute($query, 'sss', [$image, $alt_Name, $randomId]);

    if ($result) {
        echo 'true';
    } else {
        echo 'false';
    }
}
/*--------------------------------------------------------------
                        Display Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'show') {

    $gallery = "SELECT * FROM ".$tableName." ORDER BY ID DESC";
    $gallery_images = $crud->getData($gallery);

    $response = array(
        "draw" => 1,
        "recordsTotal" => count($gallery_images),
        "data" => $gallery_images
    );

    echo json_encode($response);
}

/*--------------------------------------------------------------
                        Update Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'update') {
    
    $Gallery_Qry = "UPDATE ".$tableName." SET IMAGE = ?, ALT_NAME = ? WHERE RANDOM_ID = ?";
   
    $Gallery_Data = $crud->execute($Gallery_Qry, 'sss',[$image,$alt_Name, $hdn_id]);

    if ($Gallery_Data) {
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