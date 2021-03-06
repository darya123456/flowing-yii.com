<?php
namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface {

  public static function tableName() {
    return 'users';
  }

  public static function findIdentity($id) {
    return self::findOne($id);
  }

  public static function findIdentityByAccessToken($token, $type = null) {
    return true;
  }

  public static function findByEmail($email) {
    return self::findOne(compact('email'));
  }

  public function getId() {
    return $this->id;
  }

  public function getAuthKey() {
    return $this->authKey;
  }

  public function validateAuthKey($authKey) {
    return $this->authKey === $authKey;
  }

  public function validatePassword($password) {
  
    return Yii::$app -> getSecurity() -> validatePassword($password, $this -> password);

  }
}
