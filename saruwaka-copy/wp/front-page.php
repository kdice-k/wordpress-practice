<?php get_header(); ?>
  <?php
    $imgUri = get_template_directory_uri() . "/images";
  ?>
  
  <!-- メインコンテンツ -->
  <main>
    <div id="main_contents">
      <nav>
        <ul>
          <li id="li-01"><span>デザイン・ウェブ制作</span></li>
          <li id="li-02"><a class="icon lemon" href="#">暮らし</a></li>
          <li id="li-03"><a class="icon pencil" href="#">学び</a></li>
        </ul>
      </nav>

      <section class="cards">

        <div class="cards-title">
          <span>人気記事</span>
        </div>

        <div class="container">

          <a class="card_link" href="#">
            <img src="<?php echo $imgUri; ?>/icatch01.png" alt="アイキャッチ1" class="eyecatch">
            <p class="title">記事のタイトルを表示する</p>
          </a>

          <a class="card_link" href="#">
            <img src="<?php echo $imgUri; ?>/icatch01.png" alt="アイキャッチ2" class="eyecatch">
            <p class="title"></p>
          </a>

          <a class="card_link" href="#">
            <img src="<?php echo $imgUri; ?>/icatch01.png" alt="アイキャッチ3" class="eyecatch">
            <p class="title"></p>
          </a>

          <a class="card_link" href="#">
            <img src="<?php echo $imgUri; ?>/icatch01.png" alt="アイキャッチ4" class="eyecatch">
            <p class="title"></p>
          </a>

        </div>
      </section>

      <section class="cards">
        <div class="cards-title">
          <span>新着記事</span>
        </div>

        <div class="container">
        <?php 
        if(have_posts()):
          while(have_posts()) :
            the_post();
        ?>

          <a class="card_link" href="<?php the_permalink(); ?>">
            <img src="<?php d4_EchoImageUri(); ?>/icatch01.png" alt="アイキャッチ1" class="eyecatch">
            <p class="title"><?php the_title(); ?></p>
            <p class="timestamp"><?php the_time("Y/m/d"); ?></p>
            <p class="cate-tag">
            <?php
								$category = get_the_category();
								if ($category[0]->cat_name) {
									echo $category[0]->cat_name;
								} else {
									echo "未設定";
								}
						?>
            </p>
            <p>アクセス数:
            <?php 
              echo getPostViews(get_the_ID());
            ?>              
            </p>
          </a>

        <?php
          endwhile;
        else:
          echo "<p>No Data!!!!</p>";
        endif;
        ?>
        </div><!-- class="container" -->

      </section>

      <!-- ページネーション -->
      <?php
        if(function_exists('wp_pagenavi')){
          wp_pagenavi();
        }
      ?>
      <!-- </div> -->

    </div>

    <!-- サイドバー -->
    <aside id="side_bar">
      <?php get_template_part( "side", "category" ); ?>

      <div id="profile">
        <h2>フクサンについて</h2>
        <div class="fbox-container">
          <img src="<?php echo $imgUri; ?>/profile.png" alt="プロフィール">
          <dl>
            <dt>ふくまるさん</dt>
            <dd>知らなくとも特に困らない雑学を中心に解説していくかもしれません。</dd>
          </dl>
        </div>
        <p class="email" ><span class="icon-email">renraku@tmick.net</span></pre>

        <div class="social">
          <!-- ツイッターアイコン -->
          <a class="link-box twitter-link" href="https://twitter.com/d4isk_" target="_blank" rel="nofollow noopener noreferrer"><span class="icon-twitter"></span><p>@d4isk_</p></a>
          
          <!--  Feedlyアイコン-->
          <a class="link-box feedly-link" href="#" target="_blank" rel="nofollow noopener noreferrer">
            <span class="icon-feedly"></span><p>Feedly</p>
          </a>

        </div>
      </div>

    </aside>

  </main>

<?php get_footer(); ?>