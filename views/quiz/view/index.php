<?php

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

use app\models\Answer;

$query = Answer::find()
  ->andWhere(['question_id' => $model->question_id])
  ->orderBy(['answer_id' => SORT_ASC])
  ->all();

?>

<li class="question-list-item">
  <?= $model->name; ?>

  <?php if (Yii::$app->user->identity->permission !== 'restricted') { ?>
    <ol type="A">
      <?php foreach ($query as $item) { ?>
        <li><?= $item->answer; ?></li>
      <?php } ?>
    </ol>
  <?php } ?>
</li><!-- /.question-list-item -->
