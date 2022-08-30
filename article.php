<?php

require 'includes/database.php';

$conn = getDB();

if ( isset($_GET['id']) && is_numeric($_GET['id'])) {

$sql = "SELECT *
        FROM article
        WHERE id = " . $_GET['id'];

// var_dump($sql); //to see what sql is delivered

$results = mysqli_query($conn, $sql);

if ($results === false){
    echo mysqli_error($conn);
} else {

  $article = mysqli_fetch_assoc($results);
}

} else {
  $article = null;
}

?>

<?php require 'includes/header.php'; ?>

    <?php if ($article === null): ?>
      <p>Article not found.</p>
    <?php else: ?>
        <article>
        <h2><?= $article['title'];?></h2>
        <p><?= $article['content'];?></p>
        </article>
  <?php endif; ?>

  <?php require 'includes/footer.php'; ?>
