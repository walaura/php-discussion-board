<?php

function ui_block(
  string $contents,
  string $title
): string {
  ob_start();
?>
  <div class="thread">
    <h2><?php echo $title ?></h2>
    <div class="thread-contents">
      <?php
      echo $contents;
      ?>
    </div>
  </div>
<?php
  return ob_get_clean();
}
