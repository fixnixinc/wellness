<?php
require_once '../../php/common/dashboard.php';
session_start();
$manager = new dashboard();
$allUsers = $manager->getAllUsersForTicket();
$totalusers = count($allUsers);
$projectId = $_SESSION['user_id'];
$allProjectList = $manager->getAllProject($projectId); 
$allTaskList = $manager->getAllTask($projectId);
// echo $allUsers;
?>
<?php 

require_once '../../php/common/dashboard.php';
require_once '../../php/common/feedManager.php';
require_once __DIR__.'/timelinemanager.php';
//timeline
$timeManager = new TimeManager();
$users = $timeManager->users(); //user choice
$chats = $timeManager->timeLine(); //chat retrive
$manager = new dashboard();
$completedTasksForUsers=$manager->getCompletedTaskForUser($_SESSION['user_id']);
$pendingTasksForUsers=$manager->getPendingTaskForUser($_SESSION['user_id']);
 // $allTasksForUsers=$manager->getAllTaskForUser(1);
$allUsers = $manager->getAllUsersForTicket();
// $userSocialMedias = $manager->getUserSocialMedias($_SESSION['user_id']);
 $userSocialMedias = $manager->getUserSocialMedias(1);
 $userImage = $manager->getUserImage(1);

$usermail = $manager->mail($_SESSION['user_id']);

$projectId = $_SESSION['user_id'];
$getAllSupportTickets=$manager->getAllSupportTickets($projectId);
// echo $_SESSION['user_id'];
$feedManager=new FeedManager();
$loggedInUser=$_SESSION['user_id'];
$feeds=$feedManager->getFeeds($loggedInUser,$_SESSION['user_role']);
// $feeds=$feedManager->getFeeds(1,$_SESSION['user_role']);
error_log("feeds".print_r($feeds,true));
error_log("feeds".print_r($getAllSupportTickets,true));
require_once __DIR__.'/../../php/company/companyManager.php';
$manager=new CompanyManager();
$id=$manager->getCompanyIdForUser($_SESSION['user_id']);
switch ($_SESSION['user_role']) {
  case 'super_admin':
    $feedMessage="New Compliance Library is created by";
    $isAuditor=0;
    break;
  case 'auditor':
    $feedMessage="New Audit is assigned for";
    $isAuditor=1;
    break;
  default:
    # code...
    break;
}
$companyId=$id[0]['id'];
?>
<!DOCTYPE html>

<html lang="en" >
    <!-- begin::Head -->
    <head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/wellness/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>Project & Task | coronaspeak</title>
        <meta name="description" content="Wizard examples">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">       
         <link href="./assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
                             <link href="./assets/css/demo2/pages/wizard/wizard-2.css" rel="stylesheet" type="text/css" />

<link href="./assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<link href="./assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Styles(used by all pages) -->
                    
                    <link href="./assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
                <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
                <!--end::Layout Skins -->

        <link rel="shortcut icon" href=" ./assets/media/company-logos/whistle.png" />
    </head>
    <?php
    include '../siteHeader.php';
    ?>
<body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" style="background-color: #e0d9d9;" onload="getAction()">

       
    

	
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top: -10%;">
			
				<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
											<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->
	<div class="kt-container  kt-grid__item kt-grid__item--fluid">
		<div class="kt-portlet">
	<div class="kt-portlet__body kt-portlet__body--fit">
		<div class="kt-grid  kt-wizard-v2 kt-wizard-v2--white" id="kt_wizard_v2" data-ktwizard-state="step-first">
			<div class="kt-grid__item kt-wizard-v2__aside">
				<!--begin: Form Wizard Nav -->
				<div class="kt-wizard-v2__nav">
					<div class="kt-wizard-v2__nav-items">
						<!--doc: Replace A tag with SPAN tag to disable the step link click -->
						<a class="kt-wizard-v2__nav-item"  data-ktwizard-type="step" data-ktwizard-state="current">
							<div class="kt-wizard-v2__nav-body">
								<div class="kt-wizard-v2__nav-icon">
									<i class="flaticon-globe"></i>
								</div>
								<div class="kt-wizard-v2__nav-label">
									<div class="kt-wizard-v2__nav-label-title">
										Project Info
									</div>
									<div class="kt-wizard-v2__nav-label-desc">
										Setup Your Project Details
									</div>
								</div>
							</div>
						</a>
						
						<a class="kt-wizard-v2__nav-item"  data-ktwizard-type="step">
							<div class="kt-wizard-v2__nav-body">
								<div class="kt-wizard-v2__nav-icon">
									<i class="flaticon-responsive"></i>
								</div>
								<div class="kt-wizard-v2__nav-label">
									<div class="kt-wizard-v2__nav-label-title">
										Task Info
									</div>
									<div class="kt-wizard-v2__nav-label-desc">
										Add Your Task Details
									</div>
								</div>
							</div>
						</a>
						
					</div>
				</div>
				<!--end: Form Wizard Nav -->

			</div>
			<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v2__wrapper">
				<!--begin: Form Wizard Form-->
				<form class="kt-form" id="kt_form">
					<!--begin: Form Wizard Step 1-->
					<div class="kt-wizard-v2__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
						 <div class="form-group">
                      <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
                      <input type="hidden" class="form-control" id="action" value="create">
                       <!-- <input type="hidden" class="form-control" id="taskId"> -->
                    </div>
						<div class="kt-heading kt-heading--md">Enter your Project Info</div>
						<div class="kt-form__section kt-form__section--first">
							<div class="kt-wizard-v2__form">
								<div class="form-group">
									<label>Project Name</label>
									<input type="text" class="form-control" name="pname" id="project_name">
									
								</div>
								<div class="form-group">
									<label>Description</label>
									<input type="text" class="form-control" name="Description" id="projectDescription">
									
								</div>
								<div class="row">
								
									<div class="col-xl-12">
										<div class="form-group">
                                            <label>Team</label>
											 <select id="sd" name="assignedtoDropDown" class="form-control select2" multiple="">
                           <option>--Select User--</option>   
                          <?php foreach($allUsers as $users){ ?>

                          <option value="<?php echo $users['id'] ?>"><?php echo htmlspecialchars($users['last_name']) ?></option>
                          <?php } ?>
                        </select>
										</div>
									</div>
								</div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <?php include'../common/locationDropDown.php'; ?>
                                    
                                </div>
                                <!-- <div class="form-group">
                                    <label>Global Id</label>
                                    <input type="text" class="form-control" name="Audit_Role" line="5">
                                    
                                </div> -->
                                 
							</div> 
						</div>
						  <div class="form-group">
                                    <button class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" style="background-color: #afd135;border:none;" onclick="saveProject()">Save</button>
                                </div> 
					</div>
                          
                                  
					<!--end: Form Wizard Step 1-->

					

					<!--begin: Form Wizard Step 2-->
					<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
						<div class="kt-heading kt-heading--md">Task Info</div>
						<div class="kt-form__section kt-form__section--first">
							<div class="kt-wizard-v2__form">
                  <div class="form-group">
                      <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
                      <input type="hidden" class="form-control" id="action">
                       <input type="hidden" class="form-control" id="taskId">
                    </div>
								<div class="form-group ">
                                    <label>Project Name</label>
                                    <?php include '../common/projectDropdown.php';?>
                                    
                                </div>
                    
                                 <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="Description" id="description">
                                    
                                </div>
                                  <div class="row">
                                   <div class="form-group col-md-6" >
                
                        <label for="projectname">Due Date</label>
                        <div class="input-icon">
                          
                          <i class="fa fa-calendar"></i>
                          <input type="date" class="form-control todo-taskbody-due" placeholder="Due Date..." id="duedate" style="width: 94%;"> </div>
                      </div>
                    
                <div class="col-xl-6">
										<div class="form-group">
                                            <label>Team</label><br><br>
											 <select id="sd1"class="form-control select2" multiple="" style="width: 100%;">
                           <option>--Select User--</option>   
                          <?php foreach($allUsers as $users){ ?>

                          <option value="<?php echo $users['id'] ?>"><?php echo htmlspecialchars($users['last_name']) ?></option>
                          <?php } ?>
                        </select>
										</div>
									</div>
								</div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="status">
                          <option value="Pending">Pending</option>
                          <option value="Completed">Completed</option>
                          <option value="Testing">Testing</option>
                          <option value="Approved">Approved</option>
                          <option value="Rejected">Rejected</option>
                        </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Attachment</label>
                                   <input type="file" class="form-control todo-taskbody-tasktitle" id="file">
                                    
                                </div>

							</div>
						</div>
					</div>
					<!--end: Form Wizard Step 2-->

					

					<!--begin: Form Actions -->
					<div class="kt-form__actions">
						<!-- <button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
							Previous
						</button> -->
						<button class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit" onclick="saveTask()">
							Submit
						</button>
					<!-- 	<button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
							Next Step
						</button> -->
					</div>
					<!--end: Form Actions -->
				</form>
				<!--end: Form Wizard Form-->
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>

</div>
<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top:-10%;">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
 

<div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color: white;">
Project & Task
</h3>
</div>
<!--  <div>
  <button class="btn btn-success" style="float: right;"><a href="view/common/addadminuser.php" style="color:white;">Add User</a></button>
   <button class="btn btn-danger" style="float: right;"><a href="view/common/bulkinvite.php" style="color:white;">Bulk Invite</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
</div> -->
</div>


<div class="kt-portlet__body" style="overflow-x: scroll;">
<!--begin: Datatable -->
<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
<thead>
  <tr>
                    <th style="display:none;">User Id</th>
                    <th>ProjectName</th> 
                    <th>ProjectDescription</th>                       
                    <th>Team</th>
                    <th>Created_Date</th>
                   
                 

                    
                    
  </tr>
</thead>

<tbody>

</tbody>
<?php foreach($allProjectList as $data){ ?>
<tr>

<td style="display: none;"><?php echo $data['user_id'];?></td>
<td><?php echo $data['project_name'];?></td>
<td><?php echo $data['project_description'];?></td>
<td><?php echo $data['assigned_to'];?></td>
<td><?php echo $data['created_date'];?></td>

</tr>
<?php } ?>
</table>
<!--end: Datatable -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>


<!-- end:: Page -->

	<?php
include '../sidemenu.php';

 ?>

        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#374afb","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->
<script src="js/common/taskManagement.js"></script> 
<script src="./assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="./assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="./assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="./assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="./assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="./assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="./assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="./assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="./assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="./assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
<script src="./assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="./assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="./assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="./assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="./assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/dropzone.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/quill/dist/quill.js" type="text/javascript"></script>
<script src="./assets/vendors/general/@yaireo/tagify/dist/tagify.polyfills.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/@yaireo/tagify/dist/tagify.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="./assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-markdown.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-notify.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/dual-listbox/dist/dual-listbox.js" type="text/javascript"></script>
<script src="./assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
<script src="./assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
<script src="./assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="./assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="./assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="./assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>
  <script src="./assets/js/demo3/pages/crud/forms/widgets/select2.js" type="text/javascript"></script> 
    	    	   
		    	   <script src="./assets/js/demo2/scripts.bundle.js" type="text/javascript"></script>
	<script src="./assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
      
                            <script src="./assets/js/demo3/pages/crud/datatables/extensions/buttons.js" type="text/javascript"></script>
                            <script src="./assets/js/demo2/pages/wizard/wizard-2.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->
            </body>
    <!-- end::Body -->
</html>
