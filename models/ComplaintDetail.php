<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "complaint_detail".
 *
 * @property integer $id
 * @property integer $id_complaint_header
 * @property integer $id_service
 * @property string $result
 * @property integer $unit_id
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ComplaintHeader $idComplaintHeader
 * @property Service $idService
 * @property Unit $unit
 */
class ComplaintDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'complaint_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_complaint_header', 'id_service', 'result', 'unit_id', 'description', 'created_at', 'updated_at'], 'required'],
            [['id_complaint_header', 'id_service', 'unit_id'], 'integer'],
            [['result'], 'number'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['id_complaint_header'], 'exist', 'skipOnError' => true, 'targetClass' => ComplaintHeader::className(), 'targetAttribute' => ['id_complaint_header' => 'id']],
            [['id_service'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['id_service' => 'id']],
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
            'id_complaint_header' => 'Id Complaint Header',
            'id_service' => 'Id Service',
            'result' => 'Result',
            'unit_id' => 'Unit ID',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdComplaintHeader()
    {
        return $this->hasOne(ComplaintHeader::className(), ['id' => 'id_complaint_header']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdService()
    {
        return $this->hasOne(Service::className(), ['id' => 'id_service']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'unit_id']);
    }
}
