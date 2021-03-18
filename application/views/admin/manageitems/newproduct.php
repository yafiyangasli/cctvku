        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?=$title?></h1>


         
         <div class="row">

        	<div class="col-lg-5">
              <?php if(validation_errors()):?>
                <div class="col-lg">
                <div class="alert alert-danger" role="alert">
                <?= validation_errors();?>
                </div>
                </div>
             <?php endif;?>
             <?= $this->session->flashdata('message');?>
            </div>
           </div>
          <div class="row">
            
            <div class="col-lg">

            <table class="table table-hover">
			  <thead class="thead-dark">
			    <tr class="text-center">
			      <th scope="col">#</th>
			      <th scope="col">Produk</th>
			      <th scope="col">Harga</th>
			      <th scope="col">Gambar</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i=1;?>
			  	<?php foreach ($produk as $pr) :?>
			    <tr class="text-center" onClick="top.location.href='<?=base_url('admin/detailProduk/').$pr['id_produk'];?>'">
			      <th scope="row"><?= $i;?></th>
			      <td><?= $pr['nama'];?></td>
			      <td><?=rupiah($pr['harga']);?></td>
			      <td><img src="<?= base_url()?>assets/images/cctv/<?=$pr['gambar'];?>" class="mr-5 ml-5" style="width: 150px"></td>
			      <td>
					<a href="<?= base_url('admin/hapusFromNewProduk/').$pr['id_produk'];?>" class="badge badge-danger">Hapus dari Produk Baru</a>
			      </td>
			    </tr>
			    <?php $i++;?>
				<?php endforeach?>
			  </tbody>
			</table>
      <?= $this->pagination->create_links();?>
			</div>
		</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->