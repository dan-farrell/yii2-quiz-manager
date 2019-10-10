<?php

$this->title = Yii::$app->user->identity->username."' Profile";
$this->params['breadcrumbs'][] = 'Profile';

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;
use app\models\Profile;

// Yii2 Query to get the data for specific user using the logged in users name
$profile = Profile::find()
    ->where(['name' => Yii::$app->user->identity->username])
    ->one();

?>

<div class="profile">
    <div class="row">
        <div class="col-md-3">
            <?php
            echo Html::img('@web'.$profile->img, [
                'alt' => Yii::$app->user->identity->username."'s Profile Photo",
                'class' => 'img-responsive',
            ]);

            echo Html::tag('h2', ucfirst(Yii::$app->user->identity->username));
            echo Html::tag('p', $profile->place);
            echo Html::tag('p', $profile->age);
            ?>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit</button>
        </div>

        <div class="col-md-9">
            <?= $profile->desc; ?>
        </div>
    </div>
</div><!-- /.profile -->

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
