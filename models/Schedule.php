<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property integer $id
 * @property integer $complaint_id
 * @property string $registered_date
 * @property string $finished_date
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ComplaintHeader $complaint
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['complaint_id', 'registered_date', 'status', 'created_at', 'updated_at'], 'required'],
            [['complaint_id'], 'integer'],
            [['registered_date', 'finished_date', 'created_at', 'updated_at'], 'safe'],
            [['status'], 'string', 'max' => 255],
            [['complaint_id'], 'exist', 'skipOnError' => true, 'targetClass' => ComplaintHeader::className(), 'targetAttribute' => ['complaint_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'complaint_id' => 'Complaint ID',
            'registered_date' => 'Registered Date',
            'finished_date' => 'Finished Date',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComplaint()
    {
        return $this->hasOne(ComplaintHeader::className(), ['id' => 'complaint_id']);
    }
}
