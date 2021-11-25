<?php
include("header.php");

$cards = $this->model->cards($_SESSION['UserID']);

$transactions = $this->model->getTransactions($_SESSION['UserID']);
?>

<div id="appCapsule">

        <div class="section mt-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Send Money</h2>
                    <p>This feature allows you to send money to anyone, anywhere in the world using crypto and without the need of hashed crypto addresses.</p>
                    <p> You can send money to any email address or phone number.</p>
                    <p>Coming soon...</p>
                </div>
            </div>
        </div>


    </div>


<?php
include("footer.php");
?>