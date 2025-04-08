<?php
  if(!isset($pageTitle)) { 
    $pageTitle = 'Salamanders'; 
  }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>SAS - <?php echo h($pageTitle); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo urlFor('/stylesheets/salamanders.css'); ?>" />
  </head>

  <body>
    <header>
      <h1><a href="<?= urlFor('/'); ?>">Southern Appalachian Salamanders (SAS)</a></h1>
    </header>
    <navigation>
      <ul>
        <li><a href="<?= urlFor('salamanders/'); ?>">Salamanders</a></li>
        <li><a href="<?php echo urlFor('../../index.html'); ?>">Back to Salamander Assignment</a></li>
        <li><a href="<?php echo urlFor('../../../web-182.html'); ?>">Back to WEB-182</a></li>
      </ul>
    </navigation>

