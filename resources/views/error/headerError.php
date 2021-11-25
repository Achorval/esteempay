<?php
$model = $this->model;
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ISNTelco</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo ASSETS_URL; ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo ASSETS_URL; ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo ASSETS_URL; ?>assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo ASSETS_URL; ?>assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo ASSETS_URL; ?>assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?php echo ASSETS_URL; ?>assets/css/extras/animate.min.css" rel="stylesheet" type="text/css">
   
	<!-- /global stylesheets -->
    
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
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/pickers/pickadate/legacy.js"></script>


	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/pages/picker_date.js"></script>
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
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
    

	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/pages/components_buttons.js"></script>
    	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/pages/components_modals.js"></script>

	<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/ui/ripple.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/pages/datatables_extension_buttons_html5.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_URL; ?>assets/js/plugins/chosen/chosen.jquery.min.js"></script>
 <link href= type="text/css">
</head>
<style>
/* @group Base */
.chosen-container {
  position: relative;
  display: inline-block;
  vertical-align: middle;
  font-size: 13px;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}
.chosen-container * {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.chosen-container .chosen-drop {
  position: absolute;
  top: 100%;
  left: -9999px;
  z-index: 1010;
  width: 100%;
  border: 1px solid #aaa;
  border-top: 0;
  background: #fff;
  box-shadow: 0 4px 5px rgba(0, 0, 0, 0.15);
}
.chosen-container.chosen-with-drop .chosen-drop {
  left: 0;
}
.chosen-container a {
  cursor: pointer;
}
.chosen-container .search-choice .group-name, .chosen-container .chosen-single .group-name {
  margin-right: 4px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
  font-weight: normal;
  color: #999999;
}
.chosen-container .search-choice .group-name:after, .chosen-container .chosen-single .group-name:after {
  content: ":";
  padding-left: 2px;
  vertical-align: top;
}

/* @end */
/* @group Single Chosen */
.chosen-container-single .chosen-single {
  position: relative;
  display: block;
  overflow: hidden;
  padding: 0 0 0 8px;
  height: 25px;
  border: 1px solid #aaa;
  border-radius: 5px;
  background-color: #fff;
  background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(20%, #ffffff), color-stop(50%, #f6f6f6), color-stop(52%, #eeeeee), color-stop(100%, #f4f4f4));
  background: -webkit-linear-gradient(#ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
  background: -moz-linear-gradient(#ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
  background: -o-linear-gradient(#ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
  background: linear-gradient(#ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
  background-clip: padding-box;
  box-shadow: 0 0 3px white inset, 0 1px 1px rgba(0, 0, 0, 0.1);
  color: #444;
  text-decoration: none;
  white-space: nowrap;
  line-height: 24px;
}
.chosen-container-single .chosen-default {
  color: #999;
}
.chosen-container-single .chosen-single span {
  display: block;
  overflow: hidden;
  margin-right: 26px;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.chosen-container-single .chosen-single-with-deselect span {
  margin-right: 38px;
}
.chosen-container-single .chosen-single abbr {
  position: absolute;
  top: 6px;
  right: 26px;
  display: block;
  width: 12px;
  height: 12px;
  background: url('chosen-sprite.png') -42px 1px no-repeat;
  font-size: 1px;
}
.chosen-container-single .chosen-single abbr:hover {
  background-position: -42px -10px;
}
.chosen-container-single.chosen-disabled .chosen-single abbr:hover {
  background-position: -42px -10px;
}
.chosen-container-single .chosen-single div {
  position: absolute;
  top: 0;
  right: 0;
  display: block;
  width: 18px;
  height: 100%;
}
.chosen-container-single .chosen-single div b {
  display: block;
  width: 100%;
  height: 100%;
  background: url('chosen-sprite.png') no-repeat 0px 2px;
}
.chosen-container-single .chosen-search {
  position: relative;
  z-index: 1010;
  margin: 0;
  padding: 3px 4px;
  white-space: nowrap;
}
.chosen-container-single .chosen-search input[type="text"] {
  margin: 1px 0;
  padding: 4px 20px 4px 5px;
  width: 100%;
  height: auto;
  outline: 0;
  border: 1px solid #aaa;
  background: white url('chosen-sprite.png') no-repeat 100% -20px;
  background: url('chosen-sprite.png') no-repeat 100% -20px;
  font-size: 1em;
  font-family: sans-serif;
  line-height: normal;
  border-radius: 0;
}
.chosen-container-single .chosen-drop {
  margin-top: -1px;
  border-radius: 0 0 4px 4px;
  background-clip: padding-box;
}
.chosen-container-single.chosen-container-single-nosearch .chosen-search {
  position: absolute;
  left: -9999px;
}

/* @end */
/* @group Results */
.chosen-container .chosen-results {
  color: #444;
  position: relative;
  overflow-x: hidden;
  overflow-y: auto;
  margin: 0 4px 4px 0;
  padding: 0 0 0 4px;
  max-height: 240px;
  -webkit-overflow-scrolling: touch;
}
.chosen-container .chosen-results li {
  display: none;
  margin: 0;
  padding: 5px 6px;
  list-style: none;
  line-height: 15px;
  word-wrap: break-word;
  -webkit-touch-callout: none;
}
.chosen-container .chosen-results li.active-result {
  display: list-item;
  cursor: pointer;
}
.chosen-container .chosen-results li.disabled-result {
  display: list-item;
  color: #ccc;
  cursor: default;
}
.chosen-container .chosen-results li.highlighted {
  background-color: #3875d7;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(20%, #3875d7), color-stop(90%, #2a62bc));
  background-image: -webkit-linear-gradient(#3875d7 20%, #2a62bc 90%);
  background-image: -moz-linear-gradient(#3875d7 20%, #2a62bc 90%);
  background-image: -o-linear-gradient(#3875d7 20%, #2a62bc 90%);
  background-image: linear-gradient(#3875d7 20%, #2a62bc 90%);
  color: #fff;
}
.chosen-container .chosen-results li.no-results {
  color: #777;
  display: list-item;
  background: #f4f4f4;
}
.chosen-container .chosen-results li.group-result {
  display: list-item;
  font-weight: bold;
  cursor: default;
}
.chosen-container .chosen-results li.group-option {
  padding-left: 15px;
}
.chosen-container .chosen-results li em {
  font-style: normal;
  text-decoration: underline;
}

/* @end */
/* @group Multi Chosen */
.chosen-container-multi .chosen-choices {
  position: relative;
  overflow: hidden;
  margin: 0;
  padding: 0 5px;
  width: 100%;
  height: auto;
  border: 1px solid #aaa;
  background-color: #fff;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(1%, #eeeeee), color-stop(15%, #ffffff));
  background-image: -webkit-linear-gradient(#eeeeee 1%, #ffffff 15%);
  background-image: -moz-linear-gradient(#eeeeee 1%, #ffffff 15%);
  background-image: -o-linear-gradient(#eeeeee 1%, #ffffff 15%);
  background-image: linear-gradient(#eeeeee 1%, #ffffff 15%);
  cursor: text;
}
.chosen-container-multi .chosen-choices li {
  float: left;
  list-style: none;
}
.chosen-container-multi .chosen-choices li.search-field {
  margin: 0;
  padding: 0;
  white-space: nowrap;
}
.chosen-container-multi .chosen-choices li.search-field input[type="text"] {
  margin: 1px 0;
  padding: 0;
  height: 25px;
  outline: 0;
  border: 0 !important;
  background: transparent !important;
  box-shadow: none;
  color: #999;
  font-size: 100%;
  font-family: sans-serif;
  line-height: normal;
  border-radius: 0;
}
.chosen-container-multi .chosen-choices li.search-choice {
  position: relative;
  margin: 3px 5px 3px 0;
  padding: 3px 20px 3px 5px;
  border: 1px solid #aaa;
  max-width: 100%;
  border-radius: 3px;
  background-color: #eeeeee;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(20%, #f4f4f4), color-stop(50%, #f0f0f0), color-stop(52%, #e8e8e8), color-stop(100%, #eeeeee));
  background-image: -webkit-linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
  background-image: -moz-linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
  background-image: -o-linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
  background-image: linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
  background-size: 100% 19px;
  background-repeat: repeat-x;
  background-clip: padding-box;
  box-shadow: 0 0 2px white inset, 0 1px 0 rgba(0, 0, 0, 0.05);
  color: #333;
  line-height: 13px;
  cursor: default;
}
.chosen-container-multi .chosen-choices li.search-choice span {
  word-wrap: break-word;
}
.chosen-container-multi .chosen-choices li.search-choice .search-choice-close {
  position: absolute;
  top: 4px;
  right: 3px;
  display: block;
  width: 12px;
  height: 12px;
  background: url('chosen-sprite.png') -42px 1px no-repeat;
  font-size: 1px;
}
.chosen-container-multi .chosen-choices li.search-choice .search-choice-close:hover {
  background-position: -42px -10px;
}
.chosen-container-multi .chosen-choices li.search-choice-disabled {
  padding-right: 5px;
  border: 1px solid #ccc;
  background-color: #e4e4e4;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(20%, #f4f4f4), color-stop(50%, #f0f0f0), color-stop(52%, #e8e8e8), color-stop(100%, #eeeeee));
  background-image: -webkit-linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
  background-image: -moz-linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
  background-image: -o-linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
  background-image: linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
  color: #666;
}
.chosen-container-multi .chosen-choices li.search-choice-focus {
  background: #d4d4d4;
}
.chosen-container-multi .chosen-choices li.search-choice-focus .search-choice-close {
  background-position: -42px -10px;
}
.chosen-container-multi .chosen-results {
  margin: 0;
  padding: 0;
}
.chosen-container-multi .chosen-drop .result-selected {
  display: list-item;
  color: #ccc;
  cursor: default;
}

/* @end */
/* @group Active  */
.chosen-container-active .chosen-single {
  border: 1px solid #5897fb;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
}
.chosen-container-active.chosen-with-drop .chosen-single {
  border: 1px solid #aaa;
  -moz-border-radius-bottomright: 0;
  border-bottom-right-radius: 0;
  -moz-border-radius-bottomleft: 0;
  border-bottom-left-radius: 0;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(20%, #eeeeee), color-stop(80%, #ffffff));
  background-image: -webkit-linear-gradient(#eeeeee 20%, #ffffff 80%);
  background-image: -moz-linear-gradient(#eeeeee 20%, #ffffff 80%);
  background-image: -o-linear-gradient(#eeeeee 20%, #ffffff 80%);
  background-image: linear-gradient(#eeeeee 20%, #ffffff 80%);
  box-shadow: 0 1px 0 #fff inset;
}
.chosen-container-active.chosen-with-drop .chosen-single div {
  border-left: none;
  background: transparent;
}
.chosen-container-active.chosen-with-drop .chosen-single div b {
  background-position: -18px 2px;
}
.chosen-container-active .chosen-choices {
  border: 1px solid #5897fb;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
}
.chosen-container-active .chosen-choices li.search-field input[type="text"] {
  color: #222 !important;
}

/* @end */
/* @group Disabled Support */
.chosen-disabled {
  opacity: 0.5 !important;
  cursor: default;
}
.chosen-disabled .chosen-single {
  cursor: default;
}
.chosen-disabled .chosen-choices .search-choice .search-choice-close {
  cursor: default;
}

/* @end */
/* @group Right to Left */
.chosen-rtl {
  text-align: right;
}
.chosen-rtl .chosen-single {
  overflow: visible;
  padding: 0 8px 0 0;
}
.chosen-rtl .chosen-single span {
  margin-right: 0;
  margin-left: 26px;
  direction: rtl;
}
.chosen-rtl .chosen-single-with-deselect span {
  margin-left: 38px;
}
.chosen-rtl .chosen-single div {
  right: auto;
  left: 3px;
}
.chosen-rtl .chosen-single abbr {
  right: auto;
  left: 26px;
}
.chosen-rtl .chosen-choices li {
  float: right;
}
.chosen-rtl .chosen-choices li.search-field input[type="text"] {
  direction: rtl;
}
.chosen-rtl .chosen-choices li.search-choice {
  margin: 3px 5px 3px 0;
  padding: 3px 5px 3px 19px;
}
.chosen-rtl .chosen-choices li.search-choice .search-choice-close {
  right: auto;
  left: 4px;
}
.chosen-rtl.chosen-container-single-nosearch .chosen-search,
.chosen-rtl .chosen-drop {
  left: 9999px;
}
.chosen-rtl.chosen-container-single .chosen-results {
  margin: 0 0 4px 4px;
  padding: 0 4px 0 0;
}
.chosen-rtl .chosen-results li.group-option {
  padding-right: 15px;
  padding-left: 0;
}
.chosen-rtl.chosen-container-active.chosen-with-drop .chosen-single div {
  border-right: none;
}
.chosen-rtl .chosen-search input[type="text"] {
  padding: 4px 5px 4px 20px;
  background: white url('chosen-sprite.png') no-repeat -30px -20px;
  background: url('chosen-sprite.png') no-repeat -30px -20px;
  direction: rtl;
}
.chosen-rtl.chosen-container-single .chosen-single div b {
  background-position: 6px 2px;
}
.chosen-rtl.chosen-container-single.chosen-with-drop .chosen-single div b {
  background-position: -12px 2px;
}

/* @end */
/* @group Retina compatibility */
@media only screen and (-webkit-min-device-pixel-ratio: 1.5), only screen and (min-resolution: 144dpi), only screen and (min-resolution: 1.5dppx) {
  .chosen-rtl .chosen-search input[type="text"],
  .chosen-container-single .chosen-single abbr,
  .chosen-container-single .chosen-single div b,
  .chosen-container-single .chosen-search input[type="text"],
  .chosen-container-multi .chosen-choices .search-choice .search-choice-close,
  .chosen-container .chosen-results-scroll-down span,
  .chosen-container .chosen-results-scroll-up span {
    background-image: url('chosen-sprite@2x.png') !important;
    background-size: 52px 37px !important;
    background-repeat: no-repeat !important;
  }
}
    .space {margin-left:1%;}
    .yellow.accent-4 { background-color: #ffd600 !important; }
    .ctable {
        font-weight: bold;
        font-size: 16px;
        font-family: serif;
    }
    label {
        
        /*font-weight: bold;*/
		
    }
	a {
		color:#333;
	}
}

.panel {
background:#FFF; 
 -webkit-box-shadow: 0px 0px 12px 1px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 12px 1px rgba(0,0,0,0.75);
box-shadow: 0px 0px 12px 1px rgba(0,0,0,0.75);
                                              
border: 0px solid #000000; 
                                                padding-top:0px; padding:10px;
                                              
border: 0px solid #000000; 
}

.bg-black {
	background-color: #273246;
	color:#FFF;
}
body {
	color:	#273246;
	
}


</style>    

<body>
		<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a onclick="blockUI()" class="navbar-brand" href="<?php echo BASE_URL; ?>/app"><img src="<?php echo ASSETS_URL; ?>assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			

			

			<ul class="nav navbar-nav navbar-right">
				

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bubbles4"></i>
						<span class="visible-xs-inline-block position-right">Messages</span>
						<span class="badge bg-warning-400">2</span>
					</a>
					
					<div class="dropdown-menu dropdown-content width-350">
						<div class="dropdown-content-heading">
							Messages
							<ul class="icons-list">
								<li><a href="#"><i class="icon-compose"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body">
							<li class="media">
								<div class="media-left">
									<img src="assets/images/demo/" class="img-circle img-sm" alt="">
									<span class="badge bg-danger-400 media-badge">5</span>
								</div>

								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">ISNTelco</span>
										<span class="media-annotation pull-right">04:58</span>
									</a>

									<span class="text-muted">Welcome Gary Gotwalt, to ISNTelco</span>
								</div>
							</li>

							
						</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo BASE_URL; ?>assets/images/demo/users/face9.jpg" alt="">
						<span><?php echo Session::get("Username"); ?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="#"><span class="badge badge-warning pull-right">1</span> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="<?php echo BASE_URL; ?>app/logout"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Second navbar -->