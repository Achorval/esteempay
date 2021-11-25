
<div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <!-- profile box -->
                    <div class="profileBox pt-2 pb-2">
                        <div class="image-wrapper">
                            <img src="<?php echo BASE_URL.USER_THEME; ?>assets/img/avatar.png" alt="image" class="imaged  w36">
                        </div>
                        <div class="in">
                            <strong></strong>
                            <div class="text-muted"><?php echo $email; ?></div>
                        </div>
                        <a href="index.html#" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
                            <ion-icon name="close-outline"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->
                    <!-- balance -->
                    <div class="sidebar-balance">
                        <div class="listview-title">Balance</div>
                        <div class="in">
                            <h1 class="amount">$ <span id="userBalance"><?php echo number_format($balance,2); ?></span></h1>
                        </div>
                    </div>
                    <!-- * balance -->

                    <!-- action group -->
                    <div class="action-group">
                        <a href="<?php echo BASE_URL; ?>AppUser/wallet" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="add-outline"></ion-icon>
                                </div>
                                Deposit
                            </div>
                        </a>
                        <a href="<?php echo BASE_URL; ?>AppUser/wallet" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="arrow-down-outline"></ion-icon>
                                </div>
                                Withdraw
                            </div>
                        </a>
                        <a href="<?php echo BASE_URL; ?>AppUser/wallet" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="arrow-forward-outline"></ion-icon>
                                </div>
                                Send
                            </div>
                        </a>
                        <a href="<?php echo BASE_URL; ?>AppUser/cards" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <ion-icon name="card-outline"></ion-icon>
                                </div>
                                My Cards
                            </div>
                        </a>
                    </div>
                    <!-- * action group -->

                    <!-- menu -->
                    <div class="listview-title mt-1">Menu</div>
                    <ul class="listview flush transparent no-line image-listview">
                        <li>
                            <a href="<?php echo BASE_URL; ?>AppUser" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="pie-chart-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Home
                                </div>
                            </a>
                        </li>
                   
                        <li>
                            <a href="<?php echo BASE_URL; ?>AppUser/cards" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="card-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    My Cards
                                </div>
                            </a>
                        </li>
                       
                          <li>
                            <a href="<?php echo BASE_URL; ?>AppUser/transactions" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                <div class="in">
                                   Transactions
                                </div>
                            </a>
                        </li>
                          <li>
                            <a href="<?php echo BASE_URL; ?>AppUser/wallets" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                <div class="in">
                                  Wallets
                                </div>
                            </a>
                        </li>
                             <li>
                            <a href="<?php echo BASE_URL; ?>AppUser/settings" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="apps-outline"></ion-icon>
                                </div>
                                <div class="in">
                                   My Account
                                </div>
                            </a>
                        </li>
                            <li>
                            <a href="<?php echo BASE_URL; ?>AppUser/logout" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Log out
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                    <!-- * menu -->

              

                </div>
            </div>
        </div>
    </div>