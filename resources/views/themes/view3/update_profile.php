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
               <form>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Text</label>
                                <input type="text" class="form-control" id="text4b" placeholder="Text Input">
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="email4b">E-mail</label>
                                <input type="email" class="form-control" id="email4b" placeholder="E-mail Input">
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="select4b">Select</label>
                                <select class="form-control custom-select" id="select4b">
                                    <option value="1">Select 1</option>
                                    <option value="2">Select 2</option>
                                    <option value="3">Select 3</option>
                                    <option value="4">Select 4</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper not-empty">
                                <label class="label" for="password4b">Password</label>
                                <input type="password" autocomplete="off" class="form-control" id="password4b" placeholder="Password Input">
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="phone4b">Phone</label>
                                <input type="tel" class="form-control" id="phone4b" placeholder="Phone Input">
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="textarea4b">Textarea</label>
                                <textarea id="textarea4b" rows="2" class="form-control" placeholder="Textarea"></textarea>
                                <i class="clear-input">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>


<?php
include("footer.php");
?>