<?php

namespace app\models;

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

use app\models\Question;

/**
 *
 */
class Quiz extends \yii\db\ActiveRecord
{

  /**
   *
   */
  public function rules()
  {
    return [
      [['name'], 'required'],
    ];
  }

  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'quiz';
  }

  /**
   *
   */
  public function attributeLabels()
  {
    return [
      'quiz_id' => 'ID',
      'name' => 'name'
    ];
  }

}
