<?php
/**
 * @var $images Images
 */

use app\models\Images;

?>
<div class="row">
    <div class="col-md-12">
        <a href="<?= \yii\helpers\Url::to(['loading']) ?>" class="btn btn-primary mb-3">Загрузить фото</a>
    </div>
</div>
<div class="row">

    <div class="col-md-12">
        <h2 align="center">Галерея</h2>
        <form action="" method="get">
            <div class="form-group row">
                <label for="selectForSort" class="col-md-2 col-form-label">Сортировка</label>
                <div class="col-md-3">
                    <select class="form-control" id="selectForSort">
                        <option value="1">----</option>
                        <option value="name-asc" class="asc" <?= (Yii::$app->request->get('sort')=="name-asc") ? 'selected' : ''?>>по названию &#129045;</option>
                        <option value="name-desc" class="desc"  <?= (Yii::$app->request->get('sort')=="name-desc") ? 'selected' : ''?>>по названию &#8595;</option>
                        <option value="date-asc" class="asc"  <?= (Yii::$app->request->get('sort')=="date-asc") ? 'selected' : ''?>>по дате загрузки &#129045;</option>
                        <option value="date-desc" class="desc"  <?= (Yii::$app->request->get('sort')=="date-desc") ? 'selected' : ''?>>по дате загрузки &#8595;</option>

                    </select>
                </div>
            </div>
        </form>
    </div>
</div>

<?php if ($images): ?>
    <div class="row">
        <div class="card-group js-sort">
            <?= $this->render('_gallery', ['images' => $images]) ?>
        </div>
    </div>
<?php endif; ?>


