<?php
require_once("header.php");
 ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<?php
     require_once("menu.php");
     ?>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->

				<!-- END PAGE TITLE -->
				<!-- BEGIN PAGE TOOLBAR -->
				<!-- END PAGE TOOLBAR -->
			</div>
			<!-- END PAGE HEAD -->
			<!-- BEGIN PAGE BREADCRUMB -->

			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
      <div class="portlet box green">
  									<div class="portlet-title">
  										<div class="caption">
  											Edit your profile
  										</div>

  									</div>
  									<div class="portlet-body form">
  										<!-- BEGIN FORM-->
  										<form action="<?php echo BASE_URL; ?>AppAgent/process_update_profile" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $this->userprofile['id']; ?>" />
  											<div class="form-body">

                          <div class="form-group">
                            <div class="col-md-4 col-md-offset-3">
                              <h3>Personal information</h3>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label">Profile Photo</label>
                            <div class="col-md-4">
                              <?php

                               ?>
                               <div style="width:180px; height:150px; border:1px solid #ccc; border-radius:5px;" >

                                 <div style="width:100%; height:100%; margin:auto; border:1px solid #CCC; float:left;" id="picturepreview">
                                   <?php  ?>
                                  <!--<span class="help-block">Photo Preview</span>-->
                                  <img id="blah" class="blah" src="<?php echo BASE_URL.$this->userprofile['profile_photo']; ?>" alt="your image" style="width:100%;height:100%;" />

                                 </div>

                               </div>
                              <input type="file" name="profile_photo" onchange="readURL(this,'#blah')">
                            </div>
                          </div>

  												<div class="form-group">
  													<label class="col-md-3 control-label">Firstname</label>
  													<div class="col-md-4">
  														<input type="text" class="form-control input-circle" name="firstname" placeholder="Firstname" value="<?php echo $this->userprofile['firstname']; ?>">
  													</div>
  												</div>

                          <div class="form-group">
  													<label class="col-md-3 control-label">Lastname</label>
  													<div class="col-md-4">
  														<input type="text" class="form-control input-circle" name="lastname" placeholder="Lastname" value="<?php echo $this->userprofile['lastname']; ?>">
  													</div>
  												</div>

                          <div class="form-group">
                            <label class="col-md-3 control-label">Phone Number</label>
                            <div class="col-md-4">
                              <input type="text" class="form-control input-circle" placeholder="Phone Number" value="<?php echo $this->userprofile['phone']; ?>" name="phone">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label">Username</label>
                            <div class="col-md-4">
                              <span class="form-control-static"><?php echo $this->userprofile['username']; ?></span>
                            </div>
                          </div>

  												<div class="form-group">
  													<label class="col-md-3 control-label">Email Address</label>
  													<div class="col-md-4">
  														<div class="input-group">

  															<span class="form-control-static"><?php echo $this->userprofile['email']; ?></span>
  														</div>
  													</div>
  												</div>

                          <div class="form-group">
                            <label class="col-md-3 control-label">Whatsapp Country Code</label>
                            <div class="col-md-4">
                              <select class="form-control input-small" name="meta_key['whatsapp_country_code']">

                                <option value="93">Afghanistan (93)
                                </option>
                                <option value="355">Albania (355)
                                </option>
                                <option value="213">Algeria (213)
                                </option>
                                <option value="1-684">American Samoa (1-684)
                                </option>
                                <option value="376">Andorra (376)
                                </option>
                                <option value="244">Angola (244)
                                </option>
                                <option value="1-264">Anguilla (1-264)
                                </option>
                                <option value="672">Antarctica (672)
                                </option>
                                <option value="1-268">Antigua and Barbuda (1-268)
                                </option>
                                <option value="54">Argentina (54)
                                </option>
                                <option value="374">Armenia (374)
                                </option>
                                <option value="297">Aruba (297)
                                </option>
                                <option value="61">Australia (61)
                                </option>
                                 <option value="43">Austria (43)
                                </option>
                                <option value="994">Azerbaijan (994)
                                </option>
                                <option value="1-242">Bahamas (1-242)
                                </option>
                                <option value="973">Bahrain (973)
                                </option>
                                <option value="880">Bangladesh (880)
                                </option>
                                <option value="1-246">Barbados (1-246)
                                </option>
                                <option value="375">Belarus (375)
                                </option>
                                <option value="32">Belgium (32)
                                </option>
                                <option value="501">Belize (501)
                                </option>
                                <option value="229">Benin (229)
                                </option>
                                <option value="1-441">Bermuda (1-441)
                                </option>
                                <option value="975">Bhutan (975)
                                </option>
                                <option value="591">Bolivia, Plurinational State of (591)
                                </option>
                                <option value="599">Bonaire, Sint Eustatius and Saba (599)
                                </option>
                                <option value="387">Bosnia and Herzegovina (387)
                                </option>
                                <option value="267">Botswana (267)
                                </option>
                                <option value="47">Bouvet Island (47)
                                </option>
                                <option value="55">Brazil (55)
                                </option>
                                <option value="246">British Indian Ocean Territory (246)
                                </option>
                                <option value="673">Brunei Darussalam (673)
                                </option>
                                <option value="359">Bulgaria (359)
                                </option>
                                <option value="226">Burkina Faso (226)
                                </option>
                                <option value="257">Burundi (257)
                                </option>
                                <option value="855">Cambodia (855)
                                </option>
                                <option value="237">Cameroon (237)
                                </option>
                                <option value="1">Canada (1)
                                </option>
                                <option value="238">Cape Verde (238)
                                </option>
                                <option value="1-345">Cayman Islands (1-345)
                                </option>
                                <option value="236">Central African Republic (236)
                                </option>
                                <option value="235">Chad (235)
                                </option>
                                <option value="56">Chile (56)
                                </option>
                                <option value="86">China (86)
                                </option>
                                <option value="61">Christmas Island (61)
                                </option>
                                <option value="61">Cocos (Keeling) Islands (61)
                                </option>
                                <option value="57">Colombia (57)
                                 </option>
                                <option value="269">Comoros (269)
                                </option>
                                <option value="242">Congo (242)
                                </option>
                                <option value="243">Congo, the Democratic Republic of the (243)
                                </option>
                                <option value="682">Cook Islands (682)
                                </option>
                                <option value="506">Costa Rica (506)
                                </option>
                                <option value="385">Croatia (385)
                                </option>
                                <option value="53">Cuba (53)
                                </option>
                                <option value="599">Cura��ao (599)
                                </option>
                                <option value="357">Cyprus (357)
                                </option>
                                <option value="420">Czech Republic (420)
                                </option>
                                <option value="225">C��te d'Ivoire (225)
                                </option>
                                <option value="45">Denmark (45)
                                </option>
                                <option value="253">Djibouti (253)
                                </option>
                                <option value="1-767">Dominica (1-767)
                                </option>
                                <option value="1-809,1-829,1-849">Dominican Republic (1-809,1-829,1-849)
                                </option>
                                <option value="593">Ecuador (593)
                                </option>
                                <option value="20">Egypt (20)
                                </option>
                                <option value="503">El Salvador (503)
                                </option>
                                <option value="240">Equatorial Guinea (240)
                                </option>
                                <option value="291">Eritrea (291)
                                </option>
                                <option value="372">Estonia (372)
                                </option>
                                <option value="251">Ethiopia (251)
                                </option>
                                <option value="500">Falkland Islands (Malvinas) (500)
                                </option>
                                <option value="298">Faroe Islands (298)
                                </option>
                                <option value="679">Fiji (679)
                                </option>
                                <option value="358">Finland (358)
                                </option>
                                <option value="33">France (33)
                                </option>
                                <option value="594">French Guiana (594)
                                </option>
                                <option value="689">French Polynesia (689)
                                </option>
                                <option value="262">French Southern Territories (262)
                                </option>
                                <option value="241">Gabon (241)
                                </option>
                                <option value="220">Gambia (220)
                                </option>
                                <option value="995">Georgia (995)
                                </option>
                                <option value="49">Germany (49)
                                </option>
                                 <option value="233">Ghana (233)
                                </option>
                                <option value="350">Gibraltar (350)
                                </option>
                                <option value="30">Greece (30)
                                </option>
                                <option value="299">Greenland (299)
                                </option>
                                <option value="1-473">Grenada (1-473)
                                </option>
                                <option value="590">Guadeloupe (590)
                                </option>
                                <option value="1-671">Guam (1-671)
                                </option>
                                <option value="502">Guatemala (502)
                                </option>
                                <option value="44">Guernsey (44)
                                </option>
                                <option value="224">Guinea (224)
                                </option>
                                <option value="245">Guinea-Bissau (245)
                                </option>
                                <option value="592">Guyana (592)
                                </option>
                                <option value="509">Haiti (509)
                                </option>
                                <option value="672">Heard Island and McDonald Islands (672)
                                </option>
                                <option value="39-06">Holy See (Vatican City State) (39-06)
                                </option>
                                <option value="504">Honduras (504)
                                </option>
                                <option value="852">Hong Kong (852)
                                </option>
                                <option value="36">Hungary (36)
                                </option>
                                <option value="354">Iceland (354)
                                </option>
                                <option value="91">India (91)
                                </option>
                                <option value="62">Indonesia (62)
                                </option>
                                <option value="98">Iran, Islamic Republic of (98)
                                </option>
                                <option value="964">Iraq (964)
                                </option>
                                <option value="353">Ireland (353)
                                </option>
                                <option value="44">Isle of Man (44)
                                </option>
                                <option value="972">Israel (972)
                                </option>
                                <option value="39">Italy (39)
                                </option>
                                <option value="1-876">Jamaica (1-876)
                                </option>
                                <option value="81">Japan (81)
                                </option>
                                <option value="44">Jersey (44)
                                </option>
                                <option value="962">Jordan (962)
                                </option>
                                <option value="7">Kazakhstan (7)
                                </option>
                                <option value="254">Kenya (254)
                                </option>
                                <option value="686">Kiribati (686)
                                </option>
                                <option value="850">Korea, Democratic People's Republic of (850)
                                </option>
                                <option value="82">Korea, Republic of (82)
                                </option>
                                <option value="965">Kuwait (965)
                                </option>
                                <option value="996">Kyrgyzstan (996)
                                </option>
                                <option value="856">Lao People's Democratic Republic (856)
                                </option>
                                <option value="371">Latvia (371)
                                </option>
                                <option value="961">Lebanon (961)
                                </option>
                                <option value="266">Lesotho (266)
                                </option>
                                <option value="231">Liberia (231)
                                </option>
                                <option value="218">Libya (218)
                                </option>
                                <option value="423">Liechtenstein (423)
                                </option>
                                <option value="370">Lithuania (370)
                                </option>
                                <option value="352">Luxembourg (352)
                                </option>
                                <option value="853">Macao (853)
                                </option>
                                <option value="389">Macedonia, the Former Yugoslav Republic of (389)
                                </option>
                                <option value="261">Madagascar (261)
                                </option>
                                <option value="265">Malawi (265)
                                </option>
                                <option value="60">Malaysia (60)
                                </option>
                                <option value="960">Maldives (960)
                                </option>
                                <option value="223">Mali (223)
                                </option>
                                <option value="356">Malta (356)
                                </option>
                                <option value="692">Marshall Islands (692)
                                </option>
                                <option value="596">Martinique (596)
                                </option>
                                <option value="222">Mauritania (222)
                                </option>
                                <option value="230">Mauritius (230)
                                </option>
                                <option value="262">Mayotte (262)
                                </option>
                                <option value="52">Mexico (52)
                                </option>
                                <option value="691">Micronesia, Federated States of (691)
                                </option>
                                <option value="373">Moldova, Republic of (373)
                                </option>
                                <option value="377">Monaco (377)
                                </option>
                                <option value="976">Mongolia (976)
                                </option>
                                <option value="382">Montenegro (382)
                                </option>
                                <option value="1-664">Montserrat (1-664)
                                </option>
                                <option value="212">Morocco (212)
                                </option>
                                <option value="258">Mozambique (258)
                                </option>
                                <option value="95">Myanmar (95)
                                </option>

                                <option value="264">Namibia (264)
                                </option>
                                <option value="674">Nauru (674)
                                </option>
                                <option value="977">Nepal (977)
                                </option>
                                <option value="31">Netherlands (31)
                                </option>
                                <option value="687">New Caledonia (687)
                                </option>
                                <option value="64">New Zealand (64)
                                </option>
                                <option value="505">Nicaragua (505)
                                </option>
                                <option value="227">Niger (227)
                                </option>
                                <option value="234" selected="">Nigeria (234)
                                </option>
                                <option value="683">Niue (683)
                                </option>
                                <option value="672">Norfolk Island (672)
                                </option>
                                <option value="1-670">Northern Mariana Islands (1-670)
                                </option>
                                <option value="47">Norway (47)
                                </option>
                                <option value="968">Oman (968)
                                </option>
                                <option value="92">Pakistan (92)
                                </option>
                                <option value="680">Palau (680)
                                </option>
                                <option value="970">Palestine, State of (970)
                                </option>
                                <option value="507">Panama (507)
                                </option>
                                <option value="675">Papua New Guinea (675)
                                </option>
                                <option value="595">Paraguay (595)
                                </option>
                                <option value="51">Peru (51)
                                </option>
                                <option value="63">Philippines (63)
                                </option>
                                <option value="870">Pitcairn (870)
                                </option>
                                <option value="48">Poland (48)
                                </option>
                                <option value="351">Portugal (351)
                                </option>
                                <option value="1">Puerto Rico (1)
                                </option>
                                <option value="974">Qatar (974)
                                </option>
                                <option value="40">Romania (40)
                                </option>
                                <option value="7">Russian Federation (7)
                                </option>
                                <option value="250">Rwanda (250)
                                </option>
                                <option value="262">R��union (262)
                                </option>
                                <option value="590">Saint Barth��lemy (590)
                                </option>
                                <option value="290 n">Saint Helena, Ascension and Tristan da Cunha (290 n)
                                </option>
                                <option value="1-869">Saint Kitts and Nevis (1-869)
                                </option>
                                <option value="1-758">Saint Lucia (1-758)
                                 </option>
                                <option value="590">Saint Martin (French part) (590)
                                </option>
                                <option value="508">Saint Pierre and Miquelon (508)
                                </option>
                                <option value="1-784">Saint Vincent and the Grenadines (1-784)
                                </option>
                                <option value="685">Samoa (685)
                                </option>
                                <option value="378">San Marino (378)
                                </option>
                                <option value="239">Sao Tome and Principe (239)
                                </option>
                                <option value="966">Saudi Arabia (966)
                                </option>
                                <option value="221">Senegal (221)
                                </option>
                                <option value="381 p">Serbia (381 p)
                                </option>
                                <option value="248">Seychelles (248)
                                </option>
                                <option value="232">Sierra Leone (232)
                                </option>
                                <option value="65">Singapore (65)
                                </option>
                                <option value="1-721">Sint Maarten (Dutch part) (1-721)
                                </option>
                                <option value="421">Slovakia (421)
                                </option>
                                <option value="386">Slovenia (386)
                                </option>
                                <option value="677">Solomon Islands (677)
                                </option>
                                <option value="252">Somalia (252)
                                </option>
                                <option value="27">South Africa (27)
                                </option>
                                <option value="500">South Georgia and the South Sandwich Islands (500)
                                </option>
                                <option value="211">South Sudan (211)
                                </option>
                                <option value="34">Spain (34)
                                </option>
                                <option value="94">Sri Lanka (94)
                                </option>
                                <option value="249">Sudan (249)
                                </option>
                                <option value="597">Suriname (597)
                                </option>
                                <option value="47">Svalbard and Jan Mayen (47)
                                </option>
                                <option value="268">Swaziland (268)
                                </option>
                                <option value="46">Sweden (46)
                                </option>
                                <option value="41">Switzerland (41)
                                </option>
                                <option value="963">Syrian Arab Republic (963)
                                </option>
                                <option value="886">Taiwan, Province of China (886)
                                </option>
                                <option value="992">Tajikistan (992)
                                </option>
                                <option value="255">Tanzania, United Republic of (255)
                                </option>
                                <option value="66">Thailand (66)
                                </option>
                                <option value="670">Timor-Leste (670)
                                </option>
                                <option value="228">Togo (228)
                                </option>
                                <option value="690">Tokelau (690)
                                </option>
                                <option value="676">Tonga (676)
                                </option>
                                <option value="1-868">Trinidad and Tobago (1-868)
                                </option>
                                <option value="216">Tunisia (216)
                                </option>
                                <option value="90">Turkey (90)
                                </option>
                                <option value="993">Turkmenistan (993)
                                </option>
                                <option value="1-649">Turks and Caicos Islands (1-649)
                                </option>
                                <option value="688">Tuvalu (688)
                                </option>
                                <option value="256">Uganda (256)
                                </option>
                                <option value="380">Ukraine (380)
                                </option>
                                <option value="971">United Arab Emirates (971)
                                </option>
                                <option value="44">United Kingdom (44)
                                </option>
                                <option value="1">United States (1)
                                </option>
                                <option value=" ">United States Minor Outlying Islands ( )
                                </option>
                                <option value="598">Uruguay (598)
                                </option>
                                <option value="998">Uzbekistan (998)
                                </option>
                                <option value="678">Vanuatu (678)
                                </option>
                                <option value="58">Venezuela, Bolivarian Republic of (58)
                                </option>
                                <option value="84">Viet Nam (84)
                                </option>
                                <option value="1-284">Virgin Islands, British (1-284)
                                </option>
                                <option value="1-340">Virgin Islands, U.S. (1-340)
                                </option>
                                <option value="681">Wallis and Futuna (681)
                                </option>
                                <option value="212">Western Sahara (212)
                                </option>
                                <option value="967">Yemen (967)
                                </option>
                                <option value="260">Zambia (260)
                                </option>
                                <option value="263">Zimbabwe (263)
                                </option>
                                <option value="358">��land Islands (358)
                                </option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label">Whatsapp Number</label>
                            <div class="col-md-4">
                              <div class="input-group">
  <input type="text" class="form-control input-circle" placeholder="Whatsapp Number" value="<?php echo $this->main_model->get_user_meta($this->userprofile['id'],'whatsapp_number'); ?>" name="meta_key['whatsapp_number']">

                              </div>
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="col-md-12">If you'd like to change your password. Fill it inside Change password field. Confirm the new password and enter the old password as well.</label>
                            </div>
                            <?php
if(isset($_GET['passwd'])){
   if($_GET['passwd']=="err1"){

     $message = "Confirm the new password, they didn't match";

   }
   if($_GET['passwd']=="err2"){

     $message = "The current password didn't match the record in the database";

   }
   if($_GET['passwd']=="did") {

      $message = "Your password has been  changed successfully. Use the new password on your next login";

   }

                             ?>
                            <div class="note note-warning">
<?php echo $message; ?>
                            </div>
                            <?php
}
                             ?>
                          <div class="form-group">
                            <label class="col-md-3 control-label"> New Password</label>
                            <div class="col-md-4">
                              <div class="input-group">
                                <input type="password" class="form-control input-circle-left" placeholder="New Password" name="newpassword1">
                                <span class="input-group-addon input-circle-right">
                                <i class="fa fa-user"></i>
                                </span>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label"> Confirm new Password</label>
                            <div class="col-md-4">
                              <div class="input-group">
                                <input type="password" class="form-control input-circle-left" placeholder="New Password" name="newpassword2">
                                <span class="input-group-addon input-circle-right">
                                <i class="fa fa-user"></i>
                                </span>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label"> Enter current password</label>
                            <div class="col-md-4">
                              <div class="input-group">
                                <input type="password" class="form-control input-circle-left" placeholder="Old Password" name="oldpassword">
                                <span class="input-group-addon input-circle-right">
                                <i class="fa fa-user"></i>
                                </span>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                              <h3>Business information (For registered businesses)</h3>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label">Is Registered Business?</label>
                            <div class="col-md-4">
                    <input type="checkbox" value="yes" class="form-control" <?php if($this->main_model->get_user_meta($this->userprofile['id'],'is_registered_business')=="yes"){ ?> checked="checked"<?php } ?> name="meta_key['is_registered_business']"/>
                              </div>
                            </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label">Business Name</label>
                            <div class="col-md-4">
                              <input type="text" class="form-control input-circle" name="meta_key['business_name']" placeholder="Business name" value="<?php echo $this->main_model->get_user_meta($this->userprofile['id'],'business_name'); ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label">Business Category</label>
                            <div class="col-md-4">
                              <select class="form-control input-small" name="meta_key['business_category']">
<?php
if($this->main_model->get_user_meta($this->userprofile['id'],'business_category')!=""){
  if($this->main_model->get_user_meta($this->userprofile['id'],'business_category')=="OAB"){
$text = "Individual Agent";
  }
  else if($this->main_model->get_user_meta($this->userprofile['id'],'business_category')=="DEV"){
$text = "Developer";
  }
    else if($this->main_model->get_user_meta($this->userprofile['id'],'business_category')=="ESV"){
$text = "Estate Surveying Firm";
    }
      else if($this->main_model->get_user_meta($this->userprofile['id'],'business_category')=="LAW"){
$text = "Law Firm";
      }
        else if($this->main_model->get_user_meta($this->userprofile['id'],'business_category')=="REO"){
$text = "Real Estate Organisation";
        }
 ?>
<option value="<?php echo $this->main_model->get_user_meta($this->userprofile['id'],'business_category'); ?>"><?php echo $text; ?></option>
 <?php
}
  ?>
<option value="">Select a Business Category</option>
<option value="OAB">Individual Agent</option>
<option value="DEV">Developer</option>
<option value="ESV">Estate Surveying Firm</option>
<option value="LAW">Law Firm</option>
<option value="REO">Real Estate Organization</option>

                              </select>
                            </div>
                          </div>
<div class="row">
<div class="col-md-5">

  <div class="form-group">
    <label class="col-md-3 control-label">About Us</label>
    <div class="col-md-9">
    <textarea name="meta_key['about_business']" placeholder="Enter your Company's Profile Here...." class="form-control" style="min-width:350px;">
<?php
echo $this->main_model->get_user_meta($this->userprofile['id'],'about_business');
 ?>
    </textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label">Services</label>
    <div class="col-md-9">
    <textarea name="meta_key['business_services']" placeholder="Enter your Company's Services Here...." class="form-control" style="min-width:350px;">
      <?php
      echo $this->main_model->get_user_meta($this->userprofile['id'],'business_services');
       ?>
    </textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label">Primary State</label>
    <div class="col-md-4">
      <select name="meta_key['primary_state']" class="form-control">

<option value="">- select -</option>
<?php
$state='';
if($this->main_model->get_user_meta($this->userprofile['id'],'primary_state')!=""){

$states[1] = "Lagos"; $states[2] = 'Abuja'; $states[3] = 'Rivers'; $states[4] = 'Ogun'; $states[5] = 'Oyo'; $states[6] = 'Anambra'; $states[7] = 'Enugu'; $states[8] = 'Akwa Ibom'; $states[9] = 'Adamawa'; $states[10] = 'Abia'; $states[11] = 'Bauchi'; $states[12] = 'Bayelsa'; $states[13] = 'Benue'; $states[14] = 'Borno'; $states[15] = 'Cross River'; $states[16] = 'Delta'; $states[17] = 'Ebonyi'; $states[18] = 'Edo'; $states[19] = 'Ekiti'; $states[20] = 'Gombe'; $states[21] = 'Imo'; $states[22] = 'Jigawa'; $states[23] = 'Kaduna'; $states[24] = 'Kano'; $states[25] = 'Katsina'; $states[26] = 'Kebbi';$states[27] = 'Kogi'; $states[28] = 'Kwara'; $states[29] = 'Nassarawa';$states[30] = 'Niger'; $states[31] = 'Ondo'; $states[32] = 'Osun'; $states[33] = 'Plateau'; $states[34] = 'Sokoto'; $states[35] = 'Taraba'; $states[36] = 'Yobe'; $states[37] = 'Zamfara';

$state = $states[$this->main_model->get_user_meta($this->userprofile['id'],'primary_state')];
 ?>
<option value="<?php echo $this->main_model->get_user_meta($this->userprofile['id'],'primary_state'); ?>" selected="selected"><?php echo $state; ?></option>
 <?php
}
  ?>
<option value="1">Lagos</option>
<option value="2">Abuja</option>
<option value="3">Rivers</option>
<option value="4">Ogun</option>
<option value="5">Oyo</option>
<option value="6">Anambra</option>
<option value="7">Enugu</option>
<option value="8">Akwa Ibom</option>
<option value="9">Adamawa</option>
<option value="10">Abia</option>
<option value="11">Bauchi</option>
<option value="12">Bayelsa</option>
<option value="13">Benue</option>
<option value="14">Borno</option>
<option value="15">Cross River</option>
<option value="16">Delta</option>
<option value="17">Ebonyi</option>
<option value="18">Edo</option>
<option value="19">Ekiti</option>
<option value="20">Gombe</option>
<option value="21">Imo</option>
<option value="22">Jigawa</option>
<option value="23">Kaduna</option>
<option value="24">Kano</option>
<option value="25">Katsina</option>
<option value="26">Kebbi</option>
<option value="27">Kogi</option>
<option value="28">Kwara</option>
<option value="29">Nassarawa</option>
<option value="30">Niger</option>
<option value="31">Ondo</option>
<option value="32">Osun</option>
<option value="33">Plateau</option>
<option value="34">Sokoto</option>
<option value="35">Taraba</option>
<option value="36">Yobe</option>
<option value="37">Zamfara</option>
</select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label">Sale type specialization</label>

    <div class="col-md-6">
      <div class="row">
        <div class="col-md-4">

      <input type="checkbox" name="meta_key['specialization_forsale']" value="yes"  <?php
if($this->main_model->get_user_meta($this->userprofile['id'],'specialization_forsale')=="yes"){
  ?>
checked="checked"
<?php
}
      ?>>For Sale

    </div>
      <div class="col-md-4">
  <input type="checkbox" name="meta_key['specialization_forshortlet']" value="yes" <?php
if($this->main_model->get_user_meta($this->userprofile['id'],'specialization_forshortlet')=="yes"){
echo 'checked="checked"';
}
  ?>>  Short let

    </div>
        <div class="col-md-4">
  <input type="checkbox" name="meta_key['specialization_forrent']" value="yes" <?php
if($this->main_model->get_user_meta($this->userprofile['id'],'specialization_forrent')=="yes"){
echo 'checked="checked"';
}
  ?>>For Rent

</div>
    </div>
  </div>

  </div>

  <div class="form-group">
    <label class="col-md-3 control-label">Property type specialization</label>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-4">
      <input type="checkbox" name="meta_key['specialization_residential']" value="yes" <?php
if($this->main_model->get_user_meta($this->userprofile['id'],'specialization_residential')=="yes"){
echo 'checked="checked"';
}
      ?>>Residential

    </div>
      <div class="col-md-4">
  <input type="checkbox" name="meta_key['specialization_commercial']" value="yes" <?php
if($this->main_model->get_user_meta($this->userprofile['id'],'specialization_commercial')=="yes"){
echo 'checked="checked"';
}
  ?>> Commercial

    </div>

    </div>
  </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label">Deals completed</label>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-4">
      <input type="text" name="meta_key['deals_completed_rentals']" value="<?php echo $this->main_model->get_user_meta($this->userprofile['id'],'deals_completed_rentals'); ?>" placeholder="Eg. 5">Rentals

    </div>
      <div class="col-md-4">
  <input type="text" name="meta_key['deals_completed_sales']" value="<?php echo $this->main_model->get_user_meta($this->userprofile['id'],'deals_completed_sales'); ?>" placeholder="Eg. 5"> Sales

    </div>

    <div class="col-md-4">
<input type="text" name="meta_key['deals_completed_shortlets']" value="<?php echo $this->main_model->get_user_meta($this->userprofile['id'],'deals_completed_shortlets'); ?>" placeholder="Eg. 5"> Shortlets

  </div>

    </div>
  </div>
  </div>


</div>

<div class="col-md-7">
  <div class="form-group">
    <label class="col-md-3 control-label">CAC</label>
      <div class="col-lg-4 col-md-4">
        <input name="meta_key['cac_registered']" value="yes" class="form-check-input" type="checkbox" id="inlineCheckboxCAC" <?php
      if($this->main_model->get_user_meta($this->userprofile['id'],'cac_registered')=="yes"){
echo 'checked="checked"';
      }
        ?>>
  <input class="" name="meta_key['cac_license_no']" value="<?php echo $this->main_model->get_user_meta($this->userprofile['id'],'cac_license_no'); ?>" type="text" placeholder="Enter your License No">
  </div>
  </div>

  <div class="form-group">
    <label class="col-md-3 control-label">NIESV</label>
      <div class="col-lg-4 col-md-4">
  <input name="meta_key['niesv_registered']" value="yes" class="form-check-input" type="checkbox" id="inlineCheckboxNIESV" <?php
if($this->main_model->get_user_meta($this->userprofile['id'],'niesv_registered')=="yes"){
echo 'checked="checked"';
}
  ?>>

  <input name="meta_key['niesv_license_no']" value="<?php echo $this->main_model->get_user_meta($this->userprofile['id'],'niesv_license_no'); ?>" type="text" placeholder="Enter your License No">
  </div>
  </div>

  <div class="form-group">
      <label class="col-md-3 control-label">LSRETD</label>
        <div class="col-lg-4 col-md-4">
  <input name="meta_key['lsretd_registered']" value="yes" class="form-check-input" type="checkbox" id="inlineCheckboxLSRETD" <?php
if($this->main_model->get_user_meta($this->userprofile['id'],'lsretd_registered')=="yes"){
echo 'checked="checked"';
}
  ?>>
  <input name="meta_key['lsretd_license_no']" value="<?php echo $this->main_model->get_user_meta($this->userprofile['id'],'lsretd_license_no'); ?>" type="text" placeholder="Enter your License No">
  </div>
  </div>
  <div class="form-group">
      <label class="col-md-3 control-label">ERCAAN</label>
        <div class="col-lg-4 col-md-4">
  <input name="meta_key['ercaan_registered']" value="yes" class="form-check-input" type="checkbox" id="inlineCheckboxERCAAN" <?php
if($this->main_model->get_user_meta($this->userprofile['id'],'ercaan_registered')=="yes"){
echo 'checked="checked"';
}
  ?>>
  <input name="meta_key['ercaan_license_no']" value="<?php echo $this->main_model->get_user_meta($this->userprofile['id'],'ercaan_license_no'); ?>" type="text" placeholder="Enter your License No">
  </div>
  </div>

  <div class="form-group">
      <label class="col-md-3 control-label">REDAN</label>
        <div class="col-lg-4 col-md-4">
  <input name="meta_key['redan_registered']" value="yes" class="form-check-input" type="checkbox" id="inlineCheckboxREDAN" <?php
if($this->main_model->get_user_meta($this->userprofile['id'],'redan_registered')=="yes"){
echo 'checked="checked"';
}
  ?>>
  <input name="meta_key['redan_license_no']" value="<?php echo $this->main_model->get_user_meta($this->userprofile['id'],'redan_license_no'); ?>" type="text" placeholder="Enter your License No">
  </div>
  </div>

  <div class="form-group">
      <label class="col-md-3 control-label">NBA</label>
        <div class="col-lg-4 col-md-4">
  <input name="meta_key['nba_registered']" value="yes" class="form-check-input" type="checkbox" id="inlineCheckboxNBA" <?php
if($this->main_model->get_user_meta($this->userprofile['id'],'nba_registered')=="yes"){
echo 'checked="checked"';
}
  ?>>

  <input name="meta_key['nba_license_no']" value="<?php echo $this->main_model->get_user_meta($this->userprofile['id'],'nba_license_no'); ?>" type="text" placeholder="Enter your License No">
  </div>
  </div>

  <div class="form-group">
      <label class="col-md-3 control-label">AEAN</label>
        <div class="col-lg-4 col-md-4">
  <input name="meta_key['aean_registered']" value="yes" class="form-check-input" type="checkbox" id="inlineCheckboxAEAN" <?php
if($this->main_model->get_user_meta($this->userprofile['id'],'aean_registered')=="yes"){
echo 'checked="checked"';
}
  ?>>
  <input name="meta_key['aean_license_no']" value="<?php echo $this->main_model->get_user_meta($this->userprofile['id'],'aean_registered'); ?>" type="text" placeholder="Enter your License No">
  </div>
  </div>
</div>
</div>

  											</div>
  											<div class="form-actions">
  												<div class="row">
  													<div class="col-md-offset-3 col-md-9">
  														<button type="submit" class="btn btn-circle blue">Submit</button>
  														<button type="button" class="btn btn-circle default">Cancel</button>
  													</div>
  												</div>
  											</div>
  										</form>
  										<!-- END FORM-->
  									</div>



			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php
require_once("footer.php");
 ?>
 <script type="text/javascript">
 function readURL(input,div) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(div).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewPhoto(url,div){
        readURL(url,div);
    }

  //function PreviewPicture(pic){
    //document.getElementById("picturepreview").innerHTML = "<img src='"+pic+"' />";
  //}

</script>
