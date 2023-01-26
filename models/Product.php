<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $photo
 * @property string $country
 * @property int $category
 * @property string $color
 * @property string $time
 * @property int $count
 * @property string $price
 *
 * @property Cart[] $carts
 * @property Category $category0
 * @property Order[] $orders
 * @property User[] $users
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'photo', 'country', 'category', 'color', 'count', 'price'], 'required'],
            [['category', 'count'], 'integer'],
            [['time'], 'safe'],
            [['name', 'photo', 'country', 'color', 'price'], 'string', 'max' => 255],
            [['photo'], 'file',  'extensions' => ['png', 'jpg', 'gif'],'skipOnEmpty' => false ],
            [['category'], 'unique'],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'photo' => 'Photo',
            'country' => 'Country',
            'category' => 'Category',
            'color' => 'Color',
            'time' => 'Time',
            'count' => 'Count',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['products_id' => 'id']);
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('cart', ['products_id' => 'id']);
    }
}
