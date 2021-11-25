//API URL
var api_link = "http://localhost:3080"; 

var base_url = "http://localhost/esteempay/";

//-----------------------------------------------------------------------
// Service Workers
//-----------------------------------------------------------------------
if ('serviceWorker' in navigator) {
   /* navigator.serviceWorker.register('__service-worker.js')
        .then(reg => console.log('service worker registered'))
        .catch(err => console.log('service worker not registered - there is an error.', err));*/
}
//-----------------------------------------------------------------------

//-----------------------------------------------------------------------
// Page Loader with preload
//----------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
    var loader = document.getElementById("loader");
    setTimeout(() => {
        var loaderOpacity = 1;
        var fadeAnimation = setInterval(() => {
            if (loaderOpacity <= 0.05) {
                clearInterval(fadeAnimation);
                loader.style.opacity = "0";
                loader.style.display = "none";
            }
            loader.style.opacity = loaderOpacity;
            loader.style.filter = "alpha(opacity=" + loaderOpacity * 100 + ")";
            loaderOpacity = loaderOpacity - loaderOpacity * 0.5;
        }, 30);
    }, 400);
})
//-----------------------------------------------------------------------
let wallet_address = $("#mywalletaddress").val();

let cardBalance = $("#cardBalance");

let currency = $("#currency").val();

let contract_address = $("#contractaddress").val();
	
	$("#withdrawButton").on("click", function(){
											
											if(currency=="BNB"){
												
												$("#gas_limit").val("21000");
												
											}else {
												
												$("#gas_limit").val("90000");
												
											}
											  
											  });
											  
	if(cardBalance){
		
		if(cardBalance.length>0){
			
			let card_id = $("#card_id").val();
		
	axios.post(api_link+'/api/cardBalance', { card_id: card_id}).then(response => {
console.log(response.body);
	  $("#cardBalance").html(response.data);
	  
    }).catch(error => {
	  
    });		
			
		}
		
	}									  
	
	if(wallet_address){
	
	if(wallet_address.length>0){
		
		let wallet_address = $("#mywalletaddress").val();

		if(currency=="BNB"){
	axios.post(api_link+'/api/bnbBalance', { address: wallet_address}).then(response => {
      //console.log(JSON.stringify(response.data));
	  $("#userBalance").html(response.data);
      //setLoading(false);
     // setError(response.data)
    }).catch(error => {
      //setLoading(false);
      //if (error.response.status === 401) setError(error.response.data.message);
      //else setError("Something went wrong. Please try again later.");
	  
    });
}else if(currency=="USD"){

			axios.post(api_link+'/api/usdBalance', { wallet_address: wallet_address}).then(response => {

	  $("#userBalance").html(response.data);
	  
    }).catch(error => {
	  
    });
	
	
}else {

		axios.post(api_link+'/api/tokenBalance', { address: wallet_address, tokenAddress: contract_address}).then(response => {
      console.log(response.data);
	  $("#userBalance").html(response.data);
    }).catch(error => {
	  
    });
	
}

	setInterval(function(){ 
						
						/*axios.post(api_link+'/api/bnbBalance', { address: wallet_address}).then(response => {
      //console.log(JSON.stringify(response.data));
	  $("#userBalance").html(response.data);
    }).catch(error => {
	  
    });*/
						}, 3000);
	
	}
	
	}
	
	
	$("#reset_password").on("click", function(event){
		
		let actionButton = $("#reset_password");
		
		let userPassword = $("#user_password").val();
		
		let reset_code = $("#reset_code").val();

 event.preventDefault();
 
  $(this).html('<span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>Loading...');
  
  $(this).attr("disabled","disabled");
  
  if(userPassword.length<6){
	  
	  $("#toastError .text").html("Password length must be up to 6 characters!");
												 
												  toastbox('toastError', 2000);
												  
												    actionButton.html('Reset Password');
													
													 actionButton.removeAttr("disabled");
													
													return false;
													
  }

    axios.post(api_link+"/api/checkPasswordResetCode", {reset_code: reset_code}).then( function(response) {
		
			let result = response.data;
			
			console.log(result);
			
			if(result){
				
                  if(result.message=="invalid_code"){
					  
					  			$("#toastError .text").html("Invalid code!");
												 
												  toastbox('toastError', 2000);
												  
												    actionButton.html('Reset Password');
  
  actionButton.removeAttr("disabled");
					  
					  
				  }else if(result.message=="valid_code") {
					  
					document.forms.reset_password_form.submit();
					  
				  }
				  else {
					  
					  			$("#toastError .text").html("Unkown code error");
												 
												  toastbox('toastError', 2000);
												  
												   actionButton.html('Reset Password');
  
  actionButton.removeAttr("disabled");
					  
				  }
				
			}else {
				
				$("#toastError .text").html("An unkown error occurred!");
												 
												  toastbox('toastError', 2000);
												  
												    $(this).html('Reset Password');
  
  actionButton.removeAttr("disabled");
												
				
			}
		
		   console.log(result);
		
		});
		
		 });
		 
		 
		 $("#update_user_password").on("click", function(event){
		
		let actionButton = $("#update_user_password");
		
		let userPassword = $("#user_password").val();
		
		let reset_code = $("#reset_code").val();

 event.preventDefault();
 
  $(this).html('<span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>Loading...');
  
  $(this).attr("disabled","disabled");
  
  if(userPassword.length<6){
	  
	  $("#toastError .text").html("Password length must be up to 6 characters!");
												 
												  toastbox('toastError', 2000);
												  
												    actionButton.html('Reset Password');
													
													 actionButton.removeAttr("disabled");
													
													return false;
													
  }

    axios.post(api_link+"/api/checkPasswordResetCode", {reset_code: reset_code}).then( function(response) {
		
			let result = response.data;
			
			console.log(result);
			
			if(result){
				
                  if(result.message=="invalid_code"){
					  
					  			$("#toastError .text").html("Invalid code!");
												 
												  toastbox('toastError', 2000);
												  
												    actionButton.html('Reset Password');
  
  actionButton.removeAttr("disabled");
					  
					  
				  }else if(result.message=="valid_code") {
					  
					document.forms.update_password_form.submit();
					  
				  }
				  else {
					  
					  			$("#toastError .text").html("Unkown code error");
												 
												  toastbox('toastError', 2000);
												  
												   actionButton.html('Reset Password');
  
  actionButton.removeAttr("disabled");
					  
				  }
				
			}else {
				
				$("#toastError .text").html("An unkown error occurred!");
												 
												  toastbox('toastError', 2000);
												  
												    $(this).html('Reset Password');
  
  actionButton.removeAttr("disabled");
												
				
			}
		
		   console.log(result);
		
		});
		
		 });

$("#createWallet").on("click", function(event){

 event.preventDefault();
 
   $("#loading").attr("style", "display:block; visibility: visible;");

    $.ajax({
        url: api_link+"/api/createUserAccount",
        success: function(result) {
			//console.log(result);
			if(result.address){
				
				if(result.address!=""&&result.privateKey!=""){
					
			    alert("Account created!");
				
				$("#create").append('<input type="hidden" name="wallet_addr" value="'+result.address+'" /> ');
				
				$("#create").append('<input type="hidden" name="wallet_address" value="'+result.privateKey+'" /> ');
				
		        $( "#create" ).submit();
			
			}else {
				
	              alert("An error occurred!");
				  
			}
			
			}else {
				
	              alert("An error occurred!");
				  
			}
		}
		});
		
		 });

$("#createTransaction").on("click", function(){
											 
											 let rec_address  = $("#withdrawal_address").val();
											 
											 let amount = $("#withdrawal_amount").val();
											 
											 let gas_limit = $("#gas_limit").val();
											
											 if(rec_address==""){
												 
												 $("#toastError .text").html("Enter wallet address");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 	 if(amount==""){
												 
												  $("#toastError .text").html("Enter amount");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											  	 if(gas_limit==""){
												 
												  $("#toastError .text").html("Gas limit cannot be empty!");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 	 if(gas_limit<21000){
												 
												  $("#toastError .text").html("Gas limit too low!");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 $("#createTransaction").attr("disabled","disabled");
					
					$("#createTransaction").html('<span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>Loading...');
											
										axios.post(api_link+'/api/tokenBalance', { address: wallet_address, tokenAddress: contract_address}).then(response => {
      let balance = response.data;
	  
	    if (isNaN(balance)) {
			
  $("#createTransaction").removeAttr("disabled","disabled");
					
					$("#createTransaction").html('Withdraw');		
		  
		    $("#toastError .text").html("An error occurred, try again!");
												 
												  toastbox('toastError', 2000);
												
												return false;
  }
	
	  if(balance>=amount){
		 
		axios.post(api_link+'/api/getGasPrice', { currency: currency, gas_limit: gas_limit}).then(response => {
      let gasFee = response.data;
	  
	  $("#withdrawal_address_final").val(rec_address);
	  
	  $("#withdrawal_amount_final").val(amount);
	  
	    $("#gas_limit_final").val(gas_limit);
	  
	  $("#gas_price_final").val(gasFee);
	  
	  $("#withdrawal_amount_confirm").val(amount+" "+currency);
	  
	  $("#gas_price_confirm").val(gasFee+" BNB");
	  
	  $("#ModalBasic").modal("hide");
	
	  $("#DialogIconedInfo1").modal('show');
	  
	  $("#createTransaction").removeAttr("disabled","disabled");
	  
	    $("#withdrawal_address").val("");
		
		$("#withdrawal_amount").val("");
		
		$("#gas_limit").val("");
					
					$("#createTransaction").html('Withdraw');	
					
					});
		   
		  
	  }else {
					
			 $("#createTransaction").removeAttr("disabled","disabled");
			 
			  $("#createTransaction").html("Withdraw");
					
					$("#createTransactionBNB").html('Withdraw');		
		  
		    $("#toastError .text").html("Insufficient Balance");
												 
												  toastbox('toastError', 2000);
												
												return false;
	  }
	  
    }).catch(error => {
	  
    });
											 
											 
											 });


$("#createTransactionBNB").on("click", function(){
											 
											 let rec_address  = $("#withdrawal_address").val();
											 
											 let amount = $("#withdrawal_amount").val();
											 
											 let gas_limit = $("#gas_limit").val();
											
											 if(rec_address==""){
												 
												 $("#toastError .text").html("Enter wallet address");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 	 if(amount==""){
												 
												  $("#toastError .text").html("Enter amount");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											  	 if(gas_limit==""){
												 
												  $("#toastError .text").html("Gas limit cannot be empty!");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 	 if(gas_limit<21000){
												 
												  $("#toastError .text").html("Gas limit too low!");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 $("#createTransactionBNB").attr("disabled","disabled");
					
					$("#createTransactionBNB").html('<span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>Loading...');
											
										axios.post(api_link+'/api/bnbBalance', { address: wallet_address}).then(response => {
      let balance = response.data;
	  
	    if (isNaN(balance)) {
			
  $("#createTransaction").removeAttr("disabled","disabled");
					
					$("#createTransaction").html('Withdraw');		
		  
		    $("#toastError .text").html("An error occurred, try again!");
												 
												  toastbox('toastError', 2000);
												
												return false;
  }
	
	  if(balance>amount){
		 
		axios.post(api_link+'/api/getGasPrice', { currency: currency, gas_limit: gas_limit}).then(response => {
      let gasFee = response.data;
	  
	  $("#withdrawal_address_final").val(rec_address);
	  
	  $("#withdrawal_amount_final").val(amount);
	  
	    $("#gas_limit_final").val(gas_limit);
	  
	  $("#gas_price_final").val(gasFee);
	  
	  $("#withdrawal_amount_confirm").val(amount+" BNB");
	  
	  $("#gas_price_confirm").val(gasFee+" BNB");
	  
	  $("#ModalBasic").modal("hide");
	
	  $("#DialogIconedInfo1").modal('show');
	  
	  $("#createTransactionBNB").removeAttr("disabled","disabled");
	  
	    $("#withdrawal_address").val("");
		
		$("#withdrawal_amount").val("");
		
		$("#gas_limit").val("");
					
					$("#createTransactionBNB").html('Withdraw');	
					
					});
		   
		  
	  }else {
					
			 $("#createTransactionBNB").removeAttr("disabled","disabled");
					
					$("#createTransactionBNB").html('Withdraw');		
		  
		    $("#toastError .text").html("Insufficient Balance");
												 
												  toastbox('toastError', 2000);
												
												return false;
	  }
	  
    }).catch(error => {
	  
    });
											 
											 
											 });

$("#sendTransactionBNB").on('click', function() {
	
	    let user_id = $("#user_id").val();
										   
	    let toAddress = $("#withdrawal_address_final").val();
	  
	    let amount = $("#withdrawal_amount_final").val();
	  
	    let gas_limit = $("#gas_limit_final").val();
		
		let wallet_address1 = $("#wallet_address1").val();

		 $("#sendTransactionBNB").attr("disabled","disabled");
					
					$("#sendTransactionBNB").html('<span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>Loading...');
					
					
							    let parameters='{"toAddress":"'+toAddress+'","currency":"'+currency+'","amount":"'+amount+'","wallet_address":"'+wallet_address1+'","contract_address":"'+contract_address+'","gas_limit":"'+gas_limit+'"}';
		  console.log(parameters);
         axios.post(api_link+'/api/createTask', { user_id: user_id, parameters:parameters, task:"withdrawcrypto", module:"wallet"}).then(response => { 
			
				console.log(response.data.status);
				
					if(response.data.status == 400){
						
						  $("#DialogIconedInfo1 .modal-body").html("<b>Transaction has been submitted and is pending completion. <br />You will be notified once the transaction is completed<b/><br /><a class='button btn-primary' href='"+base_url+"AppUser/wallets?funded=true'>Click here to continue</a></div>");
						
					}else {
						
						$("#DialogIconedInfo1 .modal-body").html("<div class='col-lg-6 mx-auto'>Transaction failed with the following error: <b>"+feedback.message+"</b><br /></div>");
						 
					}		

			}).catch(error => {
				
				$("#DialogIconedInfo1 .modal-body").html("<div class='col-lg-6 mx-auto'>Transaction failed with the following error: <b>"+feedback.message+"</b><br /></div>");
				
			}); 									
										

});

$("#sendTransaction").on('click', function() {
										   
										   	  let toAddress = $("#withdrawal_address_final").val();
	  
	  let amount = $("#withdrawal_amount_final").val();
	  
	    let gas_limit = $("#gas_limit_final").val();
		
		let wallet_address1 = $("#wallet_address1").val();

		 $("#sendTransactionBNB").attr("disabled","disabled");
					
					$("#sendTransactionBNB").html('<span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>Loading...');
					
					if(currency=="BNB"){
						
						axios.post(api_link+'/api/sendToken', { contract_address: contract_address, wallet_address: wallet_address1, toAddress:toAddress, amount:amount, gas_limit: gas_limit}).then(response => {
				console.log(response.data)																																					
      let feedback = response.data;
	  
	  console.log(feedback.transactionHash);
	  
	  if(feedback.transactionHash){
		  
		  if(feedback.transactionHash!=""){
		  
		$("#DialogIconedInfo1 .modal-body").html("<div class='col-lg-6 mx-auto'><b>Transaction created with hash: </b><a href='https://testnet.bscscan.com/tx/"+feedback.transactionHash+"' target='_blank'>"+feedback.transactionHash+"</a> and is pending completion. <br /><ul class='listview flush transparent simple-listview'><li>Transaction pending....<div class='spinner-border text-primary' role='status'></div></li></ul></div>");
		
		axios.post(api_link+'/api/completeTransaction', { currency: currency, transaction:feedback}).then(response => { 
				console.log(response.data);	
				
				if(response.data.blockNumber){
					
					if(response.data.blockNumber!=""){
						
						$("#DialogIconedInfo1 .modal-body").html("<div class='col-lg-6 mx-auto'><b>Transaction completed. Click here to view transaction: </b><a href='https://testnet.bscscan.com/tx/"+feedback.transactionHash+"' target='_blank'>"+feedback.transactionHash+"</a></div>");
						
					}else {
						
					}
				}
				
				});
		  }else {
			  
			 $("#DialogIconedInfo1 .modal-body").html("<div class='col-lg-6 mx-auto'><b>Seems an error occurred and transaction couldn't be generated!</b></div>");
			  
		  }
		  
	  }
																												});
					}else {
						
					axios.post(api_link+'/api/b', { address: wallet_address}).then(response => {
																				   
      let balance = response.data;
	  
																												});	
						
					}
											
										

});


$("#depositUsdBtn").on("click", function(){
											 
											 let deposit_channel  = $("#deposit_channel").val();
											 
											 let amount = $("#deposit_usd_amount").val();
											 
											 let user_id = $("#user_id").val();
											 
											 //let gas_limit = $("#gas_limit").val();
											
											 if(deposit_channel==""){
												 
												 $("#toastError .text").html("Choose a deposit option");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 	 if(amount==""){
												 
												  $("#toastError .text").html("Enter deposit amount");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 $(this).attr("disabled","disabled");
					
					$(this).html('<span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>Loading...');
					
						axios.post(api_link+'/api/getDepositChannel', { deposit_channel: deposit_channel, user_id: user_id}).then(response => {
																																	   console.log(response.data)
						
		/*if(response.data.contract_address){
				
				let contract_address = response.data.contract_address;
				
				let the_wallet_address = response.data.wallet_address;
				alert(the_wallet_address);
			}*/
				let contract_address = response.data.contract_address;
				
				let the_wallet_address = response.data.wallet_address;
				
				let the_wallet_address1 = response.data.wallet_address1;
				
				let currency = response.data.currency;
				
				let theCurrency = $("#currency").val();
				
					console.log(the_wallet_address1);	
					
										axios.post(api_link+'/api/tokenBalance', { address: the_wallet_address, tokenAddress: contract_address}).then(response => {
																																				
      let balance = response.data;
	  
	  console.log(balance);
	  
	    if (isNaN(balance)) {
			
  $(this).removeAttr("disabled","disabled");
					
					$(this).html('Confirm Deposit');		
		  
		    $("#toastError .text").html("An error occurred, try again!");
												 
												  toastbox('toastError', 2000);
												
												return false;
  }
	
	  if(balance>=amount){
		  
		  let parameters='{"user_id":"'+user_id+'","currency":"'+currency+'","amount":"'+amount+'"}';
		  
         axios.post(api_link+'/api/createTask', { user_id: user_id, parameters:parameters, task:"fundwallet", module:"wallet"}).then(response => { 
			
				console.log(response.data.status);

                if(response.data.status){
					
					if(response.data.status == 400){
						
						 $("#DepositUSD .modal-body").html("<div class='col-lg-6 mx-auto'><b>Transaction has been submitted and is pending completion. <br />You will be notified once the transaction is completed<b/><br /><a class='button btn-primary' href='"+base_url+"AppUser/wallets?funded=true'>Click here to continue</a></div>");
						
					}else {
						
						 $("#DepositUSD .modal-body").html("<div class='col-lg-6 mx-auto'><b>An error occurred and transaction could not be completed. Error: <br />"+response.data+"<b/></div>");
						 
					}


				}else {

                    $("#DepositUSD .modal-body").html("<div class='col-lg-6 mx-auto'><b>Transaction has been submitted and is pending completion. <br />You will be notified once the transaction is completed<b/><br /><a class='button btn-primary' href='"+base_url+"AppUser/wallets?funded=true'>Click here to continue</a></div>");

				}					

			}).catch(error => {
				
				 $("#DepositUSD .modal-body").html("<div class='col-lg-6 mx-auto'><b>An error occurred<b/>"+err.message+"</div>");
				
			});				
		  
	  }else {
					
			 $(this).removeAttr("disabled","disabled");
					
					$(this).html('Confirm Deposit');		
		  
		    $("#toastError .text").html("Insufficient Balance");
												 
												  toastbox('toastError', 2000);
												
												return false;
	  }
	  
    }).catch(error => {
	  
    });
											 
											 //end check balance here
											 });

//end get deposit option feedback
});


$("#withdrawUsdBtn").on("click", function(){
											 
											 let withdrawal_channel  = $("#withdrawal_channel").val();
											 
											 let amount = $("#withdrawal_usd_amount").val();
											 
											 let withdrawal_fee = $("#withdrawal_fee").val();
											 
											 //alert(withdrawal_fee);
											 
											 let total_transaction_amount = parseFloat(amount)+parseFloat(withdrawal_fee);
											 
											 let user_id = $("#user_id").val();
											 
											 //let gas_limit = $("#gas_limit").val();
											
											 if(withdrawal_channel==""){
												 
												 $("#toastError .text").html("Choose a withdrawal option");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 	 if(amount==""){
												 
												  $("#toastError .text").html("Enter withdrawal amount");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 $(this).attr("disabled","disabled");
					
					$(this).html('<span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>Loading...');
					 
						axios.post(api_link+'/api/usdBalance', { wallet_address: wallet_address}).then(response => {
																																				
      let balance = response.data;
	  
	  console.log(balance);
	  
	    if (isNaN(balance)) {
			
  $(this).removeAttr("disabled","disabled");
					
					$(this).html('Confirm Withdrawal');		
		  
		    $("#toastError .text").html("An error occurred, try again!");
												 
												  toastbox('toastError', 2000);
												
												return false;
  }
	
	  if(balance>=total_transaction_amount){
		  
		  let transaction_ref = $("#transaction_ref").val();
		  
		  //http://localhost:3080/api/withdrawUsd?transaction_ref=4545456565&withdrawal_channel=USDT&amount=1&user_id=8
		 console.log(user_id+"-"+withdrawal_channel+"-"+amount+"-"+transaction_ref);
		 
axios.post(api_link+'/api/withdrawUsd', { user_id: user_id, withdrawal_channel: withdrawal_channel, amount: amount, transaction_ref: transaction_ref}).then(response => {
				console.log(response.data)																														
      let feedback = response.data;
	  
	  if(feedback.status == 400){
		  
		    let parameters='{"user_id":"'+user_id+'","currency":"'+currency+'","amount":"'+amount+'","withdrawal_channel":"'+withdrawal_channel+'"}';
		  console.log(parameters);
         axios.post(api_link+'/api/createTask', { user_id: user_id, parameters:parameters, task:"withdrawtocrypto", module:"wallet"}).then(response => { 
			
				console.log(response.data.status);
				
					if(response.data.status == 400){
						
						  $("#WithdrawUSD .modal-body").html("<b>Transaction has been submitted and is pending completion. <br />You will be notified once the transaction is completed<b/><br /><a class='button btn-primary' href='"+base_url+"AppUser/wallets?funded=true'>Click here to continue</a></div>");
						
					}else {
						
						$("#WithdrawUSD .modal-body").html("<div class='col-lg-6 mx-auto'>Transaction failed with the following error: <b>"+feedback.message+"</b><br /></div>");
						 
					}		

			}).catch(error => {
				
				$("#WithdrawUSD .modal-body").html("<div class='col-lg-6 mx-auto'>Transaction failed with the following error: <b>"+feedback.message+"</b><br /></div>");
				
			});  
	
	  }
	  else {
		
		if(feedback.status == 488){
			
			$("#WithdrawUSD .modal-body").html("<div class='col-lg-6 mx-auto'>Transaction failed with the following error: <b>"+feedback.message+"</b><br /></div>");
			
		}
		  
	  }


    });	
		   
		  
	  }else {
					
			 $(this).removeAttr("disabled","disabled");
					
					$(this).html('Confirm Withdrawal');		
		  
		    $("#toastError .text").html("Insufficient Balance");
												 
												  toastbox('toastError', 2000);
												
												return false;
	  }
	  
    }).catch(error => {
	  
    });
											 
	 //end check balance here
    });
	
	
	$("#createCardBtn").on("click", function(){
											 
											 let card_name  = $("#card_name").val();
											 
											 let amount = $("#amount").val();
											 
											 let transaction_fee = $("#transaction_fee").val();
											 
											 let total_transaction_amount = parseFloat(amount)+parseFloat(transaction_fee);
											 
											 let user_id = $("#user_id").val();
											
											 if(card_name==""){
												 
												 $("#toastError .text").html("Enter a name for the card");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 	 if(amount==""){
												 
												  $("#toastError .text").html("Enter card funding amount");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											  if(transaction_fee==""){
												 
												  $("#toastError .text").html("An error occurred, can't create card");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 $(this).attr("disabled","disabled");
					
					$(this).html('<span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>Loading...');
					
						axios.post(api_link+'/api/usdBalanceByUser', { user_id: user_id}).then(response => {
																																	
      let balance = response.data;
	  
	    if (isNaN(balance)) {
			
  $(this).removeAttr("disabled","disabled");
					
					$(this).html('Create Card');		
		  
		    $("#toastError .text").html("An error occurred, try again!");
												 
												  toastbox('toastError', 2000);
												
												return false;
  }
  
  console.log(total_transaction_amount+"-"+balance);
	
	  if(total_transaction_amount<balance){
		  
		  document.forms.create_card_form.submit();
		  
		 //console.log(user_id+"-"+withdrawal_channel+"-"+amount+"-"+transaction_ref);
		 
        /*axios.post(api_link+'/api/createCard', { user_id: user_id, card_name: card_name, amount: amount, transaction_fee: transaction_fee}).then(response => {
			
			console.log(response.data);
			
			return false;																												
            let feedback = response.data;
	  
	        if(feedback.status == 400){
		  
			  $("#createCard .modal-body").html("<b>Your virtual card has been created. <br />Click here to continue<b/><br /><a class='button btn-primary' href='"+base_url+"AppUser/cards?funded=true'>Click here to continue</a></div>");
						
	          }
	        else {
		
		    if(feedback.status == 488){
			
			   $("#createCard .modal-body").html("<div class='col-lg-6 mx-auto'>Transaction failed with the following error: <b>"+feedback.message+"</b><br /></div>");
			
		    }
			
	      }
		  
        });	*/
		   	  
	  }else {
					
			 $(this).removeAttr("disabled","disabled");
					
					$(this).html('Confirm Withdrawal');		
		  
		    $("#toastError .text").html("Insufficient Balance");
												 
												  toastbox('toastError', 2000);
												
												return false;
	  }
	  
    }).catch(error => {
	  
    });
											 
	 //end check balance here
    });
	
		$("#fundCardBtn").on("click", function(){
											 
											 let card_id  = $("#card_uid").val();
											 
											 let amount = $("#funding_amount").val();
											 
											 let transaction_fee = $("#transaction_fee").val();
											 
											 let total_transaction_amount = parseFloat(amount)+parseFloat(transaction_fee);
											 
											 let user_id = $("#user_id").val();
											
											 if(card_id==""){
												 
												 $("#toastError .text").html("An error occurred");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 if(amount==""){
												 
												  $("#toastError .text").html("An error occurred");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 if(transaction_fee==""){
												 
												  $("#toastError .text").html("An error occurred, can't create card");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 $(this).attr("disabled","disabled");
					
					$(this).html('<span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>Loading...');
					
						axios.post(api_link+'/api/usdBalanceByUser', { user_id: user_id}).then(response => {
																																	
      let balance = response.data;
	  
	    if (isNaN(balance)) {
			
  $(this).removeAttr("disabled","disabled");
					
					$(this).html('Create Card');		
		  
		    $("#toastError .text").html("An error occurred, try again!");
												 
												  toastbox('toastError', 2000);
												
												return false;
  }
  
  console.log(total_transaction_amount+"-"+balance);
	
	  if(total_transaction_amount<=balance){
		  
		 //console.log(user_id+"-"+withdrawal_channel+"-"+amount+"-"+transaction_ref);
		 
axios.post(api_link+'/api/fundCard', { user_id: user_id, card_id: card_id, amount: amount, transaction_fee: transaction_fee}).then(response => {
				console.log(response.data)																														
      let feedback = response.data;
	  
	  if(feedback.status == 400){
		  
		  
						  $("#fundCard .modal-body").html("<b>Your card has been funded. <br />Click here to continue<b/><br /><a class='button btn-primary' href='"+base_url+"AppUser/cards?funded=true'>Click here to continue</a></div>");
						
	
	  }
	  else {
		
		if(feedback.status == 488){
			
			$("#fundCard .modal-body").html("<div class='col-lg-6 mx-auto'>Transaction failed with the following error: <b>"+feedback.message+"</b><br /></div>");
			
		}
		  
	  }


    });	
		   
		  
	  }else {
					
			 $(this).removeAttr("disabled","disabled");
					
					$(this).html('Confirm Withdrawal');		
		  
		    $("#toastError .text").html("Insufficient Balance");
												 
												  toastbox('toastError', 2000);
												
												return false;
	  }
	  
    }).catch(error => {
	  
    });
											 
	 //end check balance here
    });
	
	
	$("#withdrawFromCardBtn").on("click", function(){
		
		let card_uid = $("#card_uid").val();
											 
											 let withdrawal_channel  = $("#withdrawal_channel").val();
											 
											 let amount = $("#withdrawal_usd_amount").val();
											 
											 let withdrawal_fee = $("#withdrawal_fee").val();
											 
											 let total_transaction_amount = parseFloat(amount)+parseFloat(withdrawal_fee);
											 
											 let user_id = $("#user_id").val();
											
											 if(withdrawal_channel==""){
												 
												 $("#toastError .text").html("Choose a withdrawal option");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 	 if(amount==""){
												 
												  $("#toastError .text").html("Enter withdrawal amount");
												 
												  toastbox('toastError', 2000);
												
												return false;
												
											 }
											 
											 $(this).attr("disabled","disabled");
					
					$(this).html('<span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>Loading...');
					 
						axios.post(api_link+'/api/virtualCardBalance', { card_id: card_uid}).then(response => {
					
      let balance = response.data.balance;
	  
	  console.log(balance);
	  
	    if (isNaN(balance)) {
			
  $(this).removeAttr("disabled","disabled");
					
					$(this).html('Withdraw');		
		  
		    $("#toastError .text").html("An error occurred, try again!");
												 
												  toastbox('toastError', 2000);
												
												return false;
  }
	
	  if(balance>=amount){
		  
		  console.log("Balance is sufficient");
		  
		  let transaction_ref = $("#transaction_ref").val();
		 
axios.post(api_link+'/api/withdrawFromCard', { user_id: user_id, card_id: card_uid, withdrawal_wallet: withdrawal_channel, amount: amount, transaction_fee: transaction_fee}).then(response => {
				console.log(response.data)																														
      let feedback = response.data;
	  
	  if(feedback.status == 400){
		  
		  
						  $("#WithdrawUSD .modal-body").html("<b>Your withdrawal has been completed. <br />Click here to continue<b/><br /><a class='button btn-primary' href='"+base_url+"AppUser/cards?funded=true'>Click here to continue</a></div>");
						
	
	  }
	  else {
		
		if(feedback.status == 488){
			
			$("#WithdrawUSD .modal-body").html("<div class='col-lg-6 mx-auto'>Transaction failed with the following error: <b>"+feedback.message+"</b><br /></div>");
			
		}
		  
	  }


    });	
		   
		  
	  }else {
					
			 $(this).removeAttr("disabled","disabled");
					
					$(this).html('Withdraw');		
		  
		    $("#toastError .text").html("Insufficient Balance");
												 
												  toastbox('toastError', 2000);
												
												return false;
	  }
	  
    }).catch(error => {
	  
    });
											 
	 //end check balance here
    });
	
	
	$("#deleteVirtualCardBtn").on("click", function(){
		
		let card_uid = $("#card_uid").val();
											 
											 let withdrawal_channel  = "USD";
											 
											 let transaction_fee = "0.5";
											 
											 let user_id = $("#user_id").val();
											
											 $(this).attr("disabled","disabled");
					
					$("#deleteModalButtons").html('<span style="padding:10px;" class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>Loading...');
					
axios.post(api_link+'/api/terminateCard', { user_id: user_id, card_id: card_uid, withdrawal_wallet: withdrawal_channel, transaction_fee: transaction_fee}).then(response => {
				console.log(response.data)																														
      let feedback = response.data;
	  
	  if(feedback.status == 400){
		  
		  
						  $("#deleteModal .modal-body").html("<b>Card has been deleted. <br />Click here to continue<b/><br /><a class='button btn-primary' href='"+base_url+"AppUser/cards?funded=true'>Click here to continue</a></div>");
						  
						  $("#deleteModalButtons").html("");
						
	
	  }
	  else {
		
		if(feedback.status == 488){
			
			$("#deleteModal .modal-body").html("<div class='col-lg-6 mx-auto'>Transaction failed with the following error: <b>"+feedback.message+"</b><br /><br /><a class='button btn-primary' href='"+base_url+"AppUser/cards?funded=true'>Click here to continue</a></div>");
			
			$("#deleteModalButtons").html("");
		}
		  
	  }


    });	
											 
	 //end check balance here
    });

//-----------------------------------------------------------------------
// Go Back Button
var goBackButton = document.querySelectorAll(".goBack");
goBackButton.forEach(function (el) {
    el.addEventListener("click", function () {
        window.history.go(-1);
    })
})
//-----------------------------------------------------------------------

//-----------------------------------------------------------------------
// Tooltip
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})
//-----------------------------------------------------------------------

//-----------------------------------------------------------------------
// Fix for # href
//-----------------------------------------------------------------------
var aWithHref = document.querySelectorAll('a[href*="#"]');
aWithHref.forEach(function (el) {
    el.addEventListener("click", function (e) {
        e.preventDefault();
    })
});
//-----------------------------------------------------------------------


//-----------------------------------------------------------------------
// Input
// Clear input
var clearInput = document.querySelectorAll(".clear-input");
clearInput.forEach(function (el) {
    el.addEventListener("click", function () {
        var parent = this.parentElement
        var input = parent.querySelector(".form-control")
        input.focus();
        input.value = "";
        parent.classList.remove("not-empty");
    })
})
// active
var formControl = document.querySelectorAll(".form-group .form-control");
formControl.forEach(function (el) {
    // active
    el.addEventListener("focus", () => {
        var parent = el.parentElement
        parent.classList.add("active")
    });
    el.addEventListener("blur", () => {
        var parent = el.parentElement
        parent.classList.remove("active")
    });
    // empty check
    el.addEventListener("keyup", log);
    function log(e) {
        var inputCheck = this.value.length;
        if (inputCheck > 0) {
            this.parentElement.classList.add("not-empty")
        }
        else {
            this.parentElement.classList.remove("not-empty")
        }
    }
})
//-----------------------------------------------------------------------

//-----------------------------------------------------------------------
// Searchbox Toggle
var searchboxToggle = document.querySelectorAll(".toggle-searchbox")
searchboxToggle.forEach(function (el) {
    el.addEventListener("click", function () {
        var search = document.getElementById("search")
        var a = search.classList.contains("show")
        if (a) {
            search.classList.remove("show")
        }
        else {
            search.classList.add("show")
            search.querySelector(".form-control").focus();
        }
    })
});
//-----------------------------------------------------------------------

//-----------------------------------------------------------------------
// Carousel
// Splide Carousel
document.addEventListener('DOMContentLoaded', function () {

    // Full Carousel
    document.querySelectorAll('.carousel-full').forEach(carousel => new Splide(carousel, {
        perPage: 1,
        rewind: true,
        type: "loop",
        gap: 0,
        arrows: false,
        pagination: false,
    }).mount());

    // Single Carousel
    document.querySelectorAll('.carousel-single').forEach(carousel => new Splide(carousel, {
        perPage: 3,
        rewind: true,
        gap: 16,
        padding: 16,
        arrows: false,
        pagination: false,
        breakpoints: {
            768: {
                perPage: 1
            },
            991: {
                perPage: 2
            }
        }
    }).mount());

    // Multiple Carousel
    document.querySelectorAll('.carousel-multiple').forEach(carousel => new Splide(carousel, {
        perPage: 4,
        rewind: true,
        type: "loop",
        gap: 16,
        padding: 16,
        arrows: false,
        pagination: false,
        breakpoints: {
            768: {
                perPage: 2
            },
            991: {
                perPage: 3
            }
        }
    }).mount());

    // Small Carousel
    document.querySelectorAll('.carousel-small').forEach(carousel => new Splide(carousel, {
        perPage: 9,
        rewind: false,
        type: "loop",
        gap: 16,
        padding: 16,
        arrows: false,
        pagination: false,
        breakpoints: {
            768: {
                perPage: 4
            },
            991: {
                perPage: 7
            }
        }
    }).mount());

    // Slider Carousel
    document.querySelectorAll('.carousel-slider').forEach(carousel => new Splide(carousel, {
        perPage: 1,
        rewind: false,
        type: "loop",
        gap: 16,
        padding: 16,
        arrows: false,
        pagination: true
    }).mount());

    // Stories Carousel
    document.querySelectorAll('.story-block').forEach(carousel => new Splide(carousel, {
        perPage: 16,
        rewind: false,
        type: "slide",
        gap: 16,
        padding: 16,
        arrows: false,
        pagination: false,
        breakpoints: {
            500: {
                perPage: 4
            },
            768: {
                perPage: 7
            },
            1200: {
                perPage: 11
            }
        }
    }).mount());
});
//-----------------------------------------------------------------------


//-----------------------------------------------------------------------
// Upload Input
var uploadComponent = document.querySelectorAll('.custom-file-upload');
uploadComponent.forEach(function (el) {
    var fileUploadParent = '#' + el.id;
    var fileInput = document.querySelector(fileUploadParent + ' input[type="file"]')
    var fileLabel = document.querySelector(fileUploadParent + ' label')
    var fileLabelText = document.querySelector(fileUploadParent + ' label span')
    var filelabelDefault = fileLabelText.innerHTML;
    fileInput.addEventListener('change', function (event) {
        var name = this.value.split('\\').pop()
        tmppath = URL.createObjectURL(event.target.files[0]);
        if (name) {
            fileLabel.classList.add('file-uploaded');
            fileLabel.style.backgroundImage = "url(" + tmppath + ")";
            fileLabelText.innerHTML = name;
        }
        else {
            fileLabel.classList.remove("file-uploaded")
            fileLabelText.innerHTML = filelabelDefault;
        }
    })
})
//-----------------------------------------------------------------------


//-----------------------------------------------------------------------
// Notification
// trigger notification
var notificationCloseButton = document.querySelectorAll(".notification-box .close-button");
var notificationTaptoClose = document.querySelectorAll(".tap-to-close .notification-dialog");
var notificationBox = document.querySelectorAll(".notification-box");

function closeNotificationBox() {
    notificationBox.forEach(function (el) {
        el.classList.remove("show")
    })
}
function notification(target, time) {
    var a = document.getElementById(target);
    closeNotificationBox()
    setTimeout(() => {
        a.classList.add("show")
    }, 250);
    if (time) {
        time = time + 250;
        setTimeout(() => {
            closeNotificationBox()
        }, time);
    }
}
// close notification
notificationCloseButton.forEach(function (el) {
    el.addEventListener("click", function (e) {
        e.preventDefault();
        closeNotificationBox();
    })
});

// tap to close notification
notificationTaptoClose.forEach(function (el) {
    el.addEventListener("click", function (e) {
        closeNotificationBox();
    })
});
//-----------------------------------------------------------------------


//-----------------------------------------------------------------------
// Toast
// trigger toast
var toastCloseButton = document.querySelectorAll(".toast-box .close-button");
var toastTaptoClose = document.querySelectorAll(".toast-box.tap-to-close");
var toastBoxes = document.querySelectorAll(".toast-box");

function closeToastBox() {
    toastBoxes.forEach(function (el) {
        el.classList.remove("show")
    })
}
function toastbox(target, time) {
    var a = document.getElementById(target);
    closeToastBox()
    setTimeout(() => {
        a.classList.add("show")
    }, 100);
    if (time) {
        time = time + 100;
        setTimeout(() => {
            closeToastBox()
        }, time);
    }
}
// close button toast
toastCloseButton.forEach(function (el) {
    el.addEventListener("click", function (e) {
        e.preventDefault();
        closeToastBox();
    })
})
// tap to close toast
toastTaptoClose.forEach(function (el) {
    el.addEventListener("click", function (e) {
        closeToastBox();
    })
})
//-----------------------------------------------------------------------

//-----------------------------------------------------------------------
// Add to Home
var osDetection = navigator.userAgent || navigator.vendor || window.opera;
var windowsPhoneDetection = /windows phone/i.test(osDetection);
var androidDetection = /android/i.test(osDetection);
var iosDetection = /iPad|iPhone|iPod/.test(osDetection) && !window.MSStream;

function iosAddtoHome() {
    var modal = new bootstrap.Modal(document.getElementById('ios-add-to-home-screen'))
    modal.toggle()
}
function androidAddtoHome() {
    var modal = new bootstrap.Modal(document.getElementById('android-add-to-home-screen'))
    modal.toggle()
}
function AddtoHome(time, once) {
    if (once) {
        var AddHomeStatus = localStorage.getItem("FinappAddtoHome");
        if (AddHomeStatus === "1" || AddHomeStatus === 1) {
            // already showed up
        }
        else {
            localStorage.setItem("FinappAddtoHome", 1)
            window.addEventListener('load', () => {
                if (navigator.standalone) {
                    // if app installed ios home screen
                }
                else if (matchMedia('(display-mode: standalone)').matches) {
                    // if app installed android home screen
                }
                else {
                    // if app is not installed
                    if (androidDetection) {
                        setTimeout(() => {
                            androidAddtoHome()
                        }, time);
                    }
                    if (iosDetection) {
                        setTimeout(() => {
                            iosAddtoHome()
                        }, time);
                    }
                }
            });
        }
    }
    else {
        window.addEventListener('load', () => {
            if (navigator.standalone) {
                // app loaded to ios
            }
            else if (matchMedia('(display-mode: standalone)').matches) {
                // app loaded to android
            }
            else {
                // app not loaded
                if (androidDetection) {
                    setTimeout(() => {
                        androidAddtoHome()
                    }, time);
                }
                if (iosDetection) {
                    setTimeout(() => {
                        iosAddtoHome()
                    }, time);
                }
            }
        });
    }

}
//-----------------------------------------------------------------------


//-----------------------------------------------------------------------
// Dark Mode
var checkDarkModeStatus = localStorage.getItem("FinappDarkmode");
var switchDarkMode = document.querySelectorAll(".dark-mode-switch");
var pageBody = document.querySelector("body");
var pageBodyActive = pageBody.classList.contains("dark-mode");

function switchDarkModeCheck(value) {
    switchDarkMode.forEach(function (el) {
        el.checked = value
    })
}
// if dark mode on
if (checkDarkModeStatus === 1 || checkDarkModeStatus === "1") {
    switchDarkModeCheck(true);
    if (pageBodyActive) {
        // dark mode already activated
    }
    else {
        pageBody.classList.add("dark-mode")
    }
}
else {
    switchDarkModeCheck(false);
}
switchDarkMode.forEach(function (el) {
    el.addEventListener("click", function () {
        var darkmodeCheck = localStorage.getItem("FinappDarkmode");
        if (darkmodeCheck === 1 || darkmodeCheck === "1") {
            pageBody.classList.remove("dark-mode");
            localStorage.setItem("FinappDarkmode", "0");
            switchDarkModeCheck(false);
        }
        else {
            pageBody.classList.add("dark-mode")
            switchDarkModeCheck(true);
            localStorage.setItem("FinappDarkmode", "1");
        }
    })
})

//-----------------------------------------------------------------------
