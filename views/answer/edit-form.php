<?php

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

?>

<div class="col-lg-offset-3 col-md-6">
  <?php
  // Start active form for edit answer
  $form = ActiveForm::begin([
    'id' => 'answer',
    'action' => ['answer/update', 'id' => $id],
    'options' => [
      'role' => 'form',
      'class' => 'answer-form',
    ],
  ]);

  echo 'Edit Answer';

  // #answer ActiveForm form field for the 'answer' column in the database
  echo $form->field($answer, 'answer');

  // Submit button for the #answer Active Form
  echo Html::submitButton('Save', ['class' => 'btn btn-primary btn-rounded']);

  // End the #answer Active Form
  ActiveForm::end();
  ?>
</div><!-- /.col-lg-offset-3.col-md-6 -->
