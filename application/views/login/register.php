<div class="row no-gutters my-5" id="regis">
  	<div class="col-10 col-lg-4 offset-1 offset-lg-4">
  		<div class="container-fluid">
  		<h3 id="headRegis">Register</h3>
	  		<form class="p-auto" method="post" action="<?=base_url('login/register')?>">
			  <div class="form-row pt-3">
			    <div class="form-group col-md-6">
			      <label for="username">Username</label>
			      <input type="text" class="form-control" id="username" name="username" value="<?=set_value('username')?>">
			      <?=form_error('username','<small class="text-danger pl-3">','</small>');?>
			    </div>
			    <div class="form-group col-md-6">
			      <label for="email">Email</label>
			      <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email')?>">
			      <?=form_error('email','<small class="text-danger pl-3">','</small>');?>
			    </div>
			  </div>
			  <div class="form-row pt-3">
			    <div class="form-group col-md-6">
			      <label for="password1">Password</label>
			      <input type="password" class="form-control" id="password1" name="password1">
			      <?=form_error('password1','<small class="text-danger pl-3">','</small>');?>
			    </div>
			    <div class="form-group col-md-6">
			      <label for="password2">Re-Enter Password</label>
			      <input type="password" class="form-control" id="password2" name="password2">
			      <?=form_error('password2','<small class="text-danger pl-3">','</small>');?>
			    </div>
			  </div>
			  <div class="row justify-content-center my-2">
			  	<button type="submit" class="btn btn-dark">Buat Akun</button>
			  </div>
			</form>
		</div>
  	</div> 	
</div>