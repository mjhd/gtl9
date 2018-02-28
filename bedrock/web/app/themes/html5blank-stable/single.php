
<?php get_header(); ?>

<main role="main">

<?php   if (have_posts()): while (have_posts()) : the_post();

        $gidget_name = get_post_meta(get_the_id(), 'gidget_name', true);
        $gidget_main_link = get_post_meta(get_the_id(), 'link', true);

        $gidget_image = get_post_meta(get_the_id(), 'gidget_image', true);
        $gidget_image = $gidget_image["guid"];

        $gidget_additional_images = get_post_meta(get_the_id(), 'gidget_additional_images', false);

        $gidget_pros = get_post_meta(get_the_id(), 'gidget_pros', true);
        $gidget_pros = explode("\n", $gidget_pros);
        $gidget_pros = str_replace("<br />"," ",$gidget_pros);
        $gidget_pros = str_replace("<p>"," ",$gidget_pros);
        $gidget_pros = str_replace("</p>"," ",$gidget_pros);

        $gidget_cons = get_post_meta(get_the_id(), 'gidget_cons', true);
        $gidget_cons = explode("\n", $gidget_cons);
        $gidget_cons = str_replace("<br />"," ",$gidget_cons);
        $gidget_cons = str_replace("<p>"," ",$gidget_cons);
        $gidget_cons = str_replace("</p>"," ",$gidget_cons);

        $gidget_description = get_post_meta(get_the_id(), 'short_description', true);
        $gidget_description_cont = get_post_meta(get_the_id(), 'description_continued', true);
        $gidget_final_score = get_post_meta(get_the_id(), 'gidget_final_score', true);
        $gidget_details = get_post_meta(get_the_id(), 'primary_post_details', true);
        $gidget_details = str_replace("<p>"," ",$gidget_details);
        $gidget_details = str_replace("</p>"," ",$gidget_details);
        $gidget_details = explode("\n", $gidget_details);

        $gidget_links = get_post_meta(get_the_id(), 'gidget_links', true);
        $gidget_links = explode("\n", $gidget_links);
        $gidget_links = str_replace("<br />"," ",$gidget_links);
        $gidget_links = str_replace("<p>"," ",$gidget_links);
        $gidget_links = str_replace("</p>"," ",$gidget_links);
    ?>

      <header>
        <div id="gidget_img">
            <?php echo '<img src="' . "$gidget_image" . '"/>' ?>
            <a <?php echo 'href="' . $gidget_main_link .'"' ?> id="purchase_amazon" target="_blank">Purchase on Amazon</a>
        </div>
        <h1><?php echo "$gidget_name" ?></h1>
      </header>

      <?php get_template_part('nav'); ?>

      <div id="additional_images">
        <?php if($gidget_additional_images[0]["guid"]): ?>
        <div unselectable="on">
            <aside id="add_img_left">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M13.523,24 22.5,24 10.476,12 22.5,0 13.523,0 1.5,12z"/></svg>
            </aside>
            <div id="swiper-container_add_img" class="swiper-container">
                <div class="swiper-wrapper">

        <?php foreach ($gidget_additional_images as $image):
                echo '<div class="swiper-slide"><div><img src="' . $image["guid"] . '"/></div></div>';
              endforeach;
        ?>

        </div></div>
        <aside id="add_img_right">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M10.477 0h-8.977l12.024 12-12.024 12h8.977l12.023-12z"/>
            </svg>
        </aside>
        </div>

        <?php endif; ?>
        </div>





      <section>
        <section>
        <div id="content-wrapper">
          <section id="description">
            <?php echo $gidget_description . $gidget_description_cont ?>
          </section>

          <section id="main-ad">AD</section>

            <section id="rating">
                <h3>Overall rating:</h3>
                <?php
                while($gidget_final_score > 0.5) {
                    echo '<aside class="star"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg></aside>';
                    $gidget_final_score--;
                }
                if($gidget_final_score > 0) {
                    echo '<aside class="star"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.173l2.335 4.817 5.305.732-3.861 3.71.942 5.27-4.721-2.524v-12.005zm0-4.586l-3.668 7.568-8.332 1.151 6.064 5.828-1.48 8.279 7.416-3.967 7.416 3.966-1.48-8.279 6.064-5.827-8.332-1.15-3.668-7.569z"/></svg></aside>';
                }
                echo '<aside class="star"> / 5</aside></a>';
                ?>
                <a <?php echo 'href="' . $gidget_main_link . '"'; ?> target="_blank">View it on Amazon</a>
            </section>

          <section id="pros-cons">
              <ul>
              <h2>PROS</h2>
              <?php

                $pro_blanks = sizeof($gidget_pros) - sizeof($gidget_cons);

                foreach ($gidget_pros as $pro):
                    if($pro)
                        echo '<li><p>' . $pro . '</p></li>';
                endforeach;
                while(0 < $pro_blanks--)
                    echo '<li><p></p></li>';
              ?>

              </ul>
              <ul>
              <h2>CONS</h2>
              <?php foreach ($gidget_cons as $con): ?>
                  <?php if($con) { echo '<li><p>' . $con . '</p></li>'; } ?>
              <?php endforeach; ?>
              <?php

              $con_blanks = sizeof($gidget_cons) - sizeof($gidget_pros);

              foreach ($gidget_cons as $con):
                  if($con)
                      echo '<li><p>' . $con . '</p></li>';
              endforeach;

              while(0 < $con_blanks--)
                  echo '<li><p></p></li>';
              ?>

              </ul>
          </section>

          <section id="details">
              <ul>
                <h3 style="margin: 80px 0 10px 10px;">More details:</h3>
                <?php foreach ($gidget_details as $detail): ?>
                    <?php if($detail) { echo '<li><aside>★</aside>' . $detail . '</li>'; } ?>
                <?php endforeach; ?>
              </ul>
          </section>

          <section id="links">

            <ul>
                <h3 style="margin-left: 10px;">Links:</h3>
                <li><a <?php echo 'href="' . $gidget_main_link . '#reviewsMedley"'; ?> target="_blank">Amazon Reviews</a></li>
                <?php
                    $link_text;
                    $link_count = 0;
                    foreach ($gidget_links as $link):

                        if($link_count % 2 == 0)
                            $link_text = $link;
                        else
                            echo '<li><a href="' . $link . '" target="_blank">' . $link_text . '</a></li>';

                        $link_count++;

                    endforeach;
                ?>
            </ul>

          </section>
        </div>
        </section>

        <div id="sidebar">
          <?php get_sidebar(); ?>
        </div>

        <?php endwhile; ?>

        <?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
</main>

<?php get_footer(); ?>