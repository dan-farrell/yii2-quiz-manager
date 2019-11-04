<?php

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

/* @var $id integer */

?>

<div class="col-lg-offset-3 col-md-6">
  <?php
  $form = ActiveForm::begin([
    'id' => 'answer',
    'action' => ['answer/update', 'id' => $id],
    'options' => [
      'role' => 'form',
      'class' => 'answer-form',
    ],
  ]);

  echo 'Edit Answer';
  echo $form->field($answer, 'answer');
  echo Html::submitButton('Save', ['class' => 'btn btn-primary btn-rounded']);

  ActiveForm::end();
  ?>
</div><!-- /.col-lg-offset-3.col-md-6 -->
