<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/product.css');?>"media="all"/>
<div class="container-fluid mt-5">
	<div class="row no-gutters">
	<div class="col-md-3">
	<div class="mr-3 p-3"id="sidebar-catalogue">
		<h5>Filter</h5>
		<hr>
		<h6 class="my-auto pb-3">Tipe Prouk</h6>
		<div class="form-group">
			<div class="form-check ml-3">
				<input class="form-check-input" type="checkbox" data-jenis="" checked="checked">
			      <label class="form-check-label" for="jenis" style="font-size: 14px">
			        All
			      </label>
			</div>
		</div>
		<form method="post" action="<?=base_url('product/filterBaru');?>">
		<h6 class="my-auto pb-3">Harga</h6>
		<div class="form-row align-items-center">
			<div class="col-lg-5">
			<div class="input-group">
			<div class="input-group-prepend">
				<div class="input-group-text bg-white pl-1" style="border-right: 0px; font-size: 11px; height: 35px; width: 25px; text-align: center;">Rp.</div>
	        	</div>
		      	<input type="number" class="form-control mb-2" id="min" name="min" placeholder="Minimum..">
		    </div>
		    </div>
		    <div class="col-md-1">
				<hr size="5px" width="100%">
			</div>
			<div class="col-lg-6">
			<div class="input-group">
				<div class="input-group-prepend">
				<div class="input-group-text bg-white pl-1" style="border-right: 0px; font-size: 11px; height: 35px; width: 25px; text-align: center;">Rp.</div>
	        	</div>
		      	<input type="number" class="form-control mb-2" id="max" name="max" placeholder="Maximum..">
		    </div>
		    </div>
		</div>
		<div class="row justify-content-center mt-3">
			<button type="submit" class="btn btn-dark">Cek</button>
		</div>
		</form>
		</div>
	</div>
	<div class="col-12 col-md-9 col-lg-9" id="list-produk">
		<h4 class="mt-3" style="font-family: 'Montserrat-bold'">Produk Kami</h4>
		<?php if($this->session->userdata('search')!=NULL):?>
		<p style="font-family: 'Montserrat-regular'; font-size: 12px;">Menampilkan hasil dari "<?=$this->session->userdata('search');?>"</p>
		<?php endif;?>
		<hr>
		<div class="row">
		<div class="col-10 col-sm-10 offset-2 offset-sm-1">
		<div class="row">
		<?php $a=1;?>
		<?php foreach($produk as $pr):
		if($pr['stok'] > 0):?>
  		<div class="card m-3 mr-5" style="width:13rem; border: none;">
		<a href="<?=base_url('product/detailProduk/').$pr['id_produk'];?>" class="text-dark text-decoration-none">
		   <img class="card-img-top" src="<?php echo base_url();?>assets/images/cctv/<?php echo $pr['gambar'];?>" alt="Card image">
		</a>
		   <div class="card-body">
		   	<div class="row">
		   		<div class="col-9 col-lg-9">
		   			<a href="<?=base_url('product/detailProduk/').$pr['id_produk'];?>" class="text-dark text-decoration-none">
		     		<h6 class="card-title"><?= $pr['nama']?></h6>
		     		</a>
		     	</div>
		    </div>
		     <p class="card-text" style="font-size: 11px;"><?=rupiah($pr['harga'])?></p>
		   </div>
		</div>
		<?php else:?>
		<div class="card m-3 mr-5" style="width:13rem; border: none;">
		<div id="img-outofstock">
		   <img class="card-img-top" id="img-card-catalogue" src="<?php echo base_url();?>assets/images/cctv/<?php echo $pr['gambar'];?>" alt="Card image">
		   <div class="centered text-secondary">Habis</div>
		</div>
		   <div class="card-body">
		   	<div class="row">
		   		<div class="col-9 col-lg-9">
		     		<h6 class="card-title"><?= $pr['nama']?></h6>
		     	</div>
		    </div>
		     <p class="card-text" style="font-size: 11px;"><?=rupiah($pr['harga'])?></p>
		   </div>
		</div>
		<?php endif;?>
		<?php $a=$a+1;?>
		<?php endforeach;?>
		</div>
		</div>
		</div>
		<?= $this->pagination->create_links();?>
	</div>
	</div>
</div>

<div class="d-none d-sm-none d-md-none d-lg-block" style="height: 100px;">
  <p style="height: 100%; display: block;"></p>
</div>