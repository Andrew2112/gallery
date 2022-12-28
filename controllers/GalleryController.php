<?php


namespace app\controllers;

use app\models\Images;
use app\helper\SiteHelper;
use yii\data\Pagination;
use yii\web\Controller;

class GalleryController extends Controller
{
    public function actionIndex()
    {


        $query = Images::find();
        $pages = new Pagination(['totalCount' => Images::find()->count(), 'pageSize' => Images::LIMIT_PHOTO]);


        $query = $query->offset($pages->offset)
            ->limit($pages->limit);
        if (\Yii::$app->request->get('sort')){

            $sort = \Yii::$app->request->get('sort');
            SiteHelper::sort($sort, $query);
        }

        $images = $query->all();
        return $this->render('index', ['images' => $images,]);
    }
}