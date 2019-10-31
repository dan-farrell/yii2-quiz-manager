<?php

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

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
