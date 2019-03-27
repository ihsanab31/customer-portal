<?php
/**
 * Created by PhpStorm.
 * User: desi
 * Date: 3/26/2019
 * Time: 9:11 PM
 */

namespace app\models;


use yii\base\DynamicModel;

class PaymentMethod extends DynamicModel
{
    public function rules()
    {
        return [
          [['paymentid', 'nama'], 'required'],
          [['paymentid', 'nama'], 'string', 'maxlength' => 255],
          ['keterangan', 'safe'],
        ];
    }

    public function attributeLabels(){
        return [
            'paymentid' => 'Payment ID',
            'nama'      => 'Metode Pembayaran',
            'keterangan' => 'Keterangan'
        ];
    }
}