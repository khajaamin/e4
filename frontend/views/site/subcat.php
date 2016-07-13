<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Countries;
use common\models\BusinessMainCategories;
use common\models\BusinessSubCategories;
// $this->title = 'Event Sub Categories';
?>
<?php
ini_set('memory_limit', '-1');
?>
<style>
  .itemlist{
    padding: 1px 6px;   
  }
  .rowmarq1{
    margin:0px;
    font-size:0.8em;
    color:#000;
  }
  .marq1{
    margin-left:2px;
    width:100px;
    height:100px;
  }
  .marq1 a{
    text-decoration:none;
    color:inherit;  
  }
  @media only screen and (max-width: 500px) {
    .headerdescr h2{
      font-size:18px;
      font-weight:bold;
    }
  }
  .requiredstar{
    color: red;
  }
</style>
<?php
//session_start();
?>
<?php
$m = $dataProvider3->getModels();
foreach ($m as $dp) {
  $name=$dp['bmc_name'];
  echo '<input type="hidden" value='.$dp['bmc_id'].' id="bmc"/>';
  echo '<input type="hidden" value='.$dp['bmc_name'].' id="bmcname"/>';
      //echo''.$name;
}?>


<script type="text/javascript">
  $(document).ready(function(){

    var bmc_id= document.getElementById('bmc').value;
    var bmcName= document.getElementById('bmcname').value;
    
    
    if(bmc_id == '5') {

     $('#levent').show();
     $('#divVendorGallery').hide();
     $('#divliveventGallery').show();

   } else {

     $('#levent').hide();
     $('#divliveventGallery').hide();
     $('#divVendorGallery').show();
   }

 });
</script>
<script type="text/javascript" src="js/validation.js"></script>

<!-- start gallery  -->

<!--HEADER START-->
<div class="row headerbox1">
  <!--Image-->
  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 image1">
    <?php
    $m = $dataProvider3->getModels();
    foreach ($m as $dp) {
      $this->title = $dp['bmc_name'];
      echo '<a class="" href="?r=site/subcat&img_id='.$dp['bmc_id'].'" method="get">';
      echo "<img class='proimage thumbnail img-responsive' src = '".\Yii::$app->urlManagerAdminBackend->baseUrl."/".$dp['bmc_image']."' style='' />";
      echo '</a>';
      $_SESSION['bmc_id'] = $dp['bmc_id'];

    } ?>
  </div>
  <!--Title-->
  <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 headerdescr" style="padding:5px">

    <?php
    $m = $dataProvider3->getModels();
    foreach ($m as $dp) {
      echo '<a href="?r=site/subcat&img_id='.$dp['bmc_id'].'" method="get">';

      echo '<h1><b style="color:white; font-size:50px;">'.$dp['bmc_name'].'</b></h1>';
      echo '</a>';
    } ?>

    <hr />

    <h4>
      <?php
      $m = $dataProvider3->getModels();
      foreach ($m as $dp) {
        echo '<a class="" href="?r=site/subcat&img_id='.$dp['bmc_id'].'" method="get">';
        echo '<b style="color:white;">'.$dp['bmc_description'].'</b>';
        echo '</a>';
      } ?>    
    </h4>
    <!-- Add Event button -->
    <div id="levent">
     <?php
     /* echo '<button type="button" onClick="liveventDetail();" class="btn btn-default btn-md levent-btn" data-toggle="modal" data-target="#liveevent">
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
              <select id="evtype" placeholder="Select Event">

                <?php
                $m = $dataProvider2->getModels();
                // echo '<option id="evevtype1" value="">Other</option>';

                foreach ($m as $dp) {
                  echo '<option id="evevtype1" value='.$dp['bsc_id'].'>'.$dp['bsc_name'].'</option>';

                }

                ?>

              </select>
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
            <label class="control-label col-sm-3" for="evevname">Your Event Name:<span class="requiredstar">*</span></label>
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
             <!--   <select id="ecity" placeholder="Enter Venue City"> -->
             <?php
            // $m = $dataProvider7->getModels();
            // echo '<select id="ecity" placeholder="Enter Venue City">';
            // foreach ($m as $dp) {
            //   echo '<option id="ecity1" value='.$dp['id'].'>'.$dp['name'].'</option>';
            // }
            // echo '</select>';
             ?>
             <!--   </select> -->
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

</div>
<!--HEADER END-->



<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px">
  <!--LEFT SIDEBAR START-->
  <!--Also see Start--> 
  <div class="" style="padding:;">          
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="padding:0px">
      <!--PanelHeading-->      
      <div class="panel-heading sidegallery"><h4>
        <span class="glyphicon glyphicon-th-large"></span>
        &nbsp; Also See
      </h4></div>
      <!--Links-->

      <div class="row" style="margin:0px; border-style: groove; border-color: aliceblue;">         
        <?php
        $m = $dataProvider;
        foreach ($m as $dp) {
          echo '<a class="" href="?r=site/subcat&img_id='.$dp['bmc_id'].'" method="get">';
          echo '<div class="itemlist">';
          echo "<span>".$dp['bmc_name']."</span>";
          echo '</div>';
          echo '</a>';
        } ?>
      </div>
    </div>
  </div>
  <!--Also See End-->
  <!--LEFT SIDEBAR END-->



  <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" style="padding:0px;">
   <!--Sub Categories Start-->
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
    <div class="panel-heading sidegallery"><h4>
      <span class="glyphicon glyphicon-th-large"></span>
      &nbsp;Sub Categories
    </h4></div>

    <div class="row" style="opacity: 1; margin-bottom:5px;margin:0px;">

      <?php
      $m = $dataProvider2->getModels();
      foreach ($m as $dp) {
        echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 eventthumb" style="padding:0px">';
        echo '<a id ="img_id" class="" href="?r=site/vendorinfo&img_id='.$dp['bsc_id'].'" method="get">';
        echo "<img class='img-responsive' src = '".\Yii::$app->urlManagerAdminBackend->baseUrl."/".$dp['bsc_image']."' width='100%' height='100%' style='padding:5px;'/>";
        echo '<center><h5><b>'.$dp['bsc_name'].'</b></h5></center>';
        echo '</a></div>';
        
      } ?>
    </div>                       

  </div>        
  <!--Sub Categories End-->
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:100px;">
      Google Ads
  </div>
  <!--Gallery Sidebar Start-->
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">

    <div class="panel-heading sidegallery"><h4>
      <span class="glyphicon glyphicon-th-large"></span>
      &nbsp;Gallery
    </h4></div>

    <div class="row rowmarq1"><br/>
     <marquee onmouseover="this.stop();" onmouseout="this.start();">
       <div id="divVendorGallery">
        <?php
        $m = $dataProvider4;
        foreach ($m as $dp) {
          echo '<div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 marq1">';
          echo '<a style="" href="?r=site/vendordetails&img_id='.$dp['ven_id'].'" method="get">';
          echo '<img src="'.\Yii::$app->urlManagerCommon->baseUrl."/".$dp['ven_business_logo'].'" class="img-rounded img-responsive" alt="" width="100%" height="70%" style="padding:;"><br>';
          echo "<center><h6><b>".$dp['ven_company_name']."</b></h6></center>";
          echo '</a></div>';
        } ?>
      </div>
      <div id="divLiveventGallery">
        <?php
        $m = $dataProvider8->getModels();
        foreach ($m as $dp) {
          echo '<div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 marq1">';
          echo '<a style="" href="?r=site/livevent&img_id='.$dp['le_id'].'" method="get">';
          echo '<img src="'.\Yii::$app->urlManagerCommon->baseUrl."/".$dp['le_image'].'" class="img-rounded img-responsive" alt="" width="100%" height="70%" style="padding:;"><br>';
          echo "<center><h6><b>".$dp['le_event_name']."</b></h6></center>";
          echo '</a></div>';
        } ?>
      </div>
    </marquee>    

  </div>      
</div>
<!--Gallery Sidebar Ends-->

</div>
</div> 
</div>        
</div>