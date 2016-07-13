<?php
$this->title = 'Blog';
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
<script type="text/javascript">
  function logincall() {
   window.location = "index.php?r=site/login";
}
</script>

<script type="text/javascript" src="js/validation.js"></script>

<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="margin-bottom:20px; text-align:justify;">


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 newsdec" style="padding:0px;">
        <!--News heading-->
        <?php
        $m = $dataProvider->getModels();
        foreach ($m as $dp) {
            echo '<h1 style="color;#A0A0A0;">'.$dp['blog_heading'].'</h1>';
        }
        ?>
        <!--News Heading ENd-->


        <!--News Image-->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="">
            <?php
            $m = $dataProvider->getModels();
            foreach ($m as $dp) {
                echo '<img class="img-responsive" src="'.\Yii::$app->urlManagerCommon->baseUrl."/".$dp['blog_image'].'" style="max-width:100%;max-height:100%;"></img>';
            } ?>
        </div>
        <!--News Image End-->

        <!--News Body Start-->
        <div style="line-height: 1.5em;">
            <?php
            $m = $dataProvider->getModels();
            foreach ($m as $dp) {
                echo '<span>'.$dp['blog_content'].'</span>';
                echo '</a>';
                if(isset($userId)) {

                    // echo '<a href="#" id ="commentlabel" class="pull-right" onClick="blogDetail('.$dp['blog_id'].','.$userId.');" data-toggle="modal" data-target="#myModal">Comment >></a>';
                } else {
                    if(isset($userId) == 0) {

                        // echo '<a href="#" id="commentlabel" class="pull-right" onClick="logincall();">Comment >></a>';
                    }
                }
            } ?>
        </div>
        <!--News Body End-->
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 12px;">
        <div class="" style="height:100px; background:#960;">

           <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
           <!-- GOOGLE AD -->
           <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-6291868163591313"
           data-ad-slot="6351863983"
           data-ad-format="auto"></ins>
           <script>
               (adsbygoogle = window.adsbygoogle || []).push({});
           </script>

       </div><br>
       <div class="list-group">

        <b style="font-size:18px">
            <span class="glyphicon glyphicon-th-large"></span>&nbsp;Comments</b>
            <?php
            $m = $dataProvider3->getModels();
            foreach ($m as $dp) {
                echo '<hr/>';
                echo $dp['cr_comment']."<br>-".$dp['username'];
            }
            ?>

        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><br />
   <div class="list-group" style="max-height:500px; overflow:auto;">
    <a class="list-group-item active">
        <b style="font-size:18px">
            More Blogs</b>
        </a>

        <?php
        $m = $dataProvider2;
        foreach ($m as $dp) {
            echo '<a class="list-group-item" href="?r=site/blogmore&img_id='.$dp['blog_id'].'" method="get">'.$dp['blog_heading'].'</a>';
        }
        ?>

    </div>

    <div class="list-group-item active sidegallery"><h4> <span class="glyphicon glyphicon-th-large"></span>&nbsp;See Video >> </h4></div>
    <?php
    $m = $dataProvider->getModels();
    if(!empty($m[0]['blog_video']) && substr( $m[0]['blog_video'], 0, 4 ) === "http") {
        $query = parse_url($m[0]['blog_video'], PHP_URL_QUERY);
        parse_str($query, $params);
        $test = $params['v'];
        echo '<iframe width="100%" allowfullscreen="true"
        src="http://www.youtube.com/embed/'.$test.'?autoplay=0" />';
    } else echo "<h4>No Video Found...!<h4>";
    ?>
</div>

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