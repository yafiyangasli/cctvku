        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?=$title?></h1>

          <div class="row mx-auto mt-5">
            <div class="col-md-5">
              <img name="gambar"  id="gambar" src="<?php echo base_url();?>assets/images/cctv/<?php echo $produk['gambar'];?>" style="width: 275px"> 
            </div>
          	<div class="col-md-5">
          		<h2 class="text-dark"><strong><?= $produk['nama'];?></strong></h2>
          		<div class="row">
          		<div class="col-sm-4">
          		<p><?=rupiah($produk['harga']);?></p>
          		</div>
          		<div class="col-sm-6">
              <p>Stok <?= $produk['stok'];?></p>
              </div>
          		</div>
          		<br>
          		<h3 class="text-dark">Deskripsi</h3>
          		<p><?=$produk['deskripsi'];?></p>
              <?php if($produk['is_new']==0):?>
          <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-8">
              <a href="<?=base_url('admin/addNewProduk/').$produk['id_produk'];?>" class="btn btn-secondary">Tambah ke Produk Terbaru</a>
            </div>
          </div>
        <?php endif;?>
          	</div>
          	
          </div>
          
            

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->