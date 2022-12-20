<?php
/**
 * @var $images Images
 */

use app\models\Images;
?>
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
