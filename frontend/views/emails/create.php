<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Emails */

$this->title = Yii::t('app', 'Enter Your Feedback');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Emails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emails-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
