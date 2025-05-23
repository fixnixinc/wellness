<?php 
require_once __DIR__.'/../../php/user/userManager.php';
session_start();
$companyId=$_POST['companyId'];
    // error_log("userid".print_r($companyId,true));
    $manager = new UserManager();
    $allUsersArray = $manager->getAllUsers($companyId);
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

        <title>Add User| wellness</title>
        <meta name="description" content="Add user example">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">        <!--end::Fonts -->
<link href="./assets/css/demo2/pages/wizard/wizard-4.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
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
 <link href="./assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="./assets/media/company-logos/speakup1.png" />
 <script src="js/superAdmin/userManagement.js"></script>

 <link href="./assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />

        <link rel="shortcut icon" href="./assets/media/company-logos/speakup1.png" />
            <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
  }, 'google_translate_element');
        document.querySelector('.goog-te-gadget').setAttribute('style', 'font-size: 0');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    </head>
 <style type="text/css">
    .goog-logo-link, .goog-logo-link:link, .goog-logo-link:visited, .goog-logo-link:hover, .goog-logo-link:active{
        visibility: hidden;
    }
    .goog-te-gadget{
            margin-top: 20px;
    }
    #demo1{
        cursor:pointer;
    }
    .goog-te-banner-frame.skiptranslate {
    display: none !important;
    }
    .goog-te-combo  { margin: 0; border:1px solid #D5DAD9; border-radius:4px; padding: 5px 0px 5px 35px; background: #fff url(images/google-logo.gif) no-repeat 10px center; -moz-appearance: none; appearance: none; -webkit-appearance: none;width:526px;height:40px; } 
body {
    top: 0px !important; 
    }
  
.form-popup {
  display: none;
  position: fixed;
  
}
a
{
  color: white;
}
</style>
     <body>
      <?php 
           
      $userRole = $_SESSION['user_role'];
      $userid = $_SESSION['user_id'];
    ?>
    <?php if($_SESSION['user_role'] == 'super_admin') {?>      
    <?php }?>
  </body>
  <?php
  include '../siteHeader.php';
  ?>
  <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" style="background-color: #F6F5F5;">

       
    


    


    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top: -10%;">
                
                <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
                                            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                            
<!-- begin:: Content -->
    <div class="kt-container  kt-grid__item kt-grid__item--fluid">
        <div class="kt-wizard-v4" id="kt_user_add_user" data-ktwizard-state="step-first">
    <!--begin: Form Wizard Nav -->
    <div class="kt-wizard-v4__nav">
        <div class="kt-wizard-v4__nav-items nav">
            <!--doc: Replace A tag with SPAN tag to disable the step link click -->
            <a class="kt-wizard-v4__nav-item nav-item"  data-ktwizard-type="step" data-ktwizard-state="current">
                <div class="kt-wizard-v4__nav-body">
                    <div class="kt-wizard-v4__nav-number"style="background-color: #afd135;">
                        1
                    </div>
                    <div class="kt-wizard-v4__nav-label">
                        <div class="kt-wizard-v4__nav-label-title" style="color: #034ea2;">
                            Profile
                        </div>
                        <div class="kt-wizard-v4__nav-label-desc">
                            User's Personal Information
                        </div>
                    </div>
                </div>
            </a>
            <a class="kt-wizard-v4__nav-item nav-item"  data-ktwizard-type="step">
                <div class="kt-wizard-v4__nav-body">
                    <div class="kt-wizard-v4__nav-number"style="background-color: #afd135;">
                        2
                    </div>
                    <div class="kt-wizard-v4__nav-label">
                        <div class="kt-wizard-v4__nav-label-title"style="color: #034ea2;">
                            Account
                        </div>
                        <div class="kt-wizard-v4__nav-label-desc">
                            User's Account & Settings
                        </div>
                    </div>
                </div>
            </a>
            <a class="kt-wizard-v4__nav-item nav-item"  data-ktwizard-type="step">
                <div class="kt-wizard-v4__nav-body">
                    <div class="kt-wizard-v4__nav-number"style="background-color: #afd135;">
                        3
                    </div>
                    <div class="kt-wizard-v4__nav-label">
                        <div class="kt-wizard-v4__nav-label-title"style="color: #034ea2;">
                            Address
                        </div>
                        <div class="kt-wizard-v4__nav-label-desc">
                            User's  Address
                        </div>
                    </div>
                </div>
            </a>
            <a class="kt-wizard-v4__nav-item nav-item"  data-ktwizard-type="step">
                <div class="kt-wizard-v4__nav-body">
                    <div class="kt-wizard-v4__nav-number"style="background-color: #afd135;">
                        4
                    </div>
                    <div class="kt-wizard-v4__nav-label">
                        <div class="kt-wizard-v4__nav-label-title"style="color: #034ea2;">
                            Submission
                        </div>
                        <div class="kt-wizard-v4__nav-label-desc">
                            Review and Submit
                        </div>
                    </div>
                </div>
            </a>
             
        </div>
    </div>
 

    <div class="kt-portlet">
         
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="kt-grid">
                <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">
                   
                    <form class="kt-form" id="kt_user_add_form">
                        <!--begin: Form Wizard Step 1-->
                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                           <!--  <button style="font-size:15px;float:right;background-color:#afd135;border:none;" class="btn btn-danger"><a href="view/common/bulkinvite.php" style="color:white;"> Bulk Invite</a></button> -->
                           <button type="button" class="btn btn-brand btn-icon-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float: right;background-color:#afd135;border:none;font-size:15px;padding:12px;">
      <a href="view/common/bulkinvite.php" style="color:white;">Bulk Invite</a>   
    </button>
                            <div class="kt-heading kt-heading--md">User's Profile Details:</div>
                            <div class="kt-section kt-section--first">
                                <div class="kt-wizard-v4__form">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="kt-section__body">
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                                            <div class="kt-avatar__holder" style="background-image: url(lg.png); width: 150px;"></div>
                                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="Change avatar">
                                                                <i class="fa fa-pen"></i>
                                                                <input type="file" name="kt_user_add_user_avatar">
                                                            </label>
                                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="Cancel avatar">
                                                                <i class="fa fa-times"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                     
                                                    <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control" type="text" id="firstName">
                                                    </div>
                                                </div>
                                                     
                              <div class="form-group">
                       
                            <input type="hidden" class="form-control" id="userId">
                            <input type="hidden" class="form-control" id="action" value="create">
                            <input type="hidden" class="form-control" id="companyId" value="<?php echo $companyId ?>">
                            <input type="hidden" class="form-control" id="company" value="7">
                        </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control" type="text" id="lastName">
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <div class="input-group">
                                                            
                                                            <input type="text" class="form-control" id="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Role</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <?php include '../common/roleMultiSelect.php';?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Phone</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <div class="input-group">
                                                            
                                                            <input type="text" class="form-control" placeholder="Phone" id="phone" aria-describedby="basic-addon1">
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                               
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end: Form Wizard Step 1-->

                        <!--begin: Form Wizard Step 2-->
                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">                           
                            <div class="kt-section kt-section--first">
                                <div class="kt-wizard-v4__form">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="kt-section__body">
                                                <div class="form-group row">                                                     
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="kt-section__title kt-section__title-md">User's Account Details</h3>
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Language</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                       <div id="google_translate_element"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Time Zone</label>
                                                    <div class="col-xl-8 col-lg-8 col-form-label">
                                                        <select class="form-control">
                                                            <option data-offset="-39600" value="International Date Line West">(GMT-11:00) International Date Line West</option>
                                                            <option data-offset="-39600" value="Midway Island">(GMT-11:00) Midway Island</option>
                                                            <option data-offset="-39600" value="Samoa">(GMT-11:00) Samoa</option>
                                                            <option data-offset="-36000" value="Hawaii">(GMT-10:00) Hawaii</option>
                                                            <option data-offset="-28800" value="Alaska">(GMT-08:00) Alaska</option>
                                                            <option data-offset="-25200" value="Pacific Time (US &amp; Canada)">(GMT-07:00) Pacific Time (US &amp; Canada)</option>
                                                            <option data-offset="-25200" value="Tijuana">(GMT-07:00) Tijuana</option>
                                                            <option data-offset="-25200" value="Arizona">(GMT-07:00) Arizona</option>
                                                            <option data-offset="-21600" value="Mountain Time (US &amp; Canada)">(GMT-06:00) Mountain Time (US &amp; Canada)</option>
                                                            <option data-offset="-21600" value="Chihuahua">(GMT-06:00) Chihuahua</option>
                                                            <option data-offset="-21600" value="Mazatlan">(GMT-06:00) Mazatlan</option>
                                                            <option data-offset="-21600" value="Saskatchewan">(GMT-06:00) Saskatchewan</option>
                                                            <option data-offset="-21600" value="Central America">(GMT-06:00) Central America</option>
                                                            <option data-offset="-18000" value="Central Time (US &amp; Canada)">(GMT-05:00) Central Time (US &amp; Canada)</option>
                                                            <option data-offset="-18000" value="Guadalajara">(GMT-05:00) Guadalajara</option>
                                               
                                                        </select>
                                                    </div>
                                                </div>
                                                

                                            

                                            
                                            

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end: Form Wizard Step 2-->

                        <!--begin: Form Wizard Step 3-->
                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Setup Your Address</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v4__form">
                                    <div class="form-group">
                                        <label>Address Line </label>
                                        <input type="text" class="form-control" id="address1" placeholder="Address Line 1" value="Address Line 1">
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Postcode</label>
                                                <input type="text" class="form-control" id="postcode" placeholder="Postcode" value="2000">
                                                
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" id="city" placeholder="City" value="London">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control" id="state" placeholder="State" value="VIC">
                                                
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                            <label>Country:</label>
                                            <select name="country" class="form-control" id="country">
                                                <option value="">Select</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AX">Åland Islands</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AQ">Antarctica</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU" selected="">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia, Plurinational State of</option>
                                                
                                    
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end: Form Wizard Step 3-->

                        <!--begin: Form Wizard Step 4-->
                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Review your Details and Submit</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v4__review">
                                    <div class="kt-wizard-v4__review-item">
                                        <div class="kt-wizard-v4__review-title">
                                            Your Account Details
                                        </div>
                                        <div class="kt-wizard-v4__review-content">
                                          <label><b>FirstName:</b></label><p id="result1"></p>
                                           <label><b>LastName:</b></label><p id="result2"></p>
                                           <label><b>Email:</b></label><p id="result3"></p>
                                           <label><b>phone:</b></label><p id="result4"></p>
                                           <label><b>Address:</b></label><p id="result5"></p>
                                           <label><b>PostCode:</b></label><p id="result6"></p>
                                           <label><b>City:</b></label><p id="result7"></p>

                                           <label><b>State:</b></label><p id="result8"></p>
                                           <label><b>Country:</b></label><p id="result9"></p>
                                        </div>
                                    </div>
                             
                                 
                                </div>
                            </div>
                        </div>
                        <!--end: Form Wizard Step 4-->

                        <!--begin: Form Actions -->
                        <div class="kt-form__actions">
                            <div class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                Previous
                            </div>
                            <div class="btn btn-md btn-tall btn-wide kt-font-bold " data-ktwizard-type="action-submit" id="managerUserButton" onclick="manageUser()" style="background-color:#afd135;color: white;">
                                Submit
                            </div>
                            <div class="btn btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next" onclick="showvalue()" style="background-color: #034ea2; color: white">
                                Next Step
                            </div>
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
</div>
</div>
    <div class="kt-grid kt-grid--hor kt-grid--root" style="margin-top: -100px;">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


<div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg" >
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font flaticon2-line-chart" style="color: #034ea2;"></i>
</span>

<h3 class="kt-portlet__head-title" >
USER MANAGEMENT
</h3>

</div>
<div><br>
  <button class="btn" style="float: right;background-color:#afd135;"><a href="view/common/addadminuser.php" style="color:white;">Add User</a></button>
   <button class="btn" style="background-color: #034ea2;" ><a href="view/common/bulkinvite.php" style="color:white;">Bulk Invite</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
</div>


</div>

<div class="kt-portlet__body" style="overflow-x: scroll;">
<!--begin: Datatable -->
<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
<thead>
  <tr>
                    <th>User Id</th>
                    <th>First Name</th> 
                    <th>Last Name</th>                       
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Created_Date</th>
                    <th>Company</th>

                    <th>Action</th>
                    
  </tr>
</thead>

<tbody>
<?php foreach ($allUsersArray as $data) { ?>
                    <tr>
                    <td><?php echo $data['id'];?></td>
                    <td><?php echo $data['firstName'];?></td>
                    <td><?php echo $data['lastName'];?></td>
                    <td><?php echo $data['email'];?></td>
                    <td><?php echo $data['role'];?></td>
                    <td><?php echo $data['created_at'];?></td>
                    <td><?php echo $data['company_id']; ?></td>
                
                       <td><button class="btn" style="background-color: #034ea2;"><a href="/coronaspeak/view/common/edituserprofile.php?userId=<?php echo $data['id']; ?>" style="color: white;">Edit</a></button></td>
                       <!-- <td><button class="btn btn-danger"><a href="/freshgrc/view/common/addadminuser.php" style="color: white;">New</a></button></td> -->
                   
                    </tr>
                  <?php } ?>
</tbody>


</table>
<!--end: Datatable -->
</div>
</div>

</div>  

</div>
</div>
</div>
<?php
include '../sidemenu.php';

 ?>
 <script type="text/javascript">
    function showvalue()
    {
        var firstName=document.getElementById('firstName').value;
        document.getElementById('result1').innerHTML=firstName;
        var lastName=document.getElementById('lastName').value;
        document.getElementById('result2').innerHTML=lastName;
           var email=document.getElementById('email').value;
        document.getElementById('result3').innerHTML=email;
         var phone=document.getElementById('phone').value;
        document.getElementById('result4').innerHTML=phone;
         var address1=document.getElementById('address1').value;
        document.getElementById('result5').innerHTML=address1;
         var postcode=document.getElementById('postcode').value;
        document.getElementById('result6').innerHTML=postcode;
        var city=document.getElementById('city').value;
        document.getElementById('result7').innerHTML=city;
        var state=document.getElementById('state').value;
        document.getElementById('result8').innerHTML=state;
        var country=document.getElementById('country').value;
        document.getElementById('result9').innerHTML=country;

    } 
 </script>
        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#374afb","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->
<script src="js/superAdmin/userManagement.js"></script>
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

      <script src="./assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>

                            <script src="./assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
      
                            <script src="./assets/js/demo3/pages/crud/datatables/extensions/buttons.js" type="text/javascript"></script>
                   <script src="./assets/js/demo2/scripts.bundle.js" type="text/javascript"></script>
                <!--end::Global Theme Bundle -->

        
                    <!--begin::Page Scripts(used by this page) -->
                            <script src="./assets/js/demo2/pages/custom/user/add-user.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->
            </body>
    <!-- end::Body -->
</html>