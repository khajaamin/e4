<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\BusinessSubCategories;
/* @var $this yii\web\View */
/* @var $model common\models\Livevents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="livevents-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'le_contact_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>
    <?php
    if ($model->le_image) {
        echo '<img src="'.\Yii::$app->urlManagerCommon->baseUrl.'/'.$model->le_image.'" width="90px">&nbsp;&nbsp;&nbsp;';
        echo Html::a('Delete Image', ['deleteimg', 'id'=>$model->le_id, 'field'=> 'le_image'], ['class'=>'btn btn-danger']).'<p>';
    }
    ?>

    <?= $form->field($model, 'le_role')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'le_event_category')->dropDownList(
            ArrayHelper::map(BusinessSubCategories::find()->where(['bmc_id' => 5])->all(), 'bsc_id', 'bsc_name'),
            [
            'prompt' => 'Select Event Category'

            ]);
            ?>

    <?= $form->field($model, 'le_event_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'le_description')->textArea(['rows' => 6]) ?>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
    <script type="text/javascript">
        function initialize() {
            var input = document.getElementById('livevents-le_venue');
            var autocomplete = new google.maps.places.Autocomplete(input);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <?= $form->field($model, 'le_venue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'le_city_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'le_contacts')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'le_emailid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
