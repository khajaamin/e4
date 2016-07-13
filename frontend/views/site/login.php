<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-12 col-xs-12 well" style="text-align:center;">
  <!--Image Logo Start-->
  <?php
  echo '<a href = "index.php"><img src="'.\Yii::$app->urlManagerCommon->baseUrl.'/images/logo/logo.gif" width="104%" height="100%"/></a>';
  ?>
  <strong style="font-size:20px;"><?= Html::encode($this->title) ?></strong>
  <!--Image Logo End-->

  <p>Please fill out the following fields to login:</p>


  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 well" style="text-align:left;">

    <!-- Google+ Code Start -->
    <script type="text/javascript" src="js/platform.js"></script>
    <script type="text/javascript">

      var googleUser = {};

      var allowGoogleLogin = false;
      var googleData;
      function startApp() {
       gapi.load("auth2", function() {
         auth2 = gapi.auth2.init({
           "client_id": "1072938067429-pnp1eqai1lin6o6veribonekvpsa9bhi.apps.googleusercontent.com"
         });
         attachSignin(document.getElementById("customBtn"));
       });    
     }


     function attachSignin(element) {
       auth2.attachClickHandler(element, {},
         function(googleUser) {
          googleData = googleUser;
          console.log('googleUser = '+JSON.stringify(googleUser.wc));
          document.cookie = "gldata = " + googleUser.wc.Ka + "," + googleUser.wc.Za + "," + googleUser.wc.Na + "," + googleUser.wc.hg;
          console.log('googleUser = '+document.cookie);
          if(document.cookie != null) {
            window.location.replace('http://www.eventforall.com/frontend/web/index.php?r=site/googlelogin');
          }
        },
        function(error) {
        });
     }
     startApp();
   </script>

   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding:2px;">
    <button id="customBtn" onClick="startApp();" class="btn btn-success btn-block" role="button" style="background-color:#dd4b39;color: white;">Google+</button>
  </div>
  <!-- Google+ Code End -->

  <!-- Faceboook Code Start -->
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '968059723310054',
        cookie     : true,
        xfbml      : true,
        version    : 'v2.5'
      });
    };

    (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) return;
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=968059723310054";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
 </script>
 <script>
    // Facebook Login
    function fbLogin() {
        // console.log('Sign-In Facebook');

        FB.login(function(response) {
          if (response.authResponse) {

            console.log('Sign-In Facebook successfully');
            statusChangeCallback(response);

          } else {
                // $scope.authMsg = 'Facebook Authorization failed';
                console.log('Authorization failed.');
              }
            }, {
              scope: 'public_profile,email'
            });
      }
    </script>
    <script>
    // This is called with the results from from FB.getLoginStatus().
    function statusChangeCallback(response) {
      console.log('statusChangeCallback');
        // console.log(JSON.stringify(response));
            // The response object is returned with a status field that lets the
            // app know the current login status of the person.
            // Full docs on the response object can be found in the documentation
            // for FB.getLoginStatus().
            if (response.status === 'connected') {
                // Logged into your app and Facebook.
                FB.api('/me?fields=id,first_name,last_name,email', function(result) {
                    // console.log(JSON.stringify(result));
                    // document.cookie = "fbid = " + result.id + ", fbfname = " + result.first_name + ", fblname = " + result.last_name + ", fbemail = " + result.email;
                    document.cookie = "fbdata = " + result.id + "," + result.first_name + "," + result.last_name + "," + result.email;
                    console.log(document.cookie);
                    if(document.cookie != null) {
                      window.location.replace('index.php?r=site/fblogin');
                    }
                  });
              }
            }

            function checkLoginState() {
              FB.getLoginStatus(function(response) {
                statusChangeCallback(response)
              });
            }
          </script>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding:2px; font-size:10px;">
            <button id="id" onClick="fbLogin();" class="btn btn-primary btn-block" role="button">Facebook</button>
          </div>
          <!-- Facebook Code End -->

          <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
          <?= $form->field($model, 'username') ?>
          <?= $form->field($model, 'password')->passwordInput() ?>
          <?= $form->field($model, 'rememberMe')->checkbox() ?>
          <?=Html::a('Sign up for new user account',['/site/signup']); ?>
	  <br/>
          <?=Html::a('Sign up for new vendor account',['/site/vendorsignup']); ?>

          <div style="color:#999;margin:1em 0">
            If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
          </div>


          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding:2px;">
          <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
          </div>

          <?php ActiveForm::end(); ?>
        </div>

        <div class="clearfix"></div>

      </div>
