<!DOCTYPE html>
<html lang="en">
    <?php
      include('includes/header.php');
      $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;

      $AboutData = "SELECT * FROM tbl_aboutus WHERE RANDOM_ID = '".$randomId."'";
      $fetchedAboutData = $crud->getData($AboutData);
    ?>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php include('includes/navbar.php'); ?>
      <?php include('includes/sidebar.php'); ?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-md-6">
                <?php if ($_REQUEST['type'] == 'view') { ?>
                  <h1 class="m-0">View AboutUs</h1>
                <?php } ?>
                <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <h1 class="m-0">Edit AboutUs</h1>
                <?php } ?>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <?php if ($_REQUEST['type'] == 'view') { ?>
                  <li class="breadcrumb-item active">View AboutUs</li>
                  <?php } ?>
                  <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <li class="breadcrumb-item active">Edit AboutUs</li>
                  <?php } ?>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="editAboutusForm" id="editAboutusForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <h3 class="card-title">View AboutUs</h3>
                    <?php } ?>
                    <?php if ($_REQUEST['type'] == 'edit') { ?>
                    <h3 class="card-title">Edit AboutUs</h3>
                    <?php } ?>
                  </div>
                  <div class="card-body">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    
                    <div class="row">

                      <div class="col-6 mb-2">
                        <label for="">Image 1</label>
                        <br>
                        <img id="previewImg" src="<?php echo str_replace('../', '', $fetchedAboutData[0]['IMAGE_1']); ?>" height="100">
                        <input type="hidden" name="old_image" id="old_image" value="<?php echo $fetchedAboutData[0]['IMAGE_1']; ?>">
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Image 2</label>
                        <br>
                        <img id="previewImg2" src="<?php echo str_replace('../', '', $fetchedAboutData[0]['IMAGE_2']); ?>" height="100">
                        <input type="hidden" name="old_image2" id="old_image2" value="<?php echo $fetchedAboutData[0]['IMAGE_2']; ?>">
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Alt Name</label>
                        <input type="text" id="altName" name="altName" value=" <?php echo $fetchedAboutData[0] ['ALT_NAME']; ?>" class="form-control" readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Alt Name 2</label>
                        <input type="text" id="altName2" name="altName2" value=" <?php echo $fetchedAboutData[0]['ALT_NAME2']; ?>" class="form-control" readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Para1 Img1</label>
                        <textarea class="form-control" id="Para1Img1" name="Para1Img1"  rows="4" readonly><?php echo $fetchedAboutData[0]['PARA1_IMG1']; ?></textarea>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Para1 Img2</label>
                        <textarea class="form-control" id="Para1Img2" name="Para1Img2"  rows="4" readonly><?php echo $fetchedAboutData[0]['PARA1_IMG2']; ?></textarea>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Para2 Img1</label>
                        <textarea class="form-control" id="Para2Img1" name="Para2Img1" rows="4" readonly><?php echo $fetchedAboutData[0]['PARA2_IMG1']; ?></textarea>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Para2 Img2</label>
                        <textarea class="form-control" id="Para2Img2" name="Para2Img2" rows="4" readonly> <?php echo $fetchedAboutData[0]['PARA2_IMG2']; ?> </textarea>
                      </div>
                    </div>
                    <?php } ?>

                    <?php if ($_REQUEST['type'] == 'edit') {?>
                    <div class="row">

                      <div class="col-6 mb-2">
                        <label for="">Image 1</label>
                        <input type="file" name="image" class="form-control" id="image" accept="image/*"><br>
                        <img id="previewImg" src="<?php echo str_replace('../', '', $fetchedAboutData[0]['IMAGE_1']); ?>" height="100">
                        <input type="hidden" name="old_image" id="old_image" value="<?php echo $fetchedAboutData[0]['IMAGE_1']; ?>">
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Image 2</label>
                        <input type="file" name="image2" class="form-control" id="image2" accept="image/*">
                        <br>
                        <img id="previewImg2" src="<?php echo str_replace('../', '', $fetchedAboutData[0]['IMAGE_2']); ?>" height="100">
                        <input type="hidden" name="old_image2" id="old_image2" value="<?php echo $fetchedAboutData[0]['IMAGE_2']; ?>">
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Alt Name</label>
                        <input type="text" id="altName" name="altName" value=" <?php echo $fetchedAboutData[0] ['ALT_NAME']; ?>" class="form-control" >
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Alt Name 2</label>
                        <input type="text" id="altName2" name="altName2" value=" <?php echo $fetchedAboutData[0]['ALT_NAME2']; ?>" class="form-control" >
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Para1 Img1</label>
                        <textarea class="form-control" id="Para1Img1" name="Para1Img1"  rows="4" ><?php echo $fetchedAboutData[0]['PARA1_IMG1']; ?></textarea>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Para1 Img2</label>
                        <textarea class="form-control" id="Para1Img2" name="Para1Img2"  rows="4" ><?php echo $fetchedAboutData[0]['PARA1_IMG2']; ?></textarea>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Para2 Img1</label>
                        <textarea class="form-control" id="Para2Img1" name="Para2Img1" rows="4" ><?php echo $fetchedAboutData[0]['PARA2_IMG1']; ?></textarea>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Para2 Img2</label>
                        <textarea class="form-control" id="Para2Img2" name="Para2Img2" rows="4" ><?php echo $fetchedAboutData[0]['PARA2_IMG2']; ?> </textarea>
                      </div>

                    </div>
                    <?php } ?>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageAboutus'">
                      </div>
                      <div class="col-6">
                        <?php if($_REQUEST['type'] == 'edit'){ ?>
                        <input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $randomId; ?>">
                        <input type="submit" name="submit" value="Update" class="btn btn-success" style="float: right;">
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-2"></div>
            </div>
          </form>
        </section>
      </div>
      <?php include('includes/footer.php'); ?>
      <script type="text/javascript" src="js/editAboutus.js"></script>
  </body>
</html>
