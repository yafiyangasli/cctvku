<div class="row no-gutters mt-5">
	<div class="col-12 col-sm-9 order-sm-1 pl-5 pr-5 pb-5">
		<div class="container-fluid">
		<h3 id="header-cart">Informasi Pengiriman</h3>
 		<form method="post" action="<?=base_url('user/prosesCheckout');?>" id="form">
		<div class="container-fluid mt-5" id="container-checkout-body">
			<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Nama</label>
				<div class="col-12 col-sm-8 mb-2 mt-2">
					<input type="text" class="form-control" id="name" name="name" value="<?=$nama;?>" readonly>
				</div>
			</div>
			<hr>
			<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Alamat & No. Telepon</label>
				<div class="col-12 col-sm-8 mb-2 mt-2">
					<input type="text" class="form-control" id="address" name=address value="<?=$alamat;?>" readonly>
				</div>
			</div>
			<hr>
			<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Provinsi</label>
				<div class="col-12 col-sm-8 mb-2 mt-2">
					<input type="text" class="form-control" id="provinsi" name=provinsi value="<?=$provinsi;?>" readonly>
				</div>
			</div>
			<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Harga Ongkir</label>
				<div class="col-12 col-sm-8 mb-2 mt-2">
					<input type="text" class="form-control" id="ongkir" name=ongkir value="<?=$ongkir['ongkir_jne'];?>" readonly>
				</div>
			</div>
		</div>

		<div class="col-12 col-sm-4 mt-5">
			<h4 id="header-cart">Metode Pengiriman</h4>
			<div class="row pt-3">
				<div class="col-sm-5">
				<img class="img-fluid pt-2 pb-2" src="<?=base_url('assets/images/jne.png')?>" style="max-width: 100px;">
				</div>
				<div class="col-12 col-sm-7">
					<p id="shipping-method">Regular</p>
					<p id="shipping-method">3-5 days</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-sm-7 mb-5">
				<a href="<?=base_url('user/cart');?>" class="text-dark text-decoration-none"><i class="fas fa-fw fa-arrow-left"></i> Kembali ke Keranjang</a>
			</div>
			<div class="col-12 col-sm offset-1">
				<button class="btn btn-outline-dark" id="btn-checkout">Konfirmasi Pesanan</button>
			</div>
		</div>
		</form>
		</div>
	</div>
	<div class="col-sm-3 order-sm-2 bg-light mt-5 pb-5">
		<div class="container-fluid">
			<h5 class="pt-5 pb-3">Total Pesanan</h5>
	        <div class="row">
			    <?php if($jumlahPesan!=NULL):?>
			    	<?php 
			    		$totalBarang=0;
			    		$totalBarangAkhir=0;
			    		foreach($cart as $ct):
			            $totalBarang= $ct['jumlah'];
			            $totalBarangAkhir = $totalBarangAkhir + $totalBarang;
			          endforeach;
			    	?>
	        		<div class="col-sm-5">
					<p id="order-summary-body"><?=$totalBarangAkhir;?> barang</p>
					</div>
					<?php else:?>
					<div class="col-sm">
			        <p id="order-summary-body">Keranjangmu kosong</p>
					</div>
				<?php endif;?>
				<?php if($jumlahPesan!=NULL):?>
					<div class="col-sm-7">
					<p id="order-summary-body"><?=rupiah($totalCheckout);?></p>
					</div>
				<?php endif;?>
			</div>
			<div class="row no-gutters">
			    <?php if($jumlahPesan!=NULL):?>
	        		<div class="col-sm-5">
					<p id="order-summary-body">Total Berat</p>
					</div>
				<?php endif;?>
				<?php if($jumlahPesan!=NULL):?>
					<div class="col-sm-7">
					<p id="order-summary-body"><?=$totalBerat;?> Kg</p>
					</div>
				<?php endif;?>
			</div>
			<div class="row no-gutters">
			    <?php if($jumlahPesan!=NULL):?>
	        		<div class="col-sm-5">
					<p id="order-summary-body">Total Ongkir</p>
					</div>
				<?php endif;?>
				<?php if($jumlahPesan!=NULL):?>
					<div class="col-sm-7">
					<p id="order-summary-body"><?=rupiah($ongkir['ongkir_jne']*$totalBerat);?></p>
					</div>
				<?php endif;?>
			</div>
			<div class="row pt-3">
			    <?php if($jumlahPesan!=NULL):?>
	        		<div class="col-sm-5">
					<h5>Total Cost</h5>
					</div>
					<div class="col-sm-7">
					<p id="order-summary-body"><?=rupiah($total);?></p>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
