<?php
include("header.php");

$wallets = $this->model->getWallets($this->user_id);
?>

  <!-- Modal Basic -->
        <div class="modal fade modalbox" id="ModalBasic" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Wallet</h5>
                        <a href="javascript:;" data-bs-dismiss="modal">Close</a>
                    </div>
                    <div class="modal-body">
                    <ul class="listview flush transparent simple-listview" id="loading" style="display:none; visibility:hidden;">
                    <li>
                        <strong>Creating wallet....</strong>
                        <div class="spinner-border text-primary" role="status"></div>
                    </li>
                    </ul>
                        <form id="create" action="<?php echo BASE_URL; ?>AppUser/processCreateWallet" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $this->user_id; ?>" />
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="select4b">Currency</label>
                                <select class="form-control custom-select" id="select4b" name="currency">
                                    <option value="BNB">BNB</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="blockchain" value="binance_smart_chain" />
                        <input type="hidden" value="" id="done" />
                          <div class="section mt-2 mb-2">
            <button type="submit" id="createWallet" class="btn btn-primary btn-block btn-lg">Create</button>
        </div>

                  
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Modal Basic -->

    <!-- App Header -->
    
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule" class="col-lg-6 mx-auto">

        <!-- Transactions -->
        <?php
		if($wallets==NULL){
		?>
             <div class="section mt-2">
             
            <div class="transactions">
                <!-- item -->
                    <div class="detail">
                       <strong>You don't have any wallet yet. Click create below to create one!</strong>
                    </div>
     
                <!-- * item -->
             
            </div>
        </div>
        <?php
		}
		else {
		?>
        <div class="section mt-2">
            <div class="section-title">Your wallets</div>
            <?php
			foreach($wallets as $key => $value){
			
			$tokenID = "";
			
			$wallet_id = $value['id'];

$tokens = $this->model->getTokens($wallet_id);
			
			$theCurrency = $value['currency'];
			
			if($theCurrency=="USD"){
			
			  $tokens = $this->model->getTokens($value['id']);
			  
			  foreach($tokens as $keyToken => $valueToken){
			  
			    $tokenID = $valueToken['id'];
  
			  }
			
			}
			?>
         <!-- Tokns -->
        <?php
		if($tokens==NULL){
	
		}
		else {
		?>
   
                <?php
			foreach($tokens as $key => $value){
			?>
            <div class="transactions">
                <!-- item -->
                <a href="<?php echo BASE_URL; ?>AppUser/wallet/<?php echo $value['id']; ?>" class="item">
                    <div class="detail">
                        <img src="<?php echo BASE_URL.USER_THEME; ?>assets/img/coins/<?php echo $value['token_symbol']; ?>.png" alt="img" class="image-block imaged w48">
                        <div>
                            <strong><?php echo $value['token_symbol']; ?></strong>
                            <p><?php echo $value['token_name']; ?></p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="price"><span id="balance"></span></div>
                    </div>
                </a>
                <!-- * item -->
             
            </div>
            <br />
            <?php
			}
			
		}
		}
		?>
        <!--end tokns-->
        
        
        <?php
		}
		
		?>
        </div>
        <!-- * Transactions -->
        <?php

		if($wallets->num_rows<2){
		?>
        <div class="section mt-2 mb-2">
            <a href="component-modal-and-panels.html#" data-bs-toggle="modal" data-bs-target="#ModalBasic" class="btn btn-primary btn-block btn-lg">Create Wallet</a>
        </div>
<?php
}
?>

    </div>
    <!-- * App Capsule -->


<?php
include("footer.php");
?>