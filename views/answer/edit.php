<?php

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin([
  'id' => 'answer',
  'action' => ['answer/update', 'id' => $id],
  'options' => [
    'role' => 'form',
    'class' => 'question-form',
  ],
]); ?>

Edit Answer

<?php
echo $form->field($answer, 'answer');
?>

<?= Html::submitButton('Save', [
  'class' => 'btn btn-primary btn-rounded',
  // 'data-dismiss' => 'modal',
]); ?>

<?php ActiveForm::end(); ?>