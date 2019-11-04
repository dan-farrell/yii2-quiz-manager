<?php

namespace app\models;

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

use \yii\base\BaseObject;
use \yii\db\ActiveRecord;
use \yii\web\IdentityInterface;

/**
 * User is the model behind the users
 */
class User extends ActiveRecord implements IdentityInterface
{

  /**
   * @return array the validation rules.
   */
  public static function findIdentity($id)
  {
    return static::findOne($id);
  }

  /**
   * @return string
   */
  public static function findIdentityByAccessToken($token, $type = null)
  {
    throw new NotSupportedException();
  }

  /**
   * @return integear
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @return string
   */
  public function getAuthKey()
  {
    return $this->authKey;
  }

  /**
   * @return string
   */
  public function validateAuthKey($authKey)
  {
    return $this->authKey === $authKey;
  }

  /**
   * @return string
   */
  public static function findByUsername($username)
  {
    return self::findOne(['username'=>$username]);
  }

  /**
   * @return string
   */
  public function validatePassword($password)
  {
    return $this->password === $password;
  }
}
