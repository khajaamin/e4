<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchLivevents */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Livevents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="livevents-index">

    <h1><?= Html::encode($this->title) ?></h1>
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'le_id',
            'le_contact_name',
            'le_role',
            'le_event_category',
            'le_event_name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
