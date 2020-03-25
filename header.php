<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta name="description" content="Now You Get To Raise Yourself.">
    <meta name="author" content="Olivia Fitts">

    <title> <?php wp_title('|', true, 'right'); ?> <?php bloginfo('name') ?></title>

    <?php wp_head();?>
  </head>

  <body <?php body_class(); ?>>
    <header id="fitts-header">
      <div id="fitts-header-bg"></div>
      <div id="fitts-header-wrap"  class="container">
        <nav class="fitts-nav fitts-header-wrap-item">
          <?php wp_nav_menu(array(
            'menu_id' => 'fitts-nav-header',
            'menu_class' => 'fitts-nav-list',
            'container'=>false,
            'theme_location' => 'header-menu-location'
          )); ?>
        </nav>
        <h1 id="fitts-logo" class="fitts-header-wrap-item">
          <a id="fitts-logo-link" href="<?php get_site_url(); ?>"><?php bloginfo( 'name' ); ?></a>
        </h1>
      </div>
    </header>