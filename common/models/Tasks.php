<?php

namespace common\models;

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
 * @property string $request_date วัน/เวลาที่แจ้ง
 * @property string $complete_date วัน/เวลาที่แก้ปัญหาเสร็จ
 * @property string $description อื่น ๆ
 */
class Tasks extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['task_name', 'type', 'user', 'priority', 'staff', 'status', 'request_date', 'complete_date', 'description'], 'required'],
            [['priority', 'status'], 'string'],
            [['request_date', 'complete_date'], 'safe'],
            [['task_name', 'type', 'user', 'staff'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
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
            'request_date' => 'วัน/เวลาที่แจ้ง',
            'complete_date' => 'วัน/เวลาที่แก้ปัญหาเสร็จ',
            'description' => 'อื่น ๆ',
        ];
    }

    public function getTasktype() {
        return $this->hasOne(Tasktype::className(), ['id' => 'type_names']);
    }
    public function getUser() {
        return Yii::$app->user->identity->username;
    }

}
