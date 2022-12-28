<?php


namespace app\controllers;


use app\models\Images;
use app\helper\SiteHelper;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;

class AjaxController extends Controller
{
    public function actionSortGallery()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $formatLimit = 3;
        $query = Images::find();
        $pages = new Pagination(['totalCount' => Images::find()->count(), 'pageSize' => $formatLimit]);


        if (\Yii::$app->request->get('sort') && !\Yii::$app->request->get('page')) {
            $query = $query->offset($pages->offset)
                ->limit($pages->limit);
            $sort = \Yii::$app->request->get('sort');
            SiteHelper::sort($sort, $query);
            $images = $query->all();
            return [
                'sort' => $sort,
                'next' =>  '/?page=1' ,
                'page' => 1,

                'html' => $this->renderPartial('../gallery/_gallery', ['images' => $images])];
        }

        if (\Yii::$app->request->get('page')) {

            if (\Yii::$app->request->get('sort')) {

                $sort = \Yii::$app->request->get('sort');
               SiteHelper::sort($sort, $query);

            }
            $query = $query->offset($formatLimit + $pages->offset)
                ->limit($pages->limit);

            $images = $query->all();

            $next_page = Yii::$app->request->get('page') + 1;
            $countPage = ceil($pages->totalCount / $pages->pageSize);

            return [

                'next' => ($countPage != $next_page) ? '/?page=' . $next_page : 'false',
                'page' => $next_page,
                'sort' => $sort,
                'append_block' => '.js-sort',
                'html' => $this->renderAjax('../gallery/_gallery', [
                    'images' => $images,

                ]),

            ];
        }
    }




}