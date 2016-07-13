<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Enquiries */

$this->title = Yii::t('app', 'Create Enquiries');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enquiries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enquiries-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
