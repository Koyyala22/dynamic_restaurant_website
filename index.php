<?php 
include('crudop/crud.php'); 
$crud = new Crud();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">

 	 <link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body>

	<div class="navbar navbar-expand-lg navbar-light bg-light">
		<a href="#" class="brand">
			<img src="images\images.png">	
		</a>
		<button class="navbar-toggler" type="button" data-target="#Navtarget" data-toggle="collapse" aria-controls="Navtarget" aria-expanded="false" aria-label="toggle navigation" >
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="navbar-collapse collapse" id="Navtarget">
			<div class="navbar-nav mx-auto">
				<a href="#welcome" class="nav-link text-uppercase mr-5 font-weight-bold	">welcome</a>
				<a href="#about" class="nav-link text-uppercase mr-5 font-weight-bold">about</a>
				<a href="#menu" class="nav-link text-uppercase mr-5 font-weight-bold">menu</a>
				<a href="#gallery" class="nav-link text-uppercase mr-5 font-weight-bold">gallery</a>
				<a href="#reviews" class="nav-link text-uppercase mr-5 font-weight-bold">reviews</a>
				<a href="#contact" class="nav-link text-uppercase mr-5 font-weight-bold">contact</a>
			</div>
		</div>
	</div>



	<!-------------------------------- welcome ------------------------------------------------->
	<?php  
			$home = "SELECT * FROM `tbl_home`";
			$homeData = $crud->getData($home);
	?>
	<section id="welcome" class="min-vh-100 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo str_replace('../', 'admin/', $homeData[0]['IMAGE']); ?>);
			background-size: cover; 
         	background-position: center; 
         	background-repeat: no-repeat; 
	">

		<div class="row">
			<div class="col-md-12">
				<h1 class="font-weight-bold display-1 text-white text-center"><?php echo $homeData[0]['TITLE']; ?></h1>				
			</div>
			<div class="col-md-12">
				<p class="text-white font-weight-bold text-center"><?php echo $homeData[0]['SUBTITLE']; ?></p>
			</div>
			<div class="col-md-12 text-center">
				<button class="btn btn-lg btn-light"><?php echo $homeData[0]['BTN_TEXT']; ?></button>
			</div>
		</div>

	</section>


	<!-------------------------- about -------------------------------------------------->
	
<?php 
			$about     = "SELECT * FROM `tbl_aboutus`";
			$aboutData = $crud->getData($about);
	 ?>
	
	
	 <section id="about" class="container-fluid spacing abt-section min-vh-100 pt-5">

                     
  <div class="row align-items-center mb-5">
 
    <div class="col-md-5 d-flex flex-column justify-content-center text-center text-md-start">
       <h1 class="fw-bold display-4 ">About Us</h1>
      <p class="mb-3"><?php echo $aboutData[0]['PARA1_IMG1'];?> </p>
      <p><?php echo $aboutData[0]['PARA2_IMG1'];?>.</p>
    </div>

    <div class="col-md-7 text-center">
      <img src="<?php echo str_replace('../', 'admin/', $aboutData[0]['IMAGE_1']); ?>" 
           class="img-fluid rounded shadow abt-imge" alt="About Us">
    </div>
  </div>

  <div class="row align-items-center flex-md-row-reverse">
    <!-- Text -->
    <div class="col-md-5 d-flex flex-column justify-content-center text-center text-md-start">
      <h1 class="fw-bold mb-4">What Makes Us Special</h1>
      <p class="mb-3"><?php echo $aboutData[0]['PARA1_IMG2'];?> </p>
      <p><?php echo $aboutData[0]['PARA2_IMG2'];?></p>
    </div>

  
    <div class="col-md-7 text-center">
      <img src="<?php echo str_replace('../', 'admin/', $aboutData[0]['IMAGE_2']); ?>" 
           class="img-fluid rounded shadow abt-imge" alt="Special">
    </div>
  </div>
</section>

<!-- ----------------------------------MENU----------------------------------------- -->

<?php 
			$menu     = "SELECT * FROM `tbl_menus`";
			$menuData = $crud->getData($menu);
	 ?>
	<section id="menu" class="mnu-section spacing container pt-5 ">
		<div >
			<h1 class="font-weight-bold text-center display-3 my-5 ">Menu</h1>
		</div>

		<div class="row">
			
			<div class="col-md-4">
				<div class="card menu-card">
				  <img src="<?php echo str_replace('../', 'admin/', $menuData[0]['IMAGE']); ?>" width="100" height="280" class="card-img-top">

				  <div class="card-body">
				    <h5><?php echo $menuData[0]['DISH_TITLE']; ?></h5>
				    <p><?php echo $menuData[0]['DISH_DESCRIPTION']; ?></p>
				    <a href="#" class="btn btn-secondary"><?php echo $menuData[0]['BTN_TEXT']; ?></a>
				  </div>
				</div>				
			</div>

			<div class="col-md-4">
				<div class="card menu-card">
				  <img src="<?php echo str_replace('../', 'admin/', $menuData[1]['IMAGE']); ?>" width="100" height="279" class="card-img-top">

				  <div class="card-body">
				    <h5><?php echo $menuData[1]['DISH_TITLE']; ?></h5>
				    <p><?php echo $menuData[1]['DISH_DESCRIPTION']; ?></p>
				    <a href="#" class="btn btn-secondary"><?php echo $menuData[1]['BTN_TEXT']; ?></a>
				  </div>
				</div>				
			</div>

			<div class="col-md-4">
				<div class="card menu-card">
				  <img src="<?php echo str_replace('../', 'admin/', $menuData[2]['IMAGE']); ?>" width="100" height="280" class="card-img-top">

				  <div class="card-body">
				    <h5><?php echo $menuData[2]['DISH_TITLE']; ?></h5>
				    <p><?php echo $menuData[2]['DISH_DESCRIPTION']; ?></p>
				    <a href="#" class="btn btn-secondary"><?php echo $menuData[2]['BTN_TEXT']; ?></a>
				  </div>
				</div>				
			</div>
		</div>
		<div class="row mt-5">


			<div class="col-md-4">
				<div class="card menu-card">
				  <img src="<?php echo str_replace('../', 'admin/', $menuData[3]['IMAGE']); ?>" class="card-img-top">
				  <div class="card-body">
				    <h5><?php echo $menuData[3]['DISH_TITLE']; ?></h5>
				    <p><?php echo $menuData[3]['DISH_DESCRIPTION']; ?></p>
				    <a href="#" class="btn btn-secondary"><?php echo $menuData[3]['BTN_TEXT']; ?></a>
				  </div>
				</div>				
			</div>

			<div class="col-md-4">
				<div class="card menu-card">
				  <img src="<?php echo str_replace('../', 'admin/', $menuData[4]['IMAGE']); ?>" class="card-img-top">
				  <div class="card-body">
				    <h5><?php echo $menuData[4]['DISH_TITLE']; ?></h5>
				    <p><?php echo $menuData[4]['DISH_DESCRIPTION']; ?></p>
				    <a href="#" class="btn btn-secondary"><?php echo $menuData[4]['BTN_TEXT']; ?></a>
				  </div>
				</div>				
			</div>

			<div class="col-md-4">
				<div class="card menu-card ">
				  <img src="<?php echo str_replace('../', 'admin/', $menuData[5]['IMAGE']); ?>" class="card-img-top">
				  <div class="card-body">
				    <h5><?php echo $menuData[5]['DISH_TITLE']; ?></h5>
				    <p><?php echo $menuData[5]['DISH_DESCRIPTION']; ?></p>
				    <a href="#" class="btn btn-secondary"><?php echo $menuData[5]['BTN_TEXT']; ?></a>
				  </div>
				</div>				
			</div>
		</div>
	</div>

	</section>


<!-- -----------------------Gallery-------------------------------------------- -->

	<?php 
			$gallery     = "SELECT * FROM `tbl_gallery`";
			$galleryData = $crud->getData($gallery);
	 ?>
	<section id="gallery" class="gallery-section spacing min-vh-100 pt-5 ">

		<div class="container">
			<div >
				<h1 class="font-weight-bold text-center display-3  ">Gallery</h1>
			</div>

			<div class="row mt-4">
			    <?php foreach ($galleryData as $key => $data) { ?>
				    <div class="col-md-4 mt-5">
				        <img src="<?php echo str_replace('../', 'admin/', $data['IMAGE']); ?>" alt="<?php echo$data['ALT_NAME'] ?>">
				    </div>
				<?php } ?>
			</div>

		</div>

	</section>         
<!-- ------------------------------------------REview----------------------------------------- -->

	<?php 
$reviews     = "SELECT * FROM `tbl_review`"; 
$reviewData = $crud->getData($reviews);
?>
<section id="reviews" class="pt-5">
  <div class="container">
    <h2 class="text-center font-weight-bold display-3 my-5">Reviews</h2>
    <div class="row g-4">

      <?php foreach ($reviewData as $review) { 
          $i = 0;
          $stars="";
          while ($i < $review['STAR_COUNT']) {
          	  $stars .='<i class="fa-solid fa-star text-warning"></i>';
              $i++;
           
          }
      ?>
        <div class="col-md-4">
          <div class="card shadow-sm rounded-3 border-0">
            <div class="card-body text-center">
              <img src="<?php echo str_replace('../', 'admin/', $review['IMAGE']); ?>"
                   alt="Reviewer" class="rounded-circle mb-3" width="100" height="100">
              <h5 class="mb-1"><?php echo $review['NAME']; ?></h5>
              <p class="mb-2">
                <?php echo $review['REVIEW']; ?>
              </p>
              <p class="text-muted small">
                <?php echo $stars; ?>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</section>

</-----------------------------CONTACT -------------------------------->

             <?php 
			$contact    = "SELECT * FROM `tbl_contact`";
			$contactData = $crud->getData($contact);
	         ?>
	<section id="contact" class="spacing">
		<div class="container">
			<h2 class="text-center font-weight-bold display-3 my-5">Contact us</h2>
			<div class="row">				
				<div class="col-md-6">
					<div class="card">
						<div class="card-header ">
							<h5>Leave a Message</h5>
						</div>
						<div class="card-body">
							<form action="#">
								<div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Fullname" required>
								</div>
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Email" required>
								</div>
								<div class="form-group">
									<input type="tel" name="number" class="form-control" placeholder="Phone number" required>
								</div>
								<textarea class="form-control">comments</textarea>
								<button class="btn btn-secondary mt-3" type="button">Send message</button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<h5>Reach us at</h5>

							<div class="d-flex mt-5"> 
								<i class="bi bi-geo-alt mr-3"></i>
								<p><?php echo $contactData[0]['ADDRESS']; ?></p>
							</div>

							<div class="d-flex mt-4"> 
								<i class="bi bi-telephone-inbound mr-3"></i>
								<p><?php echo $contactData[0]['PHONE_CONTACT']; ?></p>
							</div>

							<div class="d-flex mt-4"> 
								<i class="bi bi-whatsapp mr-3"></i>
								<p> <?php echo $contactData[0]['WHATSAPP_CONTACT']; ?></p>
							</div>

							<div class="d-flex mt-4 mb-4"> 
								<i class="bi bi-envelope mr-3"></i>
								<p><?php echo $contactData[0]['EMAIL']; ?></p>
							</div>

						</div>
					</div>
				</div>	
			</div>
		</div>
	</section>

	<!-- --------------------------FOOTER------------------------------------------------------------- -->
			
             <?php 
			$footer    = "SELECT * FROM `tbl_footer`";
			$footerData = $crud->getData($footer);
	         ?>
	<footer>
		<div class="row mt-5">

		</div>

		<div class="bg-dark text-white text-center py-2">
			<div class="mb-3">
			<a href="<?php echo $footerData[0]['FACEBOOK']; ?>" target=_blank><i class="bi bi-facebook mr-4"></i></a>
				<a href="<?php echo $footerData[0]['INSTA']; ?>"target=_blank><i class="bi bi-instagram mr-4"></i></a>
					<a href="<?php echo $footerData[0]['TWITTER']; ?>"target=_blank><i class="bi bi-twitter mr-4"></i></a>
						<a href="<?php echo $footerData[0]['GOOGLE']; ?>"target=_blank>	<i class="bi bi-google mr-4"></i></a>
				
				
	
			</div>
			<p>© Deepu.com. All Rights Reserved. Designed by deepika Ltd </p>
		</div>
	</footer>


</body>
</html>