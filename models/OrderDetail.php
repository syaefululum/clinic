<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_detail".
 *
 * @property integer $id
 * @property integer $order_header_id
 * @property integer $medicine_id
 * @property string $quantity
 * @property integer $unit_id
 * @property string $price
 * @property string $total_price
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Medicine $medicine
 * @property OrderHeader $orderHeader
 * @property Unit $unit
 */
class OrderDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_header_id', 'medicine_id', 'quantity', 'unit_id', 'price', 'total_price', 'created_at', 'updated_at'], 'required'],
            [['order_header_id', 'medicine_id', 'unit_id'], 'integer'],
            [['quantity', 'price', 'total_price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['medicine_id'], 'exist', 'skipOnError' => true, 'targetClass' => Medicine::className(), 'targetAttribute' => ['medicine_id' => 'id']],
            [['order_header_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderHeader::className(), 'targetAttribute' => ['order_header_id' => 'id']],
            [['unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['unit_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_header_id' => 'Order Header ID',
            'medicine_id' => 'Medicine ID',
            'quantity' => 'Quantity',
            'unit_id' => 'Unit ID',
            'price' => 'Price',
            'total_price' => 'Total Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicine()
    {
        return $this->hasOne(Medicine::className(), ['id' => 'medicine_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderHeader()
    {
        return $this->hasOne(OrderHeader::className(), ['id' => 'order_header_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'unit_id']);
    }
}
