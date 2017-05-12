<?php

namespace app\models\user;
use yii\db\Migration;
use app\models\user\UserRecord;
use yii\db\Schema;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 */
class UserRecord extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'auth_key'], 'string', 'max' => 255],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    public function beforeSave($insert)
    {
        $return = parent::beforeSave($insert);

        if ($this->isNewRecord)
            $this->auth_key = Yii::$app->security->generateRandomString($length = 255);

        if ($this->isAttributeChanged('password'))
        $this->password = Yii::$app->security->generatePasswordHash($this->password);

        return $return;
    }

    public function getId()
    {
        return $this->id;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function findIdentityByAccessToken($token, $type=null)
    {
        throw new NotSupportedException("You can login by username/password pair for now");
        
    }
}
