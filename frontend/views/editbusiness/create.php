<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Editbusiness */

$this->title = Yii::t('app', 'Create Editbusiness');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Editbusinesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="editbusiness-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
