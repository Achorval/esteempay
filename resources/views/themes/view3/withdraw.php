<?php
include("header.php");

$wallet_data = $this->walletData;

foreach($wallet_data as $key => $value){

$token_symbol = $value['token_symbol'];

$balance = $value['balance'];

$wallet_id = $value['wallet_id'];

$wallet_address = $this->model->viewWalletAddress($wallet_id);

}

?>
        
    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="app-transactions.html#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
           Wallet
        </div>
        <div class="right">
            <a href="app-notifications.html" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">4</span>
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
    
    <div id="toast-4" class="toast-box toast-top" style="z-index:1000;">
            <div class="in">
                <div class="text">
                    Auto closing in 2 seconds.
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
                    <div style="width:100%;word-wrap: break-word; ">
                        <p id="wallet_address" style="white-space: normal; overflow:hidden; font-size:13px; margin-bottom:0px; padding-bottom:0px;"><?php echo $wallet_address; ?></p>
                        <center><button onclick="copyAddress()">Copy Address</button></center>
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
    
    

        <!-- Transactions -->
        <div class="section mt-2">
            <div class="section-title">Transactions</div>
            <div class="transactions">
                <!-- item -->
                <a href="app-transaction-detail.html" class="item">
                    <div class="detail">
                        <img src="<?php echo BASE_URL.USER_THEME; ?>assets/img/busdt_32.png" alt="img" class="image-block imaged w48">
                        <div>
                            <strong>BUSDT</strong>
                            <p>Binance USDT</p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="price text-danger"> - $ 150</div>
                    </div>
                </a>
                <!-- * item -->
             
            </div>
        </div>
        <!-- * Transactions -->


    </div>
    <!-- * App Capsule -->


<?php
include("footer.php");
?>

 <script type="text/javascript">
function copyAddress() {
  /* Get the text field */
  var copyText = document.getElementById("wallet_address");

  /* Select the text field */
  //copyText.select();
  //copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  //alert("Copied: " + copyText.value);
  toastbox('toast-4', 2000)
}
</script>