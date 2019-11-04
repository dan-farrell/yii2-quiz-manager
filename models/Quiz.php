<?php

namespace app\models;

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

use app\models\Question;

/**
 * Quiz is the model behind the quizs
 */
class Quiz extends \yii\db\ActiveRecord
{

  /**
   * @return array the validation rules.
   */
  public function rules()
  {
    return [
      [['name'], 'required'],
    ];
  }

  /**
   * @inheritdoc
   *
   * @return string
   */
  public static function tableName()
  {
    return 'quiz';
  }

  /**
   * @return array
   */
  public function attributeLabels()
  {
    return [
      'quiz_id' => 'ID',
      'name' => 'name'
    ];
  }

}
