<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "task_type".
 *
 * @property int $type_id รหัสประเภท
 * @property string $type_name ประเภทการแจ้งงาน
 * @property string $description รายละเอียด
 */
class Tasktype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_name', 'description'], 'required'],
            [['type_name', 'description'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'type_id' => 'รหัสประเภท',
            'type_name' => 'ประเภทการแจ้งงาน',
            'description' => 'รายละเอียด',
        ];
    }
}
