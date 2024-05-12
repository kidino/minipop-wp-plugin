<div id="minipop-92848-overlay">
  <a href="<?php echo esc_url($mobile_url);?>"><img id="minipop-92848-image-mobile" class="minipop-92848-image" src="<?php echo esc_url($mobile_popup);?>"></a>
  <a href="<?php echo esc_url($desktop_url);?>"><img id="minipop-92848-image-desktop" class="minipop-92848-image" src="<?php echo esc_url($desktop_popup);?>"></a>
</div>
<style>
  #minipop-92848-overlay {
    z-index: 1000;
    background-color: rgba(0, 0, 0, .7);
    height: 100%;
    width: 100vw;
    position: absolute;
    top: 0;
    left: 0;
    justify-content: center;
    align-items: center;
    display: flex
  }

  #minipop-92848-overlay a {
    text-align: center
  }

  .minipop-92848-image {
    border: 2px solid rgba(255, 255, 255, 0);
    box-shadow: 0 0 10px rgba(0, 0, 0, .5);
    margin: auto
  }

  #minipop-92848-image-mobile {
    width: 85%;
    height: auto;
    max-width: 600px
  }

  #minipop-92848-image-desktop {
    width: 90%;
    height: auto;
    max-width: 1000px
  }

  .minipop-92848-lock {
    overflow: hidden
  }

  @media screen and (max-width:600px) {
    #minipop-92848-image-mobile {
      display: block
    }

    #minipop-92848-image-desktop {
      display: none
    }
  }

  @media screen and (min-width:601px) {
    #minipop-92848-image-mobile {
      display: none
    }

    #minipop-92848-image-desktop {
      display: block
    }
  }
</style>
<script>
	jQuery(document).ready(function(){

		if(jQuery('#minipop-92848-overlay').length) {
			jQuery('body').addClass('lock');
			jQuery('html').addClass('lock');
			jQuery('html').scrollTop(0);
		}
		
		jQuery('body').on('click', function(){
			jQuery('body').removeClass('lock');
			jQuery('html').removeClass('lock');
			jQuery('#minipop-92848-overlay').hide();
		});
	});
</script>