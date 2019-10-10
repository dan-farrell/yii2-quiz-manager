<?php

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php $form = ActiveForm::begin([
                'id' => 'profile',
                'action' => 'update',
                'options' => [
                    'role' => 'form',
                    'class' => 'profile-form',
                ],
            ]); ?>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
            </div><!-- /.modal-header -->

            <div class="modal-body">
                <!-- Form fields to edit the data before updating the database -->
                <?php
                echo $form->field($profile, 'place');
                echo $form->field($profile, 'age');
                ?>
            </div><!-- /.modal-body -->

            <div class="modal-footer">
                <button type="button" class="btn btn-default">Close</button>
                <!-- Button to submit the new data to the database and close the modal -->
                <?= Html::submitButton('Save', [
                    'class' => 'btn btn-primary',
                    // 'data-dismiss' => 'modal',
                ]); ?>
            </div><!-- /.modal-footer -->

            <?php ActiveForm::end(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->