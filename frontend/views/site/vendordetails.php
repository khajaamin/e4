<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use commomn\models\Countries;
use commomn\models\BusinessMainCategories;
use commomn\models\BusinessSubCategories;
use commomn\models\VendorsMoreCategories;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
// $this->title = 'Business Profile';
?>
<style>
  /* New CSS for copy=========================*/
  div.starfill {
    width: 270px;
    display: inline-block;
  }
  .cupanel{
    background:#337ab7;
    border-radius: 5px 5px 0px 0px;
  }
  input.starfill { display: none; }

  label.starfill {
    font-size: 20px;
    color: #FFD10A;
    transition: all .2s;
  }

  input.starfill:checked ~ label.starfill:before {
    content: '\f005';
    color: #FD4;
    transition: all .25s;
  }

  input.star-5:checked ~ label.starfill:before {
    color: #FE7;
    text-shadow: 0 0 5px #952;
  }

  input.star-1:checked ~ label.starfill:before { color: #F62; }


  label.starfill:before {
    content: '\f005';
    font-family: FontAwesome;
  }
  /*Rating & comment box css*/
  div.starbl {
    width: 270px;
    display: inline-block;
    text-align:left;
  }
  input.starbl { display: none; }

  label.starbl {
    float: right;
    padding: 4px;
    font-size: 20px;
    color: #444;
    transition: all .2s;
  }

  input.starbl:checked ~ label.starbl:before {
    content: '\f005';
    color: #FD4;
    transition: all .25s;
  }

  input.star-5:checked ~ label.starbl:before {
    color: #FE7;
    text-shadow: 0 0 5px #952;
  }

  input.star-1:checked ~ label.starbl:before { color: #F62; }

  label.starbl:hover { transform:  scale(1.1); }

  label.starbl:before {
    content: '\f006';
    font-family: FontAwesome;
  }
  .requiredstar{
    color: red;
  }
  /*=========================*/
</style>

<script type="text/javascript" src="js/validation.js"></script>

<script type="text/javascript">    
  $(window).load(function(){
    $('#myModal').modal('show');
  });
  /*====================================*/    
  $(document).ready(function(){
    $("#btnSearch").click(function(){
      var location = $( "#location" ).val();
      var bsc_name = $( "#category" ).val();
      window.location="index.php?r=site/searchresult&img_id="+bsc_name+"&location="+location;
    });
  });
  /*====================================*/    
  function showhide1()
  {

    $('#abtus').show('slow');
    $('#prdct').hide();
    $('#cnctus').hide();

  }

  function showhide2()
  {
    $('#abtus').hide();
    $('#prdct').show('slow');
    $('#cnctus').hide();

  }

  function showhide3()
  {
    $('#abtus').hide();
    $('#prdct').hide();
    $('#cnctus').show('slow');
  }
</script>

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
<script type="text/javascript">
 $(document).ready(function(){  
  $('.btnRating').show(); 
  var userType= document.getElementById('usertype').value;
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
<div class="">
  <!--Search Start--><!--
  <div class="col-lg-12 text-center" style=" padding:0px;">

   <div class = "col-lg-offset-1 col-lg-3 col-md-5 col-sm-12 col-xs-12" style="padding:0px; text-align:center;">
     <h4><strong>What Do You Need</strong></h4>
   </div>

   <div class = "col-lg-3 col-md-4 col-sm-12 col-xs-12" style="padding:0px;">


    <div class = "input-group">
      <div class = "input-group-btn">
        <button type = "button" class = "btn btn-default dropdown-toggle btn-block" data-toggle = "dropdown">
          Select Category&nbsp; &nbsp;
          <span class = "glyphicon glyphicon-chevron-down"></span>
        </button>

        <ul class = "dropdown-menu" style="width:100%;">

          <li><a href = "#">Category 1</a></li>
          <li><a href = "#">Category 2</a></li>
          <li><a href = "#">Category 3</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class = "col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding:0px; margin-bottom:5px;">
   <button type = "button" class = "btn btn-danger btn-block" data-toggle="modal" data-target="#mysearch">
    <strong>Submit Buying Request
    </strong>
  </button>
  </div>     


</div> -->
<!--Search End-->

<!--Event Search Box-->
<div class="col-lg-12 col-md-12 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10" style="text-align:center; margin-bottom:5px;">
 <div class = "col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12" style="padding:0px;">
  <input class="form-control" id="location" placeholder="Enter a Location" type="text"></input>
 </div>

<div class = "col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding:0px;">
  <div class="form-group">
   <!--  <input type="text" class="form-control" id="" placeholder="Search for Event Category"> -->
   <select class="form-control" id="category" placeholder="Search for Event Category">
     <option>Search for Event Category</option>
     <?php
     $m = $dataProvider8->getModels();
     foreach ($m as $dp) {
      echo '<option type="hidden" id="bscid" value='.$dp['bsc_id'].'>'.$dp['bsc_name'].'</option>';
    } ?>
  </select>
</div>
</div>

<div class = "col-lg-1 col-md-1 col-sm-12 col-xs-12" style="padding:0px;">
  <button type = "button" id="btnSearch" class = "btn btn-primary btn-block">
    <strong>Search</strong>
  </button>

</div>          
</div>
<div class="clearfix"></div>
<!-- Event Search Box End -->


<div class="row headerbox1">
  <!-- Start gallery Start -->

  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 image1">
    <?php
    $m = $dataProvider->getModels();
    foreach ($m as $dp) {
      $this->title = $dp['ven_company_name'];
      echo '<a class="" href="?r=site/vendordetails&img_id='.$dp['ven_id'].'" method="get">'; 
      echo "<img class='proimage thumbnail img-responsive' src = '".\Yii::$app->urlManagerCommon->baseUrl."/".$dp['ven_business_logo']."' />";     
      echo '</a>';
    } ?>
  </div>

  <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 headerdescr" style="padding:5px; " >
    <?php
    $m = $dataProvider->getModels();
    foreach ($m as $dp) {

      echo '<a class="" href="?r=site/vendordetails&img_id='.$dp['ven_id'].'" method="get">';
      echo '<h3><b style="color:white; font-size:35px;">'.$dp['ven_company_name'].'</b></h3>';
      echo '</a><hr/>';
    } ?>
    <!--Div for Rating Stars-->
    <div class="stars" style="color:white; text-align:left; font-size: 20px;">
      <form action="">
        Ratings:
        <?php
        $m = $dataProvider13->getModels();

        foreach ($m as $dp) {

          $count =$dp['cr_type_id'];
          $sum = $dp['cr_ratings'];
          if($count == 0) {

          } else {
            
            $rating = round($sum/$count);

            if($rating == 1) {
              echo '<label class="starfill star-5" for="star-5"></label>';
            }else if($rating == 2) {
              echo '<label class="starfill star-4" for="star-4"></label>';
              echo '<label class="starfill star-4" for="star-4"></label>';
            } else if($rating == 3) {
              echo '<label class="starfill star-3" for="star-3"></label>';
              echo '<label class="starfill star-3" for="star-3"></label>';
              echo '<label class="starfill star-3" for="star-3"></label>';
            } else if($rating == 4) {
              echo '<label class="starfill star-2" for="star-2"></label>';
              echo '<label class="starfill star-2" for="star-2"></label>';
              echo '<label class="starfill star-2" for="star-2"></label>';
              echo '<label class="starfill star-2" for="star-2"></label>';
            } else if($rating == 5) {
              echo '<label class="starfill star-1" for="star-1"></label>';
              echo '<label class="starfill star-1" for="star-1"></label>';
              echo '<label class="starfill star-1" for="star-1"></label>';
              echo '<label class="starfill star-1" for="star-1"></label>';
              echo '<label class="starfill star-1" for="star-1"></label>';
            }
          }


        }?>
      </form>
    </div>
    <!--Div for Rating Stars End-->
    <?php
    $m = $dataProvider2->getModels();
    foreach ($m as $dp) {
      echo '<a class="" href="?r=site/vendordetails&img_id='.$dp['id'].'" method="get">';
      echo '<div class="portfolio logo1" data-cat="logo">';
      echo '<div class="portfolio-wrapper">';
      // echo '<center><font color = "black">'.$dp['username'].'</font></center>';
      echo '</div>';
      echo '</div>';
      echo '</a>';
    } ?> 

    <?php
    $m = $dataProvider->getModels();
    foreach ($m as $dp) {
     if(isset($userId)) {
      
      echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style="padding:0px;">';
      echo '<button type="button" id="btnRate" onClick="rateDetail('.$dp['ven_id'].','.$userId.');" class=" btnRating btn btn-default btn-block" data-toggle="modal" data-target="#rcrate">';
      echo '<strong>Rate</strong>';
      echo '</button> ';
      echo '</div>'; 
      
    } else {
      if(isset($userId) == 0) {
        
        echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style="padding:0px;">';
        echo '<button type="button" id="btnRate2" onClick="logincall();" class="btnRating btn btn-default btn-block" data-toggle="modal">';
        echo '<strong>Rate</strong>';
        echo '</button> ';
        echo '</div>'; 
        
      }
    }

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
     echo '<input class="starbl star-5" id="star-5" type="radio" value="5" name="star"/>';
     echo '<label class="starbl star-5" for="star-5"></label>';
     echo '<input class="starbl star-4" id="star-4" type="radio" value="4" name="star"/>';
     echo '<label class="starbl star-4" for="star-4"></label>';
     echo '<input class="starbl star-3" id="star-3" type="radio" value="3" name="star"/>';
     echo '<label class="starbl star-3" for="star-3"></label>';
     echo '<input class="starbl star-2" id="star-2" type="radio" value="2" name="star"/>';
     echo '<label class="starbl star-2" for="star-2"></label>';
     echo '<input class="starbl star-1" id="star-1" type="radio" value="1" name="star"/>';
     echo '<label class="starbl star-1" for="star-1"></label>';
     echo '</form>';
     echo '</div>';
                                              //Rating Box End
     echo '</div>';

     echo '<div class="modal-footer">';
     echo '<input id= "btnRateComment" name="send" type="button" value="Comment" class="btn btn-primary btn-md pull-left" >';
     echo '<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>';
            // echo '<button type="button" id="btnRateComment" value="Comment" class="btn btn-default" >Comment</button>';
     echo '</div>';
     echo '</div>';

     echo '</div>';
     echo '</div>';
             /*echo '</div>';
             echo '</div>';*/
                        //Comment Popup End
             
           }?>

         </div>


       </div>
       <!-- Start gallery  End -->
       <div class="clearfix"></div>
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
            $m = $dataProvider->getModels();
            foreach ($m as $dp) {

              echo '<button type ="button" id="btnSend" onClick= "sendDetail('.$dp['ven_id'].');"  class = "btn btn-primary pull-right">Send Mail</button>';

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
          <button class="btn btn-primary topbtn" onclick="showhide2()">Products/Services</button>
        </div>

        <div class="btn-group">
          <button class="btn btn-primary topbtn" onclick="showhide3()">Contact</button>
        </div>

        
      </div>
    </div>
    <hr />
    <!--Tabular Menu End-->




    <!-- About us Start -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:5px 5px;">        

      <div class="" id="abtus"style="display:none">
        <?php
        $m = $dataProvider->getModels();
        foreach ($m as $dp) {

          echo "".$dp['ven_company_descr']."";

        } ?>
      </div>

    </div>
    <!-- About Us End -->
    <!-- Product Start --> 
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:5px 5px;">        

      <div class="" id="prdct" style="display:none">
        <?php
        $m = $dataProvider->getModels();
        foreach ($m as $dp) {

          echo "".$dp['ven_services_offered']."";

        } ?>

      </div>

    </div>
    <!-- Product End -->
    <!-- Contact Start --> 
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:5px 5px;">        

      <div class="" id="cnctus" style="display:none">
        <h4><strong>
          Call Us:
        </strong></h4>
        <?php
        $m = $dataProvider->getModels();
        $contact = explode(",", $m[0]['ven_contact_no']);
        foreach ($contact as $ct) {
          echo "<a href='tel:".$dp['ven_country_code'].$ct."'>".$dp['ven_country_code']." ".$ct."</a>";
          echo'<br>';              
        }
        echo'<br>';
        ?> 
        <strong>ADDRESS:</strong><br>
        <p> 
          <?php
          $m = $dataProvider->getModels();
          foreach ($m as $dp) {

            echo "".$dp['ven_address']."";

          } ?> 
        </p>
        <!-- Map Code Start -->

        <?php
        $m = $dataProvider->getModels();
        foreach ($m as $dp) {
          echo '<iframe src="https://www.google.com/maps/embed/v1/place?q='.$dp['ven_address'].'
          &zoom=14&key=AIzaSyB5tIYZkFb53JA9HCxS8CwCdu00Jmo_uUo" width="100%">
        </iframe>';
      } ?>
      <!-- Map Code End -->
    </div>

  </div>
  <!-- contact end -->
  <!--Photos start--> 
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:5px 5px;">        
    <h4><strong>Photos:</strong></h4>
    <?php
    $m = $dataProvider7->getModels();
    foreach ($m as $dp) {
      echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style="padding:0px">';
      echo "<img class='subcatimg img-thumbnail' src = '".\Yii::$app->urlManagerCommon->baseUrl."/".$dp['gallery_image']."' data-toggle='modal' data-target='#myModal".$dp['gallery_id']."' />";
      echo '<div id="myModal'.$dp['gallery_id'].'" class="modal fade" role="dialog">
      <div class="modal-dialog">';
        echo '<!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Photos</h4>
          </div>
          <div class="modal-body">';
            echo "<img class='img-responsive' src = '".\Yii::$app->urlManagerCommon->baseUrl."/".$dp['gallery_image']."' />";
            echo '</div>
          </div>
        </div>
      </div>';
      echo '</div>';

      echo "<script type='text/javascript'>
      $('#myModal".$dp['gallery_id']."').modal()                      // initialized with defaults
      $('#myModal".$dp['gallery_id']."').modal({ keyboard: true })   // initialized with no keyboard
      $('#myModal".$dp['gallery_id']."').modal('show')
    </script>";
    } ?>
  </div>
  <!--Photos end--> 

  <!--Video Slider Start-->
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
    <ul class="list-unstyled">
      <h4><strong>Videos:</strong></h4>
      <?php
      $m = $dataProvider6->getModels();
      foreach ($m as $dp) {
        echo '<li class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style=" margin:0px;">';
        echo '<a id ="img_id" href = "?r=site/video&img_id='.$dp['vdo_ven_id'].'">';
        $query = parse_url($dp['vdo_url'], PHP_URL_QUERY);
        parse_str($query, $params);
        $test = $params['v'];
        echo '<img class="img-thumbnail img-responsive" width = "97%" src = "http://img.youtube.com/vi/'.$test.'/1.jpg"/>';
        echo '<center><span class="glyphicon glyphicon-play-circle playspan"></span></center>';
        echo '</a></li>';
      }
      ?>
    </ul>

    

  </div>
  <!--Video Slider End-->

  <!-- comments Section Start -->
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:5px;">

    <h4><strong>Comments:</strong></h4>

    <!-- User 1 Comment Start -->
    <div class="" style="padding:10px; font-size:13px;">
     <?php
     $m = $dataProvider14->getModels();

     foreach ($m as $dp) {
      echo "<b>".$dp['username']."</b>";
      echo '<p>'.$dp['cr_comment'].'</P>';
      //Div rating box start 
      echo '<div class="stars" style="text-align:left;">';
      echo '<form action="">';
      echo 'Ratings:';
      $rating = $dp['cr_ratings'];

      if($rating == 1) {
        echo '<label class="starfill star-5" for="star-5"></label>';
      }else if($rating == 2) {
        echo '<label class="starfill star-4" for="star-4"></label>';
        echo '<label class="starfill star-4" for="star-4"></label>';
      } else if($rating == 3) {
        echo '<label class="starfill star-3" for="star-3"></label>';
        echo '<label class="starfill star-3" for="star-3"></label>';
        echo '<label class="starfill star-3" for="star-3"></label>';
      } else if($rating == 4) {
        echo '<label class="starfill star-2" for="star-2"></label>';
        echo '<label class="starfill star-2" for="star-2"></label>';
        echo '<label class="starfill star-2" for="star-2"></label>';
        echo '<label class="starfill star-2" for="star-2"></label>';
      } else if($rating == 5) {
        echo '<label class="starfill star-1" for="star-1"></label>';
        echo '<label class="starfill star-1" for="star-1"></label>';
        echo '<label class="starfill star-1" for="star-1"></label>';
        echo '<label class="starfill star-1" for="star-1"></label>';
        echo '<label class="starfill star-1" for="star-1"></label>';
      }
      echo '</form>';
      echo '</div>';
    //Div for Rating Stars End
    }?>    
    <!-- User 1 comment End-->
  </div>
  <b class="pull-right"><a href="#">More</a></b>
</div>


<!--Comments Section End-->

<!--News Section Start-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px 5px;">
  <hr />
  <h4><strong>Latest News:</strong></h4>

  <?php
  $m = $dataProvider5->getModels();
  foreach ($m as $dp) {     
    echo '<a id ="img_id" target="_blank" href="?r=site/news&img_id='.$dp['news_id'].'" method="get">
    <h5><span class="glyphicon glyphicon-menu-right"></span>&nbsp;'.$dp['news_heading'].'</h5></a>';  
  }
  ?>
</div>
<!--News Section End-->
</div>


<div class="clear"></div> 
</div>

<div class=" col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding:0px;">
  <!--Gallery Sidebar Start-->
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" padding:0px;">

    <div class="panel-heading" style="background:#337ab7; color:#000;">
      <strong>Gallery</strong>
    </div>
    <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();" style="height:600px;"> 
      <?php
      $m = $dataProvider9;
      foreach ($m as $dp) {
        echo '<div class="row thumbnail" style="margin:10px 0px;color:#000;">';
        echo '<a style="text-decoration:none; color:inherit;" href="?r=site/vendordetails&img_id='.$dp['ven_id'].'" method="get">';
        echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding:0px;">';
        echo '<img src="'.\Yii::$app->urlManagerCommon->baseUrl."/".$dp['ven_business_logo'].'" class="img-rounded" alt="No Image" width="80" height="80" style="padding:5px; float:left;" />';
        echo "<h5><b>".$dp['ven_company_name']."</b></h5>";
        echo '</a></div></div>';
      } ?>
    </marquee>       

  </div>
  <!--Gallery Sidebar Ends-->
  <div class="clear"></div> 
</div>
</div>

</div>
<div class="clearfix"></div>

<!--Onload Popup Start-->
<?php
    Modal::begin([
        'header' => '<h4>What are you looking for?',
        'id' => 'myModal',
        ]);
    echo '<div id="modalContent">';
    $form = ActiveForm::begin();
    echo $form->field($model, 'product')->textInput(['maxlength' => true]);
    echo $form->field($model, 'desc')->textArea(['rows' => 3, 'maxlength' => true]);
    echo $form->field($model, 'email')->textInput(['maxlength' => true]);
    echo $form->field($model, 'contact')->textInput(['maxlength' => true]);
    echo '<div class="form-group"><p align="right">';
    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    echo '</p></div></div>';
    ActiveForm::end();
    Modal::end();
?>
<!--Onload Popup End-->




  <!--Search Popup Start-->
  <div id="mysearch" class="modal fade" role="dialog">
    <div class="modal-dialog">
     <!-- Modal content-->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong>Submit Buy Request</strong></h4>
      </div>
      <div class="modal-body">
        <form role="form">

          <div class="form-group">
            <label for="">More Details About Your Request: </label>
            <textarea class="form-control" rows="3" id="comment" placeholder="Description upto 250 words">
            </textarea>
          </div>

          <div class="form-group">
            <label for="">Your Name </label>
            <input type="text" class="form-control" id="email" placeholder="Enter Full Name">
          </div>

          <div class="form-group">
            <label for="email">Your Email address:</label>
            <input type="text" class="form-control" id="email" placeholder="abc@example.com">
          </div>

          <div class="form-group">
            <label for="email">Your Mobile Number:</label>
            <input type="text" class="form-control" id="email" placeholder="10 Digit Mobile">
          </div>
        </form>
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Submit</button>
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
        
        <div class="clearfix"></div>
      </div>
      
    </div>

  </div>
</div>
<!--Search Popup End-->
<!--listSearch Popup Start-->
<div id="listsearch" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-body">

       <ul class="list-group">
            <!--  <?php
             $m = $dataProvider8->getModels();
           
              foreach ($m as $dp) {

              
             
                  //  echo '<li>';
                  //  echo '<a>'.$dp['bsc_name'].'</a>';
                  // echo '</li>';
                 // echo '</a>';
              } ?>  -->
            <!--<li class="list-group-item">First item</li>
              <li class="list-group-item">Second item</li>
              <li class="list-group-item">Third item</li> -->
            </ul>
            <!--   <a href="#" type="button" class="btn btn-primary">Select</a> -->
            <div class="clearfix"></div>
          </div>

        </div>

      </div>
    </div>
    <!--listSearch Popup End-->