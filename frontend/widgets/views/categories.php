<?php foreach($categories as $category): ?>
<li><a href="<?= $category->uri ?>"><?= $category->name ?></a></li>
<?php endforeach; ?>