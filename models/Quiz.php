<?php

namespace app\models;

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
