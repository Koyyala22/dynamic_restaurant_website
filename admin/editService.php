<!DOCTYPE html>
<html lang="en">
    <?php
      include('includes/header.php');

      $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;

      $Service_Qry = "SELECT * FROM tbl_service WHERE RANDOM_ID = '".$randomId."'";
      $Service_Data = $crud->getData($Service_Qry);
    ?>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php include('includes/navbar.php'); ?>
      <?php include('includes/sidebar.php'); ?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container
          -fluid">
            <div class="row mb-2">
              <div class="col-md-6">
                <?php if ($_REQUEST['type'] == 'view') { ?>
                  <h1 class="m-0">View Service</h1>
                <?php } ?>
                <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <h1 class="m-0">Edit Service</h1>
                <?php } ?>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <?php if ($_REQUEST['type'] == 'view') { ?>
                  <li class="breadcrumb-item active">View Service</li>
                  <?php } ?>
                  <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <li class="breadcrumb-item active">Edit Service</li>
                  <?php } ?>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="editServiceForm" id="editServiceForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <h3 class="card-title">View Service Data</h3>
                    <?php } ?>
                    <?php if ($_REQUEST['type'] == 'edit') { ?>
                    <h3 class="card-title">Edit Service Data</h3>
                    <?php } ?>
                  </div>
                  <div class="card-body">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="<?php echo $Service_Data[0]['TITLE']; ?>" readonly>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="4" readonly><?php echo $Service_Data[0]['DESCRIPTION']?></textarea>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Service Image</label><br>
                        <img src="<?php echo str_replace('../', '', $Service_Data[0]['IMAGE']); ?>" height="100">
                      </div>
                    </div>
                    <?php } ?>

                    <?php if ($_REQUEST['type'] == 'edit') {?>
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="<?php echo $Service_Data[0]['TITLE']; ?>">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="4" ><?php echo $Service_Data[0]['DESCRIPTION']?></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Service Image</label>
                        <input type="file" name="image" class="form-control" id="image"><br>
                        <img id="previewImg" src="<?php echo str_replace('../', '', $Service_Data[0]['IMAGE']); ?>" height="100">
                        <input type="hidden" name="old_image" id="old_image" value="<?php echo $Service_Data[0]['IMAGE']; ?>">
                      </div>

                    </div>
                    <?php } ?>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageService'">
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
      <script type="text/javascript" src="js/editService.js"></script>
  </body>
</html>
