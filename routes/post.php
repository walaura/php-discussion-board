<?php
require_once('base/route.php');

class PostRoute extends Route
{
  static function getPath(): string
  {
    return 'post';
  }

  function getContents(): string
  {
    $dbh = new PDO('mysql:host=localhost;dbname=board', "root", "root");
    $sth = $dbh->prepare('INSERT INTO `posts` (`id`, `message`, `date`) VALUES (NULL, ?, CURRENT_TIMESTAMP);');
    $sth->execute([$_POST['contents']]);
    header("Location: /thread/12");
    exit();
    return 'hihi';
  }
}
