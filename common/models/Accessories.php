<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "accessories".
 *
 * @property string $id รหัสอุปกรณ์
 * @property string $name ชื่ออุปกรณ์
 * @property int $user_id ผู้ใช้
 * @property int $qty จำนวน
 * @property string $purchase_date วันที่ซื้อ
 * @property string $purchase_cost ราคาซื้อ
 * @property string $order_number หมายเลขออร์เดอร์
 * @property string $model โมเดล
 * @property string $image รูปภาพ
 * @property int $supplier_id ผู้จัดจำหน่าย
 */
class Accessories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accessories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'qty', 'supplier_id'], 'integer'],
            [['purchase_date'], 'safe'],
            [['purchase_cost'], 'number'],
            [['name', 'order_number', 'model', 'image'], 'string', 'max' => 191],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสอุปกรณ์',
            'name' => 'ชื่ออุปกรณ์',
            'user_id' => 'ผู้ใช้',
            'qty' => 'จำนวน',
            'purchase_date' => 'วันที่ซื้อ',
            'purchase_cost' => 'ราคาซื้อ',
            'order_number' => 'หมายเลขออร์เดอร์',
            'model' => 'โมเดล',
            'image' => 'รูปภาพ',
            'supplier_id' => 'ผู้จัดจำหน่าย',
        ];
    }
}
