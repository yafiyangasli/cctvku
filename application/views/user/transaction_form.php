<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/user.css');?>"media="all"/>
	<div class="col-12 col-sm-8 pt-5 pb-5 pr-4 pl-4 offset-sm-2">
		<div class="container-fluid" style="border-style: solid; border-width: 1.5px; background-color: white;">
			<h3 class="pt-2" id="my-detail">CONFIRM YOUR TRANSACTION</h3>
			<hr class="pt-0 mt-0" style="border-color: black; border-width: 1.7px;">
			<div class="row justify-content-center">
				<div class="col-12 col-sm-6 text-center">
					<?= $this->session->flashdata('message');?>
				</div>
			</div>
			<h5 id="transaction-form-top">CCTVKU Bank Account</h5>
			<p id="transaction-form-accnum">012-9387-58312</p>
			<div id="transaction-form-body">
				<p>Please confirm your transaction before...</p>
				<p id="timer"></p>
				<div class="row justify-content-center">
				<div class="col-12 col-sm-8">
					<form method="post" action="" enctype="multipart/form-data">
					        <div class="form-group col-padding-5">
					          <div class="row">
					                <div class="col-md-4">
					                  <label>Account Name</label>            
					                </div>
					                <div class="col-md-7">            
					                  <input type="text" class="form-control" id="namaAkun" name="namaAkun" value="<?=set_value('namaAkun')?>" />
					                  <?=form_error('namaAkun','<small class="text-danger pl-3">','</small>');?>
					                </div>
					              </div>
					              </div>

					        <div class="form-group col-padding-5">
					          <div class="row">
					                <div class="col-md-4">
					                  <label>Account Number</label>            
					                </div>
					                <div class="col-md-7">            
					                  <input type="text" class="form-control" id="nomorAkun" name="nomorAkun" value="<?=set_value('nomorAkun')?>" />
					                  <?=form_error('nomorAkun','<small class="text-danger pl-3">','</small>');?>
					                </div>
					              </div>
					        </div>
					        <div class="form-group col-padding-5">
					          <div class="row">
					                <div class="col-md-4">
					                  <label>Bank Transfer From</label>            
					                </div>
					                <div class="col-md-7">            
					                  <input type="text" class="form-control" id="namaBank" name="namaBank" value="<?=set_value('namaBank')?>" />
					                  <?=form_error('namaBank','<small class="text-danger pl-3">','</small>');?>
					                </div>
					              </div>
					        </div>

					        <div class="form-group col-padding-5">
					          <div class="row">
					                <div class="col-md-4">
					                  <label>Amount</label>            
					                </div>
					                <div class="col-md-7">          
					                  <input type="text"  value="<?=rupiah($checkout['total']);?>" class="form-control" id="amount" name="amount" disabled/>
					                </div>
					              </div>
					        </div>

					        <div class="form-group col-padding-5">
					          <div class="row">
					                <div class="col-md-4">
					                  <label>Transfer Date</label>            
					                </div>
					                <div class="col-md-7">            
					                  <input type="text" class="form-control" id="transferdate" name="transferdate" value="<?=set_value('transferdate')?>" />
					                  <?=form_error('transferdate','<small class="text-danger pl-3">','</small>');?>
					                </div>
					              </div>
					        </div>
					        <div class="form-group col-padding-5">
					          <div class="row">
					                <div class="col-md-4">
					                  <label>Transfer Receipt</label>            
					                </div>
					                <div class="col-md-7">            
					                  <div class="custom-file">
					                  <input type="file" class="custom-file-input" id="image" name="image">
					                  <label class="custom-file-label" for="image">Choose File</label>
					                </div>
					                </div>
					              </div>
					        </div>
					    <div class="row justify-content-center pt-3">
					    <button type="submit" class="btn btn-dark" value="Input">Input</button>
						</div>
					</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
  
// Set the date we're counting down to
var countDownDate = new Date("<?= $checkout['deadline'];?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("timer").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "EXPIRED";
  }
}, 1000);

	$('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
