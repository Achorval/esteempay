<?php
include("header.php");

$transactions = $this->model->getTransactions($_SESSION['UserID']);

$pending_tasks = $this->model->getTasks($_SESSION['UserID'],"pending");

$failed_tasks = $this->model->getTasks($_SESSION['UserID'],"failed");
?>

<div id="appCapsule">

        <div class="section mt-4">
            <div class="section-heading">
                <h2 class="title">Transactions</h2>
                
            </div>
            
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs style1" role="tablist">
                    
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#card" role="tab" >
                                Completed
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#overview" role="tab" aria-selected="true">
                                Pending <?php if($pending_tasks!=""&&$pending_tasks->num_rows>0){ ?>(<?php echo $pending_tasks->num_rows; ?>) <?php } ?>
                            </a>
                        </li>
                    
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">
                                Failed <?php if($failed_tasks!=""&&$failed_tasks->num_rows>0){ ?>(<?php echo $failed_tasks->num_rows; ?>) <?php } ?>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-1">
                    
                        <div class="tab-pane fade active show" id="card" role="tabpanel">
                         <div class="transactions">
                         
                         <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Description</th>
                                <th scope="col">Amount</th>
                                <th scope="col" class="text-end">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                         <!-- item -->
                <?php
				$count = 0;
				if($transactions!=""){
				foreach($transactions as $key => $value){
				$count++;
				?>
                            <tr>
                                <th scope="row">
								<?php echo $value['remark']; ?>
                                  <p>Type: <?php echo $value['type']; ?></p>
                            <p>Date: <?php echo $value['date']; ?></p>
                                </th>
                                <td> <?php
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
						?></td>
                                <td class="text-end">$<?php echo $value['balance']; ?></td>
                            </tr>
                             <?php
				}
				}
				?>
                        </tbody>
                    </table>
                </div>
              
                <!-- * item -->
               
            </div>
                        </div>
                    
                        <div class="tab-pane fade" id="overview" role="tabpanel">
                           <div class="transactions">
                                  <div class="table-responsive">
                                   <?php
				//$count = 0;
				if($pending_tasks!=""){
				?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                      <?php       
				foreach($pending_tasks as $keyP => $valueP){
				
				$details = "";
				
				$detailsP = $valueP['parameters'];
				
				$detailP = json_decode($detailsP);
				
				if($valueP['feedback']==""){
				
				 $feedback = $valueP['status'];
				
				}else {
				
				  $feedback = $valueP['feedback'];
				
				}
				
				if($valueP['task']=="fundwallet"){
				
				  $details = "Fund USD wallet. Amount:".$detailP->amount.". Funding source: ".$detailP->currency.".<hr /> Feedback: ".$feedback;
				
				}
					if($valueP['task']=="withdrawtocrypto"){
				
				  $details = "Withdraw from USD wallet. Amount:".$detailP->amount.". Withdraw to: ".$detailP->currency.".<hr /> Feedback: ".$feedback;
				
				}
					if($valueP['task']=="withdrawcrypto"){
				
				  $details = "Withdraw to external wallet. Amount:".$detailP->amount.$detailP->currency.". Withdrawal Wallet: ".$detailP->toAddress.".<hr /> Feedback: ".$feedback;
				
				}
				?>
                            <tr>
                            <th> #<?php echo $valueP['id']; ?></th>
                                <th scope="row">
								<?php echo $details; ?>
                                <hr />
                                <p>status: <b><?php echo $valueP['status']; ?></b></p>
                            <p><?php echo $valueP['date_added']; ?></p>
                                </th>
                            </tr>
                             <?php
				}
				}
				else {
				?>
                <h3>No pending transaction</h3>
                <?php
				}
				?>
                        </tbody>
                    </table>
                </div>
                <!-- item -->
         
              
                <!-- * item -->
               
            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="settings" role="tabpanel">
                           <div class="transactions">
                                  <div class="table-responsive">
                                       <?php
				
				if($failed_tasks!=""){
				?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
				foreach($failed_tasks as $keyF => $valueF){
			  
				$detailsA = "";
				
				$detailsF = $valueF['parameters'];
				
				$detailF = json_decode($detailsF);
				
			if($valueF['feedback']==""){
				
				 $feedback = $valueF['status'];
				
				}else {
				
				  $feedback = $valueF['feedback'];
				
				}
				
				if($valueF['task']=="fundwallet"){
				
				  $detailsA = "Fund USD wallet. Amount:".$detailF->amount.". Funding source: ".$detailF->currency.".<hr /> Feedback: ".$feedback;
				
				}
					if($valueF['task']=="withdrawtocrypto"){
				
				  $detailsA = "Withdraw from USD wallet. Amount:".$detailF->amount.". Withdraw to: ".$detailF->currency.".<hr /> Feedback: ".$feedback;
				
				}
					if($valueF['task']=="withdrawcrypto"){
				
				  $detailsA = "Withdraw to external wallet. Amount:".$detailF->amount.$detailF->currency.". Withdrawal Wallet: ".$detailF->toAddress.".<hr /> Feedback: ".$feedback;
				
				}
				?>
                            <tr>
                                <th scope="row">#<?php echo $valueF['id']; ?></th>
                                <td>
								<?php echo $detailsA; ?>
                                <hr />
                                <p>status: <b><?php echo $valueF['status']; ?></b></p>
                            <p><?php echo $valueF['date_added']; ?></p>
                                </td>
                            </tr>
                            <?php
				}
				}
				else {
				?>
                <h3>No failed transaction</h3>
                <?php
				}
				?>  
                        </tbody>
                    </table>
                </div>
                <!-- item -->
               
             
                <!-- * item -->
               
            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            
        </div>


    </div>


<?php
include("footer.php");
?>