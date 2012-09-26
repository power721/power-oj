<?php foreach($news as $news_item): ?>

  <h2><?php echo $news_item['title'] ?></h2>
  <div id="main">
    <?php echo $news_item['text'] ?>
  </div>
  <p><a href=news/view/<?php echo $news_item['slug'] ?>>View Article</a></p>
  
<?php endforeach ?>

<a href=news/create>Create a news item</a>
<?php echo "测试中文" ?>