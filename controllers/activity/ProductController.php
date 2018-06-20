<?php

/**
 * Created by PhpStorm.
 * User: regepanda
 * Date: 18-6-12
 * Time: 下午4:19
 */
namespace app\controllers\activity;

use yii\web\Controller;
use app\models\activity\ActivityProduct;
use Yii;
use yii\web\Response;

class ProductController extends Controller
{
    public function actionGet()
    {
//        $products = (new ActivityProduct())->getProductByQueryBuilder()[0];
//        $products1 = array_except($products, ['product_id']);
//        $products2 = array_only($products, ['product_id']);
        $products = (new ActivityProduct())->executeSql();
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'message' => 'hello world',
            'code' => 0,
            'data' => $products
        ];
    }

    public function redisCluster()
    {
        $servers = array(
            '127.0.0.1:7000',
            '127.0.0.1:7001',
            '127.0.0.1:7002',
            '127.0.0.1:7003',
            '127.0.0.1:7004',
            '127.0.0.1:7005'
        );

        $objCluster = new \RedisCluster(NULL, $servers);
        dump($objCluster->get('username'));
    }
}