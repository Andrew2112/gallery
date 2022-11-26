<?php
/**
 * @var $images Images
 * @var $sort Sort
 */

use app\models\Images;
use yii\data\Sort;


?>
<div class="row">
    <div class="col-md-12">
        <a href="<?= \yii\helpers\Url::to(['loading']) ?>" class="btn btn-primary mb-3">Загрузить фото</a>
    </div>
</div>
<?php if ($images):?>
<div class="row">
    <div class="col-md-12 mb-3">

        <h2 align="center">Галерея</h2>
       <span>Сортировка</span> <?php echo $sort->link('title',['label'=>'Название']) . ' | ' . $sort->link('created_at',['label'=>'Дата загрузки']);?>

    </div>
</div>
<div class="row">
    <div class="card-group">
    <?php foreach ($images as $image): ?>

        <div class="card-deck mr-2 mb-2">
            <a href="/web/uploads/<?= $image->title ?>" target="_blank">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?= $image->getPathThumb().$image->title ?>" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"><?= $image->title ?></p>
                        <p class="card-text"><?= $image->created_at ?></p>
                    </div>
                </div>
            </a>
        </div>

    <?php endforeach; ?>
    </div>

</div>
<?php endif;?>
