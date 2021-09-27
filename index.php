<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script
    src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
    crossorigin="anonymous"
  ></script>
  <title>
    <?php echo wp_get_document_title() ?>
  </title>
  <?php wp_head() ?>
</head>
<body>
  <div class="main-container">
    <div class="posts">
      <?php 
        $args = array(
          'post_type' => 'kittens',
          'post_status' => 'publish',
          'posts_per_page' => 10,
          'orderby' => 'date&order=DESC'
        );

        $query = new WP_Query( $args );

        if ($query->have_posts()): while ($query->have_posts()): $query->the_post(); 
      ?>
        <h3><?php echo the_title(); ?></h3>
        <?php the_content() ?>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <div id="add-note">
      <input type="file" multiple="multiple" accept=".txt,image/*">
      <button class="upload_files button">Загрузить</button>
      <div class="ajax-reply"></div>
    </div>
  </div> 
  <?php wp_footer( ) ?> 
</body>
</html>