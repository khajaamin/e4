<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Own */

$this->title = Yii::t('app', 'Create Own');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Owns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="own-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
