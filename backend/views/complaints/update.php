<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Complaints;

/* @var $this yii\web\View */
/* @var $model common\models\Complaints */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Complaints',
]) . ' ' . $model->comp_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Complaints'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->comp_id, 'url' => ['view', 'id' => $model->comp_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="complaints-update">

     <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comp_tag')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'comp_description')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'comp_user_id')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'comp_vendor_id')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'comp_status')->dropDownList([ 'Pending' => 'Pending', 'Resolve' => 'Resolve', 'Rejected' => 'Rejected', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
