<?php
$this->title = 'Latest Posts';
?>
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="margin-bottom:20px; text-align:justify;">


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 newsdec" style="padding:0px;">
        <!--Latest post heading-->
        <?php
        $m = $dataProvider->getModels();
        foreach ($m as $dp) {
            echo '<h1 style="color;#A0A0A0;">'.$dp['latest_post_heading'].'</h1>';
        }
        ?>
        <!--Latest post Heading ENd-->


        <!--Latest post Image-->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="">
            <?php
            $m = $dataProvider->getModels();
            foreach ($m as $dp) {
                echo '<img class="img-responsive" src="'.\Yii::$app->urlManagerCommon->baseUrl."/".$dp['latest_post_image'].'" style="width:100%"></img>';
            } ?>
        </div>
        <!--Latest post Image End-->

        <!--Latest post Body Start-->
        <div style="line-height: 1.5em;">
            <?php
            $m = $dataProvider->getModels();
            foreach ($m as $dp) {
                echo '<span>'.$dp['latest_post_description'].'</span>';
                echo '</a>';
            } ?>
        </div>
        <!--Latest post Body End-->
    </div>
    <div class="clearfix"></div>
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><br />
   <div class="list-group" style="max-height:800px; overflow:auto;">
    <a class="list-group-item active">
        <b style="font-size:18px">
            More Posts</b>
        </a>

        <?php
        $m = $dataProvider2->getModels();
        foreach ($m as $dp) {
            echo '<a class="list-group-item" id ="img_id" href="?r=site/latestpost&img_id='.$dp['latest_post_id'].'" method="get">'.$dp['latest_post_heading'].'</a>';
        }
        ?>

    </div>
</div>
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 lvideos" style="padding:0px;">
    <div class="list-group-item active sidegallery"><h4> <span class="glyphicon glyphicon-th-large"></span>&nbsp;See Video >> </h4></div>
    <?php
    $m = $dataProvider->getModels();
    if(!empty($m[0]['latest_post_video']) && substr( $m[0]['latest_post_video'], 0, 4 ) === "http") {
        $query = parse_url($m[0]['latest_post_video'], PHP_URL_QUERY);
        parse_str($query, $params);
        $test = $params['v'];
        echo '<iframe width="100%" height="420" allowfullscreen="true"
        src="http://www.youtube.com/embed/'.$test.'?autoplay=0" />';
    } else echo "<h4>No Video Found...!<h4>";
    ?>
</div>
