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
                <h1 class="m-0">Add Service</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <li class="breadcrumb-item active">Add Service</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="addServiceForm" id="addServiceForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add New Service Details</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Title</label>
                        <input type="text" id="title" name="title" class="form-control">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                      </div>

                      <div class="col-12 mb-2">
                          <label for="">Service Image</label>
                          <input type="file" name="image" class="form-control" id="image" accept="image/*">
                          <br>
                          <img id="previewImg" alt="Uploaded Image Preview" width="80px" height="80px" style="display:none;">
                          <div id="error-message" style="color: red; display: none;">Please select a PNG, JPG, or JPEG image.</div>
                      </div>

                    </div>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageService'">
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
      <script type="text/javascript" src="js/addService.js"></script>
  </body>
</html>
