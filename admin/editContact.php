<!DOCTYPE html>
<html lang="en">
    <?php
      include('includes/header.php');
      $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;

      $ContactData = "SELECT * FROM tbl_contact WHERE RANDOM_ID = '".$randomId."'";
      $fetchedContactData = $crud->getData($ContactData);
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
                  <h1 class="m-0">View Contact</h1>
                <?php } ?>
                <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <h1 class="m-0">Edit Contact</h1>
                <?php } ?>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <?php if ($_REQUEST['type'] == 'view') { ?>
                  <li class="breadcrumb-item active">View Contact</li>
                  <?php } ?>
                  <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <li class="breadcrumb-item active">Edit Contact</li>
                  <?php } ?>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="editContactForm" id="editContactForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <h3 class="card-title">View Contact Data</h3>
                    <?php } ?>
                    <?php if ($_REQUEST['type'] == 'edit') { ?>
                    <h3 class="card-title">Edit Contact Data</h3>
                    <?php } ?>
                  </div>
                  <div class="card-body">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Address</label>
                        <textarea class="form-control" id="address" name="address" readonly><?php echo $fetchedContactData[0]['ADDRESS']; ?></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Phone Contact</label>
                        <input type="text" id="phoneContact" name="phoneContact" class="form-control" value="<?php echo $fetchedContactData[0]['PHONE_CONTACT']; ?>" readonly>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">What's App Contact</label>
                        <input type="text" id="whatsAppContact" name="whatsAppContact" class="form-control" value="<?php echo $fetchedContactData[0]['WHATSAPP_CONTACT'] ?>" readonly>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $fetchedContactData[0]['EMAIL']; ?>" readonly>
                      </div>

                    </div>
                    <?php } ?>

                    <?php if ($_REQUEST['type'] == 'edit') {?>
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Address</label>
                        <textarea class="form-control" id="address" name="address" ><?php echo $fetchedContactData[0]['ADDRESS']; ?></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Phone Contact</label>
                        <input type="text" id="phoneContact" name="phoneContact" class="form-control" value="<?php echo $fetchedContactData[0]['PHONE_CONTACT']; ?>" >
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">What's App Contact</label>
                        <input type="text" id="whatsAppContact" name="whatsAppContact" class="form-control" value="<?php echo $fetchedContactData[0]['WHATSAPP_CONTACT'] ?>" >
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $fetchedContactData[0]['EMAIL']; ?>" >
                      </div>

                    </div>
                    <?php } ?>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageContact'">
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
      <script type="text/javascript" src="js/editContact.js"></script>
  </body>
</html>
