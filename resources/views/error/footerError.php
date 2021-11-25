<!-- Basic modal -->
				<div id="modal_default" class="modal fade" style="width:1200px;">
					<div class="modal-dialog" style="width:100%;">
						<div class="modal-content" style="width:100%;">
							<div class="modal-header bg-black">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h5 class="modal-title">Basic modal</h5>
							</div>

							<div class="modal-body" id="modal-body">
						
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-link bg-black" data-dismiss="modal">Close</button>
								
							</div>
						</div>
					</div>
				</div>
                 <!-- Core JS files -->
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/ui/drilldown.js"></script>
	<!-- /core JS files -->
   <!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/pickers/anytime.min.js"></script>
    	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/pickers/datepicker.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/pickers/pickadate/legacy.js"></script>


	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
    	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/tables/datatables/extensions/fixed_header.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
    

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/velocity/velocity.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/velocity/velocity.ui.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/buttons/spin.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/buttons/ladda.min.js"></script>

	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/core/app.js"></script>
    	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/pages/picker_date.js"></script>
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/forms/selects/bootstrap_select.min.js"></script>

	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/pages/form_bootstrap_select.js"></script>

	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/pages/components_buttons.js"></script>
    	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/pages/components_modals.js"></script>

	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/ui/ripple.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/pages/datatables_extension_buttons_html5.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/chosen/chosen.jquery.min.js"></script>
 <script src="<?php echo ASSETS_URL; ?>assets/js/pages/timeline.js" type="text/javascript"></script>
                <script type="text/javascript">
			
			function LoadModal(url,title) {
	
  var xhttp; 

 modal = $("#modal_default");
 modal_body = $("#modal_default .modal-body");
 modal_title = $(".modal-title");

 $.blockUI({ 
	    message: '<i class="icon-spinner4 spinner"></i>',
	    timeout: 2000, //unblock after 2 seconds
	    overlayCSS: {
	        backgroundColor: '#1b2024',
	        opacity: 0.8,
	        cursor: 'wait'
	    },
	    css: {
	        border: 0,
	        color: '#fff',
	        padding: 0,
	        backgroundColor: 'transparent'
	    }
	});
  xhttp = new XMLHttpRequest();
  modal_body.load(url);
  modal.modal();
  xhttp.onreadystatechange = function() {
	 
    if (xhttp.readyState == 4 && xhttp.status == 200) {
    //modal.modal();
	//document.getElementById("modal-body").innerHTML = this.responseText;
	modal_title.html(title);
    }
  };
 
  xhttp.open("GET", url, true);
  xhttp.send();
	
}	

var data = {};
    base = 'http://localhost/isntelco/';
	
	$('#addSupplierAccount button[type=submit]').on('click', function() {
	
blockPage();
   
	   var url = base+'app/CheckAccount';
	   
        Supplier = document.getElementById("Supplier").value;

		CustomerID = document.getElementById("CustomerID").value;
		
		AccountNo = document.getElementById("AccountNo").value;
		
      $.ajax({
          type: 'POST',
          url: url,
          data: {'SupplierID': Supplier, 'AccountNo':AccountNo, 'CustomerID':CustomerID},
          success: function(resp) {
			 
              if (resp == "") {
                  	//successful validation
                      $('form').submit();
                  	return false;
              } 
			  else if(resp == "exists") {
                 alert(resp);
				 unBlockPage();
              }
			  else if(resp == "CommissionGroupError") {
                 alert("This commission group doesn't exist");
				  $('form').submit();
              }
			  
              return false;
          },
          error: function() {
              console.log('there was a problem checking the fields');
          }
      });
      return false;
  });


$('#addSupplierProduct button[type=submit]').on('click', function() {
	
blockPage();
   
	   var url = base+'app/CheckProduct';
	   
        Supplier = document.getElementById("Supplier").value;

		Product = document.getElementById("Product").value;
		
		CommissionGroup = document.getElementById("CommissionGroup").value;
		
      $.ajax({
          type: 'POST',
          url: url,
          data: {'SupplierID': Supplier, 'Product':Product, 'CommissionGroup':CommissionGroup},
          success: function(resp) {
			 
              if (resp == "") {
                  	//successful validation
                      $('form').submit();
                  	return false;
              } 
			  else if(resp == "exists") {
                 alert(resp);
				 unBlockPage();
              }
			  else if(resp == "CommissionGroupError") {
                 alert("This commission group doesn't exist");
				  $('form').submit();
              }
			  
              return false;
          },
          error: function() {
              console.log('there was a problem checking the fields');
          }
      });
      return false;
  });

$('#editSupplierProduct button[type=submit]').on('click', function() {
	
blockPage();
   
	   var url = base+'app/CheckProductEdit';
	   
        ProductID = document.getElementById("ProductID").value;

		Product = document.getElementById("Product").value;
		
		Supplier = document.getElementById("SupplierID").value;
		
		CommissionGroup = document.getElementById("CommissionGroup").value;
		
      $.ajax({
          type: 'POST',
          url: url,
          data: {'SupplierID': Supplier, 'Product':Product, 'ProductID':ProductID, 'CommissionGroup':CommissionGroup},
          success: function(resp) {
			    
             if (resp == "") {
                  	//successful validation
                      $('form').submit();
                  	return false;
              } 
			  else if(resp == "exists") {
                 alert(resp);
				 unBlockPage();
              }
			  else if(resp == "CommissionGroupError") {
                 alert("This commission group doesn't exist");
				  $('form').submit();
              }
              return false;
          },
          error: function() {
              console.log('there was a problem checking the fields');
          }
      });
      return false;
  });


  $('#addCommissionGroup button[type=submit]').on('click', function() {
	
blockPage();
      
	   var url = base+'app/CheckCommissionGroup';
        Supplier = document.getElementById("Supplier").value;
		
		CommissionGroupName = document.getElementById("CommissionGroupName").value;
      $.ajax({
          type: 'POST',
          url: url,
          data: {'SupplierID': Supplier, 'CommissionGroupName':CommissionGroupName},
          success: function(resp) {
			 
              if (resp == "") {
                  	//successful validation
                      $('form').submit();
                  	return false;
              } else {
                 alert(resp);
				 unBlockPage();
              }
              return false;
          },
          error: function() {
              console.log('there was a problem checking the fields');
          }
      });
      return false;
  });
//});

 $('#addsupplierform button[type=submit]').on('click', function() {
	  
blockPage();
     
	  var url = base+'app/checksupplier';
        Supplier = document.getElementById("Supplier").value;
      $.ajax({
          type: 'POST',
          url: url,
          data: {'Supplier': Supplier},
          success: function(resp) {
			 
              if (resp == "") {
                  	//successful validation
                      $('form').submit();
                  	return false;
              } else {
                 alert(resp);
				 unBlockPage();
              }
              return false;
          },
          error: function() {
              console.log('there was a problem checking the fields');
          }
      });
      return false;
  });


function blockUI(){
	$.blockUI({ 
	    message: '<i class="icon-spinner4 spinner"></i>',
	    timeout: 2000, //unblock after 2 seconds
	    overlayCSS: {
	        backgroundColor: '#1b2024',
	        opacity: 0.8,
	        cursor: 'wait'
	    },
	    css: {
	        border: 0,
	        color: '#fff',
	        padding: 0,
	        backgroundColor: 'transparent'
	    }
	});
}

function blockPage(){
	$.blockUI({ 
	    message: '<i class="icon-spinner4 spinner"></i>',
	    //timeout: 2000, //unblock after 2 seconds
	    overlayCSS: {
	        backgroundColor: '#1b2024',
	        opacity: 0.8,
	        cursor: 'wait'
	    },
	    css: {
	        border: 0,
	        color: '#fff',
	        padding: 0,
	        backgroundColor: 'transparent'
	    }
	});
}

function unBlockPage(){
	$.blockUI({ 
	 
	    timeout: 900, //unblock after 2 seconds
	});
}

  // Numeric date
    $("#anytime-month-numeric1").AnyTime_picker({
        format: "%d/%m/%Z"
    });
	
	
function comboInit(thelist)
{
  theinput = document.getElementById(theinput);  
  var idx = thelist.selectedIndex;
  var content = thelist.options[idx].innerHTML;
  if(theinput.value == "")
    theinput.value = content;	
}

function combo(thelist, theinput)
{
  theinput = document.getElementById(theinput);  
  var idx = thelist.selectedIndex;
  var content = thelist.options[idx].innerHTML;
  theinput.value = content;	
}

//$(".chosen-select").chosen();
var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"100%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
 
function SelectCustomer(CustomerID,CustomerName) {

blockPage();
$('#CustomerBox button.dropdown-toggle').attr('title',CustomerName);

$('#CustomerBox button.dropdown-toggle').html('<span class="filter-option pull-left">'+CustomerName+'</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span>');

$('#CustomerBox .input-group .dropdown-menu').html('<li data-original-index="0" class="selected"><a tabindex="0" class="" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">'+CustomerName+'</span><span class=" icon-checkmark3 check-mark"></span></a></li>');

 $('#CustomerBox #customer-select').html("<option value='"+CustomerID+"'>"+CustomerName+"</option>");  
     
	 unBlockPage();
	
}

function ResetSelectCustomer() {

blockPage();
$('#CustomerBox button.dropdown-toggle').attr('title','Nothing selected');

$('#CustomerBox button.dropdown-toggle').html('<span class="filter-option pull-left">Nothing selected</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span>');

$('#CustomerBox .input-group .dropdown-menu').html('');

 $('#CustomerBox #customer-select').html("<option value=''></option>");  
     
	 unBlockPage();
	
}


function SelectOpportunity(OpportunityID,OpportunityName) {

blockPage();
$('#OpportunityBox button.dropdown-toggle').attr('title',OpportunityName);

$('#OpportunityBox button.dropdown-toggle').html('<span class="filter-option pull-left">'+OpportunityName+'</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span>');

$('#OpportunityBox .input-group .dropdown-menu').html('<li data-original-index="0" class="selected"><a tabindex="0" class="" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">'+OpportunityName+'</span><span class=" icon-checkmark3 check-mark"></span></a></li>');

 $('#OpportunityBox #opportunity-select').html("<option value='"+OpportunityID+"'>"+OpportunityName+"</option>");  
     
	 unBlockPage();
	
}

function ResetSelectOpportunity() {

blockPage();
$('#OpportunityBox button.dropdown-toggle').attr('title','Nothing selected');

$('#OpportunityBox button.dropdown-toggle').html('<span class="filter-option pull-left">Nothing selected</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span>');

$('#Opportunity .input-group .dropdown-menu').html('');

 $('#Opportunity #customer-select').html("<option value=''></option>");  
     
	 unBlockPage();
	
}

 $('.mydatepicker').datepicker({ dateFormat: 'YY/MM/DD' });
</script>
<script type="application/javascript">

function checkSelected(Action){

	if(Action=="createupdate"){
 $("#DuplicatesKey").attr("required","required");	
	}
	 if(Action=="create"){
 $("#DuplicatesKey").removeAttr("required");	
	}
}

function checkForm(){
    
    DuplicateRecords = document.getElementById("duplicaterecords").selected;
    FindDuplicates = document.getElementById("findduplicatesusing");
  
     /*if(DuplicateRecords=="createupdate"){
               
         if(FindDuplicates == ""){
             
             alert("Select how to detect duplicate records!");
        return false;
             
         }
    }*/
    
    
}



</script>
<script type="text/javascript">

	 $("#dati").datepicker();


</script>

<script type="application/javascript">

$("#addRow").on('click', function(){
	
	id1 = parseInt($("#row tbody tr:last").attr("id"))+1;
	 //$("#products table:last tr:last").attr("id",id1);
	 
product = document.getElementById("product").innerHTML;
suppliers = document.getElementById("suppliers").innerHTML;

$("#row").append("<tr id='"+id1+"'><td><input class='form-control' type='text' name='location[]'></td><td><select class='form-control' name='product[]'>"+product+"</select></td><td><select class='form-control' name='supplier'>"+suppliers+"</select></td><td><div class='input-group'><span class='input-group-addon'><i class='icon-calendar3'></i></span><input type='text' class='form-control anytime-month-numeric1' id='' value='' data-provide='datepicker' name='date[]'> </div></td><td><input type='text' value='' name='note[]' class='form-control' id='' placeholder=''></td></tr>");

//$("script").append('$("#anytime-month-numeric'+id1+'").AnyTime_picker({ format: "%d/%m/%Z" });');
  
});

$("#addProductRow").on('click', function(){
	
$("#row").append('<tr id="1"><td><input type="hidden" name="item[]" /><input type="text" class="form-control" name="product[]"/> </td> <td><input type="text" class="form-control" name="quantity[]"/> </td><td><input type="text" class="form-control" name="unit_price[]"/></td> <td><select class="form-control" name="taxable[]" id="suppliers"> <option value="">Choose...</option> <option value="Taxable">Taxable</option> </select>  </td> <td> <select class="form-control" name="tax_type[]" id="suppliers"> <option value="">Choose...</option><option value="Sales Tax">Sales Tax</option><option value="VAT">VAT</option></select></td> </tr>');

});

var form = document.forms.namedItem("share");
form.addEventListener('submit', function(ev)  {

    document.getElementById('loading').innerHTML = "please wait..."
    var oOutput = document.getElementById("display_timeline");
    oData = new FormData(form);

    var oReq = new XMLHttpRequest();
    oReq.open("POST", BASE_URL+'main/share', true);
    oReq.onload = function(oEvent) {
        if (oReq.status == 200) {
            old = oOutput.innerHTML;
            oOutput.innerHTML = oReq.responseText + old;
            document.getElementById('loading').innerHTML = "";
            document.getElementById('topic').value = "";
            document.getElementById('img').src = "#";
        } else {
            oOutput.innerHTML = "Error " + oReq.status + " occurred when trying to upload your file.<br \/>";
        }
    };

oReq.send(oData);
ev.preventDefault();
}, false);



   function choose_file() {
    
    document.getElementById("files").click();
}    
    
    
document.getElementById("files").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
        $("#image-con").show();
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};


</script>
<!-- Footer -->
	<div class="footer" align="center" style="color:#000">
		&copy; 2017. <a href="#">Powered by TST</a>
	</div>
	<!-- /footer -->

</body>

</html>

