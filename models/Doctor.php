<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property integer $id
 * @property integer $person_id
 * @property integer $reg_number
 * @property string $joined_date
 * @property string $resign_date
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ComplaintHeader[] $complaintHeaders
 * @property Person $person
 * @property Expertise[] $expertises
 * @property MedicalRecord[] $medicalRecords
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id', 'reg_number', 'joined_date', 'status', 'created_at', 'updated_at'], 'required'],
            [['person_id', 'reg_number'], 'integer'],
            [['joined_date', 'resign_date', 'created_at', 'updated_at'], 'safe'],
            [['status'], 'string', 'max' => 255],
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
            'person_id' => 'Person ID',
            'reg_number' => 'Reg Number',
            'joined_date' => 'Joined Date',
            'resign_date' => 'Resign Date',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComplaintHeaders()
    {
        return $this->hasMany(ComplaintHeader::className(), ['doctor_id' => 'id']);
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
    public function getExpertises()
    {
        return $this->hasMany(Expertise::className(), ['doctor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicalRecords()
    {
        return $this->hasMany(MedicalRecord::className(), ['doctor_id' => 'id']);
    }
}
