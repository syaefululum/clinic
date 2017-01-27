<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medical_record".
 *
 * @property integer $id
 * @property string $date
 * @property integer $patient_id
 * @property integer $doctor_id
 * @property integer $complaint_id
 * @property integer $nurse_id
 * @property string $description
 *
 * @property ComplaintHeader $complaint
 * @property Doctor $doctor
 * @property Nurse $nurse
 * @property Patient $patient
 * @property PrescriptionHeader[] $prescriptionHeaders
 */
class MedicalRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medical_record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'patient_id', 'doctor_id', 'complaint_id', 'nurse_id', 'description'], 'required'],
            [['date'], 'safe'],
            [['patient_id', 'doctor_id', 'complaint_id', 'nurse_id'], 'integer'],
            [['description'], 'string'],
            [['complaint_id'], 'exist', 'skipOnError' => true, 'targetClass' => ComplaintHeader::className(), 'targetAttribute' => ['complaint_id' => 'id']],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_id' => 'id']],
            [['nurse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nurse::className(), 'targetAttribute' => ['nurse_id' => 'id']],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patient_id' => 'id']],
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
            'patient_id' => 'Patient ID',
            'doctor_id' => 'Doctor ID',
            'complaint_id' => 'Complaint ID',
            'nurse_id' => 'Nurse ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComplaint()
    {
        return $this->hasOne(ComplaintHeader::className(), ['id' => 'complaint_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'doctor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNurse()
    {
        return $this->hasOne(Nurse::className(), ['id' => 'nurse_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['id' => 'patient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrescriptionHeaders()
    {
        return $this->hasMany(PrescriptionHeader::className(), ['id_medical_record' => 'id']);
    }
}
