        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?=$title?></h1>

            <div class="row">

            	<div class="col-lg-8">
            		
            		<?= form_open_multipart('admin/editProduk/'.$produk['id_produk']);?>
            			
            		<div class="form-group row">
				    <label for="id_produk" class="col-sm-2 col-form-label">Product ID</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?=$produk['id_produk'];?>">
				    </div>
				  </div>

				  <div class="form-group row">
				    <label for="produk" class="col-sm-2 col-form-label">Product Name</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="produk" name="produk" value="<?= $produk['nama'];?>">
				      <?=form_error('produk','<small class="text-danger pl-3">','</small>');?>
				    </div>
				  </div>

				  <div class="form-group row">
				    <label for="harga" class="col-sm-2 col-form-label">Price</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="harga" name="harga" value="<?= $produk['harga'];?>">
				      <?=form_error('harga','<small class="text-danger pl-3">','</small>');?>
				    </div>
				  </div>

				  <div class="form-group row">
				    <label for="harga" class="col-sm-2 col-form-label">Stock</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="stok" name="stok" value="<?= $produk['stok'];?>">
				      <?=form_error('stok','<small class="text-danger pl-3">','</small>');?>
				    </div>
				  </div>

				  <div class="form-group row">
				    <label for="berat" class="col-sm-2 col-form-label">Weight</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="berat" name="berat" value="<?= $produk['berat'];?>">
				      <?=form_error('berat','<small class="text-danger pl-3">','</small>');?>
				    </div>
				  </div>

				  <div class="form-group row">
				    <div class="col-sm-2">
				    	Gambar
				    </div>
				    <div class="col-sm-10">
				    	<div class="row">
				    		<div class="col-sm-3">
				    		<img src="<?= base_url('assets/images/cctv/').$produk['gambar'];?>" class="img-thumbnail"> 
				    		</div>
				    		<div class="col-sm-9">
				    			<div class="custom-file">
								  <input type="file" class="custom-file-input" id="image" name="image">
								  <label class="custom-file-label" for="image">Choose File</label>
								</div>
				    		</div>
				    	</div>
				    </div>
				    </div>

				  <div class="form-group row">
				    <label for="deskripsi" class="col-sm-2 col-form-label">Description</label>
				    <div class="col-sm-10">
				      <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $produk['deskripsi'];?></textarea>
				      <?=form_error('deskripsi','<small class="text-danger pl-3">','</small>');?>
				    </div>
				  </div>

				    <div class="form group row justify-content-end">
				    	<div class="col-sm-10">
				    		<button type="submit" class="btn btn-primary">Edit</button>
				    	</div>
				    </div>

            		</form>

            	</div>
            	

            </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      