<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsEnquiries */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Enquiries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enquiries-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Enquiries'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'enq_id',
            'enq_user_id',
            'enq_ven_id',
            'enq_bsc_id',
            'enq_name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
