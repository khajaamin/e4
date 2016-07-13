<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CommentsAndRatings */

$this->title = $model->cr_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comments And Ratings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-and-ratings-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->cr_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->cr_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cr_id',
            'cr_comment',
            'cr_ratings',
            'cr_type',
            'cr_type_id',
            'cr_user_id',
            'cr_verified',
            'cr_created',
            'cr_updated',
            'deleted',
        ],
    ]) ?>

</div>
