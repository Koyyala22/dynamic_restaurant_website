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
                <h1 class="m-0">Add Aboutus</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <li class="breadcrumb-item active">Add Aboutus</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="addAboutusForm" id="addAboutusForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add Aboutus Details</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="col-6 mb-2">
                          <label for="">Image 1</label>
                          <input type="file" name="image" class="form-control" id="image" accept="image/*">
                          <br>
                          <img id="previewImg" alt="Uploaded Image Preview" width="80px" height="80px" style="display:none;">
                          <div id="error-message" style="color: red; display: none;">Please select a PNG, JPG, or JPEG image.</div>
                      </div>
                      
                      <div class="col-6 mb-2">
                          <label for="">Image 2</label>
                          <input type="file" name="image2" class="form-control" id="image2" accept="image/*">
                          <br>
                          <img id="previewImg2" alt="Uploaded Image Preview" width="80px" height="80px" style="display:none;">
                          <div id="error-message2" style="color: red; display: none;">Please select a PNG, JPG, or JPEG image.</div>
                      </div>
                      <div class="col-6 mb-2">
                        <label for="">Alt Name</label>
                        <input type="text" id="altName" name="altName" class="form-control">
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Alt Name 2</label>
                        <input type="text" id="altName2" name="altName2" class="form-control">
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Para1 Img1</label>
                        <textarea class="form-control" id="Para1Img1" name="Para1Img1" rows="4"></textarea>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Para1 Img2</label>
                        <textarea class="form-control" id="Para1Img2" name="Para1Img2" rows="4"></textarea>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Para2 Img1</label>
                        <textarea class="form-control" id="Para2Img1" name="Para2Img1" rows="4"></textarea>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Para2 Img2</label>
                        <textarea class="form-control" id="Para2Img2" name="Para2Img2" rows="4"></textarea>
                      </div>
                      
                    </div>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageAboutus'">
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
      <script type="text/javascript" src="js/addAboutus.js"></script>
  </body>
</html>
