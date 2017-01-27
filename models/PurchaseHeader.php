<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "purchase_header".
 *
 * @property integer $id
 * @property string $date
 * @property integer $person_id
 * @property integer $prescription_header_id
 * @property string $total_price
 * @property string $paid
 * @property string $created_at
 * @property string $updated_at
 *
 * @property PurchaseDetail[] $purchaseDetails
 * @property Person $person
 * @property PrescriptionHeader $prescriptionHeader
 */
class PurchaseHeader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase_header';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'person_id', 'prescription_header_id', 'total_price', 'paid', 'created_at', 'updated_at'], 'required'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['person_id', 'prescription_header_id'], 'integer'],
            [['total_price', 'paid'], 'number'],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'id']],
            [['prescription_header_id'], 'exist', 'skipOnError' => true, 'targetClass' => PrescriptionHeader::className(), 'targetAttribute' => ['prescription_header_id' => 'id']],
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
            'person_id' => 'Person ID',
            'prescription_header_id' => 'Prescription Header ID',
            'total_price' => 'Total Price',
            'paid' => 'Paid',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::className(), ['purchase_header_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrescriptionHeader()
    {
        return $this->hasOne(PrescriptionHeader::className(), ['id' => 'prescription_header_id']);
    }
}
