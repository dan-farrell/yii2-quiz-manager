<?php

namespace app\models;

use app\models\Question;

/**
 *
 */
class Quiz extends \yii\db\ActiveRecord
{

  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'quiz';
  }

}
