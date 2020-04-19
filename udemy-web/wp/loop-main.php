
<div id="top_right">
  <ul id="post_list">

<?php
if (have_posts()):
        while(have_posts()) :
          the_post();
?>

  <article id="post-<?php the_ID(); ?>" <?php  post_class('news'); ?>>
  <li class="cf">
    <dl>
      <dt>
        <?php 
        if(has_post_thumbnail()) :
          the_post_thumbnail([247, 152]) 
        ?>
        <?php else:	?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/tmb_1.jpg" alt="新着記事1の画像">
        <?php endif; ?>
        <span class="new_category_tag">
        
        <?php
        $category = get_the_category();
        if ($category[0]->cat_name) {
          echo $category[0]->cat_name;
        } else {
          echo "未設定";
        }
        ?>
        </span>
      </dt>
      <dd>
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <span class="new_date"><?php the_time("Y年m月d日"); ?></span>
        <!-- <span class="new_tag">キーワード1,キーワード2</span> -->
        <div class="new_tag">
        <?php 
        $tag_list = get_the_tag_list( '', ',', '' ); 
        echo $tag_list;
        ?>
        </div>
        <?php the_excerpt(); ?>
        <p><a href="<?php the_permalink(); ?>">...続きを読む</a></p>
      </dd>
    </dl>
  </li>
  </article>

<?php 
  endwhile; 
endif;
?>

  </ul>
</div>
