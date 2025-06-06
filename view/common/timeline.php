<?php 
require_once '../../php/common/dashboard.php';
require_once __DIR__.'/timelinemanager.php';
session_start();
//timeline
$timeManager = new TimeManager();
$users = $timeManager->users(); //user choice
$chats = $timeManager->timeLine(); //chat retrive

?>
<!DOCTYPE html>

<html lang="en" >
 <head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/wellness/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>Freshgrc</title>
        <meta name="description" content="Base form control examples">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->
        <!--begin:: Global Mandatory Vendors -->
<link href="assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<link href="assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
<link href="assets/toggleButton/bootstrap-toggle.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="assets/jquery-ui-1.11.4/jquery-ui.css"/>
<link href="assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="./assets/media/logos/fixnix.png" />
<style>
 

/* Full-width input fields */


/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 26px;
    border: none;
    cursor: pointer;
    width: 10%;
  font-size:20px;
}
button:hover {
    opacity: 0.8;
}

/* Center the image and position the close button */
 

/* The Modal (background) */
.modal {
  display:none;
  
    z-index: 1;
    left: 0;
    top: 0;
    width:100%;
    height: 100%;
    overflow: auto;
  
}

/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 10px solid black;
    width: 100%; 
  padding-bottom: 30px;
}
.modal-wrapper
{
 height: 100%;
  width: 100%;


}
/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    animation: zoom 0.6s
}

@keyframes zoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
</style>
    </head>



<?php 
include "../siteHeader.php";

?>

      <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" >


 
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top:-13%;" >

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <!--Begin::Portlet-->
<div class="kt-portlet" style="margin-left: -20px;">
    <div class="kt-portlet__head" style="border-color: red; background: #2A5AA8;">

        <div class="kt-portlet__head-label">
            <div class="flaticon-time" style="font-size: 30px; color: white;"></div>
            <h3 class="kt-portlet__head-title " style="color: white; font-size:25px; margin-left: 10px;">
                 Timeline 
            </h3>
        </div>
    </div>
  </div>
  <div class="kt-portlet__body" >
               <div class="form-group">
                

                       
                          
                          <div class="form-group">
                            <label for="comment"></label>
                            <textarea data-toggle="modal" data-target="#myModal7"    name="chatMessage" id="chatMessage" placeholder="Type Something Here...!" class="form-control" rows="4"></textarea>
                          </div>
                          
                        </div>
<!-- <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
 

<div class="">
    <div class="row" style="margin-left: 5%;">
                <div class="col-lg-9 col-xl-11 order-lg-1 order-xl-1" style="text-align: center;">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;">

                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class=" " ></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            <span class="caption-subject bold"> Timeline</span>
                             
                        </h3>
                    </div>        
                   </div>

<div class="kt-portlet__body" >
             <div class="form-group">
              

                     
                        
                        <div class="form-group">
                          <label for="comment"></label>
                          <textarea data-toggle="modal" data-target="#myModal7"    name="chatMessage" id="chatMessage" placeholder="Type Something Here...!" class="form-control" rows="4"></textarea>
                        </div>
                        
                         <textarea name="chatMessage" id="chatMessage" placeholder="Type Something Here...!" style="height: 80px;width: 350px; border: 1px solid #44BBC8;"></textarea> -->
 
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
  
  <!-- <=========================chart :: begin=========================> -->

<div  class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
     <div style="width:1000px;height:700px; margin-left:-40.5%; " >
    <div class="modal-content" style="border-color: #2A5AA8; border-radius: 15px;background:#DAEEFD">
     
    
        <button type="button" title="close" class="close" style="width:5%;height:10%; color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         
       
     <div style="background: #2A5AA8;border-radius: 5px;">
      <h3 style="color: white; text-align: center;">Time Line</h3>
    </div>
    
       
       <form  method="POST" onsubmit="return validate1();" action="view/common/chatProcess.php"  >
        
                           
                      
                     
                        
                          <div class="form-group">
                          <label for="comment"></label>
                          <center>
                          <textarea style="width: 80%; height:200px;" type="text" name="chatMessage" id="chatMessage" placeholder="Type Something Here...!" class="form-control"  rows="4"></textarea>
                        </center>

                          </div>
                          <div class="form-group">
                           
 

                          <select name="to_id" class="form-control select2-selection arrow" style="width: 80%;margin-left:10%;margin-top:3%;">
                             <option></option>
                                <?php foreach($users as $user){
                                   if($_SESSION['user_id']!=$user['id']){ ?>
                               <option  value="<?php echo $user['id']; ?>">  <?php echo htmlspecialchars($user['last_name']); ?></option>
                           <?php } } ?> 
                           </select>
                           
                             
                          </div>
                        <!-- <textarea name="chatMessage" id="chatMessage" placeholder="Type Something Here...!" style="height: 80px;width: 350px; border: 1px solid #44BBC8;"></textarea> -->
                        <center>
                        <button class="btn btn-primary" type="submit" style="width:15%;" name="submit">Post</button>
                      </center>
                      
                       
               
    
      </form>
  </div>
</div>
</div>
</div>
<!-- <=========================Chat :: End ===========================> -->
          <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <!--Begin::Portlet-->
<div class="kt-portlet" style="margin-left: 120px;">
    <div class="kt-portlet__head" style="border-color: red; background: #2A5AA8;">
        <div class="kt-portlet__head-label">
          <div class="kt-widget4__pic kt-widget4__pic--pic">
              <!-- <img  style="width:60px;" class="rounded-circle" src="assets/img/shan.jpg">    -->
          </div>
            <div class="kt-widget4__info">
                                                    
              <h4 style="color: white; margin-top:8px; ">Admin</h4>
               <!-- <p class="kt-widget4__text"style="color: white; ">
                          Added office location at 2:50 PM 
                    </p>  -->                                    
               </div> 
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="row">
            <div class="col-xl-1">
            </div>
            <div class="col-xl-10">
                <div class="kt-timeline-v1">
                    <div class="kt-timeline-v1__items">
                        <div class="kt-timeline-v1__marker"></div>
                        <div class="kt-timeline-v1__item kt-timeline-v1__item--left kt-timeline-v1__item--first">
                            <div class="kt-timeline-v1__item-circle">
                                <div class="kt-bg-danger"></div>
                            </div>
                                <span class="kt-timeline-v1__item-time kt-font-brand">
                                Users Posted
                            </span>
                            <span class="kt-timeline-v1__item-time kt-font-brand">
                              <!--   11:35<span>AM</span> -->
                            </span>
<?php foreach ($chats as $chat) {
  if ($chat['from_Id']!=NULL)
  {
  ?>
 
                            <div class="kt-timeline-v1__item-content" style="background-color: #C3EFF9;">
                               <!--  <div class="kt-timeline-v1__item-title">
                                    Users Posted
                                </div> -->
                                <div class="kt-timeline-v1__item-body">
                               <!--      <div class="kt-list-pics kt-margin-b-10">
                                        <a href="#"><img src="./assets/media/users/100_4.jpg" title=""></a>
                                        <a href="#"><img src="./assets/media/users/100_13.jpg" title=""></a>
                                        <a href="#"><img src="./assets/media/users/100_11.jpg" title=""></a>
                                        <a href="#"><img src="./assets/media/users/100_14.jpg" title=""></a>
                                        <a href="#"><img src="./assets/media/users/100_7.jpg" title=""></a>
                                        <a href="#"><img src="./assets/media/users/100_3.jpg" title=""></a>
                                    </div> -->
                                   
                                    <p>
                                   <?php
                                 $url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i'; 
$string = preg_replace($url, '<a href="$0" target="_new" title="$0">$0</a>', $chat['message']);

?>
                                   <?php echo $string; ?>
                                    </p>
                                
                                </div>
                             
                            </div>
                            <br><br>
                          <?php }  } ?>
                        </div>
                        
 <?php foreach ($chats as $chat) {
 
    ?>  
                            
                        <div class="kt-timeline-v1__item kt-timeline-v1__item--right">
                            <div class="kt-timeline-v1__item-circle">
                                <div class="kt-bg-danger"></div>
                            </div>
                            <span class="kt-timeline-v1__item-time kt-font-brand"><span></span></span>
                            <div class="kt-timeline-v1__item-content" style="background-color: #E5DAD8;">
                                <div class="kt-timeline-v1__item-title">
                                Admin
                                </div>
                                <br>
                                  <?php 
                                                    if($chat['from_Id']==NULL)
                                                    {
                                                      ?>   
                                <div class="kt-timeline-v1__item-body">
                                    <div class="kt-widget4">
                                        <div class="kt-widget4__item">
                                            <div class="kt-widget4__pic">
                                                <img src="./assets/media/users/100_4.jpg" alt="">
                                            </div>
                                            <div class="kt-widget4__info">
                                              <!--   <a href="#" class="kt-widget4__username">
                                                            Anna Strong
                                                        </a> -->
                                                 
                                                <p class="kt-widget4__text">
                                                   
                                                 <?php
                                 $url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i'; 
$string = preg_replace($url, '<a href="$0" target="_new" title="$0">$0</a>', $chat['message']);

?>
                                   <?php echo $string; ?>
                                                    
                                                </p>
                                           
                                            </div>
                                           
                                        </div>
                                      
                                    </div>
                                </div>
                                              <?php
                                              }
                                              ?>

                            </div>
                        </div>
                        <br>
                        <br>
                   <?php
                    }
                  
                    ?>
                  
                    </div>
                </div>
          
            </div>
            <div class="col-xl-1">
            </div>
        </div>
    </div>
</div>
<!--End::Portlet--></div>
<?php
include '../sidemenu.php';

 ?>
 
              <!-- begin::Global Config(global config for global JS sciprts) -->
       <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->
 
    <!--begin:: Global Mandatory Vendors -->
<script src="assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="assets/vendors/custom/jquery-ui/jquery-ui.bundle.min.js" type="text/javascript"></script>
<link href="assets/vendors/custom/jquery-ui/jquery-ui.bundle.min.css">
<script src="assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
<script src="assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/dropzone.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/quill/dist/quill.js" type="text/javascript"></script>
<script src="assets/vendors/general/@yaireo/tagify/dist/tagify.polyfills.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/@yaireo/tagify/dist/tagify.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-markdown.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-notify.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/dual-listbox/dist/dual-listbox.js" type="text/javascript"></script>
<script src="assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
<script src="assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
<script src="assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>
<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle(used by all pages) -->
          
      <script src="assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
      <script src="assets/toggleButton/bootstrap-toggle.min.js"></script>
      <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>  

      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
            </body>
    <!-- end::Body -->
</html>
            
