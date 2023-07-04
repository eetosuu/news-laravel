<h2>Categories</h2>
<?php foreach($categoriesList as $category): ?>
    <h3><a href="<?=route('category.show', $category['id'])?>"><?=$category['name']?></a></h3>
<?php endforeach; ?>