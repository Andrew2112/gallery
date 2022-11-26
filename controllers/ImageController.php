<?php


namespace app\controllers;


use app\models\Images;
use Yii;

use yii\data\Sort;
use yii\helpers\Inflector;
use yii\web\Controller;
use yii\web\UploadedFile;

class ImageController extends Controller
{
    public function actionIndex($sort = null)
    {
        $sort = new Sort([
            'attributes' => [
                'created_at',
                'title' => [
                    'asc' => ['title' => SORT_ASC,],
                    'desc' => ['title' => SORT_DESC,],
                    'default' => SORT_DESC,
                    'label' => 'Название',
                ],

            ],
        ]);

        $images = Images::find()->orderBy($sort->orders)->all();

        return $this->render('index', ['images' => $images, 'sort' => $sort]);
    }

    public function actionLoading()
    {

        $model = new Images();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $file = UploadedFile::getInstances($model, 'file');


            foreach ($file as $item) {
                $dir = 'uploads/';
                $file_name = uniqid() . '_' . Inflector::slug($item->baseName) . '.' . $item->extension;
                $model->title = $file_name;
                $item->saveAs($model->makeDir($dir) . '/' . $model->title);
                $model->save();
                $model->thumbnail($dir, $model->title);
                $model = new Images();
                Yii::$app->session->setFlash('success', 'Фото загружены');

            }
            return $this->redirect('index');

        }
        return $this->render('loading', compact('model'));
    }

}