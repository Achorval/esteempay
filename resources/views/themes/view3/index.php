<?php
include("header.php");

$cards = $this->model->cards($_SESSION['UserID']);

$transactions = $this->model->getTransactions($_SESSION['UserID']);
?>

    <!-- App Header -->
    
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">

        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1 ">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">USD Balance</span>
                        <h1 class="total">$<span id="userBalance"><?php echo number_format($balance,2); ?></span></h1>
                    </div>
                    <div class="right">
                        <a href="<?php echo BASE_URL; ?>AppUser/wallet" class="button">
                            <ion-icon name="add-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <!-- * Balance -->
                <!-- Wallet Footer -->
                <div class="wallet-footer">
                   
                    <div class="item">
                        <a href="<?php echo BASE_URL; ?>AppUser/wallets" >
                            <div class="icon-wrapper bg-warning">
                                <ion-icon name="swap-vertical"></ion-icon>
                            </div>
                            <strong>Manage Wallet</strong>
                        </a>
                    </div>
                   
                    <div class="item">
                        <a href="<?php echo BASE_URL; ?>AppUser/cards">
                            <div class="icon-wrapper bg-success">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            <strong>Cards</strong>
                        </a>
                    </div>
                   

                </div>
                <!-- * Wallet Footer -->
            </div>
        </div>
        <!-- Wallet Card -->
        
        <!-- Transactions -->
        <div class="section mt-4">
            <div class="section-heading">
                <h2 class="title">Transactions</h2>
                <a href="<?php echo BASE_URL; ?>AppUser/transactions" class="link">View All</a>
            </div>
            <div class="transactions">
                <!-- item -->
                <?php
				$count = 0;
				if($transactions!=""){
				foreach($transactions as $key => $value){
				$count++;
				if($count>3)
				break;
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

        <!-- my cards -->
        <div class="section full mt-4">
            <div class="section-heading padding">
                <h2 class="title">My Cards</h2>
                <a href="<?php echo BASE_URL; ?>AppUser/cards" class="link">View All</a>
            </div>

            <!-- carousel single -->
            <div class="carousel-single splide">
                <div class="splide__track">
                    <ul class="splide__list">
       <?php
				$countC = 0;
				if($cards!=""){
				foreach($cards as $keyC => $valueC){
				$countC++;
				if($countC>8)
				break;
				?>
                        <li class="splide__slide">
                            <!-- card block -->
                            <div class="card-block bg-primary">
                                <div class="card-main">
                                    <div class="card-button dropdown">
                                        <button type="button" class="btn btn-link btn-icon" data-bs-toggle="dropdown">
                                            <ion-icon name="ellipsis-horizontal"></ion-icon>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
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
                        </li>

                       <?php
					   }
					   }
					   ?>

                    </ul>
                </div>
            </div>
            <!-- * carousel single -->

        </div>
        <!-- * my cards -->

    </div>
    <!-- * App Capsule -->


<?php
include("footer.php");
?>