<?php

/**
 * Created by PhpStorm.
 * User: regepanda
 * Date: 18-6-12
 * Time: 下午3:31
 */
namespace app\models\activity;

use yii\db\Query;
use yii\db\ActiveRecord;

class ActivityProduct extends ActiveRecord
{
    public static function getDb()
    {
        return \Yii::$app->activity;
    }

    public static function tableName()
    {
        return '{{activity_product}}';
    }

    public function getProductByActiveRecord()
    {
        $data = ActivityProduct::find()
            ->select('product_id, provider_id')
            ->where(['product_id' => 13356])
            ->asArray()
            ->all();
        return $data;
    }

    public function getProductByQueryBuilder()
    {
        $data = (new Query())
            ->from('activity_product')
            ->join('LEFT JOIN', 'product_info', 'product_info.product_id = activity_product.product_id')
            ->where(['activity_product.product_id' => 13356])
            ->select(['activity_product.product_id', 'product_info.full_description'])
            ->all(\Yii::$app->activity);
        return $data;
    }

    public function executeSql()
    {
        $productId = 13356;
        $sql = "select * 
             from activity_product 
             JOIN  product_info ON product_info.product_id = activity_product.product_id
             where activity_product.product_id=".$productId." 
             order by activity_product.product_id desc
             limit 1";
        $data = \Yii::$app->activity->createCommand($sql)->queryAll();
        return $data;
    }
}