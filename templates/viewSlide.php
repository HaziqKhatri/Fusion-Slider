

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

      <?php if ( have_rows('home_carousel') ): ?>
          <?php while ( have_rows('home_carousel') ) : the_row(); ?>
              <ul class='slider'>
                  <?php if ( have_rows('image_list') ): ?>
                      <?php while ( have_rows('image_list') ) : the_row(); ?>
                          <?php
                          $imageSLide = get_sub_field('image_thumbnail');

                          $text = get_sub_field('text');
                          $description = get_sub_field('description');
                          $cta = get_sub_field('cta'); ?>

                           <li class='item' style="background-image: url(<?php echo $imageSLide ?>)">
                              <div class='content'>
                                <h2 class='title'><?php echo $text; ?></h2>
                                <p class='description'><?php echo $description; ?> </p>
                                <button href="<?php echo $cta; ?>">Read More</button>
                              </div>
                            </li>
                         
                   <?php   endwhile; ?>
                  <?php endif; ?>
              </ul>
        <?php endwhile;?>
    <?php endif; ?>

  <nav class='nav'>
    <ion-icon class='btn prev' name="arrow-back-outline"></ion-icon>
    <ion-icon class='btn next' name="arrow-forward-outline"></ion-icon>
  </nav>
<?php