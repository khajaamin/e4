<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CommentsAndRatingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Comments And Ratings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-and-ratings-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Comments And Ratings'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cr_id',
            'cr_comment',
            'cr_ratings',
            'cr_type',
            'cr_type_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
