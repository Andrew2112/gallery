<?php

namespace app\models;


use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\imagine\Image;


/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 */
class Images extends \yii\db\ActiveRecord
{
    public $file = [];
    const LIMIT_PHOTO=6;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at',],

                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['file'], 'image', 'maxFiles' => 5],
            [['created_at'], 'safe'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Наименование изображения',
            'file' => 'Фото',
            'created_at' => 'Добавлено',
        ];
    }

    /**
     * Директория для сохранения файлов
     * @param $dir
     * @return string
     */
    public function makeDir($dir)
    {
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        return $dir;
    }

    /**
     * Обрезаем загруженное фото и сохраняем
     * @param $dir
     * @param $fileName
     */
    public function thumbnail($dir, $fileName)
    {
        $thumbDir = $this->makeDir($dir . 'thumb/');
        Image::thumbnail('@webroot/' . $dir . $fileName, 200, 200)
            ->save(Yii::getAlias('@webroot/' . $thumbDir . $fileName), ['quality' => 80]);

    }

    /**
     * Путь к файлу
     * @return false|string
     */
    public function getPathThumb(){
        return Yii::getAlias( '@web/uploads/thumb/');
    }
}
