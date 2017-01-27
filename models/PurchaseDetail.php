<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "purchase_detail".
 *
 * @property integer $id
 * @property integer $purchase_header_id
 * @property integer $medicine_id
 * @property string $quantity
 * @property integer $unit_id
 * @property string $price
 * @property string $total_price
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Medicine $medicine
 * @property PurchaseHeader $purchaseHeader
 * @property Unit $unit
 */
class PurchaseDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchase_header_id', 'medicine_id', 'quantity', 'unit_id', 'price', 'total_price', 'created_at', 'updated_at'], 'required'],
            [['purchase_header_id', 'medicine_id', 'unit_id'], 'integer'],
            [['quantity', 'price', 'total_price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['medicine_id'], 'exist', 'skipOnError' => true, 'targetClass' => Medicine::className(), 'targetAttribute' => ['medicine_id' => 'id']],
            [['purchase_header_id'], 'exist', 'skipOnError' => true, 'targetClass' => PurchaseHeader::className(), 'targetAttribute' => ['purchase_header_id' => 'id']],
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
            'purchase_header_id' => 'Purchase Header ID',
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
    public function getPurchaseHeader()
    {
        return $this->hasOne(PurchaseHeader::className(), ['id' => 'purchase_header_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'unit_id']);
    }
}
