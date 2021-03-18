<div class="container">
    
    <div class="row no-gutters mt-5">
      <div class="col-12 col-sm-6 offset-sm-3 w3-animate-left">
        <h1 class="text-center mb-5" id="header-cp">Hubungi Kami</h1>

        <!-- <div class="row no-gutters mb-3">
          <div class="col-2 col-sm-3">
            <i class="fab fa-fw fa-whatsapp text-success" id="ic-whatsapp"></i>
          </div>
          <div class="col-7 col-sm pl-2" id="no-whatsapp">+6289503924256</div>
        </div>

        <div class="row no-gutters mb-3">
          <div class="col-2 col-sm-3">
            <i class="far fa-fw fa-envelope text-danger" id="ic-whatsapp"></i>
          </div>
          <div class="col-7 col-sm pl-2" id="no-whatsapp">email@gmail.com</div>
        </div> -->

      </div>
    </div>

    <div class="row no-gutters mt-3 mb-5">
      <div class="col-10 col-sm-6 offset-1 offset-sm-3 w3-animate-left">
        <div class="container-fluid" style="border-style: solid; border-width: 1.5px; background-color: white; border-radius: 5px;">
          <h3 class="text-center my-4" style="font-family: 'Montserrat-medium';">Kirim email secara langsung</h3>
          <form class="mb-3 px-5" method="post" action="">
          <?= $this->session->flashdata('message');?>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email..." value="<?=set_value('email');?>">
              <?=form_error('email','<small class="text-danger pl-1">','</small>');?>
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama..." value="<?=set_value('nama');?>">
              <?=form_error('nama','<small class="text-danger pl-1">','</small>');?>
            </div>
            <div class="form-group">
              <label for="subjek">Subjek</label>
              <input type="text" class="form-control" id="subjek" name="subjek" placeholder="Subjek email..." value="<?=set_value('subjek');?>">
              <?=form_error('subjek','<small class="text-danger pl-1">','</small>');?>
            </div>
            <div class="form-group">
              <label for="pesan">Pesan</label>
              <textarea class="form-control" id="pesan" name="pesan" rows="3"><?=set_value('pesan');?></textarea>
              <?=form_error('pesan','<small class="text-danger pl-1">','</small>');?>
            </div>
            
            <button type="submit" class="btn btn-secondary col-6 col-sm-2 offset-3 offset-sm-5 my-4">Kirim</button>
            
          </form>
        </div>
      </div>
    </div>

  </div>
