<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $time
 * @property int $user_id
 * @property int $count
 * @property int $product_id
 * @property string $status
 *
 * @property Product $product
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time'], 'safe'],
            [['user_id', 'count', 'product_id', 'status'], 'required'],
            [['user_id', 'count', 'product_id'], 'integer'],
            [['status'], 'string'],
            [['user_id', 'product_id'], 'unique', 'targetAttribute' => ['user_id', 'product_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'user_id' => 'User ID',
            'count' => 'Count',
            'product_id' => 'Product ID',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
