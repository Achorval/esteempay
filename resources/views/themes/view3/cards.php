<?php
include("header.php");

$cards = $this->model->cards($_SESSION['UserID']);

$transactions = $this->model->getTransactions($_SESSION['UserID']);
?>

<!--create card modal -->
<div id="toastError" class="toast-box toast-top " style="background:#FF396F; z-index:1100;">
            <div class="in ">
                <div class="text ">
                </div>
            </div>
        </div>
        
<div class="modal fade modalbox" id="createCard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            
                <div class="modal-content">
                       <div class="modal-header">
                        <h5 class="modal-title">Create Virtual Card</h5>
                <a href="javascript:;" class="btn btn-primary btn-block btn-sm" data-bs-dismiss="modal" style="width:100px;">Close</a>
                    </div>
                <div class="pt-3 text-center">
                
                    </div>
                    
                    <div class="modal-body">
                    
                    <div class="col-lg-6 mx-auto">
                    <form id="create_card_form" name="create_card_form"  method="post" action="<?php echo BASE_URL; ?>AppUser/processCreateCard">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $this->user_id; ?>" />
                        
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Card Name</label>
                                <input type="text"  class="form-control" id="card_name" name="card_name" >
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                 
                            <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Amount</label>
                                <input type="text"  class="form-control" id="amount" name="amount" >
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Card Creation Fee</label>
                                <input type="text"  class="form-control" value="$0.5" readonly="readonly">
                                <input  id="transaction_fee" name="transaction_fee" type="hidden" value="0.5" />
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                       
                          <div class="section mt-2 mb-2">
            <button type="button" id="createCardBtn" class="btn btn-primary btn-block btn-lg">Create Card</button>
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

<!-- End create card modal -->


<div id="appCapsule">

        <div class="section mt-2">
            
                                   <?php 
			if(isset($_GET['error'])){
			if($_GET['error']=="no"){
			?>
             <div class="alert alert-success mb-1" role="alert">
                       Your card was created successfully! 
                    </div>
            <?php
            }
			}
			?>
			
                          <?php 
			if(isset($_GET['error'])){
			if($_GET['error']=="yes"){
			?>
            <div class="alert alert-outline-danger mb-1" role="alert">
                       <?php echo $_GET['message']; ?>
                    </div>
            <?php
			}
			}
			?>
        
        <div class="row">
        
         <div class="col-md-3">
         <button type="submit" id="createCard" data-bs-toggle="modal" data-bs-target="#createCard"  class="btn btn-primary btn-block btn-lg">Create New Card</button>
         </div>
        
        </div>
        <br />
       <?php
				$countC = 0;
				if($cards!=""){
				foreach($cards as $keyC => $valueC){
				$countC++;
				if($countC>8)
				break;
				?>
            <!-- card block -->
            <div class="card-block mb-2 col-lg-4">
                <div class="card-main">
                    <div class="card-button dropdown">
                        <button type="button" class="btn btn-link btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                            <ion-icon name="ellipsis-horizontal" role="img" class="md hydrated" aria-label="ellipsis horizontal"></ion-icon>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" style="">
                            <a class="dropdown-item" href="<?php echo BASE_URL; ?>AppUser/card/<?php echo $valueC['id']; ?>">
                                <ion-icon name="pencil-outline" role="img" class="md hydrated" aria-label="pencil outline"></ion-icon>Open
                            </a>
                        </div>
                    </div>
                    <div class="balance">
                        <span class="label">BALANCE</span>
                        <h1 class="title">$<?php echo number_format($this->model->viewCardBalance($valueC['id']),2); ?></h1>
                    </div>
                    <div class="in">
                        <div class="card-number">
                            <span class="label">Card Number</span>
                            <?php echo $valueC['masked_pan']; ?>
                        </div>
                        <div class="bottom">
                            <div class="card-expiry">
                                <span class="label">Expiry</span>
                                <?php echo $valueC['card_expiration']; ?>
                            </div>
                            <div class="card-ccv">
                                <span class="label">CCV</span>
                               <?php echo $valueC['card_security_code']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- * card block -->
<?php
}
}
?>
      

        </div>


    </div>


<?php
include("footer.php");
?>