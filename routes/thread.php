<?php
require_once('base/route.php');
require_once('ui/block.php');

class ThreadRoute extends Route
{
  static function getPath(): string
  {
    return 'thread/';
  }

  function getContents(): string
  {

    $dbh = new PDO('mysql:host=localhost;dbname=board', "root", "root");
    ob_start();
    foreach ($dbh->query('SELECT * FROM `posts`') as $row) {
?>
      <article class="post">
        <?php echo $row['message']; ?>
      </article>
    <?php
    }
    $articles = ob_get_clean();
    ob_start();
    ?>
    <form method="post" action="/post">
      <textarea name="contents"></textarea>
      <button type="submit">Submit</button>
    </form>
<?php

    $post_form = ob_get_clean();

    ob_start();
    echo ui_block(contents: $articles, title: 'Thread');
    echo ui_block(contents: $post_form, title: 'Post');
    return ob_get_clean();
  }
}
