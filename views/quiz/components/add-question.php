<?php

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

/* @var $quizId interger */

?>

<div class="modal fade" id="addQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?php $form = ActiveForm::begin([
        'id' => 'question',
        'action' => ['question/create'],
        'options' => [
          'role' => 'form',
          'class' => 'quiz-form',
        ],
      ]); ?>

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Question</h4>
      </div><!-- /.modal-header -->

      <div class="modal-body">
        <!-- Form fields to edit the data before updating the database -->
        <?php
        echo $form->field($question, 'name');
        echo $form->field($question, 'quiz_id')->hiddenInput(['value' => $quizId])->label(false);;
        ?>
      </div><!-- /.modal-body -->

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Close</button>

        <!-- Button to submit the new data to the database -->
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-rounded']); ?>
      </div><!-- /.modal-footer -->

      <?php ActiveForm::end(); ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
