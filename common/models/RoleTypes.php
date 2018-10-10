<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "role_types".
 *
 * @property int $role_id
 * @property string $role_name
 * @property int $is_active
 *
 * @property RoleModulePermission[] $roleModulePermissions
 */
class RoleTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active'], 'integer'],
            [['role_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'role_name' => 'Role Name',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoleModulePermissions()
    {
        return $this->hasMany(RoleModulePermission::className(), ['role_id' => 'role_id']);
    }
}
