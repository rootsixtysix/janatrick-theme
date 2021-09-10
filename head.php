<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php bloginfo( 'title' ); ?></title>
  <?php if ( is_singular() && pings_open() ) { ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php }
  wp_head(); ?>
</head>
