<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prescription_header".
 *
 * @property integer $id
 * @property integer $id_complaint
 * @property integer $id_medical_record
 * @property string $date
 * @property string $created_at
 * @property string $updated_at
 *
 * @property PrescriptionDetail[] $prescriptionDetails
 * @property ComplaintHeader $idComplaint
 * @property MedicalRecord $idMedicalRecord
 * @property PurchaseHeader[] $purchaseHeaders
 */
class PrescriptionHeader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prescription_header';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_complaint', 'id_medical_record', 'date', 'created_at', 'updated_at'], 'required'],
            [['id_complaint', 'id_medical_record'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['id_complaint'], 'exist', 'skipOnError' => true, 'targetClass' => ComplaintHeader::className(), 'targetAttribute' => ['id_complaint' => 'id']],
            [['id_medical_record'], 'exist', 'skipOnError' => true, 'targetClass' => MedicalRecord::className(), 'targetAttribute' => ['id_medical_record' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_complaint' => 'Id Complaint',
            'id_medical_record' => 'Id Medical Record',
            'date' => 'Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrescriptionDetails()
    {
        return $this->hasMany(PrescriptionDetail::className(), ['prescription_header_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdComplaint()
    {
        return $this->hasOne(ComplaintHeader::className(), ['id' => 'id_complaint']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMedicalRecord()
    {
        return $this->hasOne(MedicalRecord::className(), ['id' => 'id_medical_record']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseHeaders()
    {
        return $this->hasMany(PurchaseHeader::className(), ['prescription_header_id' => 'id']);
    }
}
