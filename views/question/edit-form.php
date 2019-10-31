<?php

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

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
