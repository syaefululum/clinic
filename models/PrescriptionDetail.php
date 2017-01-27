<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prescription_detail".
 *
 * @property integer $id
 * @property integer $prescription_header_id
 * @property integer $medicine_id
 * @property string $quantity
 * @property integer $unit_id
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Medicine $medicine
 * @property PrescriptionHeader $prescriptionHeader
 * @property Unit $unit
 */
class PrescriptionDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prescription_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prescription_header_id', 'medicine_id', 'quantity', 'unit_id', 'note', 'created_at', 'updated_at'], 'required'],
            [['prescription_header_id', 'medicine_id', 'unit_id'], 'integer'],
            [['quantity'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['note'], 'string', 'max' => 255],
            [['medicine_id'], 'exist', 'skipOnError' => true, 'targetClass' => Medicine::className(), 'targetAttribute' => ['medicine_id' => 'id']],
            [['prescription_header_id'], 'exist', 'skipOnError' => true, 'targetClass' => PrescriptionHeader::className(), 'targetAttribute' => ['prescription_header_id' => 'id']],
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
            'prescription_header_id' => 'Prescription Header ID',
            'medicine_id' => 'Medicine ID',
            'quantity' => 'Quantity',
            'unit_id' => 'Unit ID',
            'note' => 'Note',
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
    public function getPrescriptionHeader()
    {
        return $this->hasOne(PrescriptionHeader::className(), ['id' => 'prescription_header_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'unit_id']);
    }
}
