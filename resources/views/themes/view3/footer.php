     <!-- App Sidebar -->
    <?php
	include("sidebar.php");
	$url = basename($_SERVER['REQUEST_URI'], '?'.$_SERVER['QUERY_STRING']);
	?>
    <!-- * App Sidebar -->
 
    <!-- App Bottom Menu -->
    
    <br />
    <br />
    <br />
    <div class="appBottomMenu">
        <a href="<?php echo BASE_URL; ?>AppUser" class="item <?php if($url=="AppUser"){ ?>active<?php } ?>">
            <div class="col">
                <ion-icon name="pie-chart-outline"></ion-icon>
                <strong>Home
                </strong>
            </div>
        </a>
        <a href="<?php echo BASE_URL; ?>AppUser/wallets" class="item <?php if($url=="wallets"){ ?>active<?php } ?>">
            <div class="col">
                <ion-icon name="document-text-outline"></ion-icon>
                <strong>Wallets</strong>
            </div>
        </a>
        <a href="<?php echo BASE_URL; ?>AppUser/sendmoney" class="item <?php if($url=="sendmoney"){ ?>active<?php } ?>">
            <div class="col">
                <ion-icon name="apps-outline"></ion-icon>
                <strong>Send Money</strong>
            </div>
        </a>
        <a href="<?php echo BASE_URL; ?>AppUser/cards" class="item <?php if($url=="cards"){ ?>active<?php } ?>">
            <div class="col">
                <ion-icon name="card-outline"></ion-icon>
                <strong>My Cards</strong>
            </div>
        </a>
        <a href="<?php echo BASE_URL; ?>AppUser/settings" class="item <?php if($url=="settings"){ ?>active<?php } ?>">
            <div class="col">
                <ion-icon name="settings-outline"></ion-icon>
                <strong>Settings</strong>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->
    
    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="<?php echo BASE_URL.USER_THEME; ?>assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>
     <script src="<?php echo BASE_URL.USER_THEME; ?>assets/js/axios.min.js"></script>
    <!-- Splide -->
    <script src="<?php echo BASE_URL.USER_THEME; ?>assets/js/plugins/splide/splide.min.js"></script>
   <script src="<?php echo BASE_URL.USER_THEME; ?>assets/js/jquery-3.6.0.min.js"></script>
     <!-- Base Js File -->
    <script src="<?php echo BASE_URL.USER_THEME; ?>assets/js/base.js"></script>
    <!-- Base Js File -->
  
    <script>
        // Add to Home with 2 seconds delay.
       // AddtoHome("2000", "once");
	
    </script>

</body>

</html>