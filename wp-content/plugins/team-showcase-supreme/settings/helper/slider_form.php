<style>
.wpm-6310-owl-carousel  .wpm-6310-item{
  padding: 5px 0;
  width: calc(100% - <?php echo ($allStyle[3] * 2) ?>px) !important;
}
</style>
<div id="tab-5">
  <div class="row wpm_6310_padding_15_px">
    <div class="wpm-col-6">
      <table width="100%">
        <tr height="45">
          <td width="45%">
            <b>Activate Slider</b>
          </td>
          <td>
            <input type="hidden" name="slider_activation" id="slider_activation" value="<?php echo $allSlider[0] ?>" />
            <button type="button" value="1" class="wpm-btn-multi activate-slider<?php if ($allSlider[0] == 1) echo " active" ?>">Yes</button>
            <button type="button" value="0" class="wpm-btn-multi activate-slider<?php if ($allSlider[0] == 0) echo " active" ?>">No</button>
          </td>
        </tr>
        <tr height="45">
          <td width="55%"><b>Effect Duration</b></td>
          <td>
            <select name="effect_duration" id="wpm_6310_slider_duration_<?php echo $styleId ?>" class="wpm-form-input">
              <option value="1000"<?php if ($allSlider[2] == "1000") echo " selected" ?>>1 Second</option>
              <?php
              $n = 2000;
              for ($m = 2; $m <= 20; $m++) {
                ?>
                <option value="<?php echo $n; ?>" <?php if ($allSlider[2] == $n) echo " selected" ?>><?php echo $m ?> Seconds</option>
                <?php
                $n += 1000;
              }
              ?>

            </select>
          </td>
        </tr>
        <tr height="45">
          <td>
            <b>Activate Previous/Next</b>
          </td>
          <td>
            <input type="hidden" name="prev_next_active" id="prev_next_active" value="<?php echo $allSlider[3] ?>" />
            <button type="button" value="true" class="wpm-btn-multi prev_next_active<?php if ($allSlider[3] == "true") echo " active" ?>">Yes</button>
            <button type="button" value="false" class="wpm-btn-multi prev_next_active<?php if ($allSlider[3] == "false") echo " active" ?>">No</button>
          </td>
        </tr>
        <tr height="45" class="wpm_6310_prev_next_act">
          <td>
            <b>Previous/Next Icon</b>
          </td>
          <td>
            <select name="icon_style" id="wpm_6310_icon_style" class="wpm-form-input" >
              <option value="fas fa-angle"<?php if ($allSlider[4] == "fas fa-angle") echo " selected=''" ?>>Angle</option>
              <option value="fas fa-arrow"<?php if ($allSlider[4] == "fas fa-arrow") echo " selected=''" ?>>Arrow</option>
              <option value="fas fa-arrow-circle"<?php if ($allSlider[4] == "fas fa-arrow-circle") echo " selected=''" ?>>Arrow Circle</option>
              <option value="far fa-arrow-alt-circle"<?php if ($allSlider[4] == "far fa-arrow-alt-circle") echo " selected=''" ?>>Arrow Circle2</option>
              <option value="fas fa-caret"<?php if ($allSlider[4] == "fas fa-caret") echo " selected=''" ?>>Caret</option>
              <option value="fas fa-caret-square"<?php if ($allSlider[4] == "fas fa-caret-square") echo " selected=''" ?>>Caret Square</option>
              <option value="fas fa-chevron"<?php if ($allSlider[4] == "fas fa-chevron") echo " selected=''" ?>>Chevron</option>
              <option value="fas fa-chevron-circle"<?php if ($allSlider[4] == "fas fa-chevron-circle") echo " selected=''" ?>>Chevron Circle</option>
            </select>
          </td>
        </tr>
        <tr height="45" class="wpm_6310_prev_next_act">
          <td>
            <b>Previous/Next Icon Size</b>
          </td>
          <td>
            <input type="number" min="0"  name="prev_next_icon_size" id="wpm_6310_prev_next_icon_size" class="wpm-form-input" value="<?php echo $allSlider[5] ?>" />
          </td>
        </tr>
        <tr height="45" class="wpm_6310_prev_next_act">
          <td>
            <b>Border Radius</b>
          </td>
          <td>
            <input type="number" min="0"  name="prev_next_icon_border_radius" id="wpm_6310_prev_next_icon_border_radius" class="wpm-form-input" value="<?php echo $allSlider[6] ?>" />
          </td>
        </tr>
        <tr height="45" class="wpm_6310_prev_next_act">
          <td><b>Previous/Next Background Color</b></td>
          <td>
            <input type="text" name="prev_next_bgcolor" id="wpm_6310_prev_next_bgcolor" class="wpm-form-input wpm_6310_color_picker" data-format="rgb" data-opacity=".8" value="<?php echo $allSlider[7] ?>">
          </td>
        </tr>
        <tr height="45" class="wpm_6310_prev_next_act">
          <td><b>Previous/Next Text Color</b></td>
          <td>
            <input type="text" name="prev_next_color" id="wpm_6310_prev_next_color" class="wpm-form-input wpm_6310_color_picker" data-format="rgb" data-opacity=".8" value="<?php echo $allSlider[8] ?>">
          </td>

        </tr>
        <tr height="45" class="wpm_6310_prev_next_act">
          <td><b>Previous/Next Hover Background Color</b></td>
          <td>
            <input type="text" name="prev_next_hover_bgcolor" id="wpm_6310_prev_next_hover_bgcolor" class="wpm-form-input wpm_6310_color_picker" data-format="rgb" data-opacity=".8" value="<?php echo $allSlider[9] ?>">
          </td>
        </tr>
        <tr height="45" class="wpm_6310_prev_next_act">
          <td><b>Previous/Next Hover Text Color</b></td>
          <td>
            <input type="text" name="prev_next_hover_color" id="wpm_6310_prev_next_hover_color" class="wpm-form-input wpm_6310_color_picker" data-format="rgb" data-opacity=".8" value="<?php echo $allSlider[10] ?>">
          </td>

        </tr>
      </table>
    </div>
    <div class="wpm-col-6">
      <table width="100%">
        <tr height="45">
          <td width="45%">
            <b>Activate Indicator</b>
          </td>
          <td>
            <input type="hidden" name="indicator_activation" id="indicator_activation" value="<?php echo $allSlider[11] ?>" />
            <button type="button" value="true" class="wpm-btn-multi indicator_activation<?php if ($allSlider[11] == 'true') echo " active" ?>">Yes</button>
            <button type="button" value="false" class="wpm-btn-multi indicator_activation<?php if ($allSlider[11] == 'false') echo " active" ?>">No</button>
          </td>
        </tr>
        <tr height="45" class="wpm_6310_indicator_act">
          <td>
            <b>Indicator Width</b>
          </td>
          <td>
            <input type="number" min="0"  name="indicator_width" id="wpm_6310_indicator_width" class="wpm-form-input" value="<?php echo $allSlider[12] ?>" />
          </td>
        </tr>
        <tr height="45" class="wpm_6310_indicator_act">
          <td>
            <b>Indicator Height</b>
          </td>
          <td>
            <input type="number" min="0"  name="indicator_height" id="wpm_6310_indicator_height" class="wpm-form-input" value="<?php echo $allSlider[13] ?>" />
          </td>
        </tr>
        <tr height="45" class="wpm_6310_indicator_act">
          <td><b>Active Indicator Color</b></td>
          <td>
            <input type="text" name="indicator_active_color" id="wpm_6310_indicator_active_color" class="wpm-form-input wpm_6310_color_picker" data-format="rgb" data-opacity=".8" value="<?php echo $allSlider[14] ?>">
          </td>
        </tr>
        <tr height="45" class="wpm_6310_indicator_act">
          <td><b>Indicator Color</b></td>
          <td>
            <input type="text" name="indicator_color" id="wpm_6310_indicator_color" class="wpm-form-input wpm_6310_color_picker" data-format="rgb" data-opacity=".8" value="<?php echo $allSlider[15] ?>">
          </td>
        </tr>
        <tr height="45" class="wpm_6310_indicator_act">
          <td><b>Border Radius</b></td>
          <td>
            <input type="number" min="0"  name="indicator_border_radius" id="wpm_6310_indicator_border_radius" class="wpm-form-input" value="<?php echo $allSlider[16] ?>">
          </td>
        </tr>
        <tr height="45" class="wpm_6310_indicator_act">
          <td><b>Indicator Margin</b></td>
          <td>
            <input type="number" min="0"  name="indicator_margin" id="wpm_6310_indicator_margin" class="wpm-form-input" value="<?php echo $allSlider[17] ?>">
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
<div id="tab-6">
  <p for="" style="width: calc(100% - 30px); margin: 0 15px 5px; font-size: 14px; padding-top: 15px; color: #000"><b>Add Your Custom CSS Code Here <span class='wpm-6310-pro'>Pro Only</span></b></p><br />
  <textarea class="codemirror-textarea" name="custom_css" rows="8"><?php echo $styledata['memberorder'] ?></textarea>
</div>

<script>

jQuery(document).ready(function () {
  jQuery("body").on("change", "#wpm_background_preview", function () {
    var value = jQuery(this).val();
    jQuery(".wpm_6310_tabs_panel_preview").css({"background": value});
  });

  var owl = jQuery("#wpm-6310-slider-<?php echo $styleId ?>");
  owl.tss6310OwlCarousel({
    autoplay: true,
    lazyLoad: true,
    loop: true,
    margin: 30,
    autoplayTimeout: <?php echo $allSlider[2] ?>,
    autoplayHoverPause: true,
    responsiveClass: true,
    autoHeight: true,
    nav: <?php echo $allSlider[3] ?>,
    dots: <?php echo $allSlider[11] ?>,
    navText: ["<i class='<?php echo $allSlider[4] ?>-left'></i>", "<i class='<?php echo $allSlider[4] ?>-right'></i>"],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: <?php echo ($allStyle[0] > 2) ? 2 : $allStyle[0]; ?>
      },
      1024: {
        items: <?php echo $allStyle[0] ?>
      },
      1366: {
        items: <?php echo $allStyle[0] ?>
      }
    }
  });
  owl.on('mouseleave', function () {
    owl.trigger('stop.owl.autoplay'); //this is main line to fix it
    owl.trigger('play.owl.autoplay', [<?php echo $allSlider[2] ?>]);
  });

  <?php
  if ($allSlider[0]) {
    echo "jQuery('#wpm-6310-noslider-{$styleId}').hide();";
  } else {
    echo "jQuery('#wpm-6310-slider-{$styleId}').hide();";
  }

  if ($allSlider[3] == 'true') {
    echo ' jQuery(".wpm_6310_prev_next_act, #wpm_6310_prev, #wpm_6310_next, #wpm_6310_prev_font_icon, #wpm_6310_next_font_icon").show();';
  } else {
    echo ' jQuery(".wpm_6310_prev_next_act, #wpm_6310_prev, #wpm_6310_next, #wpm_6310_prev_font_icon, #wpm_6310_next_font_icon").hide();';
  }

  if ($allSlider[11] == 'true') {
    echo 'jQuery(".wpm_6310_indicator_act, #wpm_6310_carousel_indicators").show();';
  } else {
    echo 'jQuery(".wpm_6310_indicator_act, #wpm_6310_carousel_indicators").hide();';
  }
  ?>

  /* ##############   Live preview settings Start  ############################## */
  jQuery("body").on("click", ".activate-slider", function () {
    var val = parseInt(jQuery(this).val());
    jQuery(".activate-slider").removeClass("active");
    jQuery(this).addClass("active");
    jQuery("#slider_activation").val(val);
    if (val == 0) {
      jQuery("#wpm-6310-noslider-<?php echo $styleId ?>").show();
      jQuery("#wpm-6310-slider-<?php echo $styleId ?>").hide();
    } else {
      jQuery("#wpm-6310-slider-<?php echo $styleId ?>").show();
      jQuery("#wpm-6310-noslider-<?php echo $styleId ?>").hide();
    }
  });

  jQuery("body").on("change", "#wpm_6310_slider_duration_<?php echo $styleId ?>", function () {
    jQuery('#wpm-6310-slider-<?php echo $styleId ?>').data('owl.carousel').options.autoplayTimeout = jQuery('#wpm_6310_slider_duration_<?php echo $styleId ?>').val();
    jQuery('#wpm-6310-slider-<?php echo $styleId ?>').trigger('refresh.owl.carousel');
  });

  jQuery("body").on("click", ".prev_next_active", function () {
    var val = jQuery(this).val();
    jQuery(".prev_next_active").removeClass("active");
    jQuery(this).addClass("active");
    jQuery("#prev_next_active").val(val);
    if (val == "true") {
      jQuery(".wpm_6310_prev_next_act, #wpm_6310_prev, #wpm_6310_next, #wpm_6310_prev_font_icon, #wpm_6310_next_font_icon").show();
      jQuery('#wpm-6310-slider-<?php echo $styleId ?>').data('owl.carousel').options.nav = true;
      jQuery('#wpm-6310-slider-<?php echo $styleId ?>').trigger('refresh.owl.carousel');
    } else {
      jQuery(".wpm_6310_prev_next_act, #wpm_6310_prev, #wpm_6310_next, #wpm_6310_prev_font_icon, #wpm_6310_next_font_icon").hide();
      jQuery('#wpm-6310-slider-<?php echo $styleId ?>').data('owl.carousel').options.nav = false;
      jQuery('#wpm-6310-slider-<?php echo $styleId ?>').trigger('refresh.owl.carousel');
    }
  });


  jQuery("body").on("change", "#wpm_6310_icon_style", function () {
    jQuery("#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-owl-nav div.wpm-6310-owl-prev i").attr("class", "" + jQuery(this).val() + "-left");
    jQuery("#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-owl-nav div.wpm-6310-owl-next i").attr("class", "" + jQuery(this).val() + "-right");
  });

  jQuery("body").on("change", "#wpm_6310_prev_next_icon_size", function () {
    jQuery("<style type='text/css'>#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-owl-nav div { font-size:" + parseInt(jQuery(this).val()) + "px; line-height:" + (parseInt(jQuery(this).val()) + 15) + "px; height:" + (parseInt(jQuery(this).val()) + 15) + "px; width:" + (parseInt(jQuery(this).val()) + 15) + "px;} </style>").appendTo(".wpm_6310_tabs_panel_preview");
  });

  jQuery("body").on("change", "#wpm_6310_prev_next_icon_border_radius", function () {
    jQuery("<style type='text/css'>#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-owl-nav div.wpm-6310-owl-prev { border-radius:" + "0 " + parseInt(jQuery(this).val()) + "% " + parseInt(jQuery(this).val()) + "% 0" + ";} #wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-owl-nav div.wpm-6310-owl-next { border-radius:" + parseInt(jQuery(this).val()) + "% 0 0 " + parseInt(jQuery(this).val()) + "%" + ";}</style>").appendTo(".wpm_6310_tabs_panel_preview");
  });

  jQuery("body").on("change", "#wpm_6310_prev_next_bgcolor", function () {
    jQuery("<style type='text/css'>#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-owl-nav div { background:" + jQuery(this).val() + ";} </style>").appendTo(".wpm_6310_tabs_panel_preview");
  });

  jQuery("body").on("change", "#wpm_6310_prev_next_color", function () {
    jQuery("<style type='text/css'>#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-owl-nav div { color:" + jQuery(this).val() + ";} </style>").appendTo(".wpm_6310_tabs_panel_preview");
  });

  jQuery("body").on("change", "#wpm_6310_prev_next_hover_bgcolor", function () {
    jQuery("<style type='text/css'>#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-owl-nav div:hover { background:" + jQuery(this).val() + ";} </style>").appendTo(".wpm_6310_tabs_panel_preview");
  });

  jQuery("body").on("change", "#wpm_6310_prev_next_hover_color", function () {
    jQuery("<style type='text/css'>#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-owl-nav div:hover { color:" + jQuery(this).val() + ";} </style>").appendTo(".wpm_6310_tabs_panel_preview");
  });

  jQuery("body").on("click", ".indicator_activation", function () {
    var val = jQuery(this).val();
    jQuery(".indicator_activation").removeClass("active");
    jQuery(this).addClass("active");
    jQuery("#indicator_activation").val(val);
    if (val == "true") {
      jQuery(".wpm_6310_indicator_act, #wpm_6310_carousel_indicators").show();
      jQuery('#wpm-6310-slider-<?php echo $styleId ?>').data('owl.carousel').options.dots = true;
      jQuery('#wpm-6310-slider-<?php echo $styleId ?>').trigger('refresh.owl.carousel');
    } else {
      jQuery(".wpm_6310_indicator_act, #wpm_6310_carousel_indicators").hide();
      jQuery('#wpm-6310-slider-<?php echo $styleId ?>').data('owl.carousel').options.dots = false;
      jQuery('#wpm-6310-slider-<?php echo $styleId ?>').trigger('refresh.owl.carousel');
    }
  });

  jQuery("body").on("change", "#wpm_6310_indicator_width", function () {
    jQuery("<style type='text/css'>#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-wpm-6310-owl-dots div { width:" + parseInt(jQuery(this).val()) + "px;} </style>").appendTo(".wpm_6310_tabs_panel_preview");
  });

  jQuery("body").on("change", "#wpm_6310_indicator_height", function () {
    jQuery("<style type='text/css'>#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-wpm-6310-owl-dots div { height:" + parseInt(jQuery(this).val()) + "px;} </style>").appendTo(".wpm_6310_tabs_panel_preview");
  });

  jQuery("body").on("change", "#wpm_6310_indicator_active_color", function () {
    jQuery("<style type='text/css'>#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-wpm-6310-owl-dots div.active{ background-color:" + jQuery(this).val() + ";} </style>").appendTo(".wpm_6310_tabs_panel_preview");
  });

  jQuery("body").on("change", "#wpm_6310_indicator_color", function () {
    jQuery("<style type='text/css'>#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-wpm-6310-owl-dots div { background-color:" + jQuery(this).val() + ";} </style>").appendTo(".wpm_6310_tabs_panel_preview");
  });

  jQuery("body").on("change", "#wpm_6310_indicator_border_radius", function () {
    jQuery("<style type='text/css'>#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-wpm-6310-owl-dots div { border-radius:" + parseInt(jQuery(this).val()) + "%;} </style>").appendTo(".wpm_6310_tabs_panel_preview");
  });

  jQuery("body").on("change", "#wpm_6310_indicator_margin", function () {
    jQuery("<style type='text/css'>#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-wpm-6310-owl-dots div.active{ margin: 0 " + parseInt(jQuery(this).val()) + "px;} </style>").appendTo(".wpm_6310_tabs_panel_preview");
  });
  /* ##############   Live preview settings End  ############################## */

  <?php
  if ($allSlider[3] == "false") {
    echo 'jQuery(".wpm_6310_prev_next_act").hide();';
  }
  if ($allSlider[11] == "false") {
    echo 'jQuery(".wpm_6310_indicator_act").hide();';
  }
  ?>

});
</script>

<style>
#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-owl-nav div {
  position: absolute;
  top: calc(50% - 35px);
  background: <?php echo $allSlider[7] ?>;
  color: <?php echo $allSlider[8] ?>;
  margin: 0;
  transition: all 0.3s ease-in-out;
  font-size: <?php echo $allSlider[5] ?>px;
  line-height: <?php echo ($allSlider[5] + 15) ?>px;
  height: <?php echo ($allSlider[5] + 15) ?>px;
  width: <?php echo ($allSlider[5] + 15) ?>px;
  text-align: center;
  padding: 0;
}
#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-owl-nav div:hover{
  background: <?php echo $allSlider[9] ?>;
  color: <?php echo $allSlider[10] ?>;
}
#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-owl-nav div.wpm-6310-owl-prev {
  left: 0;
  <?php
  if(isset($styleTemplate) && $styleTemplate == 21){
    echo "left: 5px;";
  }
  ?>
  border-radius: 0 <?php echo $allSlider[6] ?>% <?php echo $allSlider[6] ?>% 0;
}
#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-owl-nav div.wpm-6310-owl-next {
  right: 0;
  <?php
  if(isset($styleTemplate) && $styleTemplate == 21){
    echo "right: 9px;";
  }
  else if(isset($styleTemplate) && $styleTemplate == 29){
    echo "right: 9px;";
  }
  else if(isset($styleTemplate) &&
    ($styleTemplate == 2 || $styleTemplate == 5)){
    echo "right: 2px;";
  }
  else if(isset($styleTemplate) && ($styleTemplate==4 || $styleTemplate==6 || $styleTemplate == 7 || $styleTemplate == 8)){
    echo "right: " . (($allStyle[3])? ($allStyle[3] * 2) : 0) . "px;";
  }
  ?>
  border-radius: <?php echo $allSlider[6] ?>% 0 0 <?php echo $allSlider[6] ?>%;
}
#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-wpm-6310-owl-dots {
  text-align: center;
  padding-top: 15px;
}
#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-wpm-6310-owl-dots div {
  width: <?php echo $allSlider[12] ?>px;
  height: <?php echo $allSlider[13] ?>px;
  border-radius: <?php echo $allSlider[16] ?>%;
  display: inline-block;
  background-color: <?php echo $allSlider[15] ?>;
  margin: 0 <?php echo $allSlider[17] ?>px;
}
#wpm-6310-slider-<?php echo $styleId ?> .wpm-6310-wpm-6310-owl-dots div.active {
  background-color: <?php echo $allSlider[14] ?>;
}
</style>
