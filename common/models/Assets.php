<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assets".
 *
 * @property string $id รหัสทรัพย์สิน
 * @property string $name ชื่อทรัพย์สิน
 * @property string $model โมเดล
 * @property string $serial ซีเรียล
 * @property string $mac_address แมกแอดเดรส
 * @property string $purchase_date วันที่ซื้อ
 * @property string $purchase_cost ราคาซื้อ
 * @property string $order_number หมายเลขการสั่งซื้อ
 * @property string $description รายละเอียด
 * @property string $image รูปภาพ
 * @property int $user_id ผู้ใช้
 * @property string $status สถานะ
 * @property int $warranty_months ประกัน/เดือน
 * @property int $supplier_id ผู้ผลิต/ผู้จัดจำหน่าย
 */
class Assets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['purchase_date'], 'safe'],
            [['purchase_cost'], 'number'],
            [['description', 'image', 'status', 'supplier_id'], 'string'],
            [['user_id', 'warranty_months'], 'integer'],
            [['name', 'serial', 'mac_address', 'order_number'], 'string', 'max' => 191],
            [['model'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสทรัพย์สิน',
            'name' => 'ชื่อทรัพย์สิน',
            'model' => 'โมเดล',
            'serial' => 'ซีเรียล',
            'mac_address' => 'แมกแอดเดรส',
            'purchase_date' => 'วันที่ซื้อ',
            'purchase_cost' => 'ราคาซื้อ',
            'order_number' => 'หมายเลขการสั่งซื้อ',
            'description' => 'รายละเอียด',
            'image' => 'รูปภาพ',
            'user_id' => 'ผู้ใช้',
            'status' => 'สถานะ',
            'warranty_months' => 'ประกัน/เดือน',
            'supplier_id' => 'ผู้ผลิต/ผู้จัดจำหน่าย',
        ];
    }
}
