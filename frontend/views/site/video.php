<?php
	$this->title = 'Videos';
?>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="list-group" style="max-height:500px; overflow:auto;">
        <a class="list-group-item active">
            <b style="font-size:18px">
            More Videos</b>
        </a>
      
        <?php
            $m = $dataProvider2->getModels();
            foreach ($m as $dp) {
          echo '<div class="itemlist">';
                echo '<a class="list-group-item" id ="img_id" href="?r=site/video&img_id='.$dp['vdo_id'].'" method="get">';
                $query = parse_url($dp['vdo_url'], PHP_URL_QUERY);
                parse_str($query, $params);
                $test = $params['v'];
                echo '<img src = "http://img.youtube.com/vi/'.$test.'/1.jpg" width="70px" height="60px"/>';
                $url = file_get_contents('https://www.googleapis.com/youtube/v3/videos?id='.$test.'&key=AIzaSyDGNx8yGEp49igNUl9Ph2w52_rBGzF2N9s%20&fields=items(snippet(title))&part=snippet');
                $u = json_decode($url, true);
                $title = $u['items'][0]['snippet']['title'];
                echo $title.'</a></div>';
            }
        ?>
      
    </div>
</div>
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="margin-bottom:20px; text-align:justify;">
   <!--Video Image-->
    <?php
    $m = $dataProvider->getModels();
    foreach ($m as $dp) {  
        $query = parse_url($dp['vdo_url'], PHP_URL_QUERY);
        parse_str($query, $params);
        $test = $params['v'];
        echo '<iframe width="100%" height="420" allowfullscreen="true"
            src="http://www.youtube.com/embed/'.$test.'?autoplay=0" />';                        
    } ?>
    <!--Video Image End-->
                    
    <div class="clearfix"></div>
</div>