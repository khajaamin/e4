<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NewsEnquiries */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enquiries-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'enq_id') ?>

    <?= $form->field($model, 'enq_user_id') ?>

    <?= $form->field($model, 'enq_ven_id') ?>

    <?= $form->field($model, 'enq_bsc_id') ?>

    <?= $form->field($model, 'enq_name') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
