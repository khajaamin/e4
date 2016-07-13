<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchEditbusiness */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Complaints';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="editbusiness-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
            if($model->status == 'Resolved') {

                return ['class' => 'success'];

            } else if($model->status == 'Rejected') {

                return ['class' => 'danger'];

            } else if($model->status == 'Pending') {

            } 

        },
        'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'edit_bui_email:email',
        'edit_bui_contact',
        'edit_type',
        'edit_bui_comment',
        'status',

        ['class' => 'yii\grid\ActionColumn',

        'template'=>'{view}{update}{delete}',
        'buttons' => [
        
        'update' => function ($url, $model) {
            return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, [
                'title' => Yii::t('app', 'action'),
                ]);
        },
        ],

        
        ],
        ],
        
        ]); ?>

    </div>
