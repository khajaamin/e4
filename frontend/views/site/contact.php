<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact us';
?>
<span class="pull-right"><i>Call us at - </i><a href='tel:8796867189'>+918796867189</a></span>
<div class="site-contact col-lg-offset-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
    
    <h1><b>
        <?= Html::encode($this->title)?>
    </b></h1>
    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'subject') ?>
    <?= $form->field($model, 'body')->textArea(['rows' => 5]) ?>
    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), ['template' => '
        <div class="row">
            <div class="col-lg-3">
                {image}
            </div>
            
            <div class="col-lg-6">
                {input}
            </div>
        </div>',
        ]) ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>