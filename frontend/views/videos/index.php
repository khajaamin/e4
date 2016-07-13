<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VideosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Videos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="float:right;">
        <?= Html::a(Yii::t('app', 'Create Videos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        //'dataProvider' => $dataProvider,
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel,
       
        'columns' => [
            'vdo_id',
            'vdo_url:url',
            'vdo_ven_id',
            'vdo_approved',
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
                     return Url::to(['videos/view', 'id' =>$dataProvider['vdo_id']]);
                }
                if ($action === 'update') {
                    return Url::to(['/videos/update', 'id' =>$dataProvider['vdo_id']]);
                }
                if ($action === 'delete') {
                   return Url::to(['/videos/delete', 'id' =>$dataProvider['vdo_id']]);
                }                    
                return $url;
            }
          ],
        ],
    ]); ?>

</div>
