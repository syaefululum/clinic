<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $gender
 * @property string $blood_type
 * @property string $date_of_birth
 * @property string $place_of_birth
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Doctor[] $doctors
 * @property Nurse[] $nurses
 * @property Patient[] $patients
 * @property PurchaseHeader[] $purchaseHeaders
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'email', 'phone', 'gender', 'blood_type', 'date_of_birth', 'place_of_birth', 'created_at', 'updated_at'], 'required'],
            [['date_of_birth', 'created_at', 'updated_at'], 'safe'],
            [['name', 'address', 'email', 'phone', 'gender', 'place_of_birth'], 'string', 'max' => 255],
            [['blood_type'], 'string', 'max' => 2],
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
            'address' => 'Address',
            'email' => 'Email',
            'phone' => 'Phone',
            'gender' => 'Gender',
            'blood_type' => 'Blood Type',
            'date_of_birth' => 'Date Of Birth',
            'place_of_birth' => 'Place Of Birth',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasMany(Doctor::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNurses()
    {
        return $this->hasMany(Nurse::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatients()
    {
        return $this->hasMany(Patient::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseHeaders()
    {
        return $this->hasMany(PurchaseHeader::className(), ['person_id' => 'id']);
    }
}
