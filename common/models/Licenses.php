<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "licenses".
 *
 * @property string $id รหัสไลเซนต์
 * @property string $name ชื่อไลเซนต์
 * @property string $version รุ่น
 * @property string $categories ประเภท
 * @property string $serial ซีเรียลคีย์
 * @property string $purchase_date วันที่ซื้อ
 * @property string $purchase_cost ราคาซื้อ
 * @property string $order_number หมายเลขออร์เดอร์
 * @property int $seats จำนวนที่ใช้ได้
 * @property string $description รายละเอียด
 * @property string $image รูปภาพ
 * @property int $user_id ผู้ใช้
 * @property int $supplier_id รหัสผู้จัดจำหน่าย
 * @property string $expiration_date วันหมดอายุ
 */
class Licenses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'licenses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['version', 'categories', 'image'], 'required'],
            [['categories', 'description', 'image'], 'string'],
            [['purchase_date', 'expiration_date'], 'safe'],
            [['purchase_cost'], 'number'],
            [['seats', 'user_id', 'supplier_id'], 'integer'],
            [['name'], 'string', 'max' => 191],
            [['version'], 'string', 'max' => 10],
            [['serial'], 'string', 'max' => 2048],
            [['order_number'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสไลเซนต์',
            'name' => 'ชื่อไลเซนต์',
            'version' => 'รุ่น',
            'categories' => 'ประเภท',
            'serial' => 'ซีเรียลคีย์',
            'purchase_date' => 'วันที่ซื้อ',
            'purchase_cost' => 'ราคาซื้อ',
            'order_number' => 'หมายเลขออร์เดอร์',
            'seats' => 'จำนวนที่ใช้ได้',
            'description' => 'รายละเอียด',
            'image' => 'รูปภาพ',
            'user_id' => 'ผู้ใช้',
            'supplier_id' => 'รหัสผู้จัดจำหน่าย',
            'expiration_date' => 'วันหมดอายุ',
        ];
    }
}
