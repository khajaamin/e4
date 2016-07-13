<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\editbusiness */

$this->title = 'Update Editbusiness: ' . ' ' . $model->edit_bui_id;
$this->params['breadcrumbs'][] = ['label' => 'Editbusinesses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->edit_bui_id, 'url' => ['view', 'id' => $model->edit_bui_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="editbusiness-update">

   <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'edit_ven_id')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'edit_bui_email')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'edit_bui_contact')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'edit_type')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'edit_user_type')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'edit_bui_inaccurate')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'edit_bui_shutdown')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'edit_bui_comment')->textInput(['readonly' => true]) ?> 

     <?= $form->field($model, 'status')->dropDownList([ 'Rejected' => 'Rejected', 'Resolved' => 'Resolved', 'Pending' => 'Pending', ], ['prompt' => 'Select']) ?>

   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
