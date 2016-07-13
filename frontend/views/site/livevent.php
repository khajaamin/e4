<div class="row headerbox1">
  <!-- Start gallery Start -->

  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 image1">
    <?php
    $m = $dataProvider;
    foreach ($m as $dp) {
      $this->title = $dp['le_event_name'];
      echo '<a class="" href="?r=site/livevent&img_id='.$dp['le_id'].'" method="get">';   
      echo "<img class='proimage thumbnail img-responsive' src = '".\Yii::$app->urlManagerCommon->baseUrl."/".$dp['le_image']."' />";      
      echo '</a>';
    } ?>
  </div>

  <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 headerdescr" style="padding:5px; " >
    <?php
    $m = $dataProvider;
    foreach ($m as $dp) {

      echo '<a class="" href="?r=site/livevent&img_id='.$dp['le_id'].'" method="get">';
      echo '<h3><b style="color:white; font-size:35px;">'.$dp['le_event_name'].'</b></h3>';
      echo '</a><hr/>';
    } ?>
  </div>
</div>
<div class="">

  <div class="row col-lg-9 col-md-9" style=" padding: 0px; margin: 0px;">

    <!--Contact Us Start-->
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 contactus" style="padding:0px; margin-bottom:10px;">      
      <div class="panel-heading cupanel">
        <strong>Contact Us</strong>
      </div>
      <div class="row" style="margin:0px; padding:10px 10px; line-height:24px;">
       <form>
         <div class="form-group">
          <label for="">Your Email:<span class="requiredstar">*</span></label>
          <input type="email" id="email" class="form-control" placeholder="Enter your mail Address">
          <div id= "cs-email" style="display:none;">Please Enter Your Email</div>
        </div>

        <div class = "form-group">
          <label for = "contact">Your Contact:<span class="requiredstar">*</span></label>
          <input type="text" id="contactnumber" class = "form-control" placeholder="Leave Your Contact"></input>
          <div id= "cs-comment" style="display:none;">Please leave Your comment</div>
        </div>

        <div class = "form-group">
         <label for = "name">Your Comment:<span class="requiredstar">*</span></label>
         <textarea type="text" id="comment" rows="4" cols="5" maxlength="150" class = "form-control" placeholder="Leave Your Comment"></textarea>
         <div id= "cs-comment" style="display:none;">Please leave Your comment</div>
       </div>

       <div class = "form-group">

        <?php
        $m = $dataProvider;
        foreach ($m as $dp) {

          echo '<button type ="button" id="btnSend" onClick= "sendDetail('.$dp['le_id'].');"  class = "btn btn-primary pull-right">Send Mail</button>';

        } ?>

      </div>
    </form>


  </div>
  <div class="clearfix"></div>
</div>
<!--Contact Us End-->

<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="padding:0px;">  
 <!--Tabular Menu Start-->
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px 5px;">  
  <!--Buttons Start-->
  <div class="btn-group btn-group-justified" style="padding:0px 0px;" >
    <div class="btn-group">
      <button class="btn btn-primary topbtn" onclick="showhide1()">About Us</button>
    </div>

    <div class="btn-group">
      <button class="btn btn-primary topbtn" onclick="showhide2()">Contact</button>
    </div>


  </div>
</div>
<hr />
<!--Tabular Menu End-->




<!-- About us Start -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:5px 5px;">        

  <div class="" id="abtus"style="display:none">
    <?php
    $m = $dataProvider;
    foreach ($m as $dp) {

      echo $dp['le_description'];

    } ?>
  </div>

</div>
<!-- About Us End -->
<!-- Contact Start --> 
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:5px 5px;">        

  <div class="" id="cnctus" style="display:none">
    <h4><strong>
      Call Us:
    </strong></h4>
    <?php
    $m = $dataProvider;
    foreach ($m as $dp) {

      echo "<a href='tel:".$dp['le_contacts']."'>".$dp['le_contacts']."</a><br>";

    } ?> 
  </div>

</div>
<!-- contact end -->
</div></div>

<div class=" col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding:0px;">
  <!--Gallery Sidebar Start-->
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" padding:0px;">

    <div class="panel-heading" style="background:#337ab7; color:#000;">
      <strong>Gallery</strong>
    </div>
    <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();" style="height:600px;"> 
      <?php
      $m = $dataProvider2;
      foreach ($m as $dp) {
          echo '<div class="row sidenews">';
            echo '<a style="text-decoration:none; color:inherit;" href="?r=site/livevent&img_id='.$dp['le_id'].'" method="get">';
            echo '<img src="'.\Yii::$app->urlManagerCommon->baseUrl."/".$dp['le_image'].'" class="img-rounded" alt="No Image" width="80" height="80" style="padding:5px; float:left;" />';
            echo "<h5><b>".$dp['le_event_name']."</b></h5>";
            echo '</a></div>';

      } ?>
    </marquee>       

  </div>
  <!--Gallery Sidebar Ends-->
  <div class="clear"></div>
</div> 

<script type="text/javascript">    
  function showhide1()
  {
    $('#abtus').show('slow');
    $('#cnctus').hide();
  }

  function showhide2()
  {
    $('#abtus').hide();
    $('#cnctus').show('slow');
  }
</script>