<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_header".
 *
 * @property integer $id
 * @property string $date
 * @property string $total_price
 * @property integer $supplier_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property OrderDetail[] $orderDetails
 * @property Supplier $supplier
 */
class OrderHeader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_header';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'total_price', 'supplier_id', 'created_at', 'updated_at'], 'required'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['total_price'], 'number'],
            [['supplier_id'], 'integer'],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['supplier_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'total_price' => 'Total Price',
            'supplier_id' => 'Supplier ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['order_header_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id' => 'supplier_id']);
    }
}
