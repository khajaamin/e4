<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\CommentsAndRatings */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Comments And Ratings',
]) . ' ' . $model->cr_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comments And Ratings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cr_id, 'url' => ['view', 'id' => $model->cr_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="comments-and-ratings-update">

     <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cr_comment')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'cr_ratings')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'cr_verified')->dropDownList([ 'Y' => 'Yes', 'N' => 'No', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
