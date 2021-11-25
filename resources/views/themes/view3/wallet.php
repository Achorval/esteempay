<?php
include("header.php");

$wallet_data = $this->walletData;

foreach($wallet_data as $key => $value){

$token_symbol = $value['token_symbol'];

$balance = $value['balance'];

$wallet_id = $value['wallet_id'];

$contract_address = $value['contract_address'];

$wallet_address = $this->model->viewWalletAddress($wallet_id);

$wallet_address1 = $this->model->viewPrivateKey($wallet_id);
}


$transaction_id = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);

$transactions = $this->model->getTransactions($_SESSION['UserID']);
?>

        <input type="hidden" id="transaction_ref" name="transaction_ref" value="<?php echo $transaction_id; ?>" />
   
    
    <div class="modal fade modalbox" id="DepositUSD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            
                <div class="modal-content">
                       <div class="modal-header">
                        <h5 class="modal-title">Deposit <?php echo $token_symbol; ?></h5>
                <a href="javascript:;" class="btn btn-primary btn-block btn-sm" data-bs-dismiss="modal" style="width:100px;">Close</a>
                    </div>
                <div class="pt-3 text-center">
                
                    </div>
                    
                    <div class="modal-body">
                    
                    <div class="col-lg-6 mx-auto">
                    <form id="create1"  method="post">
                        <input type="hidden" name="user_id" value="<?php echo $this->user_id; ?>" />
                        <b>Deposit <?php echo $token_symbol; ?></b>
                     
                        
                         <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Deposit From</label>
                                <select class="form-control" id="deposit_channel" name="deposit_channel">
                                 <option value="">Choose deposit option</option>
                                   <option>USDT</option>
                                   <option disabled="disabled">Credit/Debit Card</option>
                                </select>
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Deposit Amount</label>
                                <input type="text"  class="form-control" id="deposit_usd_amount" name="deposit_usd_amount" >
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                       
                          <div class="section mt-2 mb-2">
            <button type="button" id="depositUsdBtn" class="btn btn-primary btn-block btn-lg">Confirm Deposit</button>
        </div>

                  
                    </form>
                    </div>
                    
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="component-dialog.html#" class="btn" data-bs-dismiss="modal">CLOSE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="modal fade modalbox" id="WithdrawUSD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            
                <div class="modal-content">
                       <div class="modal-header">
                        <h5 class="modal-title">Withdraw <?php echo $token_symbol; ?></h5>
                <a href="javascript:;" class="btn btn-primary btn-block btn-sm" data-bs-dismiss="modal" style="width:100px;">Close</a>
                    </div>
                <div class="pt-3 text-center">
                
                    </div>
                    
                    <div class="modal-body">
                    
                    <div class="col-lg-6 mx-auto">
                    <form id="create2"  method="post">
                        <input type="hidden" name="user_id" value="<?php echo $this->user_id; ?>" />
                        <b> <?php echo $token_symbol; ?></b>
                     
                            <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Amount</label>
                                <input type="text"  class="form-control" id="withdrawal_usd_amount" name="withdrawal_usd_amount" >
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        
                         <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Withdraw To</label>
                                <select class="form-control" id="withdrawal_channel" name="withdrawal_channel">
                                 <option value="">Choose withdrawal option</option>
                                   <option>USDT</option>
                                   <option disabled="disabled">Paypal (Coming soon...)</option>
                                   <option disabled="disabled">Payoneer (Coming soon...)</option>
                                   <option disabled="disabled">Bank (Coming soon...)</option>
                                </select>
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Withdrawal Fee</label>
                                <input type="text"  class="form-control" value="$0.5" readonly="readonly">
                                <input  id="withdrawal_fee" name="withdrawal_fee" type="hidden" value="0.5" />
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                       
                          <div class="section mt-2 mb-2">
            <button type="button" id="withdrawUsdBtn" class="btn btn-primary btn-block btn-lg">Withdraw</button>
        </div>

                  
                    </form>
                    </div>
                    
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="component-dialog.html#" class="btn" data-bs-dismiss="modal">CLOSE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <div class="modal fade modalbox" id="ModalBasic" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Withdraw</h5>
                        <a href="javascript:;" class="btn btn-primary btn-block btn-sm" data-bs-dismiss="modal" style="width:100px;">Close</a>
                    </div>
                    <div class="modal-body">
                    <div class="col-lg-6 mx-auto">
                    <ul class="listview flush transparent simple-listview" id="loading" style="display:none; visibility:hidden;">
                    <li>
                        <strong>Creating wallet....</strong>
                        <div class="spinner-border text-primary" role="status"></div>
                    </li>
                    </ul>
                        <form id="create3"  method="post">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['UserID']; ?>" />
                        <b>Withdraw <?php echo $token_symbol; ?></b>
                        <p>Note: You can only withdraw to a BEP20 address</p>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Withdrawal Address</label>
                                <input type="text" class="form-control" id="withdrawal_address" name="withdrawal_address" placeholder="Withdrawal Address">
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        
                           <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Withdrawal Address</label>
                                <input type="text" class="form-control" id="withdrawal_amount" name="withdrawal_amount" placeholder="Withdrawal Amount">
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Gas Limit</label>
                                <input type="text" class="form-control" id="gas_limit" name="gas_limit" placeholder="Gas Limit">
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        
                        <input type="hidden" name="blockchain" value="binance_smart_chain" />
                        <input type="hidden" value="" id="done" />
                          <div class="section mt-2 mb-2">
                          <?php
						  if($token_symbol=="BNB"){
						  ?>
            <button type="button" id="createTransactionBNB" class="btn btn-primary btn-block btn-lg">Withdraw</button>
            <?php
			}
			else if($token_symbol=="USD"){
						  ?>
            <button type="button" id="createTransaction" class="btn btn-primary btn-block btn-lg">Withdraw</button>
            <?php
			}
			else{
						  ?>
            <button type="button" id="createTransaction" class="btn btn-primary btn-block btn-lg">Withdraw</button>
            <?php
			}
			?>
        </div>

                  
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- App Capsule -->
    <div id="appCapsule">
    
    <div id="toast-4" class="toast-box toast-top" style="z-index:1100;">
            <div class="in">
                <div class="text">
                 Copied to clipboard
                </div>
            </div>
        </div>
        
            <div id="toastError" class="toast-box toast-top " style="background:#FF396F; z-index:1100;">
            <div class="in ">
                <div class="text ">
                </div>
            </div>
        </div>
        
        <div class="modal fade modalbox" id="DialogIconedInfo1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            
                <div class="modal-content">
                       <div class="modal-header">
                        <h5 class="modal-title">Confirm Withdrawal</h5>
                <a href="javascript:;" class="btn btn-primary btn-block btn-sm" data-bs-dismiss="modal" style="width:100px;">Close</a>
                    </div>
                <div class="pt-3 text-center">
                
                    </div>
                    
                    <div class="modal-body">
                    
                    <div class="col-lg-6 mx-auto">
                    <form id="create"  method="post">
                        <input type="hidden" name="user_id" value="<?php echo $this->user_id; ?>" />
                        <b>Withdraw <?php echo $token_symbol; ?></b>
                        <p>Confirm your withdrawal transaction below. Transaction is irreversible once submitted!</p>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Withdrawal Address</label>
                                <input type="text" disabled="disabled"  class="form-control" id="withdrawal_address_final" name="withdrawal_address_final" >
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        
                           <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Withdrawal Amount</label>
                                <input type="text" disabled="disabled" class="form-control" id="withdrawal_amount_confirm" name="withdrawal_amount_confirm">
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        
                           <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Gas Price</label>
                                <input type="text" disabled="disabled" class="form-control" id="gas_price_confirm" name="gas_price_confirm">
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <input type="hidden" name="withdrawl_amount_final" id="withdrawal_amount_final" />
                        <input type="hidden" name="gas_limit_final" id="gas_limit_final" />
                        <input type="hidden" name="wallet_address1" id="wallet_address1" value="<?php echo $wallet_address1; ?>" />
                       
                          <div class="section mt-2 mb-2">
            <button type="button" id="sendTransactionBNB" class="btn btn-primary btn-block btn-lg">Confirm Withdrawal</button>
        </div>

                  
                    </form>
                    </div>
                    
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="component-dialog.html#" class="btn" data-bs-dismiss="modal">CLOSE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
<div class="modal fade dialogbox show" id="DialogIconedInfo" data-bs-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
              
                <div class="pt-3 text-center">
                        <img src="<?php echo BASE_URL; ?>public/uploads/qr/<?php echo $wallet_address; ?>.png" alt="image" class="img-fluid" style="height:120px;">
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">Deposit Address</h5>
                    </div>
                    <div class="modal-body">
                       <textarea id="wallet_address" readonly="readonly" style="font-size:12px; border:0px; width:100%;" type="text" value="<?php echo $wallet_address; ?>" ><?php echo $wallet_address; ?></textarea>

                    <div style="width:100%;word-wrap: break-word; ">
                       <!-- <p id="wallet_address" style="white-space: normal; overflow:hidden; font-size:13px; margin-bottom:0px; padding-bottom:0px;"><?php //echo $wallet_address; ?></p>-->
                        <center>
                            <button
      class="btn btn-primary btn-block btn-sm"
      data-clipboard-action="copy"
      data-clipboard-target="#wallet_address"
    >
      Copy Address
    </button>
                        </center>
                        <br/>
                        <b style="color:#000;">
                        Send only BEP20(Binance Smart Chain) assets to this address. Sending any other asset will lead to permanent loss of the asset. 
                        </b>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="component-dialog.html#" class="btn" data-bs-dismiss="modal">CLOSE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
              <input type="hidden" class="form-control" id="mywalletaddress" name="mywalletaddress" style=""  value="<?php echo $wallet_address; ?>">
                        <input class="form-control" id="contractaddress" name="contractaddress" type="hidden" value="<?php echo $contract_address; ?>">
                      <input class="form-control" id="currency" name="currency" type="hidden" value="<?php echo $token_symbol; ?>">
    <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
            
            
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Total Balance</span>
                        <h1 class="total" ><span id="userBalance">...</span> <?php echo $token_symbol; ?></h1>
                    </div>
                    <div class="right">
                        <a href="#" class="button" data-bs-toggle="modal" <?php if($token_symbol=="USD"){ ?> data-bs-target="#DepositUSD" <?php } else { ?> data-bs-target="#DialogIconedInfo" <?php } ?>>
                            <ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <!-- * Balance -->
                <!-- Wallet Footer -->
                <div class="wallet-footer">
               
                 <div class="item">
                        <a href="#" data-bs-toggle="modal" <?php if($token_symbol=="USD"){ ?> data-bs-target="#DepositUSD" <?php } else { ?> data-bs-target="#DialogIconedInfo" <?php } ?> >
                            <div class="icon-wrapper bg-success">
                                <ion-icon name="add-circle" role="img" class="md hydrated" aria-label="arrow down outline"></ion-icon>
                            </div>
                            <strong>Deposit</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" data-bs-toggle="modal" <?php if($token_symbol=="USD"){ ?> data-bs-target="#WithdrawUSD" <?php } else { ?> data-bs-target="#ModalBasic" <?php } ?> id="withdrawButton" >
                            <div class="icon-wrapper bg-danger">
                                <ion-icon name="arrow-down-outline" role="img" class="md hydrated" aria-label="arrow down outline"></ion-icon>
                            </div>
                            <strong>Withdraw</strong>
                        </a>
                    </div>
                   
                    <div class="item">
                        <a href="<?php echo BASE_URL; ?>AppUser/sendmoney" >
                            <div class="icon-wrapper">
                                <ion-icon name="arrow-forward-outline" role="img" class="md hydrated" aria-label="arrow forward outline"></ion-icon>
                            </div>
                            <strong>Send</strong>
                        </a>
                    </div>
                    <!--
                    <div class="item">
                        <a href="index.html#" data-bs-toggle="modal" data-bs-target="#exchangeActionSheet">
                            <div class="icon-wrapper bg-warning">
                                <ion-icon name="swap-vertical" role="img" class="md hydrated" aria-label="swap vertical"></ion-icon>
                            </div>
                            <strong>Exchange</strong>
                        </a>
                    </div>-->

                </div>
                <!-- * Wallet Footer -->
            </div>
        </div>

        <!-- Transactions -->
        <div class="section mt-2">
            <div class="section-title">Transactions</div>
            <div class="transactions">
                <!-- item -->
                <?php 
				if($token_symbol=="USD"){
				?>
                 <?php
				$count = 0;
				if($transactions!=""){
				foreach($transactions as $key => $value){
				$count++;
				?>
                <a href="#" class="item">
                    <div class="detail">
                          <div>
                            <strong><?php echo $value['remark']; ?></strong>
                            <p><?php echo $value['type']; ?></p>
                            <p><?php echo $value['date']; ?></p>
                        </div>
                    </div>
                    <div class="right">
                    <?php
					if($value['type']=="debit"){
					?>
                        <div class="price text-danger"> - $ <?php echo number_format($value['amount'],2); ?></div>
                        <?php
						}
						?>
                         <?php
					if($value['type']=="credit"){
					?>
                        <div class="price text-success"> + $ <?php echo number_format($value['amount'],2); ?></div>
                        <?php
						}
						?>
                    </div>
                </a>
                <?php
				}
				}
				}
				else {
				?>
                <a href="https://testnet.bscscan.com/address/<?php echo $wallet_address; ?>" target="_blank" class="item">
                    <div class="detail">
                        
                        <div>
                           <strong>Click here to view transactions</strong>
                        </div>
                    </div>
       </a>
       <?php
	   }
	   ?>
                <!-- * item -->
             
            </div>
        </div>
        <!-- * Transactions -->


    </div>
     <script src="<?php echo BASE_URL.USER_THEME; ?>assets/js/clipboard.min.js"></script>
    <script>
      var clipboard = new ClipboardJS('.btn', {
    container: document.getElementById('modal')
});
      clipboard.on('success', function (e) {
        console.log(e);
      });

      clipboard.on('error', function (e) {
        console.log(e);
      });
    </script>
    <!-- * App Capsule -->


<?php
include("footer.php");
?>

 <script type="text/javascript">
 
 $("#btnCopy").on("click", function(){
 toastbox('toast-4', 2000)
 });


</script>