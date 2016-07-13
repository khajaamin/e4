<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LiveventsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="livevents-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'le_id') ?>

    <?= $form->field($model, 'le_contact_name') ?>

    <?= $form->field($model, 'le_image') ?>

    <?= $form->field($model, 'le_role') ?>

    <?= $form->field($model, 'le_event_category') ?>

    <?php // echo $form->field($model, 'le_event_name') ?>

    <?php // echo $form->field($model, 'le_description') ?>

    <?php // echo $form->field($model, 'le_venue') ?>

    <?php // echo $form->field($model, 'le_city_id') ?>

    <?php // echo $form->field($model, 'le_contacts') ?>

    <?php // echo $form->field($model, 'le_emailid') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'updated') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <?php // echo $form->field($model, 'verified') ?>

    <?php // echo $form->field($model, 'paid') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
