<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicine".
 *
 * @property integer $id
 * @property string $name
 * @property string $quantity
 * @property integer $unit_id
 * @property string $price
 * @property string $date_stock
 * @property string $date_expiration
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Unit $unit
 * @property OrderDetail[] $orderDetails
 * @property PrescriptionDetail[] $prescriptionDetails
 * @property PurchaseDetail[] $purchaseDetails
 */
class Medicine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medicine';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'quantity', 'unit_id', 'price', 'date_stock', 'date_expiration', 'created_at', 'updated_at'], 'required'],
            [['quantity', 'price'], 'number'],
            [['unit_id'], 'integer'],
            [['date_stock', 'date_expiration', 'created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'quantity' => 'Quantity',
            'unit_id' => 'Unit ID',
            'price' => 'Price',
            'date_stock' => 'Date Stock',
            'date_expiration' => 'Date Expiration',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['medicine_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrescriptionDetails()
    {
        return $this->hasMany(PrescriptionDetail::className(), ['medicine_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::className(), ['medicine_id' => 'id']);
    }
}
