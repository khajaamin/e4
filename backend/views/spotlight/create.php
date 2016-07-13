<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Spotlight */

$this->title = Yii::t('app', 'Create Spotlight');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Spotlights'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spotlight-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
