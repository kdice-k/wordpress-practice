	<?php get_header('hoge'); ?>

	<div id="main_wrapper">
		<div class="cf">
			<div id="top_pickup">
				<p id="pickup_thumb">
					<img src="<?php echo get_template_directory_uri(); ?>/images/pickup.jpg" alt="ピックアップ画像">
					<span id="pickup_tag">ウェブデザイン</span>
				</p>
				<dl>
					<dt><a href="#">記事のタイトルがここに入ります</a></dt>
					<dd>2014.12.12</dd>
				</dl>
			</div>

			<div id="top_ranking">
				<h2>人気記事ランキング</h2>
				<ul>
					<li>
						<dl>
							<dt>
								<img src="<?php echo get_template_directory_uri(); ?>/images/tmb_1.jpg" alt="ランキング画像01">
								<span class="ranking_number">1</span>
							</dt>
							<dd>
								<h3><a href="#">記事タイトル</a></h3>
								<span class="ranking_tag webdesign">ウェブデザイン</span>
							</dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt>
								<img src="<?php echo get_template_directory_uri(); ?>/images/tmb_2.jpg" alt="ランキング画像01">
								<span class="ranking_number">2</span>
							</dt>
							<dd>
								<h3><a href="#">記事タイトル</a></h3>
								<span class="ranking_tag wordpress">WORDPRESS</span>
							</dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt>
								<img src="<?php echo get_template_directory_uri(); ?>/images/tmb_3.jpg" alt="ランキング画像01">
								<span class="ranking_number">3</span>
							</dt>
							<dd>
								<h3><a href="#">記事タイトル</a></h3>
								<span class="ranking_tag webmarketing">ウェブマーケティング</span>
							</dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt>
								<img src="<?php echo get_template_directory_uri(); ?>/images/tmb_4.jpg" alt="ランキング画像01">
								<span class="ranking_number">4</span>
							</dt>
							<dd>
								<h3><a href="#">記事タイトル</a></h3>
								<span class="ranking_tag webdesign">ウェブデザイン</span>
							</dd>
						</dl>
					</li>
				</ul>
			</div>
		</div>

		<div class="cf">
			<!-- sidebar -->
			<?php get_sidebar(); ?>

			<div id="top_right">
				<h3>新着記事一覧</h3>

				<ul id="post_list">
				<?php 
				if (have_posts()):
					while(have_posts()) :
						the_post();
				?>
					<li class="cf">
						<dl>
							<dt>
								<?php 
								if(has_post_thumbnail()) :
									the_post_thumbnail([247, 152]);
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

				<?php 
					endwhile; 
				endif;
				?>
				</ul>
				<div>
				</div>

				<!-- <div id="pagination"> -->
				<?php
					if(function_exists('wp_pagenavi')){
						wp_pagenavi();
					}
				?>
				<!-- </div> -->
				
			</div>
		</div>
	</div><!-- #main_wrapper -->

	<?php get_footer(); ?>
