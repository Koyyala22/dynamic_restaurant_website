<!DOCTYPE html>
<html lang="en">
  <?php include('includes/header.php'); ?>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php include('includes/navbar.php'); ?>
      <?php include('includes/sidebar.php'); ?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-md-6">
                <h1 class="m-0">Add Review</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">home</a></li>
                  <li class="breadcrumb-item active">Add Review</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="addReviewForm" id="addReviewForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add Review Details</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Name</label>
                        <input type="text" id="name" name="name" class="form-control">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Star Count</label>
                        <input type="text" id="count" name="count" class="form-control">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Review</label>
                        <textarea  id="review" name="review" class="form-control"></textarea>
                      </div>

                      </div>
                       <div class="col-12 mb-2">
                        <label for="">altName</label>
                        <input type="text" id="alt" name="alt" class="form-control">
                      </div>

                      
                        <div class="col-12 mb-2">
                          <label for="">Review Image</label>
                          <input type="file" name="image" class="form-control" id="image" accept="image/*">
                          <br>
                          <img id="previewImg" alt="Uploaded Image Preview" width="80px" height="80px" style="display:none;">
                          <div id="error-message" style="color: red; display: none;">Please select a PNG, JPG, or JPEG image.</div>
                      
                    </div>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageReview'">
                      </div>
                      <div class="col-6">
                        <input type="submit" name="submit" value="Save" class="btn btn-success" style="float: right;">
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
      <script type="text/javascript" src="js/addReview.js"></script>
  </body>
</html>
