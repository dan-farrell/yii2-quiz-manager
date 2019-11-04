<?php

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';

?>

<div class="col-lg-offset-3 col-md-6">
  <div class="site-login">
    <h1><?= Html::encode($this->title); ?></h1>

    <?php
    $form = ActiveForm::begin([
      'id' => 'login-form',
      'layout' => 'horizontal',
      'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-12'],
      ],
    ]);

    echo $form->field($model, 'username')->textInput(['autofocus' => true]);
    echo $form->field($model, 'password')->passwordInput();
    echo $form->field($model, 'rememberMe')->checkbox(['template' => "<div class=\"col-lg-12\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>"]);
    ?>

    <div class="form-group">
      <div class="col-lg-12">
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
      </div><!-- /.col-lg-offset-1 -->
    </div><!-- /.form-group -->

    <?php ActiveForm::end(); ?>
  </div><!-- /.site-login -->
</div><!-- /.col-lg-offset-3.col-md-6 -->
