<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Galleries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p style="float:right;">
        <?= Html::a(Yii::t('app', 'Create Gallery'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel,
           
         'columns' => [
            'gallery_id',
            'gallery_ven_id',
            'gallery_approved',
            ['class' => 'yii\grid\ActionColumn',
                  'header' => 'Action',
                  'template' => '{view} {edit} {delete}',
                  'buttons' => [
                     'view' => function ($url, $model) {
                       return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url);
                     },
                     'edit' => function ($url, $model) {
                       return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url);
                     },
                     'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url,[
                        'title' => Yii::t('yii', 'Delete'),
                        //'class'=>'btn btn-primary',
                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'data-method' => 'post',
                       // 'data-pjax' => '0',
                    ]);
                     },
                  ],
                  'urlCreator' => function ($action, $dataProvider, $key, $index) {

                    if ($action === 'view') {
                         return Url::to(['gallery/view', 'id' =>$dataProvider['gallery_id']]);
                    }
                    if ($action === 'edit') {
                        return Url::to(['/gallery/update', 'id' =>$dataProvider['gallery_id']]);
                    }
                    if ($action === 'delete') {
                       return Url::to(['/gallery/delete', 'id' =>$dataProvider['gallery_id']]);
                    }                    
                }
              ],
        ],
    ]); ?>

</div>
