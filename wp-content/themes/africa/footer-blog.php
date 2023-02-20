<footer class="site-footer site-blog-footer">
      <div class="container blog-footer">
        <div class="row ">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-8">
                <h2 class="footer-heading mb-4"><?php if(get_option('footer_section_1_header')){ echo esc_attr__(get_option('footer_section_1_header'));}?></h2>
                <p><?php if(get_option('footer_section_1_content')){ echo esc_attr__(get_option('footer_section_1_content'));}?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 ml-auto">

            <div class="mb-5">
              <div class="mb-5">
                <h2 class="footer-heading mb-4"><?php if(get_option('footer_section_3_header')){ echo esc_attr(get_option('footer_section_3_header'));}?></h2>
                <p><?php if(get_option('footer_section_3_content')){ echo esc_attr(get_option('footer_section_3_content'));}?></p>
              </div>
              <h2 class="footer-heading mb-4"><?php if(get_option('footer_section_4_header')){ echo esc_attr(get_option('footer_section_4_header'));}?></h2>
             <?php if(get_option('footer_section_4_content')){ echo do_shortcode(get_option('footer_section_4_content'));} ?>


              <h2 class="footer-heading mb-4"><?php if(get_option('footer_section_5_header')){ echo esc_attr(get_option('footer_section_5_header'));}?></h2>
                <a href="<?php if(get_option('footer_section_5_link1')){ echo esc_attr(get_option('footer_section_5_link1'));}?>" class="smoothscroll pl-0 pr-3"><span class="<?php if(get_option('footer_section_5_icon1')){ echo esc_attr(get_option('footer_section_5_icon1'));}?>"></span></a>
                <a href="<?php if(get_option('footer_section_5_link2')){ echo esc_attr(get_option('footer_section_5_link2'));}?>" class="pl-3 pr-3"><span class="<?php if(get_option('footer_section_5_icon2')){ echo esc_attr(get_option('footer_section_5_icon2'));}?>"></span></a>
                <a href="<?php if(get_option('footer_section_5_link3')){ echo esc_attr(get_option('footer_section_5_link3'));}?>" class="pl-3 pr-3"><span class="<?php if(get_option('footer_section_5_icon3')){ echo esc_attr(get_option('footer_section_5_icon3'));}?>"></span></a>
                <a href="<?php if(get_option('footer_section_5_link4')){ echo esc_attr(get_option('footer_section_5_link4'));}?>" class="pl-3 pr-3"><span class="<?php if(get_option('footer_section_5_icon4')){ echo esc_attr(get_option('footer_section_5_icon4'));}?>"></span></a>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
            <?php esc_attr_e('All rights reserved | This template is made with','africa');?>
            <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  </div>
<?php wp_footer(); ?>

</body>
</html>
