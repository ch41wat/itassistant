<?php

namespace common\models;

use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $task_id รหัสการแจ้ง
 * @property string $task_name ปัญหา
 * @property string $type ประเภท
 * @property string $user ผู้แจ้ง
 * @property string $priority ระดับความเร่งด่วน
 * @property string $staff ผู้รับผิดชอบ
 * @property string $status สถานะ
 * @property int $created_at
 * @property int $updated_at
 * @property string $complete_date วัน/เวลาที่แก้ปัญหาเสร็จ
 * @property string $solution วิธีแก้ปัญหา
 * @property string $description รายละเอียด
 */
class Tasks extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public static function tableName() {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['task_name', 'type', 'priority', 'staff', 'status',], 'required'],
            [['priority', 'status'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['complete_date'], 'safe'],
            [['task_name', 'type', 'user', 'staff'], 'string', 'max' => 100],
            [['solution', 'description'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'task_id' => 'รหัสการแจ้ง',
            'task_name' => 'ปัญหา',
            'type' => 'ประเภท',
            'user' => 'ผู้แจ้ง',
            'priority' => 'ระดับความเร่งด่วน',
            'staff' => 'ผู้รับผิดชอบ',
            'status' => 'สถานะ',
            'created_at' => 'วันที่แจ้ง',
            'updated_at' => 'วันที่อัพเดท',
            'complete_date' => 'วัน/เวลาที่แก้ปัญหาเสร็จ',
            'solution' => 'วิธีแก้ปัญหา',
            'description' => 'รายละเอียด',
        ];
    }

    public function getTasktype() {
        return $this->hasOne(Tasktype::className(), ['id' => 'type_names']);
    }

    public function getUser() {
        return Yii::$app->user->identity->username;
    }

}
