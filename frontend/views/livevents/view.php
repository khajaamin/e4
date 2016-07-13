<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Livevents */

$this->title = $model->le_id;
// $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Livevents'), 'url' => ['index']];
$this->title = "Registration Successful...";
?>
<div class="livevents-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <a href="?r=site/subcat&img_id=5"><button type="button" class="btn btn-success">Go Back</button></a>
        <h3>You have successfully registered for the event with following details-</h3>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'le_contact_name',
            [
                'attribute' => 'Image',
                'value'=> Yii::$app->urlManagerCommon->baseUrl.'/'.$model->le_image,
                'format' => ['image',['width'=>'100','height'=>'80']],
            ],
            'le_role',
            'le_event_name',
            'le_description',
            'le_venue',
            'le_city_id',
            'le_contacts',
            'le_emailid:email',
        ],
    ]) ?>

</div>
