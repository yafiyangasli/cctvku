        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?=$title?></h1>

          <div class="col-12 col-sm-4">
            <?= $this->session->flashdata('message');?>
          </div>

          <div class="row mx-auto mt-5">
            <div class="col-md-5">
              <img name="gambar"  id="gambar" src="<?= base_url('assets/images/buktitrans/').$bukti['bukti_trans'];?>" style="width: 275px">
            </div>

            <div class="col-md-5">
              <h2 class="text-dark mb-5"><strong><?= $bukti['id_bukti'];?></strong></h2>
              <div class="row mb-4">
                <div class="col-md-5">
                  <h5><?=$bukti['username']?></h5>
                </div>
                <div class="col-md-6">
                  <h5><?=$bukti['tanggal_trans']?></h5>
                </div>
              </div>
              <p><?=rupiah($bukti['total']);?></p>
              <p><?=$bukti['nama_akun'];?></p>
              <div class="row">
                <div class="col-md-2">
                  <p><?=$bukti['bank'];?></p>
                </div>
                <div class="col-md-3">
                  <p><?=$bukti['nomor_akun']?></p>
                </div>
              </div>
              <?php if ($bukti['is_processed']==0):?>
              <a href="<?= base_url('admin/confirmPayment/').$bukti['id_bukti'];?>" class="btn btn-dark">Konfirmasi Pembayaran</a>
              <a href="<?= base_url('admin/cancelPayment/').$bukti['id_bukti'];?>" class="btn btn-danger ml-3">Batalkan Pembayaran</a>
              <?php elseif ($bukti['is_processed']==1):?>
              <form method="post" action="<?= base_url('admin/confirmProcessingOrder/').$bukti['id_bukti'];?>">
                <div class="row justify-content-center mb-4">
                <input class="form-control col-sm-8" type="text" name="resi" id="resi" placeholder="Input receipt number here">
                </div>
                <div class="row justify-content-center">
                <button class="btn btn-dark" type="submit">Proses Pesanan</button>
                </div>
              </form>
              <?php elseif ($bukti['is_processed']==2):?>
                <a href="<?= base_url('admin/confirmPayment/').$bukti['id_bukti'];?>" class="btn btn-dark">Konfirmasi Pembayaran</a>
                <a href="<?= base_url('admin/deletePayment/').$bukti['id_bukti'];?>" class="btn btn-danger ml-3">Hapus</a>
            <?php endif;?>
            </div>            

          </div>

          <div class="col-lg">

            <h5 class="mx-auto mt-5">Detail Alamat</h5>

            <table class="table">
        <thead class="thead-dark">
          <tr class="text-center">
            <th scope="col">Nama</th>
            <th scope="col">Alamat & Telepon</th>
            <th scope="col">Provinsi</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td><?=$checkout['nama'];?></td>
            <td><?=$checkout['address'];?></td>
            <td id="provinsi"><?=$checkout['provinsi'];?></td>
          </tr>
        </tbody>
      </table>
      </div>

          <div class="col-lg">

            <h5 class="mx-auto mt-5">Detail Pesanan</h5>

            <table class="table table-hover">
        <thead class="thead-dark">
          <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Gambar</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1;?>
          <?php foreach ($order as $or) :?>
          <?php foreach($produk as $pr):?>
          <?php if($or['id_produk']==$pr['id_produk']):?>
          <tr class="text-center" onClick="top.location.href='<?=base_url('admin/detailProduk/').$pr['id_produk'];?>'">
            <th scope="row"><?= $i;?></th>
            <td><?=$pr['nama'];?></td>
            <td><?=rupiah($pr['harga']);?></td>
            <td><?=$or['jumlah'];?></td>
            <td><img src="<?= base_url()?>assets/images/cctv/<?=$pr['gambar'];?>" class="mr-5 ml-5" style="width: 150px"></td>
          </tr>
          <?php $i++;?>
        <?php endif;?>
        <?php endforeach?>
        <?php endforeach?>
        </tbody>
      </table>
      </div>
    </div>
    </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->