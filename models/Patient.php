<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $id
 * @property integer $patient_number
 * @property string $registered_date
 * @property integer $person_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ComplaintHeader[] $complaintHeaders
 * @property MedicalRecord[] $medicalRecords
 * @property Person $person
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_number', 'registered_date', 'person_id', 'created_at', 'updated_at'], 'required'],
            [['patient_number', 'person_id'], 'integer'],
            [['registered_date', 'created_at', 'updated_at'], 'safe'],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patient_number' => 'Patient Number',
            'registered_date' => 'Registered Date',
            'person_id' => 'Person ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComplaintHeaders()
    {
        return $this->hasMany(ComplaintHeader::className(), ['patient_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicalRecords()
    {
        return $this->hasMany(MedicalRecord::className(), ['patient_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }
}
