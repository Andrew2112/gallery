<?php


namespace app\controllers;


use app\models\Images;
use Yii;
use yii\helpers\Inflector;
use yii\web\Controller;
use yii\web\UploadedFile;

class GalleryController extends Controller
{
    public function actionIndex()
    {
        $images = Images::find()->all();
        return $this->render('index', ['images' => $images,]);
    }
}