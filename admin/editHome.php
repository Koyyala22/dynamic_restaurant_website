<!DOCTYPE html>
<html lang="en">
    <?php
      include('includes/header.php');
      $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;

      $homeData = "SELECT * FROM tbl_home WHERE RANDOM_ID = '".$randomId."'";
      $fetchedHomeData = $crud->getData($homeData);
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
                  <h1 class="m-0">View Home</h1>
                <?php } ?>
                <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <h1 class="m-0">Edit Home</h1>
                <?php } ?>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <?php if ($_REQUEST['type'] == 'view') { ?>
                  <li class="breadcrumb-item active">View Home</li>
                  <?php } ?>
                  <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <li class="breadcrumb-item active">Edit Home</li>
                  <?php } ?>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="editHomeForm" id="editHomeForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <h3 class="card-title">View Home Data</h3>
                    <?php } ?>
                    <?php if ($_REQUEST['type'] == 'edit') { ?>
                    <h3 class="card-title">Edit Home Data</h3>
                    <?php } ?>
                  </div>
                  <div class="card-body">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <div class="row">

                      <div class="col-6 mb-2">
                        <label for="">Home Image</label><br>
                        <img src="<?php echo str_replace('../', '', $fetchedHomeData[0]['IMAGE']); ?>" height="100">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Title</label>
                        <textarea class="form-control" id="title" name="title" readonly><?php echo $fetchedHomeData[0]['TITLE']; ?></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Subtitle</label>
                        <textarea class="form-control" id="subtitle" name="subtitle" readonly><?php echo $fetchedHomeData[0]['SUBTITLE']; ?></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Button text</label>
                        <textarea class="form-control" id="buttonText" name="buttonText" readonly><?php echo $fetchedHomeData[0]['BTN_TEXT']; ?></textarea>
                      </div>

                    </div>
                    <?php } ?>



                    <?php if ($_REQUEST['type'] == 'edit') {?>
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Home Image</label>
                        <input type="file" name="image" class="form-control" id="image"><br>
                        <img id="previewImg" src="<?php echo str_replace('../', '', $fetchedHomeData[0]['IMAGE']); ?>" height="100">
                        <input type="hidden" name="old_image" id="old_image" value="<?php echo $fetchedHomeData[0]['IMAGE']; ?>">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Title</label>
                        <textarea class="form-control" id="title" name="title"><?php echo $fetchedHomeData[0]['TITLE']; ?></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Subtitle</label>
                        <textarea class="form-control" id="subtitle" name="subtitle"><?php echo $fetchedHomeData[0]['SUBTITLE']; ?></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Button text</label>
                        <textarea class="form-control" id="buttonText" name="buttonText"><?php echo $fetchedHomeData[0]['BTN_TEXT']; ?></textarea>
                      </div>

                    </div>
                    <?php } ?>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageHome'">
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
      <script type="text/javascript" src="js/editHome.js"></script>
  </body>
</html>
