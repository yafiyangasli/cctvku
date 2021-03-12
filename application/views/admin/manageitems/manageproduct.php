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
        	

            <a href="" class="btn btn-dark" data-toggle="modal" data-target="#newProductModal">Input New Product</a>

            <h5 class="mt-3 mb-3">Your Product</h5>

            <table class="table table-hover">
			  <thead class="thead-dark">
			    <tr class="text-center">
			      <th scope="col">#</th>
			      <th scope="col">Product</th>
			      <th scope="col">Price</th>
			      <th scope="col">Image</th>
			      <th scope="col">Action</th>
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
					<a href="<?=base_url('admin/editProduk/').$pr['id_produk'];?>" class="badge badge-success">Edit</a>
					<a href="<?=base_url('admin/hapusProduk/').$pr['id_produk'];?>" class="badge badge-danger">Delete</a>
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

      	<!-- Modal -->
<div class="modal fade" id="newProductModal" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRoleModalLabel">Add new product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/manageproduct');?>" method="post" enctype="multipart/form-data">
      <div class="modal-body">
      	<div class="form-group">
		    <input type="text" class="form-control" name="id_produk" id="id_produk" placeholder="Product id..">
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" name="produk" id="produk" placeholder="Product name..">
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" name="harga" id="harga" placeholder="Product price.. (ex: 1000)">
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" name="stok" id="stok" placeholder="Product stock..">
		  </div>
      <div class="form-group">
        <input type="text" class="form-control" name="berat" id="berat" placeholder="Product weight in Kg.. (ex: 0.25)">
      </div>
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="image" name="image">
            <label class="custom-file-label" for="image">Choose Image</label>
          </div>
		  <div class="form-group">
		    <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Product description.." rows="3"></textarea>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>

