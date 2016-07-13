<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ComplaintsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Complaints');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="complaints-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
            if($model->comp_status == 'Resolve') {

                return ['class' => 'success'];

            } else if($model->comp_status == 'Rejected') {

                return ['class' => 'danger'];

            } else if($model->comp_status == 'Pending') {

            } 

        },
        'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'comp_tag',
        'comp_description',
        'comp_status',

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
    