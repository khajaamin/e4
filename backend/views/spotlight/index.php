<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SpotlightSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Spotlights');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spotlight-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Spotlight'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'spotlt_id',
            'spotlt_heading',
            'spotlt_description',
            'spotlt_image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
