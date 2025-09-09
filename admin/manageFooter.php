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
              <div class="col-sm-6">
                <h1 class="m-0">Footer</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <li class="breadcrumb-item active">Footer</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class = "col-12">
                <div class = "card">
                  <div class="card-header" style="background: #007bff;color: #fff;padding: 5px 15px;">
                    <div class = "row">
                      <div class = "col-6">
                        <h3 style="line-height: 20px;" class="card-title p-2">Footer Data</h3>
                      </div>
                      <div class = "col-6">
                        <a href="addFooter" class="btn btn-default" style="float: right;"><i class="fa-solid fa-plus"></i></a>
                      </div>
                    </div>
                  </div>
                     
                  <div class="card-body">
                    <div class = row>
                      <div class = "col-12 table-responsive">

                        <table width="100%" align="center" id="FooterTable" class="table table-striped">
                          <thead>
                            <tr>
                              <th align="center">S.No</th>
                              <th>facebook url</th>
                              <th>Instagram url</th>
                              <th>Twitter url</th>
                              <th>Google url</th>

                              <th align="center">Action</th>
                            </tr>
                          </thead>
                        </table>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php include('includes/footer.php'); ?>
      <script type="text/javascript" src="js/footer.js"></script>
  </body>
</html>