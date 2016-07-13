<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Livevents */

$this->title = Yii::t('app', 'Add Your Event');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Livevents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="livevents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
