<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id รหัสพนักงาน
 * @property int $user_id รหัสผู้ใช้
 * @property string $firstname ชื่อ
 * @property string $lastname นามสกุล
 * @property string $picture รูปภาพ
 * @property int $department_id รหัสแผนก
 */
class Employee extends \yii\db\ActiveRecord
{
    public $employee_picture;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'firstname', 'lastname', 'tel', 'department_id'], 'required'],
            [['user_id', 'department_id'], 'integer'],
            [['firstname', 'lastname'], 'string', 'max' => 100],
            [['tel'], 'string', 'max' => 10],
            [['picture'], 'string', 'max' => 200],
            [['employee_picture'],'file', 'skipOnEmpty' => TRUE, 'on' => 'update', 'extensions' => 'jpg,png']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสพนักงาน',
            'user_id' => 'รหัสผู้ใช้',
            'firstname' => 'ชื่อ',
            'lastname' => 'นามสกุล',
            'tel' => 'เบอร์โทร',
            'picture' => 'รูปภาพ',
            'department_id' => 'รหัสแผนก',
            'employee_picture' => 'รูปภาพ',
        ];
    }
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
