<?php

namespace app\models;

/**
 *
 */
class Question extends \yii\db\ActiveRecord
{

  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'questions';
  }

}
