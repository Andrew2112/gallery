<?php


namespace app\controllers;


use app\models\Images;
use yii\web\Controller;

class AjaxController extends Controller
{
    public function actionSortGallery(){
        $query = Images::find();

        if (\Yii::$app->request->get('sort')) {
            $sort = \Yii::$app->request->get('sort');
            if ($sort != 1) {
                if ($sort == 'name-asc') {
                    $query->orderBy(['title' => SORT_ASC]);
                }
                if ($sort == 'name-desc') {
                    $query->orderBy(['title' => SORT_DESC]);
                }
                if ($sort == 'date-asc') {
                    $query->orderBy(['created_at' => SORT_ASC]);
                }
                if ($sort == 'date-desc') {
                    $query->orderBy(['created_at' => SORT_DESC]);
                }
            }
            $images = $query->all();
            return $this->renderPartial('../gallery/_gallery', ['images' => $images]);
        }
    }

}