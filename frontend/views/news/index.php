<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p style="float:right;">
        <?= Html::a(Yii::t('app', 'Create News'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel,
        'columns' => [
            'news_id',
            'news_heading',
            'news_description',
           // 'news_image',
            'news_video',
            'news_ven_id',
            ['class' => 'yii\grid\ActionColumn',
              'header' => 'Action',
              'template' => '{view} {update} {delete}',
              'buttons' => [
                 'view' => function ($url, $model) {
                   return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url);
                 },
                 'update' => function ($url, $model) {
                   return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url);
                 },
                 'delete' => function ($url, $model) {
                   return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url,[
                        'title' => Yii::t('yii', 'Delete'),
                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'data-method' => 'post',
                    ]);
                 },
              ],
              'urlCreator' => function ($action, $dataProvider, $key, $index) {

                if ($action === 'view') {
                     return Url::to(['news/view', 'id' =>$dataProvider['news_id']]);
                }
                if ($action === 'update') {
                    return Url::to(['/news/update', 'id' =>$dataProvider['news_id']]);
                }
                if ($action === 'delete') {
                   return Url::to(['/news/delete', 'id' =>$dataProvider['news_id']]);
                }                    
                return $url;
            }
          ],
        ],
    ]); ?>

</div>
