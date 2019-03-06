<!--¡¡¡No olvidar!!!-->
<!--Fotos de instagran -->
<!--Fin fotos de instagram-->

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="social-text-list font-alt">
                    <li>
                        <a target="_blank" href="#">Facebook</a>
                    </li>
                    <li>
                        <a target="_blank" href="#">Google Plus</a>
                    </li>
                    <li>
                        <a target="_blank" href="#">Twitter</a>
                    </li>
                    <li>
                        <a target="_blank" href="#">Instagram</a>
                    </li>
                    <li>
                        <a target="_blank" href="#">Linkedin</a>
                    </li>
                    <li>
                        <a target="_blank" href="#">Dribbble</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <p class="copyright font-alt">© Copyright 2019 <a target="_blank" href="index.html"><?php _e("Zapatería Minelli S.L" ); ?></a>. <?php _e("Todos los derechos reservados." ); ?></p>
            </div>
        </div>
    </div>
</footer>
</div>

<!--<script type='text/javascript' src='wp-content/plugins/contact-form-7/includes/js/jquery.form.mind03d.js?ver=3.51.0-2014.06.20'></script>-->
<script type='text/javascript'>
    /* <![CDATA[ */
    var _wpcf7 = {
        "recaptcha": {
            "messages": {
                "empty": "Please verify that you are not a robot."
            }
        }
    };
    /* ]]> */
</script>

<script type="text/javascript">
    jQuery(document).ready(function($){
      $(document).on('click','#lang', function(){
        if($(this).data('lang') == 'es'){
          document.cookie = "language=en";
        }else{
          document.cookie = "language=es";
        }
        location.reload();
      });
    });
</script>


<?php wp_footer(); ?>
</body>

</html>