<!DOCTYPE html>
<html lang="en">
    <?php
      include('includes/header.php');
      $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;

      $menuData = "SELECT * FROM tbl_menus WHERE RANDOM_ID = '".$randomId."'";
      $fetchedMenuData = $crud->getData($menuData);
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
                  <h1 class="m-0">View Menu</h1>
                <?php } ?>
                <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <h1 class="m-0">Edit Menu</h1>
                <?php } ?>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home">Home</a></li>
                  <?php if ($_REQUEST['type'] == 'view') { ?>
                  <li class="breadcrumb-item active">View Menu</li>
                  <?php } ?>
                  <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <li class="breadcrumb-item active">Edit Menu</li>
                  <?php } ?>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="editMenusForm" id="editMenusForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <h3 class="card-title">View Menu Data</h3>
                    <?php } ?>
                    <?php if ($_REQUEST['type'] == 'edit') { ?>
                    <h3 class="card-title">Edit Menu Data</h3>
                    <?php } ?>
                  </div>
                  <div class="card-body">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Dish Image</label><br>
                        <img src="<?php echo str_replace('../', '', $fetchedMenuData[0]['IMAGE']); ?>" height="100">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Alt name</label><br>
                        <textarea class="form-control" id="altName" name="altName" readonly><?php echo $fetchedMenuData[0]['ALT_NAME']; ?></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Dish Title</label>
                        <textarea class="form-control" id="dishTitle" name="dishTitle" readonly><?php echo $fetchedMenuData[0]['DISH_TITLE']; ?></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Dish Description</label>
                        <textarea class="form-control" id="dishDescription" name="dishDescription" readonly><?php echo $fetchedMenuData[0]['DISH_DESCRIPTION']; ?></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Button text</label>
                        <textarea class="form-control" id="btnText" name="btnText" readonly><?php echo $fetchedMenuData[0]['BTN_TEXT']; ?></textarea>
                      </div>

                    </div>
                    <?php } ?>



                    <?php if ($_REQUEST['type'] == 'edit') {?>
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Dish Image</label>
                        <input type="file" name="image" class="form-control" id="image"><br>
                        <img id="previewImg" src="<?php echo str_replace('../', '', $fetchedMenuData[0]['IMAGE']); ?>" height="100">
                        <input type="hidden" name="old_image" id="old_image" value="<?php echo $fetchedMenuData[0]['IMAGE']; ?>">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Alt name</label>
                        <textarea class="form-control" id="altName" name="altName"><?php echo $fetchedMenuData[0]['ALT_NAME']; ?></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Dish Title</label>
                        <textarea class="form-control" id="dishTitle" name="dishTitle"><?php echo $fetchedMenuData[0]['DISH_TITLE']; ?></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Dish Description</label>
                        <textarea class="form-control" id="dishDescription" name="dishDescription"><?php echo $fetchedMenuData[0]['DISH_DESCRIPTION']; ?></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Button text</label>
                        <textarea class="form-control" id="btnText" name="btnText"><?php echo $fetchedMenuData[0]['BTN_TEXT']; ?></textarea>
                      </div>

                    </div>
                    <?php } ?>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageMenus'">
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
      <script type="text/javascript" src="js/editMenus.js"></script>
  </body>
</html>
