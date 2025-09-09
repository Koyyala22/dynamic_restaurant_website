<!DOCTYPE html>
<html lang="en">
    <?php
      include('includes/header.php');
      $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;

      $reviewData = "SELECT * FROM tbl_review WHERE RANDOM_ID = '".$randomId."'";
      $fetchedReviewData = $crud->getData($reviewData);
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
                  <h1 class="m-0">View review</h1>
                <?php } ?>
                <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <h1 class="m-0">Edit review</h1>
                <?php } ?>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <?php if ($_REQUEST['type'] == 'view') { ?>
                  <li class="breadcrumb-item active">View review</li>
                  <?php } ?>
                  <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <li class="breadcrumb-item active">Edit review</li>
                  <?php } ?>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="editReviewForm" id="editReviewForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <h3 class="card-title">View Review Data</h3>
                    <?php } ?>
                    <?php if ($_REQUEST['type'] == 'edit') { ?>
                    <h3 class="card-title">Edit Review Data</h3>
                    <?php } ?>
                  </div>
                  <div class="card-body">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">name</label>
                        <textarea class="form-control" id="name" name="name" readonly><?php echo $fetchedReviewData[0]['NAME']; ?></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">star  count</label>
                        <input type="text" id="count" name="count" class="form-control" value="<?php echo $fetchedReviewData[0]['STAR_COUNT']; ?>" readonly>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">review</label>
                        <input type="text" id="review" name="review" class="form-control" value="<?php echo $fetchedReviewData[0]['REVIEW'] ?>" readonly>
                      </div>
                      <div class="col-12 mb-2">
                        <label for="">Alt_Name</label>
                        <input type="text" id="alt" name="alt" class="form-control" value="<?php echo $fetchedReviewData[0]['ALT_NAME'] ?>" readonly>
                      </div>
                      <div class="col-6 mb-2">
                        <label for="">Galerry Image</label><br>
                        <img src="<?php echo str_replace('../', '', $fetchedReviewData[0]['IMAGE']); ?>" height="100">
                      </div>

                     
                    </div>
                    <?php } ?>

                    <?php if ($_REQUEST['type'] == 'edit') {?>
                    <div class="row">

                     <div class="col-12 mb-2">
                        <label for="">name</label>
                        <textarea class="form-control" id="name" name="name" ><?php echo $fetchedReviewData[0]['NAME']; ?></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">star count</label>
                        <input type="text" id="count" name="count" class="form-control" value="<?php echo $fetchedReviewData[0]['STAR_COUNT']; ?>">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">review</label>
                        <input type="text" id="review" name="review" class="form-control" value="<?php echo $fetchedReviewData[0]['REVIEW'] ?>" >
                      </div>
                          <div class="col-12 mb-2">
                        <label for="">Alt_Name</label>
                        <input type="text" id="alt" name="alt" class="form-control" value="<?php echo $fetchedReviewData[0]['ALT_NAME'] ?>" >
                      </div>
                        
                         <div class="col-12 mb-2">
                        <label for="">gallery Image</label>
                        <input type="file" name="image" class="form-control" id="image"><br>
                        <img id="previewImg" src="<?php echo str_replace('../', '', $fetchedReviewData[0]['IMAGE']); ?>" height="100">
                        <input type="hidden" name="old_image" id="old_image" value="<?php echo $fetchedReviewData[0]['IMAGE']; ?>">
                      </div>
                    </div>
                    <?php } ?>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageReview'">
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
      <script type="text/javascript" src="js/editReview.js"></script>
  </body>
</html>
