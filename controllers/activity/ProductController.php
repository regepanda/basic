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

class ProductController extends Controller
{
    public function actionGet()
    {
        $products = (new ActivityProduct())->getProductByQueryBuilder()[0];
        $products1 = array_except($products, ['product_id']);
        $products2 = array_only($products, ['product_id']);
        echo '<pre>';
        print_r($products1);
        print_r($products2);die;
    }
}