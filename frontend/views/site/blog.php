<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
$this->title = 'Blog';
?>
<style>
  .recbgpost{
    list-style:none;
    
  }

  .recbgpost li{
   padding:10px 5px;
 }
</style>
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
</script>
<script type="text/javascript">
  function logincall() {
   window.location = "index.php?r=site/login";
 }
</script>

<script type="text/javascript" src="js/validation.js"></script>

<div class="row" >
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding:; ">
    <!--PanelHeading-->      
    <!--PanelHeading1-->      
    <div class="panel-heading sidegallery">
      <h4 style="color: white;"> <span class="glyphicon glyphicon-th-large"></span>
        Categories</h4>
      </div>

      <!--Links1-->
      <ul class="list-group" >
        <?php
        $m = $dataProvider;
        $blogs = $blogCnt;

        for($i = 0, $dp = $m, $blog = $blogs; $i < count($blogs); $i++) {
          echo '<a href="?r=site/blog&img_id='.$dp[$i]['bmc_id'].'" method="get"> ';
          echo '<li class="list-group-item" style="background: aliceblue;">';
          echo $dp[$i]['bmc_name'] ;
          echo '<span class="badge">';
          if($blog[$i] != 0)
              echo $blog[$i];
          echo '</span></li></a>';
        }
        ?>
      </ul>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
     Today's Date | <?php echo date("Y-m-d")." "; echo date("l"); ?>

     <hr />
     <div class="" style="height:100px; background:#960;">

        <!-- <script type="text/javascript">
          ( function() {
            if (window.CHITIKA === undefined) { window.CHITIKA = { 'units' : [] }; };
            var unit = {"calltype":"async[2]","publisher":"sanah711","width":550,"height":250,"sid":"Chitika Default"};
            var placement_id = window.CHITIKA.units.length;
            window.CHITIKA.units.push(unit);
            document.write('<div id="chitikaAdBlock-' + placement_id + '"></div>');
        }());
        </script>
        <script type="text/javascript" src="//cdn.chitika.net/getads.js" async></script> -->
    </div><hr />
    <!--Blog Post 1 Start-->
    <?php
    $m = $dataProvider2->getModels();
    foreach ($m as $dp) {
      echo '<a href="?r=site/blogmore&img_id='.$dp['blog_id'].'" method="get">';
    // echo '<li class="list-group-item" style="text-align:justify;">';
      echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
      echo $dp['blog_heading'].'</a>';
      echo '<img class="img-responsive" src="'.\Yii::$app->urlManagerCommon->baseUrl."/".$dp['blog_image'].'" style="width:90px; height:90px;" alt="No Image" />';
      echo '</div>';
      echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
      echo '<strong>Post Date & Time : <br>';
      echo $dp['blog_created'];
      echo '</strong>';
      echo '</div>';
      echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
      if(isset($dp['username'])) {
        echo '<strong>Posted By - <br>'.$dp['username'].'</strong>';
      }
      echo '</div>';
      echo '<div class="clearfix"></div>';

      if(isset($userId)) {

      // echo '<a href="#" id ="commentlabel" onClick="blogDetail('.$dp['blog_id'].','.$userId.');" data-toggle="modal" data-target="#myModal">Comment >></a>';
      } else {
       if(isset($userId) == 0) {

      // echo '<a href="#" id="commentlabel" onClick="logincall();">Comment >></a>';
       }
     }
     echo '<a href="?r=site/blogmore&img_id='.$dp['blog_id'].'" method="get" class="pull-right">Read More >></a><hr/>';
   }
   if(empty($m)){
    echo "<h2>No Blogs Available for this Category...!</h2>";
  }
  ?>
  <!--Blog post 1 end-->

  <!-- Comment Popup Start -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
            Add Your Comment Here And Rate us
          </h4>
        </div>

        <div class="modal-body">

         <div class="form-group">
           <label for="comment">Comment:</label>
           <textarea class="form-control" rows="5" id="blogcomment"></textarea>
         </div>
       </div>

       <div class="modal-footer">

         <?php
         echo '<button type="button" id="btnBlog" class="btn btn-default" >Comment</button>';
         ?>

       </div>
     </div>
   </div>
 </div>
 <!-- Comment Popup End -->

</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
  <div class="panel-heading sidegallery">
   <h4 style="color: white;">Featured Blogs</h4>
 </div>

 <ul class="list-group" >
   <?php
   $m = $dataProvider3;
   foreach ($m as $dp) {
    	echo '<div class="row sidenews" style="background: aliceblue;">';
	echo '<a style="text-decoration:none; color:inherit;" href="?r=site/blogmore&img_id='.$dp['blog_id'].'" method="get">';
	echo '<img src="'.\Yii::$app->urlManagerCommon->baseUrl."/".$dp['blog_image'].'" class="img-responsive" alt="No Image" width="80" height="80" style="padding:5px; float:left;" />';
	echo "<h5><b>".$dp['blog_heading']."</b></h5>";
	echo '</a></div>';
  }
  ?>
</ul>
</div>
</div>