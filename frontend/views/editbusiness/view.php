<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Editbusiness */

$this->title = $model->edit_bui_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Editbusinesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="editbusiness-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->edit_bui_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->edit_bui_id], [
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
            'edit_bui_id',
            'edit_ven_id',
            'edit_bui_email:email',
            'edit_bui_contact',
            'edit_type',
            'edit_user_type',
            'edit_bui_inaccurate',
            'edit_bui_shutdown',
            'edit_bui_comment',
        ],
    ]) ?>

</div>
