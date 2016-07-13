<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Enquiries */

$this->title = $model->enq_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enquiries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enquiries-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->enq_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->enq_id], [
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
            'enq_id',
            'enq_user_id',
            'enq_ven_id',
            'enq_bsc_id',
            'enq_name',
            'enq_mob',
            'enq_email',
            'enq_sub',
            'enq_comment',
            'contacted',
            'submited',
            'deleted',
        ],
    ]) ?>

</div>
