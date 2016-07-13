<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
$this->title = 'Event For All';
?>
<style type="text/css">
    .hovereffect {
        width: 100%;
        height: 100%;
        float: left;
        overflow: hidden;
        position: relative;
        text-align: center;
        cursor: default;
    }
    .hovereffect .overlay {
        width: 100%;
        position: absolute;
        overflow: hidden;
        left: 0;
        top: auto;
        bottom: 0;
        padding: 1em;
        height: 4.75em;
        background: white;
        color: #3633B7;
        -webkit-transition: -webkit-transform 0.35s;
        transition: transform 0.35s;
        -webkit-transform: translate3d(0,100%,0);
        transform: translate3d(0,100%,0);
    }

    .hovereffect img {
        display: block;
        position: relative;
        -webkit-transition: -webkit-transform 0.35s;
        transition: transform 0.35s;
    }

    .hovereffect:hover img {
        -webkit-transform: translate3d(0,-10%,0);
        transform: translate3d(0,-10%,0);
    }

    .hovereffect h2 {
        text-transform: uppercase;
        color: #fff;
        text-align: center;
        position: relative;
        font-size: 17px;
        padding: 10px;
        background: rgba(0, 0, 0, 0.6);
        float: left;
        margin: 0px;
        display: inline-block;
    }

    .hovereffect a.info {
        display: inline-block;
        text-decoration: none;
        padding: 7px 14px;
        text-transform: uppercase;
        color: #fff;
        border: 1px solid #fff;
        margin: 50px 0 0 0;
        background-color: transparent;
    }
    .hovereffect a.info:hover {
        box-shadow: 0 0 5px #fff;
    }


    .hovereffect p.icon-links a {
        float: right;
        color: #3c4a50;
        font-size: 1.4em;
    }

    .hovereffect:hover p.icon-links a:hover,
    .hovereffect:hover p.icon-links a:focus {
        color: #252d31;
    }

    .hovereffect h2,
    .hovereffect p.icon-links a {
        -webkit-transition: -webkit-transform 0.35s;
        transition: transform 0.35s;
        -webkit-transform: translate3d(0,200%,0);
        transform: translate3d(0,200%,0);
    }

    .hovereffect p.icon-links a span:before {
        display: inline-block;
        padding: 8px 10px;
        speak: none;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }


    .hovereffect:hover .overlay,
    .hovereffect:hover h2,
    .hovereffect:hover p.icon-links a {
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
    }

    .hovereffect:hover h2 {
        -webkit-transition-delay: 0.05s;
        transition-delay: 0.05s;
    }

    .hovereffect:hover p.icon-links a:nth-child(3) {
        -webkit-transition-delay: 0.1s;
        transition-delay: 0.1s;
    }

    .hovereffect:hover p.icon-links a:nth-child(2) {
        -webkit-transition-delay: 0.15s;
        transition-delay: 0.15s;
    }

    .hovereffect:hover p.icon-links a:first-child {
        -webkit-transition-delay: 0.2s;
        transition-delay: 0.2s;
    }
</style>
<div class="container">
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
<script type="text/javascript">
$(document).ready(function(){
    $(window).load(function(){
        $('#myModal').modal('show');
    });

    $("#btnSearch").click(function(){
      var location = $( "#location" ).val();
      var bsc_name = $( "#category" ).val();
      window.location="index.php?r=site/searchresult&img_id="+bsc_name+"&location="+location;
    });
  });
</script>
<!-- Event Search Box End -->
    <div class="row" style="">
    <!--header Image-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px; margin-bottom:10px;">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1" class="active1"></li>
                <li data-target="#myCarousel" data-slide-to="2" class="active2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="hovereffect">
                    <?php
                    echo '<img class="img-responsive " src="'.\Yii::$app->urlManagerCommon->baseUrl.'/images/efaheader.jpg" alt="header" width="100%" height="100%" />';                       
                    ?>
                    <div class="overlay">
                        <h2>A CELEBRATION FOR EVERYONE</h2>
                        <p>An event for every person at every occasion . If you are an individual wanting to plan party , a birthday celebration, an anniversary party,a Kitty party, a theme party , etc. our site will help you find everything you need to organize it , at just a click.</p>
                    </div>
                </div>
                </div>
                <div class="item active1">
                    <div class="hovereffect">
                    <?php
                    echo '<img class="img-responsive " src="'.\Yii::$app->urlManagerCommon->baseUrl.'/images/efaheader.jpg" alt="header" width="100%" height="100%" />';                       
                    ?>
                    <div class="overlay">
                        <h2>AS A USER</h2>
                        <p>EVENT FOR ALL is an online directory which will help visitors find a solution to make your upcoming event the most memorable one.</p>
                    </div>
                </div>
                </div>
                <div class="item active2">
                    <div class="hovereffect">
                    <?php
                    echo '<img class="img-responsive " src="'.\Yii::$app->urlManagerCommon->baseUrl.'/images/efaheader.jpg" alt="header" width="100%" height="100%" />';                       
                    ?>
                    <div class="overlay">
                        <h2>AS A BUSINESS</h2>
                        <p>You can reach your customer whenever wherever they are looking for you using our cost effective site. In addition to details you can add photos and videos, catalogue, menu and Add offers and announcements.</p>
                    </div>
                </div>
                </div>
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!--header Image-->
        <!--Main Menu Start-->
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="">
                                        <?php
                    $m = $dataProvider;
                    foreach ($m as $dp) {
                        echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 eventthumb">';
                        echo '<div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="hovereffect">';
                                    echo '<a id ="img_id" class="" href="?r=site/subcat&img_id='.$dp['bmc_id'].'" method="get">';
                                    echo "<img src = '".\Yii::$app->urlManagerAdminBackend->baseUrl."/".$dp['bmc_image']."' alt='No Image' width='300' height='200' />";
                                    echo '<center><h5>'.$dp['bmc_name'].'</h5></center>';
                                    echo '</a>';
                                    //$_SESSION['bmc_id'] = $dp['bmc_id'];
                                    if(!empty($dp['bmc_description'])) {
                                        echo '<div class="overlay">
                                                <p>'.$dp['bmc_description'].'</p>
                                            </div>';
                                    } else {
                                        echo '<div class="overlay">
                                            <p>No Description Available!</p>
                                        </div>';
                                    }
                                echo '</div>
                            </div>
                        </div>
                    </div></div>';
                    } ?>
            </div>


        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding:0px; margin:0px;">
                <div class="panel-heading sidegallery">
                <h4>Gallery</h4>
                </div>   
                
                <div class="row" style="padding:0px;margin:0px; border:1px solid gray;">     
                <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();" style="height:600px; ">
                   
                    <?php
                    $m = $dataProvider7;
                    foreach ($m as $dp) {
                        echo '<div class="row sidenews">';
                        echo '<a style="text-decoration:none; color:inherit;" href="?r=site/vendordetails&img_id='.$dp['ven_id'].'" method="get">';
                        echo '<img src="'.\Yii::$app->urlManagerCommon->baseUrl."/".$dp['ven_business_logo'].'" class="img-rounded" alt="No Image" width="80" height="80" style="padding:5px; float:left;" />';
                        echo "<h5><b>".$dp['ven_company_name']."</b></h5>";
                        echo '</a></div>';
                    } 
                    ?>
                    
                </marquee>
                </div>
        </div>
        </div><hr>

    <div class="row" style="padding:0px; margin:0px;">
        <!--News Section Start-->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 newsbox" style="padding-left:0px;">
            <div class="panel-heading sidegallery">
            <h4><span class="glyphicon glyphicon-th-large"></span>
            &nbsp; News
            </h4>
            </div>
                <?php
                    $m = $dataProvider2->getModels();
                    if(isset($m[0]['news_id'])) {
                    foreach ($m as $dp) {
                        echo '<a id ="img_id" href="?r=site/news&img_id='.$dp['news_id'].'" method="get">
                        <h5><span class="glyphicon glyphicon-menu-right"></span>&nbsp;'.$dp['news_heading'].'</h5></a>';
                    }
                    echo '<a id ="img_id" href="?r=site/news&img_id='.$dp['news_id'].'" method="get" class="pull-right">More >></a>';
                    }
                    ?>
           
           
            </div>
                
            <!--Latest news Start-->
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 lnewsbox" style="padding:0px; margin:0px;">
                <div class="panel-heading sidegallery"><h4> <span class="glyphicon glyphicon-th-large"></span>&nbsp;Latest Posts</h4> </div>
                    <?php
                        $m = $dataProvider3->getModels();
                        if(isset($m[0]['latest_post_id'])) {
                        foreach ($m as $dp) {
                            echo '<a id ="img_id" href="?r=site/latestpost&img_id='.$dp['latest_post_id'].'" method="get">
                            <h5><span class="glyphicon glyphicon-menu-right"></span>&nbsp;'.$dp['latest_post_heading'].'</h5></a>';
                    }
                    echo '<a id ="img_id" href="?r=site/latestpost&img_id='.$dp['latest_post_id'].'" method="get" class="pull-right">More >></a>';
                    }
                ?>
                </div>
            </div>

            <!-- Google Ads -->
            <div class="" style="height:100px;">
		<script type="text/javascript">
		   ( function() {
		    if (window.CHITIKA === undefined) { window.CHITIKA = { 'units' : [] }; };
		    var unit = {"calltype":"async[2]","publisher":"sanah711","width":468,"height":100,"sid":"Chitika Default"};
		    var placement_id = window.CHITIKA.units.length;
		    window.CHITIKA.units.push(unit);
		    document.write('<div id="chitikaAdBlock-' + placement_id + '"></div>');
		}());
		</script>
		<script type="text/javascript" src="//cdn.chitika.net/getads.js" async></script>
        
            </div>

            <div class="row" style="padding:0px; margin:0px;">
                <!--Spotlight Start-->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 spotbox" style="padding-left:0px;" >
                    <div class="panel-heading sidegallery"><h4> <span class="glyphicon glyphicon-th-large"></span>&nbsp;Spotlight</h4> </div>
                        <?php
                        $m = $dataProvider4->getModels();
                        if(isset($m[0]['spotlt_id'])) {
                        foreach ($m as $dp) {
                            echo '<div class="row sidenews">';
                            echo '<a id ="img_id" href="?r=site/spotlight&img_id='.$dp['spotlt_id'].'" method="get">';
                            echo '<img src="'.\Yii::$app->urlManagerCommon->baseUrl."/".$dp['spotlt_image'].'" class="img-rounded" alt="No Image" width="80" height="80" style="padding:5px; float:left;" />';
                            echo '<h5><span class="glyphicon glyphicon-menu-right"></span>&nbsp;'.$dp['spotlt_heading'].'</h5></a></div>';
                        }
                        echo '<a id ="img_id" href="?r=site/spotlight&img_id='.$dp['spotlt_id'].'" method="get" class="pull-right">More >></a>';
                        }
                        ?>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 lvideos" style="margin:0px; padding:0px;">
                        <div class="panel-heading sidegallery"><h4> <span class="glyphicon glyphicon-th-large"></span>&nbsp;Live Videos</h4></div>
                        <?php
                            $m = $dataProvider5->getModels();
                            if(isset($m[0]['vdo_id'])) {
                            foreach ($m as $dp) {
                                
                                echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 eventthumb">';    
                                echo '<a id ="img_id" href = "?r=site/video&img_id='.$dp['vdo_id'].'">';
                                $query = parse_url($dp['vdo_url'], PHP_URL_QUERY);
                                parse_str($query, $params);
                                $test = $params['v'];
                                echo '<img src = "http://img.youtube.com/vi/'.$test.'/1.jpg" width="100%" height="100%"/>';
                                echo '</a></div>';
                            }
                            echo '<a id ="img_id" href="?r=site/video&img_id='.$dp['vdo_id'].'" method="get" class="pull-right">More >></a>';
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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