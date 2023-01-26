<?php

namespace app\models;

use yii\web\IdentityInterface;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $surname
 * @property string|null $patronymic
 * @property string|null $login
 * @property string $email
 * @property string $password
 * @property int|null $admin
 * @property Cart[] $carts
 * @property Product[] $products
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public static function findIdentity($id)
    { return static::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type =
    null) { return static::findOne(['access_token' => $token]);
    }
    public function getId()
    { return $this->id;
    }
    public function getAuthKey()
    { return ;
    }
    public function validateAuthKey($authKey)
    { return ;
    }
    public function validatePassword($password){

return $this->password==$password;
}
    public static function findByLogin($login){
        return self::find()->where(['login'=> $login])->one();
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surname', 'email', 'password'], 'required'],
            [['admin'], 'integer'],
            [['surname', 'patronymic', 'login', 'email'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 24],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Password',
            'admin' => 'Admin',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'products_id'])->viaTable('cart', ['user_id' => 'id']);
    }
}
