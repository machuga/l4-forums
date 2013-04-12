<?php if($categories): ?>
    <ul>
    <?php foreach($categories as $category): ?>
        <li>
            <?= $category->name ?>
            <?php if($category->topics): ?>
                <ul>
                <?php foreach($category->topics as $topic): ?>
                    <li>
                        <?= $topic->name ?>
                        <?php if($topic->posts): ?>
                            <ul>
                                <?php foreach($topic->posts as $post): ?>
                                    <li><?= $post->name ?></li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>
                    </li>
                <?php endforeach ?>
                </ul>
            <?php endif ?>
        </li>
    <?php endforeach ?>
    </ul>
<?php endif ?>
