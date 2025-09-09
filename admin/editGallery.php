<!DOCTYPE html>
<html lang="en">
    <?php
      include('includes/header.php');

      $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;

      $gallery = "SELECT * FROM tbl_gallery WHERE RANDOM_ID = '".$randomId."'";
      $gallery_Data = $crud->getData($gallery);
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
                <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <h1 class="m-0">Edit Gallery Image</h1>
                <?php } ?>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <li class="breadcrumb-item active">Edit Gallery Image</li>
                  <?php } ?>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="editGalleryForm" id="editGalleryForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <?php if ($_REQUEST['type'] == 'edit') { ?>
                    <h3 class="card-title">Edit Gallery Data</h3>
                    <?php } ?>
                  </div>
                  <div class="card-body">
                    <?php if ($_REQUEST['type'] == 'edit') {?>
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Gallery Image</label>
                        <input type="file" name="image" class="form-control" id="image"><br>
                        <img id="previewImg" src="<?php echo str_replace('../', '', $gallery_Data[0]['IMAGE']); ?>" height="100">
                        <input type="hidden" name="old_image" id="old_image" value="<?php echo $gallery_Data[0]['IMAGE']; ?>">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Alt Name</label>
                        <input type="text" id="altName" name="altName" class="form-control" value="<?php echo $gallery_Data[0]['ALT_NAME']; ?>">
                      </div>

                    </div>
                    <?php } ?>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageGallery'">
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
      <script type="text/javascript" src="js/editGallery.js"></script>
  </body>
</html>
