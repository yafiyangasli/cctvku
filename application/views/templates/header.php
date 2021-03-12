<!DOCTYPE html>
<html>
<head>
	<title>Adinaya CCTV</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/8f37dd1c37.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/style.css')?>">

	<style>
  
	 @font-face /*perintah untuk memanggil font eksternal*/
	  {
	    font-family: 'Montserrat-bold'; /*memberikan nama bebas untuk font*/
	    src: url('<?=base_url('assets/font/');?>/Montserrat-Bold.otf');/*memanggil file font eksternalnya di folder montserrat*/

	    }
	 @font-face /*perintah untuk memanggil font eksternal*/
	  {
	    font-family: 'Montserrat-regular'; /*memberikan nama bebas untuk font*/
	    src: url('<?=base_url('assets/font/');?>/Montserrat-Regular.otf');/*memanggil file font eksternalnya di folder montserrat*/
	    
	    }
	  @font-face /*perintah untuk memanggil font eksternal*/
	  {
	    font-family: 'Montserrat-extra-bold'; /*memberikan nama bebas untuk font*/
	    src: url('<?=base_url('assets/font/');?>/Montserrat-ExtraBold.otf');/*memanggil file font eksternalnya di folder montserrat*/
	  }

	  @font-face /*perintah untuk memanggil font eksternal*/
	  {
	    font-family: 'Montserrat-medium'; /*memberikan nama bebas untuk font*/
	    src: url('<?=base_url('assets/font/');?>/Montserrat-Medium.otf');/*memanggil file font eksternalnya di folder montserrat*/
	    
	    }

	  @font-face /*perintah untuk memanggil font eksternal*/
	  {
	    font-family: 'Montserrat-semibold'; /*memberikan nama bebas untuk font*/
	    src: url('<?=base_url('assets/font/');?>/Montserrat-SemiBold.otf');/*memanggil file font eksternalnya di folder montserrat*/

	    }

	</style>
</head>
<body style="font-family: 'Montserrat-Regular';">
	<div class="row no-gutters py-2" style="background-color: #6b6a6a">
		<div class="col-12">
			<form class="form-inline" style="float: right" method="post" action="">
		      <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
		      <button class="btn btn-outline-light" type="submit"><i class="fas fa-fw fa-search"></i></button>
		    </form>
		</div>
	</div>
	
	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="<?=base_url('home');?>" style="font-family: 'Montserrat-SemiBold'"><img src="<?= base_url('assets/logo/logocctv.jpg');?>" style="width: 8rem;"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mx-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="<?=base_url('home');?>" style="font-family: 'Montserrat-semibold';">HOME</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="<?=base_url('product');?>" style="font-family: 'Montserrat-semibold';">PRODUCT</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="<?=base_url('about');?>" style="font-family: 'Montserrat-semibold';">ABOUT US</a>
	      </li>
	    </ul>
	    <ul class="navbar-nav">
	    <?php if($this->session->userdata('username')==NULL):?>
	      	<li class="nav-item active mr-3">
	        	<a href="<?=base_url('login');?>" style="text-decoration: none;" class="text-dark">Login <i class="far fa-fw fa-user"></i></a>
	      	</li>
	     <?php else:?>
	     	<li class="nav-item active mr-3">
	        	<a href="<?=base_url('user/transaction');?>" style="text-decoration: none;" class="btn btn-light mr-3"><i class="fas fa-fw fa-exchange-alt"></i> <span class="badge badge-danger"><?=$jumlahTrans?></span></a>
	      	</li>
	     	<li class="nav-item active mr-3">
	        	<a href="<?=base_url('user/cart');?>" style="text-decoration: none;" class="btn btn-light mr-3"><i class="fas fa-fw fa-shopping-cart"></i> <span class="badge badge-danger"><?=$jumlahCart;?></span></a>
	      	</li>
	     	<li class="nav-item active mr-3">
	        	<a href="<?=base_url('login/logout');?>" style="text-decoration: none;" class="nav-link text-dark">Logout <i class="fas fa-fw fa-sign-out-alt"></i></a>
	      	</li>
	      <?php endif;?>
	    </ul>
	  </div>
	</nav>
	<!-- end of navbar -->