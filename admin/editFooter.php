<!DOCTYPE html>
<html lang="en">
    <?php
      include('includes/header.php');

      $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;

      $Footer_Qry = "SELECT * FROM tbl_footer WHERE RANDOM_ID = '".$randomId."'";
      $Footer_Data = $crud->getData($Footer_Qry);
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
                  <h1 class="m-0">View Footer</h1>
                <?php } ?>
                <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <h1 class="m-0">Edit Footer</h1>
                <?php } ?>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <?php if ($_REQUEST['type'] == 'view') { ?>
                  <li class="breadcrumb-item active">View Footer</li>
                  <?php } ?>
                  <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <li class="breadcrumb-item active">Edit Footer</li>
                  <?php } ?>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="editFooterForm" id="editFooterForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <h3 class="card-title">View Footer Data</h3>
                    <?php } ?>
                    <?php if ($_REQUEST['type'] == 'edit') { ?>
                    <h3 class="card-title">Edit Footer Data</h3>
                    <?php } ?>
                  </div>
                  <div class="card-body">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">facebook</label>
                        <input type="text" id="facebook" name="facebook" class="form-control" value="<?php echo $Footer_Data[0]['FACEBOOK']; ?>" readonly>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">insta</label>
                        <input type="text" id="insta" name="insta" class="form-control" value="<?php echo $Footer_Data[0]['INSTA']; ?>" readonly>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">twitter</label><br>
                         <input type="text" id="twitter" name="twitter" class="form-control" value="<?php echo $Footer_Data[0]['TWITTER']; ?>" readonly>
                      </div>
                    </div>
                    <div class="col-6 mb-2">
                        <label for="">google</label><br>
                        <input type="text" id="google" name="google" class="form-control" value="<?php echo $Footer_Data[0]['GOOGLE']; ?>" readonly>
                      </div>
                    </div>
                    <?php } ?>

                    <?php if ($_REQUEST['type'] == 'edit') {?>
                    <div class="row">

                     <div class="col-12 mb-2">
                        <label for="">facebook</label>
                        <input type="text" id="facebook" name="facebook" class="form-control" value="<?php echo $Footer_Data[0]['FACEBOOK']; ?>" >
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">insta</label>
                        <input type="text" id="insta" name="insta" class="form-control" value="<?php echo $Footer_Data[0]['INSTA']; ?>" >
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">twitter</label><br>
                         <input type="text" id="twitter" name="twitter" class="form-control" value="<?php echo $Footer_Data[0]['TWITTER']; ?>" >
                      </div>
                    </div>
                    <div class="col-6 mb-2">
                        <label for="">google</label><br>
                        <input type="text" id="google" name="google" class="form-control" value="<?php echo $Footer_Data[0]['GOOGLE']; ?>" >
                      </div>

                    </div>
                    <?php } ?>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageFooter'">
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
      <script type="text/javascript" src="js/editFooter.js"></script>
  </body>
</html>