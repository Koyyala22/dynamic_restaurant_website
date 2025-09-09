<?php 
session_start();
include_once("../crudop/crud.php");
include_once("../crudop/securityHelpers.php");
$crud = new Crud();
$tableName = 'tbl_aboutus';


extract($_POST);
$image        = isset($image)     ? stringsantize($image) : '' ;
$altName      = isset($altName)   ? stringsantize($altName) : '' ;
$Para1Img1    = isset($Para1Img1) ? stringsantize($Para1Img1) : '' ;
$Para2Img1    = isset($Para2Img1) ? stringsantize($Para2Img1) : '';
$altName2     = isset($altName2)   ? stringsantize($altName2) : '' ;
$Para1Img2    = isset($Para1Img2) ? stringsantize($Para1Img2) : '';
$Para2Img2    = isset($Para2Img2) ? stringsantize($Para2Img2) : '';
$hidId        = isset($hdn_id)    ? stringsantize($hdn_id) : '';
$old_image    = isset($old_image) ? $old_image : '';
$old_image2   = isset($old_image2) ? $old_image2 : '';


$randomId  = generate_secure_string(20);

$image = '';
$image2 = '';
$image_targetDir = "../uploads/aboutus/";

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

if(isset($_FILES['image2'])) {

    $imagefileName = basename($_FILES["image2"]["name"]);
    $targetimageFilePath = $image_targetDir.$randomId. "image2".$imagefileName;
    if(move_uploaded_file($_FILES["image2"]["tmp_name"], $targetimageFilePath)) {
        $image2 = $targetimageFilePath;
        if ($_POST['action'] == 'update') {
            unlink($old_image2);
        }
    }
} else {
    $image2 = $old_image2;
}


/*--------------------------------------------------------------
                        Display Data
--------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'showHomeDetails') {

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

    $insert = "INSERT INTO $tableName (IMAGE_1 ,ALT_NAME, PARA1_IMG1 , PARA2_IMG1 , IMAGE_2 ,ALT_NAME2, PARA1_IMG2 , PARA2_IMG2 ,RANDOM_ID) VALUES (?, ? ,? ,? ,? ,? ,? ,? ,?)";
    $result = $crud->execute($insert, 'sssssssss', [$image, $altName, $Para1Img1, $Para2Img1, $image2, $altName2, $Para1Img2, $Para2Img2, $randomId]);


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

        $update = "UPDATE ".$tableName." SET IMAGE_1 = ? ,ALT_NAME = ? ,PARA1_IMG1 = ? ,PARA2_IMG1 = ?, IMAGE_2 = ?,ALT_NAME2 = ?, PARA1_IMG2 = ?, PARA2_IMG2 = ? WHERE RANDOM_ID = ? ";
        $result = $crud->execute($update, 'sssssssss', [$image,$altName,$Para1Img1,$Para2Img1,$image2,$altName2, $Para1Img2,$Para2Img2, $hidId]);

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
        $image1_Path = $_POST['image'];
        $image2_Path = $_POST['image2'];

        $RemovedImage1 = false;
        $RemovedImage2 = false;

        if (file_exists($image1_Path)) {
            $RemovedImage1 = unlink($image1_Path);
        }
        if (file_exists($image2_Path)) {
            $RemovedImage2 = unlink($image2_Path);
        }
        $Del_Data = $crud->delete($id, $tableName);

        if ($Del_Data && $RemovedImage1 && $RemovedImage2) {
            echo 'true';
        } else {
            echo 'false';
        }
    }
 ?>