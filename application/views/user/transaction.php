	<div class="col-12 col-sm-8 pt-5 pb-5 pr-4 pl-4 offset-sm-2">
		<div class="container" style="border-style: solid; border-width: 1.5px; background-color: white;">
			<h3 class="pt-2" id="my-detail">MY ORDER</h3>
			<hr class="pt-0 mt-0" style="border-color: black; border-width: 1.7px;">
			<div class="row justify-content-center">
				<div class="col-12 col-sm-8 text-center">
					<?= $this->session->flashdata('message');?>
				</div>
			</div>
			<?php foreach ($checkout as $ck):?>
				<div class="media p-2">
				  <div class="media-body">
					    <h5 class="mt-0" id="media-top"><?= $ck['waktu'];?></h5>
				  	<div class="row">
					<?php if($ck['is_upload']==0):?>
				  	<div class="col-12 col-sm-9">
					    <p id="media-content"><?=rupiah($ck['total']);?></p>
					    <p id="media-content">Please confirm your transaction before <?=$ck['deadline'];?></p>
					</div>
					<div class="col-12 col-sm-3">
						<a href="<?=base_url('user/transaction_form/').$ck['id_checkout'];?>" class="btn btn-light">Confirm now</a>
					</div>
					<?php elseif($ck['is_upload']==1):?>
					<div class="col-12 col-sm">
						<p id="media-content"><?=rupiah($ck['total']);?></p>
						<?php if($ck['no_resi']==0):?>
						<p id="media-content">Please wait untill your transaction is processed, check kindly for receipt number</p>
						<?php else:?>
						<p id="media-content">Thank you for shopping in our website, this is your receipt number <?= $ck['no_resi'];?></p>
						<?php endif;?>
					</div>
					<?php elseif($ck['is_upload']==2):?>
					<div class="col-12 col-sm">
						<p id="media-content"><?=rupiah($ck['total']);?></p>
					    <p id="media-content">Proof of transfer that you sent is wrong, please contact admin to confirm payment</p>
					</div>
					<?php endif;?>
					</div>
				  </div>
				</div>
				<hr>
			<?php endforeach;?>
		</div>
	</div>
</div>