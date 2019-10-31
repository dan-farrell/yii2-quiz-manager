<?php

namespace app\models;

use \yii\base\BaseObject;
use \yii\db\ActiveRecord;
use \yii\web\IdentityInterface;

/**
 *
 */
class User extends ActiveRecord implements IdentityInterface
{

  /**
   *
   */
  public static function findIdentity($id)
  {
    return static::findOne($id);
  }

  /**
   *
   */
  public static function findIdentityByAccessToken($token, $type = null)
  {
    throw new NotSupportedException();//I don't implement this method because I don't have any access token column in my database
  }

  /**
   *
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   *
   */
  public function getAuthKey()
  {
    return $this->authKey;//Here I return a value of my authKey column
  }

  /**
   *
   */
  public function validateAuthKey($authKey)
  {
    return $this->authKey === $authKey;
  }

  /**
   *
   */
  public static function findByUsername($username)
  {
    return self::findOne(['username'=>$username]);
  }

  /**
   *
   */
  public function validatePassword($password)
  {
    return $this->password === $password;
  }
}
