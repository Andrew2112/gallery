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
            return $this->renderPartial('_gallery', ['images' => $images]);
        }
            $images = $query->all();
            return $this->render('index', ['images' => $images,]);

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
        return $this->render('../image/loading', compact('model'));
    }

}