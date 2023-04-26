<div class="features-area">
		<div class="container">
			<header class="why">
				<h3>Tại sao bạn nên chọn</h3>
				<h2>Bảo hiểm PJICO?</h2>
			</header>
			<div class="body">
				<div class="row">
					<?php
						$reasons = get_field('opt_reasons','option');
						if($reasons){
							foreach($reasons as $reason){
								?>
								<div class="col-xs-4 block-item">
									<div class="inner">
										<span class="logo hvr-hang" style="background-image:url(<?php echo $reason['opt_reason_icon'];?>);"></span>
										<h3><a href="<?php echo $reason['opt_reason_link'];?>"><?php echo $reason['opt_reason'];?></a></h3>
										<div class="short-description">
											<p><?php echo $reason['opt_reason_short_descrpt'];?></p>
										</div>
									</div>
								</div>
								<?php
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
		if(is_front_page()) {
			get_footer('homepage');
		}
	?>
	<div class="footer-bar-area">
		<div class="container">
			<div class="row">
				<div class="col-xs-4 footer-bar-item footer-bar-menu">
					<h3>LĨNH VỰC KINH DOANH</h3>
					<h5></h5>
					<?php
						wp_nav_menu(
							array(
								'theme_location'=>'footer_menu',
								'container'=>'',
								'menu'=>'Menu Footer',
							)
						);
					?>
				</div>
				
				<div class="col-xs-4 footer-bar-item system">
					<h3>HỆ THỐNG PJICO TOÀN QUỐC</h3>
					<h5></h5>
					<?php
						$customer_consultation = get_field('opt_customer_consultation','option');
						$customer_advance = get_field('opt_customer_advance','option');
						$find_link = get_field('opt_find_link','option');
					?>	
					<?php
						if($customer_consultation){
							?>	
								<p class="question"><?php echo $customer_consultation;?></p>
							<?php
						}
					?>
					
					<div class="find-now">
						<?php
							if($customer_advance){
								?>
									<p class="txt"><?php echo $customer_advance;?></p>
								<?php
							}
						?>
						
						<a href="/mang-luoi-2"><img src="<?php echo get_bloginfo('template_directory');?>/images/find-now-icon.png" alt="Tìm" /></a>
					</div>
				</div>
				<div class="col-xs-4 footer-bar-item customer-services">
					<h3>DỊCH VỤ KHÁCH HÀNG</h3>
					<h5></h5>
					<span class="phone-nums">
						<?php
							$customer_support_hotline = get_field('opt_customer_support_hotline','option');
							$customer_support_phone_num = get_field('opt_customer_support_phone_num','option');
							if($customer_support_hotline){
							?>
								<a class="mobile-phone" href="tel:<?php echo $customer_support_hotline; ?>"><?php echo $customer_support_hotline; ?></a>
							<?php
								}if($customer_support_phone_num){?>
								<a class="landline" href="tel:<?php echo $customer_support_phone_num; ?>"><?php echo $customer_support_phone_num; ?></a>
							<?php		
								}	
							?>
					</span>
					<div class="body email email-form">
						<?php echo do_shortcode('[newsletter]');?>
					</div>
				</div>
			</div>
			<div class="row">
					<?php 
						$company_add = get_field('opt_company_add','option');
						$phones = get_field('opt_phones','option');
						$faxs = get_field('opt_faxs','option');
						$email = get_field('opt_email','option');
					?>
				<div class="col-xs-4 footer-bar-item contact-info email-info">
					<span class="logo" style="background-image:url('./wp-content/themes/pjico/images/email-icon.png');"></span>
					<span class="Email">
						<p>Email</p>
						<?php
							if(email){
								?>
								<a href="mailto:<?php echo $email;?>"><?php echo $email;?></a>
								<?php
							}
						?>
					</span>
				</div>
				<div class="col-xs-4 footer-bar-item contact-info phone-info">
					<span class="logo" style="background-image:url('./wp-content/themes/pjico/images/phone-icon.png');"></span>
					<span class="Phone">
						<p>Điện Thoại</p>
						<?php
							if($phones){
								$i = 1;
								foreach($phones as $phone){
						?>
						<a href="tel:<?php echo $phone['opt_phone_num'];?>"><?php echo $phone['opt_phone_num'];?></a><?php if($i < count($phones)) echo '&nbsp;&nbsp;|&nbsp;&nbsp;'; ?>
						<?php $i++;} } ?>
					</span>
				</div>
				<div class="col-xs-4 footer-bar-item contact-info loc-info">
					<span class="logo" style="background-image:url('./wp-content/themes/pjico/images/location-icon.png');"></span>
					<span class="Loc">
						<p>Trụ Sở Chính</p>
						<a>
							<?php
								if($company_add){ echo $company_add; }
							?>
						</a>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
	<footer id="footer">
			<div class="container">
				<div class="row">
					<p>Copyright © 2022 PG INSURANCE. All rights reserved</p>
					<div class="col-xs-6 contact-info">
						<p>
							<?php 
								$company_add = get_field('opt_company_add','option');
								$phones = get_field('opt_phones','option');
								$faxs = get_field('opt_faxs','option');
								$email = get_field('opt_email','option');
							if($company_add){
								?>
								Trụ sở chính: <?php echo $company_add;?><br />
							<?php
								} if($phones){
									$i = 1;
									?>
									Số điện thoại:
								<?php foreach($phones as $phone){ ?>
									<a href="tel:<?php echo $phone['opt_phone_num'];?>"><?php echo $phone['opt_phone_num'];?></a><?php if($i < count($phones)) echo ', '; ?>
								<?php $i++;} } 
									if($faxs){
										$i= 1;
								?>
								• Fax:
								<?php foreach($faxs as $phone){ ?>
								<a href="tel:<?php echo $phone['opt_fax_num'];?>"><?php echo $phone['opt_fax_num'];?></a><?php if($i < count($phones)) echo ', '; ?>
								<?php $i++;} }  ?>
							<br />
							<?php
								if(email){
									?>
									Email: <a href="mailto:<?php echo $email?>"><?php echo $email?></a>
									<?php
								}
							?>
							 • Website: <a href="<?php echo home_url();?>">www.pjico.com.vn</a>

<br> Powered by <a href="http://wecan-group.com" target="_blank">Fundoo.me</a>
						</p>
					</div>
					<div class="col-xs-6 footer-nav">
						<?php
							wp_nav_menu(
								array(
									'theme_location'	=>		'bottom_footer_menu',
									'container'			=>		'',
									'menu'				=>		'Menu Footer Dưới'
								)
							)
						?>
						<div class="socials">
							<?php
								$socials = get_field('opt_socials','option');
								if($socials){
									foreach($socials as $social){	
									?>	
										<a href="<?php echo $social['opt_social_link'];?>" target="blank_"><img src="<?php echo $social['opt_social_icon'];?>" alt="" /></a>
									<?php
									}
								}
							?>
						</div>
					</div>
				</div>
			
			</div>
		</footer>
<!-- Custom jquery -->

	<script>
		// Get the label element
		var label_form_homepage = document.querySelector('.tnp-field-email label');
		/*var p_form_homepage = document.querySelector('.email-form p');*/

		// Remove the label element
		if (label_form_homepage) {
		  label_form_homepage.remove();
		}
		/*if (p_form_homepage) {
		  p_form_homepage.remove();
		}*/
	</script>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bxslider/jquery.bxslider.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.matchHeight.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/fancybox/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/fancybox/helpers/jquery.fancybox-media.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/mcs.custom.js"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-132970384-1"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

  gtag('config', 'UA-132970384-1');

</script>

<script>
  (function(s, u, b, i, z){
    u[i]=u[i]||function(){
      u[i].t=+new Date();
      (u[i].q=u[i].q||[]).push(arguments);
    };
    z=s.createElement('script');
    var zz=s.getElementsByTagName('script')[0];
    z.async=1; z.src=b; z.id='subiz-script';
    zz.parentNode.insertBefore(z,zz);
  })(document, window, 'https://widgetv4.subiz.com/static/js/app.js', 'subiz');
  subiz('setAccount', 'acpllwjjmmlrtjs49707');
</script>

</body>
<?php wp_footer();?>

</html>