<?php
include("header.php");

$card_data = $this->cardData;

foreach($card_data as $key => $value){

$card_id = $value['id'];

$external_id = $value['external_id'];

$account_id = $value['account_id'];

$name_on_card = $value['name_on_card'];

$currency = $value['currency'];

$card_number = $value['card_number'];

$card_expiration = $value['card_expiration'];

$cvv = $value['card_security_code'];

$billing_address = $value['billing_address'];

$city = $value['city'];

$state = $value['state'];

$country = $value['country'];

}


$transaction_id = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);

$transactions = $this->model->getCardTransactions($card_id);
?>
      <input class="form-control" id="card_id" name="card_id" type="hidden" value="<?php echo $card_id; ?>">
      <input class="form-control" id="card_uid" name="card_id" type="hidden" value="<?php echo $external_id; ?>">
         <input type="hidden" name="user_id" id="user_id" value="<?php echo $this->user_id; ?>" />
      <div id="toastError" class="toast-box toast-top " style="background:#FF396F; z-index:1100;">
            <div class="in ">
                <div class="text ">
                </div>
            </div>
        </div>
      
    <div class="modal fade modalbox" id="fundCard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            
                <div class="modal-content">
                       <div class="modal-header">
                        <h5 class="modal-title">Fund Card</h5>
                <a href="javascript:;" class="btn btn-primary btn-block btn-sm" data-bs-dismiss="modal" style="width:100px;">Close</a>
                    </div>
                <div class="pt-3 text-center">
                
                    </div>
                    
                    <div class="modal-body">
                    
                    <div class="col-lg-6 mx-auto">
                    <form id="create"  method="post">
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Funding Amount</label>
                                <input type="text"  class="form-control" id="funding_amount" name="funding_amount" >
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Card Funding Fee</label>
                                <input type="text"  class="form-control" value="$0.5" readonly="readonly">
                                <input  id="transaction_fee" name="transaction_fee" type="hidden" value="0.5" />
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                       
                          <div class="section mt-2 mb-2">
            <button type="button" id="fundCardBtn" class="btn btn-primary btn-block btn-lg">Continue</button>
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
                        <h5 class="modal-title">Withdraw </h5>
                <a href="javascript:;" class="btn btn-primary btn-block btn-sm" data-bs-dismiss="modal" style="width:100px;">Close</a>
                    </div>
                <div class="pt-3 text-center">
                
                    </div>
                    
                    <div class="modal-body">
                    
                    <div class="col-lg-6 mx-auto">
                    <form id="create"  method="post">
                     
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
                                   <option value="USD">USD Wallet</option>
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
            <button type="button" id="withdrawFromCardBtn" class="btn btn-primary btn-block btn-lg">Withdraw</button>
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
    
    

    <!-- App Capsule -->
    <div id="appCapsule">
    
    <div id="toast-4" class="toast-box toast-top" style="z-index:1000;">
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
        
            <!-- Dialog Basic -->
        <div class="modal fade dialogbox" id="deleteModal" data-bs-backdrop="static" tabindex="-1" role="dialog">
        
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Card</h5>
                    </div>
                    <div class="modal-body">
                        Are you sure about that?
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline" id="deleteModalButtons">
                            <a href="#" class="btn btn-text-primary" id="deleteVirtualCardBtn">YES!</a>
                             <a href="#" class="btn btn-text-secondary" data-bs-dismiss="modal">CANCEL</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Dialog Basic -->
        

                        <input class="form-control" id="contractaddress" name="contractaddress" type="hidden" value="">
                      <input class="form-control" id="currency" name="currency" type="hidden" value="<?php echo $currency; ?>">
    <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Manage Card</span>
                      
                    </div>
                </div>
                
                <div class="row">
                
                 <div class="col-md-6 col-lg-4" >
                 <div class="card-block mb-2 ">
                <div class="card-main">
                 
                    <div class="balance">
                        <span class="label">BALANCE</span>
                        <h1 class="title">$<span id="cardBalance"><?php echo number_format($this->model->viewCardBalance($card_id),2); ?></span></h1>
                    </div>
                    <div class="in">
                        <div class="card-number">
                            <span class="label">Card Number</span>
                            <?php echo $card_number; ?>
                        </div>
                        <div class="bottom">
                            <div class="card-expiry">
                                <span class="label">Expiry</span>
                                <?php echo $card_expiration; ?>
                            </div>
                            <div class="card-ccv">
                                <span class="label">CVV</span>
                               <?php echo $cvv; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
                 
                 <div class=" col-md-6 col-lg-4">
                 <h3>Card Billing Information</h3>
                  <span><b style="font-size:14px; font-weight:bold; color:#666666;">Billing Name: </b><?php echo $name_on_card; ?> </span>
                  <br/>
                  <span><b style="font-size:14px; font-weight:bold; color:#666666;">Billing Address: </b><?php echo $billing_address; ?> </span>
                  <br/>
                                   <span><b style="font-size:14px; font-weight:bold; color:#666666;">City: </b><?php echo $city; ?> </span>
                                   <br/>
                                   <span><b style="font-size:14px; font-weight:bold; color:#666666;">State: </b><?php echo $state; ?> </span>
                                   <br/>
                                   <span><b style="font-size:14px; font-weight:bold; color:#666666;">Country: </b><?php echo $country; ?> </span>
                 </div>
                 
                <!-- * Balance -->
                <!-- Wallet Footer -->
                <div class="wallet-footer">
               
                 <div class="item">
                        <a href="component-dialog.html#" data-bs-toggle="modal" data-bs-target="#fundCard" >
                            <div class="icon-wrapper bg-success">
                                <ion-icon name="add-circle" role="img" class="md hydrated" aria-label="arrow down outline"></ion-icon>
                            </div>
                            <strong>Fund</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="index.html#" data-bs-toggle="modal" data-bs-target="#WithdrawUSD" id="withdrawButton" >
                            <div class="icon-wrapper bg-danger">
                                <ion-icon name="arrow-down-outline" role="img" class="md hydrated" aria-label="arrow down outline"></ion-icon>
                            </div>
                            <strong>Withdraw</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <div class="icon-wrapper">
                                <ion-icon name="arrow-forward-outline" role="img" class="md hydrated" aria-label="arrow forward outline"></ion-icon>
                            </div>
                            <strong>Delete</strong>
                        </a>
                    </div>
                    
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
				?>
                <!-- * item -->
             
            </div>
        </div>
        <!-- * Transactions -->


    </div>
    <!-- * App Capsule -->


<?php
include("footer.php");
?>

