<img src="<?=base_url('assets/images/header1.png');?>" class="img-fluid">
<div class="container my-4">
	<h2 class="text-center">New Products</h2>

	<div class="row">
  	<div class="col-12 col-sm-8 offset-sm-2 mb-5">
  		<div class="row justify-content-center">  		
  		<?php foreach($produk as $pr):?>
  		<div class="card m-4" style="width:11rem; border: none;">
		   <a href="<?=base_url('product/detailProduk/').$pr['id_produk'];?>" class="text-dark text-decoration-none"><img class="card-img-top" src="<?php echo base_url();?>assets/images/cctv/<?php echo $pr['gambar'];?>" alt="Card image"></a>
		   <div class="card-body">
		     <a href="" class="text-dark text-decoration-none"><h6 class="card-title"><?= $pr['nama']?></h6></a>
		     <p class="card-text" style="font-size: 11px;"><?=rupiah($pr['harga'])?></p>
		   </div>
		</div>
		<?php endforeach;?>
		</div>
	</div>
	</div>
</div>