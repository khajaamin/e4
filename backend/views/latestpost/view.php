<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Latestpost */

$this->title = $model->latest_post_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Latestposts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="latestpost-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->latest_post_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->latest_post_id], [
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
            'latest_post_id',
            'latest_post_heading',
            'latest_post_description',
            'latest_post_image',
            'latest_post_video',
            'latest_post_expery_date',
            'latest_post_verified',
        ],
    ]) ?>

</div>
