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
          <a class="card_link" href="#">
            <img src="<?php echo $imgUri; ?>/icatch01.png" alt="アイキャッチ1" class="eyecatch">
            <p class="title">記事のタイトルを表示する</p>
            <p class="timestamp">2020/04/12</p>
            <p class="cate-tag">HTML&CSS</p>
          </a>

          <a class="card_link" href="#">
            <img src="<?php echo $imgUri; ?>/icatch01.png" alt="アイキャッチ1" class="eyecatch">
            <p class="title">記事のタイトルを表示する</p>
            <p class="timestamp">2020/04/12</p>
            <p class="cate-tag">HTML&CSS</p>
          </a>

          <a class="card_link" href="#">
            <img src="<?php echo $imgUri; ?>/icatch01.png" alt="アイキャッチ1" class="eyecatch">
            <p class="title">記事のタイトルを表示する</p>
            <p class="timestamp">2020/04/12</p>
            <p class="cate-tag">HTML&CSS</p>
          </a>

          <a class="card_link" href="#">
            <img src="<?php echo $imgUri; ?>/icatch01.png" alt="アイキャッチ1" class="eyecatch">
            <p class="title">記事のタイトルを表示する</p>
            <p class="timestamp">2020/04/12</p>
            <p class="cate-tag">HTML&CSS</p>
          </a>
        </div>
      </section>
    </div>

    <!-- サイドバー -->
    <aside id="side_bar">
    
      <div id="category">
        <h2 class="category-title">カテゴリー AAAAAA</h2>
        <h3 class="icon_pc">HTML&CSS</h3>
        <ul>
          <li><a class="icon_mt" href="#">Webデザイン入門</a></li>
          <li><a class="icon_mt" href="#">WordPressの使い方</a></li>
          <li><a class="icon_mt" href="#">マテリアルデザイン入門</a></li>
          <li><a class="icon_mt" href="#">リファレンス</a></li>
        </ul>
        <h3 class="icon_pc">in English</h3>
        <h3 class="icon_pc">テクノロジー</h3>
        <ul>
          <li><a class="icon_mt" href="#">アプリ</a></li>
          <li><a class="icon_mt" href="#">インターネット</a></li>
          <li><a class="icon_mt" href="#">メディア・SEO</a></li>
        </ul>
      </div>

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