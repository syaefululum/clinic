<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "complaint_header".
 *
 * @property integer $id
 * @property integer $patient_id
 * @property integer $doctor_id
 * @property string $registered_date
 * @property string $checkup_date
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ComplaintDetail[] $complaintDetails
 * @property Doctor $doctor
 * @property Patient $patient
 * @property MedicalRecord[] $medicalRecords
 * @property PrescriptionHeader[] $prescriptionHeaders
 * @property Schedule[] $schedules
 */
class ComplaintHeader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'complaint_header';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id', 'doctor_id', 'registered_date', 'description', 'created_at', 'updated_at'], 'required'],
            [['patient_id', 'doctor_id'], 'integer'],
            [['registered_date', 'checkup_date', 'created_at', 'updated_at'], 'safe'],
            [['description'], 'string'],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_id' => 'id']],
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
            'patient_id' => 'Patient ID',
            'doctor_id' => 'Doctor ID',
            'registered_date' => 'Registered Date',
            'checkup_date' => 'Checkup Date',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComplaintDetails()
    {
        return $this->hasMany(ComplaintDetail::className(), ['id_complaint_header' => 'id']);
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
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['id' => 'patient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicalRecords()
    {
        return $this->hasMany(MedicalRecord::className(), ['complaint_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrescriptionHeaders()
    {
        return $this->hasMany(PrescriptionHeader::className(), ['id_complaint' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['complaint_id' => 'id']);
    }
}
