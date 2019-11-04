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
  $form = ActiveForm::begin([
    'id' => 'question',
    'action' => ['question/update', 'id' => $id],
    'options' => [
      'role' => 'form',
      'class' => 'question-form',
    ],
  ]);

  echo 'Edit Question';
  echo $form->field($question, 'name');
  echo Html::submitButton('Save', ['class' => 'btn btn-primary btn-rounded']);

  ActiveForm::end();
  ?>
</div>
