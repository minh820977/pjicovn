<div class="news-area">
	<div class="container">
		<header class="why">
			<h2>Tin tức mới nhất</h2>
		</header>
		<div class="row">
			<div class="news-block">
				<ul class="nav nav-tabs" id="myTab">
					<?php
						$terms = get_field('list_category',$pageid);
						if($terms) {
							foreach ( $terms as $term ) {
								?>
								 <li class="active"><a data-target="#<?php echo $term['select_category']->slug;?>" data-toggle="tab"><?php echo $term['select_category']->name;?></a></li>
								<?php
							}
						}
					?>
				</ul>
				<div class="tab-content">
					<?php
						if($terms) {
						foreach ( $terms as $term ) {
					?>
					  <div class="tab-pane active" id="<?php echo $term['select_category']->slug;?>">
						<div class="news-content">
							<div class="row">
								<?php
									$args = array(
										'post_type'			=>'post',
										'posts_per_page'	=>3,
										'orderby' => 'post_date',
										'order' => 'DESC',
										'tax_query'      =>     array(
											array(
											'taxonomy'       => 'category',
											'field'   => 'id',
											'terms' => $term['select_category']->term_id
										)
									)
									);
									 $the_query = new WP_Query( $args );
									while ($the_query->have_posts() ) : $the_query->the_post();
								?>
								<div class="col-xs-4 news-content-item">
									<div class="current-post">

										<div class="post-img">
											<a href="<?php the_permalink();?>"><img class="hvr-grow" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="" /></a>
										</div>
										<div class="post-meta">
											<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
											<span class="date-time"><?php echo get_the_date('l d/m/Y | H:i'); ?></span>
											<div class="short-description">
												<p>
													<?php the_excerpt();?>
												</p>
											</div>
										</div>

									</div>
								</div>
								<?php
									endwhile;
									wp_reset_query();

								?>
							</div>
						</div>
					</div>
					<?php
						} }
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="email-area">
	<div class="container">
		<div class="row">
			<div class="email-block">
				<div class="row">
					<div class="Email">
						<div class="col-xs-3 email-title">
								<p>Nhận tin tức qua Email</p>
							</div>
						<div class="body email col-xs-9 email-form">
							<?php echo do_shortcode('[newsletter]');?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>