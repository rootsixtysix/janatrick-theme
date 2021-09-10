<header>
  <div id="logo">
    <img src="" alt="Logo">
  </div>
  <div id="hamburger-icon" class="menu-icon">
    M
  </div>
</header>



<div id="menu-wrapper">
  <div id="hamburger-close-icon" class="menu-icon">
    C
  </div>
  <nav>
    <?php
    /*
    wp_nav_menu(
      array(
        'theme_location'  => 'header_menu',
        'depth' => 1
      )
    )
    */
    ?>

    <ul id="menu">
      <?php
              $current_page = sanitize_post($GLOBALS['wp_the_query']->get_queried_object() );
              $current_page_slug = $current_page->post_name;
              $first_level_items = new WP_QUERY(array('post_type'=>'page', 'post_parent'=>0, 'orderby'=>'menu_order', 'order'=>'ASC'));
              if ( $first_level_items->have_posts() ):
                  while( $first_level_items->have_posts() ): $first_level_items->the_post();
                      $first_level_id = $post->ID;
                      $first_level_slug = $post->post_name;?>
                      <li><a href="<?php the_permalink() ?>"><?php the_title();?></a> </li>
                      <?php
                      $second_level_items = new WP_QUERY(array('post_type'=>'page', 'post_parent'=>$first_level_id, 'orderby'=>'menu_order', 'order'=>'ASC'));
                      if ( $second_level_items->have_posts() ):
                          while( $second_level_items->have_posts() ): $second_level_items->the_post();
                              if ($first_level_slug==$current_page_slug){
                                $link_url = "#".$post->post_name;
                              }else{
                                $link_url = get_home_url()."/".$first_level_slug."#".$post->post_name;
                              }
                              ?>
                              <li><a href="<?php echo($link_url); ?>"><?php the_title();?></a> </li>
                              <?php
                              $second_level_id = $post->ID;
                              $third_level_items = new WP_QUERY(array('post_type'=>'page', 'post_parent'=>$second_level_id, 'orderby'=>'menu_order', 'order'=>'ASC'));
                              if ( $third_level_items->have_posts() ):
                                  while( $third_level_items->have_posts() ): $third_level_items->the_post();
                                    if ($first_level_slug==$current_page_slug){
                                      $link_url = "#".$post->post_name;
                                    }else{
                                      $link_url = get_home_url()."/".$first_level_slug."#".$post->post_name;
                                    }
                                    ?>
                                    <li><a href="<?php echo($link_url); ?>"><?php the_title();?></a> </li>
                                      <?php
                                  endwhile;
                              endif;
                          endwhile;
                      endif;
                  endwhile;
              endif;
          wp_reset_query(); ?>
    </ul>
  </nav>

</div>


<script>
  var currentYOffset;
  document.getElementById('hamburger-icon').addEventListener("click", showMobileMenu);
  document.getElementById('hamburger-close-icon').addEventListener("click", closeMobileMenu);
  document.getElementById('menu-wrapper').addEventListener("click", closeMobileMenu);
  document.getElementById('menu').addEventListener("click", dontCloseMobileMenu);



  function showMobileMenu(){
    document.getElementById('menu-wrapper').style.display = "flex";
    currentYOffset = window.pageYOffset;
    window.addEventListener("scroll", noScroll);
  }
  function closeMobileMenu(){
    document.getElementById('menu-wrapper').style.display = "none";
    window.removeEventListener("scroll", noScroll);
  }
  function dontCloseMobileMenu(e){
    e.preventDefault();
    e.stopPropagation();
    e.stopImmediatePropagation();
    return false;
  }

  function noScroll(){
    window.scrollTo(0, currentYOffset);
  }
</script>
