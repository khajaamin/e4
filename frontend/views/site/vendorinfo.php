<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\ArrayHelper;
use common\models\Countries;
use common\models\Enquiries;
use common\models\Own;
// $this->title = 'Business Proprieters';
?>
<?php
ini_set('memory_limit', '-1');
?>
<style>
  /*Vendorinfo CSS Start*/
  .imginfo{
    width:100%;
    height:100%;
    padding:5px;    
  }

  .infoblock{
    line-height:24px;
  }


  .btomgallery{
    margin:0px;
    font-size:0.8em;
    color:#000;
    width:100%;
    border-style: groove;
    border-color: aliceblue;
  }

  .marq{
    float:left;
  }

  .marq a{
    text-decoration:none;
    color:inherit;
  }
  .marq:hover{
    color:#00C;
    text-shadow: 2px 2px 4px #000000;   
  }
  .marq img:hover{
    box-shadow: 10px 10px 5px grey;
  }
  .alsosee1{
    border-style: groove;
    border-color: aliceblue;
    margin-left:0px;
    margin-right:0px;
    min-height:150px;
  }
  .alsosee2{
    border-style: groove;
    border-color: aliceblue;
    margin-left:0px;
    margin-right:0px;
    max-height:200px;
    overflow:scroll;
  }
  @media only screen and (max-width: 500px) {
   .alsosee {
     max-height:200px;
     overflow:scroll;
   }
 }

 .linkslist{
  Padding: 1px 6px;
  /*color: black; */  
}
.requiredstar{
  color: red;
}
/*Vendorinfo CSS End*/
/* Rating CSS*/

div.stars {
  width: 270px;
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 4px;
  font-size: 20px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 5px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform:  scale(1.1); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
.requiredstar{
  color: red;
}
</style>
<?php
if(isset($_SESSION['bmc_id'])) {
  $a=$_SESSION['bmc_id'];
} else {
}
?>

<?php
if(!\Yii::$app->user->isGuest) {
  $userId = \Yii::$app->user->identity->id;
  $userType = \Yii::$app->user->identity->type;
  echo '<input type="hidden" value='.$userType.' id="usertype"/>';
  echo '<input type="hidden" value='.$userId.' id="userid"/>';
} else {
 echo '<input type="hidden" value="null" id="usertype"/>';
 echo '<input type="hidden" value="0" id="userid"/>';
}
?>

<?php
echo '<input type="hidden" value='.$_SESSION['bmc_id'].' id="bmc"/>';  
?>
<script type="text/javascript">
  $(document).ready(function(){
    var bmcID= document.getElementById('bmc').value;

    if(bmcID == '5') {
      $('.levent').show();
      $('#divVendorinfo').hide();
      $('#divVendorGallery').hide();
      $('#divliveventinfo').show();
      $('#divliveventGallery').show();   
    } else {
      $('.levent').hide();
      $('#divVendorinfo').show();
      $('#divliveventinfo').hide();
      $('#divliveventGallery').hide();
      $('#divVendorGallery').show();
    }

  });
</script>
<script type="text/javascript">
 $(document).ready(function(){

  $('.btnRating').show(); 
  var userType= document.getElementById('usertype').value;
   var userid= document.getElementById('userid').value;
  if(userType == 'Visitor' || userType == 'FB' || userType == 'GL') {  

   $('.btnRating').show();

 } else if(userType == 'Vendor'){ 

   $('.btnRating').hide(); 

 } else if(userType == "null") {

   $('.btnRating').show(); 

 }
});
 
</script>
<script type="text/javascript">
  function logincall() {
   window.location = "index.php?r=site/login";
 }
</script>

<script type="text/javascript" src="js/validation.js"></script>
<body>
  <div class="container"> 

    <!--HEADER START-->
    <div class="row headerbox1">
      <!--Image-->
      <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 image1">
        <?php
        $m = $dataProvider3->getModels();
        foreach ($m as $dp) {
          echo '<a class="" href="?r=site/vendorinfo&img_id='.$dp['bsc_id'].'" method="get">';
          echo "<img class='proimage thumbnail img-responsive' src = '".\Yii::$app->urlManagerAdminBackend->baseUrl."/".$dp['bsc_image']."' />";
          echo '</a>';
        } ?>
      </div>
      <!--Title-->
      <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 headerdescr" style="padding:5px; ">

        <?php
        $m = $dataProvider3->getModels();
        foreach ($m as $dp) {
          $this->title = $dp['bsc_name'];
          echo '<a class="" href="?r=site/vendorinfo&img_id='.$dp['bsc_id'].'" method="get">';

          echo '<h2><b style="color:white; font-size:40px;">'.$dp['bsc_name'].'</b></h2>';
          echo '</a>';
        } ?>

        <hr />

        <h4>
          <?php
          $m = $dataProvider3->getModels();
          foreach ($m as $dp) {
            echo '<a class="" href="?r=site/vendorinfo&img_id='.$dp['bsc_id'].'" method="get">';
            echo '<b style="color:white;">'.$dp['bsc_description'].'</b>';
            echo '</a>';
          } ?>    
        </h4>
        <!-- Add Event button -->
        <div id="levent">
         <?php
         /* echo '<button type="button" onClick="liveventDetail();" class=" levent btn btn-default btn-md levent-btn" data-toggle="modal" data-target="#liveevent">
         Add Your Event</button>'; */
         echo '<a href="?r=livevents/create"><button type="button" class="btn btn-default btn-md levent-btn">Add Your Event</button></a>';
         ?> 
       </div>

       <!--Event Modal -->
       <div class="modal fade" id="liveevent" role="dialog">
        <div class="modal-dialog">

          <!--Event Modal content-->
          <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal">&times;</button>

              <h4 class=""><strong>Register Your Live Event</strong></h4>
            </div>
            <div class="modal-body">

             <form class="form-horizontal" role="form">
               <div class="form-group">
                <label class="control-label col-sm-3" for="evevtype">Event Type:</label>
                <div class="col-sm-9">
                  <!-- <select id="eventtype" placeholder="Select Event"> -->

                  <?php
                  $m = $dataProvider2->getModels();
                   // echo '<option id="evevtype1" value="">Other</option>';

                   // foreach ($m as $dp) {
                  echo '<option id="evtype" readonly="readonly" value='.$dp['bsc_id'].'>'.$dp['bsc_name'].'</option>';

                   // }

                  ?>

                  <!--  </select> -->
                </div>

              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="evname">Your Name:<span class="requiredstar">*</span></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="evname" maxlength="30" placeholder="Enter Name">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="evrole">Your Role:<span class="requiredstar">*</span></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="evrole" maxlength="30" placeholder="Your Role">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="evevname">Event Name:<span class="requiredstar">*</span></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="evevname" maxlength="30" placeholder="Enter Event Name">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Description:<span class="requiredstar">*</span></label>
                <div class="col-sm-9">
                  <textarea class="form-control" rows="4" id="evdecscription">
                  </textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="evenue">Event Venue:<span class="requiredstar">*</span></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="evenue" maxlength="100" placeholder="Venue Name">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="ecity">City:<span class="requiredstar">*</span></label>
                <div class="col-sm-9">
                 <input type="text" class="form-control" id="ecity" maxlength="30" placeholder="Enter Venue City">
               </div>
             </div>

             <div class="form-group">
              <label class="control-label col-sm-3" for="econtact">Your Contact(s):<span class="requiredstar">*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="econtact" placeholder="Enter Contact Number (Seperate by comma, if multiple)">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="leemail">Your Email:<span class="requiredstar">*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="eemail" maxlength="30" placeholder="Enter Your Email Address">
              </div>
            </div>
          </form>
        </div>

        <div class="modal-footer">
          <input type="button" id= "btnSubmit" value ="Submit" class="btn btn-default btn-primary pull-right"/>
        </div>
      </div>

    </div>
  </div>
  <!--Add Event Button & Modal End --> 
</div>
</div><!--HEADER END-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:100px; background:#960;">
        Advertisement
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px">

  <!--Also see Start-->
  <div class="" style="padding:;">            
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="padding:0px;" >

      <!--PanelHeading-->      
      <!--PanelHeading1-->      
      <div class="panel-heading sidegallery">
        <h4> <span class="glyphicon glyphicon-th-large"></span>
          &nbsp; See Also</h4>
        </div>

        <!--Links1-->
        <div class="row alsosee1"> 
          <?php
          $m = $dataProvider5->getModels();
          foreach ($m as $dp) {

            echo '<a class="" href="?r=site/vendorinfo&img_id='.$dp['bsc_id'].'" method="get">';
            echo '<div class="linkslist">';
            echo "<span id='moveCount' value =".$dp['bsc_name'].">".$dp['bsc_name']."</span>";
          // echo '<a class="" href="?r=site/vendorinfo&img_id='.$dp['bsc_id'].'" method="get">';
            echo '</div>';
            echo '</a>';
          } ?>        

        </div>
        <!--PanelHeading2-->      
        <div class="panel-heading sidegallery">
          <h4> <span class="glyphicon glyphicon-th-large"></span>
            &nbsp; Also More</h4>
          </div>

          <!--Links2-->
          <div class="row alsosee2">         
           <?php
           $m = $dataProvider;
           foreach ($m as $dp) {
            echo '<a class="" href="?r=site/subcat&img_id='.$dp['bmc_id'].'" method="get">';
            echo '<div class="linkslist">';
            echo "<span>".$dp['bmc_name']."</span>";
            echo '</div>';
            echo '</a>';
          } ?>
        </div>

      </div>
    </div>                 
    <!--Also See End-->


    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 " style="padding:0px;">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
        <div class="panel-heading sidegallery">
          <h4><span class="glyphicon glyphicon-th-large"></span>
            &nbsp;Business Proprieters</h4>
          </div>
          <!--Sub Categories Start-->
          <div id="divVendorinfo">
            <!--Vendor 1 Start-->
            <?php
            $m = $dataProvider2->getModels();
            $count = 0;
                     //if(count($m) >= 0) {
            foreach ($m as $dp) {
             echo '<div class="row" style="border-style: groove;margin-bottom:10px;margin:0px;padding:10px;">';


             echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">';

             echo '<a class="" href="?r=site/vendordetails&img_id='.$dp['ven_id'].'" method="get">';

             if(!empty($dp['ven_business_logo']))
             {
                 echo "<img class='imginfo img-responsive img-thumbnail' src = '".\Yii::$app->urlManagerCommon->baseUrl."/".$dp['ven_business_logo']."' />";
               }
               else
               {
                 echo "<img class='imginfo img-responsive img-thumbnail' src = '".\Yii::$app->urlManagerCommon->baseUrl."/upload-image-for-eventforall.png' />";


               }
             echo '</a>';
             echo '</div>';
             echo '<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 infoblock" value='.$dp['ven_id'].'>'; 
             echo'<input type="hidden" id="venid" name="venid" value='.$dp['ven_id'].'>';
             echo'<h4>';
             echo'<span class="glyphicon glyphicon-info-sign"></span>';
             echo '<a class="" href="?r=site/vendordetails&img_id='.$dp['ven_id'].'" method="get">';
             echo "<strong>".$dp['ven_company_name']."</strong>";
             echo'</a></h4>';

             echo'<span class="glyphicon glyphicon-earphone"></span>';
             echo'<strong> Contact:&nbsp;</strong>';
             $contact = explode(",", $dp['ven_contact_no']);
             foreach ($contact as $ct) {
              echo'<br>';
              echo "<a href='tel:".$dp['ven_country_code'].$ct."'>".$dp['ven_country_code']." ".$ct."</a>";
             }
             echo'<br>';

             echo'<span class="glyphicon glyphicon-globe"></span>';
             echo'<strong> Address:&nbsp;</strong>';
             echo "".$dp['ven_address']."";
             echo'<br>';

             echo'<span class="glyphicon glyphicon-tree-deciduous"></span>';
             echo'<strong> Established In:&nbsp;</strong>';
             echo "".$dp['ven_established_date']."";
             echo'<br>';
             echo'<br>';

             echo'<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style="padding:0px;">'; 
             echo '<button type="button" id= "btnSendMail" onClick="sendmailDetail('.$dp['ven_id'].');"  class="btn btn-default btn-block" data-toggle="modal" data-target="#sendmail">';
             echo '<strong>Send Mail</strong>';
             echo '</button>';

             echo '<div class="modal fade" id="sendmail" role="dialog">';
             echo '<div class="modal-dialog">';

                           //Popup content
             echo '<div class="modal-content">';
             echo '<div class="modal-header">';
             echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
             echo '<h4 class="modal-title">Send Mail</h4>';
             echo '</div>';
                            //Form Start
             echo '<div class="modal-body">';

             echo '<form class="form-horizontal" id="formsendmail" role="form">';

             echo '<div class="form-group">';
                          //  echo '<label for="name" class="col-sm-2 control-label">Vendor Id</label>';
             echo '<div class="col-sm-10">';
                           // echo '<input type="test" class="form-control" id="venid" name="venid" value='.$dp['ven_id'].'>';
             echo '<input type="hidden" class="form-control" id="bscid" name="bscid" value='.$dp['bsc_id'].'>';
             echo '</div>';
             echo '</div>';

             echo '<div class="form-group">';
             echo '<label for="name" class="col-sm-2 control-label">Name:<span class="requiredstar">*</span></label>';
             echo '<div class="col-sm-10">';
             echo '<input type="text" class="form-control" id="name" name="name" maxlength="30" placeholder="First & Last Name" value="">';
                            //echo '<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">';
             echo '</div>';
             echo '</div>';

             echo '<div class="form-group">';
             echo '<label for="contact" class="col-sm-2 control-label">Contact:<span class="requiredstar">*</span></label>';
             echo '<div class="col-sm-10">';
             echo '<input type="text" class="form-control" id="contactnumber" name="contactnumber" placeholder="Your Contact Number" value="">';
             echo '</div>';
             echo '</div>';

             echo '<div class="form-group">';
             echo '<label for="email" class="col-sm-2 control-label">Email:<span class="requiredstar">*</span></label>';
             echo '<div class="col-sm-10">';
             echo '<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">';
             echo '</div>';
             echo '</div>';

             echo '<div class="form-group">';
             echo '<label for="message" class="col-sm-2 control-label">Message:<span class="requiredstar">*</span></label>';
             echo '<div class="col-sm-10">';
             echo '<textarea class="form-control" rows="5" maxlength="100" id="message" name="message"></textarea>';
             echo '</div>';
             echo '</div>';



             echo '<div class="form-group">';
             echo '<div class="col-sm-10 col-sm-offset-2">';
             echo '<input id= "btnSend" name="send" type="button" value="Send" class="btn btn-primary btn-md pull-right">';
             echo '</div>';
             echo '</div>';

             echo '<div class="form-group">';
             echo '<div class="col-sm-10 col-sm-offset-2">';
                            //<! Will be used to display an alert to the user>
             echo '</div>';
             echo '</div>';
             echo '</form>';
             echo '<div class="clearfix"></div>';
             echo '</div>';
                            //<!--Form End-->        
             echo '</div>';

             echo '</div>';
             echo '</div>';
                            //<!--Send Mail Form End-->
             echo '</div>';

                            //<!--Edit Button-->
             echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style="padding:0px;">';
             echo '<button type="button" id="btnEdit" onClick="editDetail('.$dp['ven_id'].');" class="btn btn-default btn-block" data-toggle="modal" data-target="#edit">';
             echo '<strong>Edit</strong>';
             echo '</button>';

                                //<!--Edit form Start-->
             echo '<div class="modal fade" id="edit" role="dialog">';
             echo '<div class="modal-dialog">';

                            //<!-- Popup content-->
             echo '<div class="modal-content">';

             echo '<div class="modal-header">';
             echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
             echo '<h4 class="modal-title">Edit This</h4>';
             echo '</div>';
                            //<!--Form Start-->
             echo '<div class="modal-body">';


                            //Email & Contact Number Replace

             echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">';
             echo '<form class="form-horizontal" role="form" method="post" action="index.php">';

             echo '<div class="form-group">';
             echo '<label for="cemail" class="col-sm-2 control-label">Email:<span class="requiredstar">*</span></label>';
             echo '<div class="col-sm-6">';
             echo '<input type="text" class="form-control" id="emailEdit" name="emailEdit" placeholder="Your Email">';
                                    //echo'<div id="">lflskadfklsdfls;dflsdk</div>';//error block
             echo '</div>';
             echo '</div>';

             echo '<div class="form-group">';
             echo '<label for="name" class="col-sm-2 control-label">Contact:<span class="requiredstar">*</span></label>';
             echo '<div class="col-sm-6">';
             echo '<input type="text" class="form-control" id="contact" name="contact" placeholder="Your Contact Number" value="">';
                                   // echo'<div id="">lflskadfklsdfls;dflsdk</div>';//error block
             echo '</div>';
             echo '</div>';


             echo '</form>';

             echo '</div>';
                            //Email & Contact Number Replace
             echo '<label class="radio-inline">';
             echo '<input type="radio" id ="RadioEditbusiness" value ="B" checked="checked" name="toggler">Edit This Business';
             echo '</label>';

             echo '<div class="well" id ="divEditbusiness" style="margin-bottom:0px;">';
             echo '<form class="form-horizontal" role="form" method="post" action="">';

             echo '<div class="form-group">';
             echo '<label class="radio-inline">';
             echo '<input type="radio" id= "Radioasuser" name="toggler2" value="U" > As a User';
             echo '</label>';              
             echo '<label class="radio-inline">';
             echo '<input type="radio" id = "Radioasbusiness" name="toggler2" value="B" > As a Business';
             echo '</label>';
             echo '</div>';

             echo '<div class="form-group">';
             echo '<label for="comment">';
             echo 'Add More Information here also you can send any image or video through email images@eventforall.com<span class="requiredstar">*</span></label>';
             echo '<textarea class="form-control"  id="comment"></textarea>';
             echo '</div>';



             echo '</form>';
             echo '<div class="clearfix"></div>';

             echo '</div>';


             echo '<label class="radio-inline">';
             echo '<input type="radio" id ="RadioreportInaccurate" value ="I" name="toggler">Report Inaccurate</label>';

             echo '<div class="well" id ="divReportInaccurate"  style="margin-bottom:0px;">';
             echo '<form class="form-horizontal" role="form" method="post" action="">';
             echo '<div class="form-group">';
             echo '<label for="comment">If Details are inaccurate Please Add your comment<span class="requiredstar">*</span></label>';
             echo '<textarea class="form-control" id="comment2"></textarea>';
             echo '</div>';
             echo '</form>';
             echo '<div class="clearfix"></div>';
             echo '</div>';


             echo '<label class="radio-inline">';
             echo '<input type="radio" id = "ReportIfbusinesshasshutdown" value ="S" name="toggler">Report If business has shutdown </label>';

             echo '<div class="well" id ="divReportIfbusinesshasshutdown">';
             echo '<form class="form-horizontal" role="form" method="post" action="">';

             echo '<div class="form-group">';
             echo '<label for="comment">Add Your Comment (Optional)</label>';
             echo '<textarea class="form-control" id= "comment3"></textarea>';
             echo '</div>';

             echo '</form>';
             echo '<div class="clearfix"></div>';
             echo '</div>';

             echo '<div class="form-group">';
             echo '<div class="">';
             echo '<input id= "btnEditSend" name="send" type="button" value="Send" class="btn btn-primary btn-md pull-right">';
             echo '</div>';
             echo '</div>';

             echo '<div class="clearfix"></div>';
             echo '</div>';
                        //<!--Form End-->        
             echo '</div>';

             echo '</div>';
             echo '</div>';
                    //<!--Edit Form End-->
             echo '</div>';
                   // <!--Edit Button End-->

                         //<!--Own Button Start-->
             echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style="padding:0px;">';
             echo '<button type="button" id="btnOwn" onClick="ownDetail('.$dp['ven_id'].');" class="btn btn-default btn-block" data-toggle="modal" data-target="#own">';
             echo '<strong>Own</strong>';
             echo '</button>';

                    //<!--send mail form Start-->
             echo '<div class="modal fade" id="own" role="dialog">';
             echo '<div class="modal-dialog">';

                     //<!-- Popup content-->
             echo '<div class="modal-content">';
             echo '<div class="modal-header">';
             echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
             echo '<h4 class="modal-title">Own</h4>';
             echo '</div>';
                   // <!--Form Start-->
             echo '<div class="modal-body">';

             echo '<form class="form-horizontal" role="form" method="post" action="index.php">';
             echo '<div class="form-group">';
             echo '<label for="name" class="col-sm-2 control-label">Name:</label>';
             echo '<div class="col-sm-10">';
             echo '<input type="text" class="form-control" id="ownname" name="ownname" placeholder="First & Last Name" value="">';
             echo '</div>';
             echo '</div>';

             echo '<div class="form-group">';
             echo '<label for="name" class="col-sm-2 control-label">Contact:<span class="requiredstar">*</span></label>';
             echo '<div class="col-sm-10">';
             echo '<input type="text" class="form-control" id="owncontactnumber" name="owncontactnumber" placeholder="Your Contact Number" value="">';
             echo '</div>';
             echo '</div>';

             echo '<div class="form-group">';
             echo '<label for="email" class="col-sm-2 control-label">Email:<span class="requiredstar">*</span></label>';
             echo '<div class="col-sm-10">';
             echo '<input type="email" class="form-control" id="ownemail" name="ownemail" placeholder="example@domain.com" value="">';
             echo '</div>';
             echo '</div>';


             echo '<div class="form-group">';
             echo '<div class="col-sm-10 col-sm-offset-2">';
             echo '<input id="btnOwnSend" name="send" type="button" value="Send" class="btn btn-primary btn-md pull-right">';
             echo '</div>';
             echo '</div>';

             echo '<div class="form-group">';
             echo '<div class="col-sm-10 col-sm-offset-2">';
                       // <! Will be used to display an alert to the user>
             echo '</div>';
             echo '</div>';
             echo '</form>';
             echo '<div class="clearfix"></div>';
             echo '</div>';
                   //<!--Form End-->        
             echo '</div>';            
             echo '</div>';
             echo '</div>';
                       // <!--Send Mail Form End-->
             echo '</div>';
                   // <!--Own Button End-->
             if(isset($userId)) {
              echo '<div id="divUserRate">';
              echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style="padding:0px;">';
              echo '<button type="button" id="btnRate" onClick="rateDetail('.$dp['ven_id'].','.$userId.');" class=" btnRating btn btn-default btn-block" data-toggle="modal" data-target="#rcrate">';
              echo '<strong>Rate</strong>';
              echo '</button> ';
              echo '</div>'; 
              echo '</div>';      
            } else {
              if(isset($userId) == 0) {
              echo '<div id="divUserRate">';
              echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style="padding:0px;">';
              echo '<button type="button" id="btnRate2" onClick="logincall();" class="btnRating btn btn-default btn-block" data-toggle="modal">';
              echo '<strong>Rate</strong>';
              echo '</button> ';
              echo '</div>'; 
              echo '</div>';      
            }
            }
            echo '</div>'; 
                        //Comment Popup Start
            echo '<div class="modal fade" id="rcrate" role="dialog" >';
            echo '<div class="modal-dialog">';
                                      // Modal content
            echo '<div class="modal-content">';
            echo '<div class="modal-header">';
            echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
            echo '<h4 class="modal-title">';
            echo 'Add Your Comment Here And Rate us';
            echo '</h4>';
            echo '</div>';

            echo '<div class="modal-body">';

            echo '<div class="form-group">';
            echo '<label for="comment">Comment:<span class="requiredstar">*</span></label>';
            echo '<textarea class="form-control" rows="5" id="ratecomment"></textarea>';
            echo '</div>';

                                              //Rating Box
            echo '<div class="stars" style="text-align:left; font-size: 20px;">';
            echo '<form id="ratingform" name="ratingform" action="">';
            echo 'Ratings:';
            echo '<input class="star star-5" id="star-5" type="radio" value="5" name="star"/>';
            echo '<label class="star star-5" for="star-5"></label>';
            echo '<input class="star star-4" id="star-4" type="radio" value="4" name="star"/>';
            echo '<label class="star star-4" for="star-4"></label>';
            echo '<input class="star star-3" id="star-3" type="radio" value="3" name="star"/>';
            echo '<label class="star star-3" for="star-3"></label>';
            echo '<input class="star star-2" id="star-2" type="radio" value="2" name="star"/>';
            echo '<label class="star star-2" for="star-2"></label>';
            echo '<input class="star star-1" id="star-1" type="radio" value="1" name="star"/>';
            echo '<label class="star star-1" for="star-1"></label>';
            echo '</form>';
            echo '</div>';
                                              //Rating Box End
            echo '</div>';

            echo '<div class="modal-footer">';
            // echo '<button type="button" id="btnRateComment" value="Comment" class="btn btn-default" >Comment</button>';
            echo '<input id= "btnRateComment" name="send" type="button" value="Comment" class="btn btn-primary btn-md pull-right" >';
            echo '</div>';
            echo '</div>';

            echo '</div>';
            echo '</div>';
             echo '</div>';//close rate button div
                        //Comment Popup End
           } 

           ?>                      
         </div>
         <!--divVendorinfo-->
         <div id="divliveventinfo">
          <!--Vendor 1 Start-->
          <?php
          $m = $dataProvider8->getModels();
          // $count = 0;
          //if(count($m) >= 0) {
          foreach ($m as $dp) {
           echo '<div class="row" style="border-style: groove;margin-bottom:10px;margin:0px;padding:10px;">';
           echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">';
           echo "<img class='imginfo img-responsive img-thumbnail' src = '".\Yii::$app->urlManagerCommon->baseUrl."/".$dp['le_image']."' />";           
           echo '</div>';
           echo '<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 infoblock">'; 
          // echo '<a class="" href="?r=site/vendordetails&img_id='.$dp['le_event_category'].'" method="get">';
           echo'<h4>';
           echo '<span class="glyphicon glyphicon-info-sign"></span>';
           echo '<a class="" href="?r=site/livevent&img_id='.$dp['le_id'].'" method="get">';
           echo "<strong>".$dp['le_event_name']."</strong>";
           echo '</a></h4>';

           echo'<span class="glyphicon glyphicon-earphone"></span>';
           echo'<strong> Contact:&nbsp;</strong>';
           $contact = explode(",", $dp['le_contacts']);
             foreach ($contact as $ct) {
              echo'<br>';
              echo "<a href='tel:".$ct."'>".$ct."</a>";
            }
           echo'<br>';

           echo'<span class="glyphicon glyphicon-globe"></span>';
           echo'<strong> Address:&nbsp;</strong>';
           echo "".$dp['le_venue']."";
           echo'<br>';
           echo'<br>';
           echo '</div>';
           echo '</div>';
         }
         ?> 
       </div> <!--divlivevnt end-->                    
     </div>
   </div>
   <!--Sub Categories End-->


   <!--Gallery Sidebar Start-->
   <div id ="divVendorGallery">
     <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding:0px;">

      <div class="panel-heading sidegallery">
        <h4><span class="glyphicon glyphicon-th-large"></span>
          &nbsp;Gallery
        </h4>
      </div>

      <div class="row btomgallery">
        <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();" style="height:600px; ">

          <?php
          $m = $dataProvider4;
          foreach ($m as $dp) {
            echo '<div class="row sidenews">';
            echo '<a style="text-decoration:none; color:inherit;" href="?r=site/vendordetails&img_id='.$dp['ven_id'].'" method="get">';
            echo '<img src="'.\Yii::$app->urlManagerCommon->baseUrl."/".$dp['ven_business_logo'].'" class="img-rounded" alt="No Image" width="80" height="80" style="padding:5px; float:left;" />';
            echo "<h5><b>".$dp['ven_company_name']."</b></h5>";
            echo '</a></div>';
          } ?>

        </marquee>                        
      </div>


    </div>
    <!--Gallery Sidebar Ends-->
  </div>
  <div id ="divliveventGallery">
   <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding:0px;">

    <div class="panel-heading sidegallery">
      <h4><span class="glyphicon glyphicon-th-large"></span>
        &nbsp;Gallery
      </h4>
    </div>

    <div class="row btomgallery">
      <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();" style="height:600px; ">

        <?php
        $m = $dataProvider9->getModels();
        foreach ($m as $dp) {
            echo '<div class="row sidenews">';
            echo '<a style="text-decoration:none; color:inherit;" href="?r=site/livevent&img_id='.$dp['le_id'].'" method="get">';
            echo '<img src="'.\Yii::$app->urlManagerCommon->baseUrl."/".$dp['le_image'].'" class="img-rounded" alt="No Image" width="80" height="80" style="padding:5px; float:left;" />';
            echo "<h5><b>".$dp['le_event_name']."</b></h5>";
            echo '</a></div>';
 
        } ?>

      </marquee>                        
    </div>


  </div>
  <!--Gallery Sidebar Ends-->
</div>
</div>

</div>
</body>