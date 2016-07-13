<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\models\Vendors;
use common\models\User;
use common\models\Livevents;
use common\models\Complaints;
use common\models\BusinessSubCategories;
use common\models\Editbusiness;



/* @var $this yii\web\View */

$this->title = 'Event for all';
?>
<div class="site-index">


  <!--  <div class="jumbotron">-->
        <h2>Welcome to Event for all!</h2>
    <!--</div>-->

    <div class="body-content">

        <div class="row" style="border:solid 0px;border-color:gray;margin-top:20px;">
            <div class="col-md-6" style="border:solid 0px;border-color:gray">
            
                <h2>Vendors</h2>
                <?php
                  $vendorModel = Vendors::find()->select('ven_id')->where(['deleted' => 'N'])->orderBy('ven_id DESC')->count();
                 ?>
                 <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'summary'=>'Total'.'&nbsp<b>'. $vendorModel.'</b>&nbsp'.'Vendors',
                        
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                              
                              //'ven_id',
                              'ven_company_name',
                              'ven_email_id:email',
                             // 'email:email',
                              'ven_contact_no',
                             
                            ],

                        
                   ]); ?>
            </div>
            <div class="col-md-6" style="border:solid 0px;border-color:gray">
                <h2>Users</h2>
                <?php
                  $userModel = User::find()->select('id')->where(['deleted' => 'N','type' => 'Visitor'])->orderBy('id DESC')->count();
                 ?>
                 <?= GridView::widget([
                        'dataProvider' => $dataProvider2,
                        'summary'=>'Total'.'&nbsp<b>'. $userModel.'</b>&nbsp'.'Users',
                        
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                              
                             // 'id',
                              'username',
                              'email:email',
                             // 'email:email',
                              'contact_no',
                             
                            ],

                        
                   ]); ?>
            </div>
        </div>
   <!-- <div class="row" style="border:solid 1px;pull-right;border-color:gray;margin-top:50px;"> -->
            <div class="col-md-6" style="border:solid 0px;border-color:gray">
                <h2>Live Events</h2>
                <?php
                  $liveventsModel = Livevents::find()->select('le_id')->where(['deleted' => 'N','verified' => 'Y'])->orderBy('le_id DESC')->count();
                 ?>
                 <?= GridView::widget([
                        'dataProvider' => $dataProvider3,
                        'summary'=>'Total'.'&nbsp<b>'. $liveventsModel.'</b>&nbsp'.'Livevents',
                        
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                              
                              //'le_id',
                              'le_contact_name',
                              //'bsc_name',
                              'le_emailid:email',
                              'le_contacts',  
                            ],    
                   ]); ?>
            </div>
            <div class="col-md-6 pull-right" style="border:solid 0px;border-color:gray">
                <h2>Complaints</h2>
                <?php
                  $editbusinessModel = Editbusiness::find()->select('edit_bui_id')->where(['deleted' => 'N'])->orderBy('edit_bui_id DESC')->count();
                
                  ?>
                <?= GridView::widget([
                        'dataProvider' => $dataProvider5,
                        'summary'=>'Total'.'&nbsp<b>'.$editbusinessModel.'</b>&nbsp'.'Complaints',
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                           
                           // 'comp_id',
                            'ven_company_name',
                            'edit_type',
                            'edit_bui_comment',
                            'status',  
                        ],
                      
              ]); ?>
            </div>
   <!-- </div> -->
    </div>
</div>


