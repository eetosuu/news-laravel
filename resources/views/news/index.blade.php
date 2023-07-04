<h2>News list</h2>
<?php foreach($newsList as $news): ?>
<div>
    <h4><a href="<?=route('news.show', $news['id'])?>"><?=$news['title']?></a></h4>
    <br>
    <img src="<?=$news['image']?>" alt="">
    <p><em><?=$news['author']?></em> &nbsp; (<?=$news['created_at']?>)</p>
    <p><?=$news['description']?></p>
</div>
<?php endforeach; ?>
