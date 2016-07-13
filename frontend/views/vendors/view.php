<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vendors */

$this->title = $model->ven_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Add New Company'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendors-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ven_id], ['class' => 'btn btn-primary']) ?>
       <!--  <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->ven_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'ven_id',
            'ven_company_name',
            // 'ven_main_category_id',
            // 'ven_sub_category_id',
            'ven_services_offered',
            // 'ven_business_logo',
            [
                'attribute' => 'Business Logo',
                'value'=> Yii::$app->urlManagerCommon->baseUrl.'/'.$model->ven_business_logo,
                'format' => ['image',['width'=>'100','height'=>'80']],
            ],
            'ven_company_descr',
            'ven_established_date',
            'ven_noof_emp',
            'ven_branches_loc',
            'ven_market_area',
            'ven_website',
            'ven_specialized_in',
            'ven_country_code',
            'ven_contact_no',
            'ven_email_id:email',
            'ven_address',
            'ven_country_id',
            // 'ven_state_id',
            // 'ven_city_id',
            // 'ven_location_id',
            'ven_zip',
            // 'ven_contact_person_id',
            // 'ven_verified',
             /* 'created',
            'updated',
            'deleted',*/
        ],
    ]) ?>

</div>
