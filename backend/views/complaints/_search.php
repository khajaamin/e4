<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ComplaintsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="complaints-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'comp_id') ?>

    <?= $form->field($model, 'comp_tag') ?>

    <?= $form->field($model, 'comp_description') ?>

    <?= $form->field($model, 'comp_user_id') ?>

    <?= $form->field($model, 'comp_vendor_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>