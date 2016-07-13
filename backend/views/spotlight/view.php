<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Spotlight */

$this->title = $model->spotlt_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Spotlights'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spotlight-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->spotlt_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->spotlt_id], [
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
            'spotlt_id',
            'spotlt_heading',
            'spotlt_description',
            'spotlt_image',
            'spotlt_video',
            'spotlt_expery_date',
            'spotlt_verified',
        ],
    ]) ?>

</div>
