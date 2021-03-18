<div class="container my-5">
	<h1 class="text-center" style="font-family: 'Montserrat-semibold';"><?=$dproduk['nama'];?></h1>

	<div class="row no-gutters my-3">
		<div class="col-10 col-lg-4 offset-1 offset-lg-1">
			<img src="<?=base_url('assets/images/cctv/').$dproduk['gambar'];?>" class="img-fluid">
		</div>
		<div class="col-10 col-lg-5 offset-1 offset-lg-2">
			<form method="post" action="<?=base_url('user/addToCart/').$dproduk['id_produk'];?>">
			<h3 class="mb-5"><?=rupiah($dproduk['harga'])?></h3>
			<div class="form-group col-5 col-lg-4">
                <h4><label for="qty">Jumlah</label></h4>
                <select class="custom-select" name="jumlah" id="jumlah">
                	<option> </option>
                	<?php 
                	for ($i=1; $i <= $dproduk['stok'] ; $i++):?> 
                		<option value="<?=$i;?>"><?= $i;?></option>
                	<?php endfor;?>
                </select>
            </div>
            <button class="btn btn-light col-6 col-lg-6 offset-3 offset-lg-3 mt-4">Tambah ke Keranjang <i class="fas fa-fw fa-shopping-cart"></i></button>
        </form>
		</div>
        <h5 style="font-family: 'Montserrat-semibold';">Deskripsi Produk</h5>
        <p><?= $dproduk['deskripsi'];?></p>
	</div>
</div>