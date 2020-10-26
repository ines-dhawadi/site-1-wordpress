<div class="wpm-6310">
  <div class="wpm-6310-sm">
    <?php
    $styleTemplate = 5;
    include wpm_6310_plugin_url . 'settings/helper/team-member-save.php';

    if (!empty($_POST['update_style_change']) && $_POST['update_style_change'] == 'Save' && $_POST['styleid'] != '') {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'wpm_nonce_field_form')) {
        die('You do not have sufficient permissions to access this pagess.');
      } else {
        $css = "";
        $css .= sanitize_text_field($_POST['item_per_row']);
        $css .= "|" . sanitize_text_field($_POST['effect_appearance']);
        $css .= "|" . sanitize_text_field($_POST['image_radius']);
        $css .= "|" . sanitize_text_field($_POST['border_width']);
        $css .= "|" . sanitize_text_field($_POST['border_color']);
        $css .= "|";
        /* 0 - 5 */


        $css .= "|nai";
        $css .= "|" . sanitize_text_field($_POST['image_hover_background']);
        $css .= "|" . sanitize_text_field($_POST['box_shadow_width']);
        $css .= "|" . sanitize_text_field($_POST['box_shadow_blur']);
        $css .= "|" . sanitize_text_field($_POST['box_shadow_color']);
        /* 6 - 10 */

        $css .= "|" . sanitize_text_field($_POST['member_font_size']);
        $css .= "|" . sanitize_text_field($_POST['member_font_color']);
        $css .= "|";
        $css .= "|";
        $css .= "|" . sanitize_text_field($_POST['member_font_weight']);
        /* 11 - 15 */

        $css .= "|" . sanitize_text_field($_POST['member_text_transform']);
        $css .= "|" . sanitize_text_field($_POST['member_font_family']);
        $css .= "|" . sanitize_text_field($_POST['member_line_height']);
        $css .= "|" . sanitize_text_field($_POST['designation_font_size']);
        $css .= "|" . sanitize_text_field($_POST['designation_font_color']);
       /* 16 - 20 */
        $css .= "|" . sanitize_text_field($_POST['designation_font_weight']);
        $css .= "|" . sanitize_text_field($_POST['designation_text_transform']);
        $css .= "|" . sanitize_text_field($_POST['designation_font_family']);
        $css .= "|" . sanitize_text_field($_POST['designation_line_height']);
        $css .= "|";
       /* 21 - 25 */

        $css .= "|" . sanitize_text_field($_POST['social_icon_width']);
        $css .= "|" . sanitize_text_field($_POST['social_icon_height']);
        $css .= "|" . sanitize_text_field($_POST['social_border_width']);
        $css .= "|";
        $css .= "|" . sanitize_text_field($_POST['social_border_radius']);
       /* 26 - 30 */


        include wpm_6310_plugin_url . 'settings/helper/slider_form_save.php';
      }
    }
    $styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $style_table WHERE id = %d ", $styleId), ARRAY_A);
    $allStyle = explode("|", $styledata['css']);
    $allSlider = explode("|", $styledata['slider']);

    $members = array();
    if($styledata['memberid']){
      $memberids = explode(",", $styledata['memberid']);
      if($memberids){
         foreach($memberids as $memid){
           if($memid){
            $members[] = $wpdb->get_row("SELECT * FROM $member_table WHERE id={$memid}", ARRAY_A);   
           }
          
         }
      }
    }
    
   
  
    ?>

    <div class="wpm-plugin-setting-left">
      <div class="wpm_6310_tabs_panel_settings">
        <form method="post">
          <?php wp_nonce_field("wpm_nonce_field_form") ?>
          <input type="hidden" name="styleid" value="<?php echo $styleId ?>" />
          <div class="wpm_6310_padding_15_px">
            <?php include wpm_6310_plugin_url . 'settings/helper/tab-menu.php'; ?>
          </div>
          <div class="wpm-tab-content">
            <div id="tab-1">
              <div class="row wpm_6310_padding_15_px">
                <div class="wpm-col-6">
                  <table width="100%">
                    <tr height="45">
                      <td width="55%"><b>Item Per Row</b></td>
                      <td>
                        <?php wpm_items_per_row($styleId, $allStyle[0]); ?>
                        <input type="hidden" name="item_per_row" value="<?php echo $allStyle[0] ?>" />
                        <span class="btn btn-success btn-sm"><?php echo $allStyle[0] . (($allStyle[0] > 1) ? " items" : " item"); ?></span> <span class="wpm-btn-success" id="wpm_items_per_row">Change</span>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Effect Appearance</b></td>
                      <td>
                        <select name="effect_appearance" id="wpm_effect_appearance" class="wpm-form-input">
                          <option value="0%" <?php if ($allStyle[1] == "0%") echo " selected" ?>>Top</option>
                          <option value="50%" <?php if ($allStyle[1] == "50%") echo " selected" ?>>Center</option>
                          <option value="100%" <?php if ($allStyle[1] == "100%") echo " selected" ?>>Bottom</option>
                        </select>
                      </td>
                    </tr>
                    <tr height="45">
                      <td><b>Image Radius</b></td>
                      <td>
                        <input type="number" min="0" name="image_radius" value="<?php echo $allStyle[2] ?>" class="wpm-form-input" id="wpm_image_radius" />
                      </td>
                    </tr>
                    <tr height="45">
                      <td><b>Image Border Width</b></td>
                      <td>
                        <input type="number" min="0" name="border_width" value="<?php echo $allStyle[3] ?>" class="wpm-form-input" id="wpm_border_width" />
                      </td>

                    </tr>
                    <tr height="45">
                      <td><b>Image Border Color</b></td>
                      <td>
                        <input type="text" name="border_color" id="wpm_border_color" class="wpm-form-input wpm_6310_color_picker" data-format="rgb" data-opacity=".8" value="<?php echo $allStyle[4] ?>">
                      </td>

                    </tr>
                  </table>
                </div>
                <div class="wpm-col-6">
                  <table class="table table-responsive wpm_6310_admin_table">

                    <tr height="45">
                      <td width="55%"><b>Image Hover Background</b><?php //wpm_pro()                     
                                                                    ?></td>
                      <td>
                        <input type="text" name="image_hover_background" id="wpm_image_hover_background" class="wpm-form-input wpm_6310_color_picker" data-opacity=".8" data-format="rgb" value="<?php echo $allStyle[7] ?>">
                      </td>

                    </tr>
                    <tr height="45">
                      <td><b>Box Shadow Width</b></td>
                      <td>
                        <input type="number" min="0" name="box_shadow_width" value="<?php echo $allStyle[8] ?>" class="wpm-form-input" step="1" id="wpm_box_shadow_width" />
                      </td>
                    </tr>
                    <tr height="45">
                      <td><b>Box Shadow Blur</b></td>
                      <td>
                        <input type="number" min="0" name="box_shadow_blur" value="<?php echo $allStyle[9] ?>" class="wpm-form-input" step="1" id="wpm_box_shadow_blur" />
                      </td>
                    </tr>
                    <tr height="45">
                      <td><b>Box Shadow Color</b></td>
                      <td>
                        <input type="text" name="box_shadow_color" id="wpm_box_shadow_color" class="wpm-form-input wpm_6310_color_picker" data-opacity=".8" data-format="rgb" value="<?php echo $allStyle[10] ?>">
                      </td>

                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div id="tab-2">
              <div class="row">
                <div class="wpm-col-6">
                  <table class="table table-responsive wpm_6310_admin_table">
                    <tr height="45">
                      <td width='55%'><b>Font Size</b></td>
                      <td>
                        <input type="number" min="0" name="member_font_size" value="<?php echo $allStyle[11] ?>" class="wpm-form-input" step="1" id="wpm_member_font_size" />
                      </td>
                    </tr>
                    <tr height="45">
                      <td><b>Font Color</b></td>
                      <td>
                        <input type="text" name="member_font_color" id="wpm_member_font_color" class="wpm-form-input wpm_6310_color_picker" data-format="rgb" value="<?php echo $allStyle[12] ?>">
                      </td>
                    </tr>
                    <tr height="45">
                      <td width='55%'><b>Font Weight</b><?php //wpm_pro()                     
                                                        ?></td>
                      <td>
                        <select name="member_font_weight" class="wpm-form-input" id="wpm_member_font_weight">
                          <option value="100" <?php if ($allStyle[15] == '100') echo " selected=''" ?>>100</option>
                          <option value="200" <?php if ($allStyle[15] == '200') echo " selected=''" ?>>200</option>
                          <option value="300" <?php if ($allStyle[15] == '300') echo " selected=''" ?>>300</option>
                          <option value="400" <?php if ($allStyle[15] == '400') echo " selected=''" ?>>400</option>
                          <option value="500" <?php if ($allStyle[15] == '500') echo " selected=''" ?>>500</option>
                          <option value="600" <?php if ($allStyle[15] == '600') echo " selected=''" ?>>600</option>
                          <option value="700" <?php if ($allStyle[15] == '700') echo " selected=''" ?>>700</option>
                          <option value="800" <?php if ($allStyle[15] == '800') echo " selected=''" ?>>800</option>
                          <option value="900" <?php if ($allStyle[15] == '900') echo " selected=''" ?>>900</option>
                          <option value="normal" <?php if ($allStyle[15] == 'normal') echo " selected=''" ?>>Normal</option>
                          <option value="bold" <?php if ($allStyle[15] == 'bold') echo " selected=''" ?>>Bold</option>
                          <option value="lighter" <?php if ($allStyle[15] == 'lighter') echo " selected=''" ?>>Lighter</option>
                          <option value="initial" <?php if ($allStyle[15] == 'initial') echo " selected=''" ?>>Initial</option>
                        </select>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="wpm-col-6">
                  <table class="table table-responsive wpm_6310_admin_table">

                    <tr height="45">
                      <td width='55%'><b>Text Transform</b><?php //wpm_pro()                     
                                                            ?></td>
                      <td>
                        <select name="member_text_transform" class="wpm-form-input" id="wpm_member_text_transform">
                          <option value="capitalize" <?php if ($allStyle[16] == 'capitalize') echo " selected=''" ?>>Capitalize</option>
                          <option value="uppercase" <?php if ($allStyle[16] == 'uppercase') echo " selected=''" ?>>Uppercase</option>
                          <option value="uppercase" <?php if ($allStyle[16] == 'uppercase') echo " selected=''" ?>>Uppercase</option>
                          <option value="none" <?php if ($allStyle[16] == 'none') echo " selected=''" ?>>None</option>

                        </select>
                      </td>
                    </tr>
                    <tr height="45">
                      <td><b>Font Family</b><?php //wpm_pro()                     
                                            ?></td>
                      <td>
                        <input name="member_font_family" id="wpm_jquery_heading_font" type="text" value="<?php echo $allStyle[17] ?>" />
                      </td>
                    </tr>
                    <tr height="45">
                      <td><b>Line Height</b></td>
                      <td>
                        <input name="member_line_height" id="wpm_heading_line_height" type="number" min="0" value="<?php echo $allStyle[18] ?>" class="wpm-form-input" />
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div id="tab-3">
              <div class="row">
                <div class="wpm-col-6">
                  <table class="table table-responsive wpm_6310_admin_table">
                    <tr height="45">
                      <td width='55%'><b>Font Size</b></td>
                      <td>
                        <input type="number" min="0" name="designation_font_size" value="<?php echo $allStyle[19] ?>" class="wpm-form-input" step="1" id="wpm_designation_font_size" />
                      </td>
                    </tr>
                    <tr height="45">
                      <td><b>Font Color</b></td>
                      <td>
                        <input type="text" name="designation_font_color" id="wpm_designation_font_color" class="wpm-form-input wpm_6310_color_picker" data-format="rgb" value="<?php echo $allStyle[20] ?>">
                      </td>
                    </tr>
                    <tr height="45">
                      <td width='55%'><b>Font Weight</b><?php //wpm_pro()                     
                                                        ?></td>
                      <td>
                        <select name="designation_font_weight" class="wpm-form-input" id="wpm_designation_font_weight">
                          <option value="100" <?php if ($allStyle[21] == '100') echo " selected=''" ?>>100</option>
                          <option value="200" <?php if ($allStyle[21] == '200') echo " selected=''" ?>>200</option>
                          <option value="300" <?php if ($allStyle[21] == '300') echo " selected=''" ?>>300</option>
                          <option value="400" <?php if ($allStyle[21] == '400') echo " selected=''" ?>>400</option>
                          <option value="500" <?php if ($allStyle[21] == '500') echo " selected=''" ?>>500</option>
                          <option value="600" <?php if ($allStyle[21] == '600') echo " selected=''" ?>>600</option>
                          <option value="700" <?php if ($allStyle[21] == '700') echo " selected=''" ?>>700</option>
                          <option value="800" <?php if ($allStyle[21] == '800') echo " selected=''" ?>>800</option>
                          <option value="900" <?php if ($allStyle[21] == '900') echo " selected=''" ?>>900</option>
                          <option value="normal" <?php if ($allStyle[21] == 'normal') echo " selected=''" ?>>Normal</option>
                          <option value="bold" <?php if ($allStyle[21] == 'bold') echo " selected=''" ?>>Bold</option>
                          <option value="lighter" <?php if ($allStyle[21] == 'lighter') echo " selected=''" ?>>Lighter</option>
                          <option value="initial" <?php if ($allStyle[21] == 'initial') echo " selected=''" ?>>Initial</option>
                        </select>
                      </td>
                    </tr>

                  </table>
                </div>
                <div class="wpm-col-6">
                  <table class="table table-responsive wpm_6310_admin_table">
                    <tr height="45">
                      <td width='55%'><b>Text Transform</b><?php //wpm_pro()                     
                                                            ?></td>
                      <td>
                        <select name="designation_text_transform" class="wpm-form-input" id="wpm_designation_text_transform">
                          <option value="capitalize" <?php if ($allStyle[22] == 'capitalize') echo " selected=''" ?>>Capitalize</option>
                          <option value="uppercase" <?php if ($allStyle[22] == 'uppercase') echo " selected=''" ?>>Uppercase</option>
                          <option value="lowercase" <?php if ($allStyle[22] == 'lowercase') echo " selected=''" ?>>Lowercase</option>
                          <option value="none" <?php if ($allStyle[22] == 'none') echo " selected=''" ?>>None</option>

                        </select>
                      </td>
                    </tr>
                    <tr height="45">
                      <td><b>Font Family</b><?php //wpm_pro()                     
                                            ?></td>
                      <td>
                        <input name="designation_font_family" id="wpm_jquery_designation_font" type="text" value="<?php echo $allStyle[23] ?>" />
                      </td>
                    </tr>
                    <tr height="45">
                      <td><b>Line Height</b></td>
                      <td>
                        <input name="designation_line_height" id="wpm_designation_line_height" type="number" min="0" value="<?php echo $allStyle[24] ?>" class="wpm-form-input" />
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div id="tab-4">
              <div class="row">
                <div class="wpm-col-6">
                  <table class="table table-responsive wpm_6310_admin_table">

                    <tr height="45">
                      <td width='55%'><b>Social Icon Width</b><?php //wpm_pro()                     
                                                              ?></td>
                      <td>
                        <input type="number" min="0" name="social_icon_width" value="<?php echo $allStyle[26] ?>" class="wpm-form-input" id="wpm_social_icon_width" />
                      </td>
                    </tr>
                    <tr height="45">
                      <td><b>Social Icon Height</b><?php //wpm_pro()                     
                                                    ?></td>
                      <td>
                        <input type="number" min="0" name="social_icon_height" value="<?php echo $allStyle[27] ?>" class="wpm-form-input" id="wpm_social_icon_height" />
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="wpm-col-6">
                  <table class="table table-responsive wpm_6310_admin_table">
                    <tr height="45">
                      <td width="55%"><b>Social Icon Border Width</b><?php //wpm_pro()                     
                                                                      ?></td>
                      <td>
                        <input type="number" min="0" name="social_border_width" value="<?php echo $allStyle[28] ?>" class="wpm-form-input" id="wpm_social_border_width" />
                      </td>
                    </tr>
                    <tr height="45">
                      <td><b>Social Icon Border Radius</b></td>
                      <td>
                        <input type="number" min="0" name="social_border_radius" value="<?php echo $allStyle[30] ?>" class="wpm-form-input" id="wpm_social_border_radius" />
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <?php include wpm_6310_plugin_url . 'settings/helper/slider_form.php'; ?>
            <br class="wpm-6310-clear" />
            <br class="wpm-6310-clear" />
            <hr />
            <input type="submit" name="update_style_change" value="Save" class="wpm-btn-primary wpm-pull-right" style="margin-right: 15px; margin-bottom: 10px; display: block" />
            <br class="wpm-6310-clear" />
          </div>
        </form>
      </div>

      <style type="text/css">
        .wpm_6310_team_style_05 {
          text-align: center;
          overflow: hidden;
          position: relative;
          z-index: 1;
          letter-spacing: .04em;
          -webkit-border-radius: <?php echo $allStyle[2] ?>%;
          -o-border-radius: <?php echo $allStyle[2] ?>%;
          -moz-border-radius: <?php echo $allStyle[2] ?>%;
          -ms-border-radius: <?php echo $allStyle[2] ?>%;
          border-radius: <?php echo $allStyle[2] ?>%;
          border-style: solid;
          border-width: <?php echo $allStyle[3] ?>px;
          border-color: <?php echo $allStyle[4] ?>;
          box-shadow: 0 0 <?php echo $allStyle[9] ?>px <?php echo $allStyle[8] ?>px <?php echo $allStyle[10] ?>;
          -moz-box-shadow: 0 0 <?php echo $allStyle[9] ?>px <?php echo $allStyle[8] ?>px <?php echo $allStyle[10] ?>;
          -o-box-shadow: 0 0 <?php echo $allStyle[9] ?>px <?php echo $allStyle[8] ?>px <?php echo $allStyle[10] ?>;
          -webkit-box-shadow: 0 0 <?php echo $allStyle[9] ?>px <?php echo $allStyle[8] ?>px <?php echo $allStyle[10] ?>;
          -ms-box-shadow: 0 0 <?php echo $allStyle[9] ?>px <?php echo $allStyle[8] ?>px <?php echo $allStyle[10] ?>;
          width: calc(100% - 4px);
        }

        .wpm_6310_team_style_05 .wpm_6310_team_style_05_pic {
          margin: 0;
          position: relative;
          -webkit-transition: all 0.5s ease 0s;
          -moz-transition: all 0.5s ease 0s;
          -ms-transition: all 0.5s ease 0s;
          -o-transition: all 0.5s ease 0s;
          transition: all 0.5s ease 0s;
          overflow: hidden;
          width: 100%;
        }

        .wpm_6310_team_style_05_pic img {
          float: left;
        }

        .wpm_6310_team_style_05:hover {
          border-color: <?php echo $allStyle[7] ?>
        }

        .wpm_6310_team_style_05_pic:after {
          content: "";
          background: <?php echo $allStyle[7] ?>;
          width: 100%;
          height: 0;
          position: absolute;
          left: 0;
          opacity: 0;
          top: 60%;
          -webkit-transition: all 0.5s ease 0s;
          -moz-transition: all 0.5s ease 0s;
          -ms-transition: all 0.5s ease 0s;
          -o-transition: all 0.5s ease 0s;
          transition: all 0.5s ease 0s
        }

        .wpm_6310_team_style_05:hover .wpm_6310_team_style_05_pic:after {
          height: 60%;
          opacity: 0.85;
          top: 20%
        }

        .wpm_6310_team_style_05 img {
          width: 100%;
          height: auto
        }

        .wpm_6310_team_style_05_pic:after {
          top: <?php echo $allStyle[1] ?>;
        }

        .wpm_6310_team_style_05_team_content {
          width: 100%;
          position: absolute;
          left: 0;
          opacity: 0;
          -webkit-transition: all 0.5s ease 0.2s;
          -moz-transition: all 0.5s ease 0.2s;
          -ms-transition: all 0.5s ease 0.2s;
          -o-transition: all 0.5s ease 0.2s;
          transition: all 0.5s ease 0.2s;
          top: 32%;
        }

        .wpm_6310_team_style_05:hover .wpm_6310_team_style_05_team_content {
          opacity: 1
        }

        .wpm_6310_team_style_05_title {
          margin: 0 0 5px 0;
          font-size: <?php echo $allStyle[11] ?>px;
          color: <?php echo $allStyle[12] ?>;
          font-weight: <?php echo $allStyle[15] ?>;
          text-transform: <?php echo $allStyle[16]; ?>;
          font-family: <?php echo str_replace("+", " ", $allStyle[17]); ?>;
          line-height: <?php echo $allStyle[18] ?>px;
        }

        .wpm_6310_team_style_05_title:hover {
          color: <?php echo $allStyle[13]; ?>
        }

        .wpm_6310_team_style_05_designation:hover {
          color: <?php echo $allStyle[25]; ?>
        }

        .wpm_6310_team_style_05_designation {
          font-size: <?php echo $allStyle[19] ?>px;
          color: <?php echo $allStyle[20] ?>;
          font-weight: <?php echo $allStyle[21] ?>;
          text-transform: <?php echo $allStyle[22] ?>;
          font-family: <?php echo str_replace("+", " ", $allStyle[23]); ?>;
          line-height: <?php echo $allStyle[24] ?>px;
          padding-bottom: <?php echo $allStyle[25] ?>px;
          display: block;
        }

        ul.wpm_6310_team_style_05_social {
          padding: 0;
          margin: 15px 0 0;
          list-style: none;
        }

        ul.wpm_6310_team_style_05_social li {
          display: inline-block;
          margin: 0 8px 8px 0;
        }

        ul.wpm_6310_team_style_05_social li:last-child {
          margin-right: 0;
        }

        ul.wpm_6310_team_style_05_social li a {
          display: inline-block;
          width: <?php echo $allStyle[26] ?>px;
          height: <?php echo $allStyle[27] ?>px;
          line-height: <?php echo $allStyle[27] ?>px;
          font-size: <?php echo ceil(($allStyle[26] + $allStyle[27]) / 4) ?>px;
          color: #fff;
          margin: 0;
          -webkit-transition: all 0.5s ease 0s;
          -moz-transition: all 0.5s ease 0s;
          -ms-transition: all 0.5s ease 0s;
          -o-transition: all 0.5s ease 0s;
          transition: all 0.5s ease 0s;
          border-radius: <?php echo $allStyle[30] ?>%;
          -moz-border-radius: <?php echo $allStyle[30] ?>%;
          -webkit-border-radius: <?php echo $allStyle[30] ?>%;
          -o-border-radius: <?php echo $allStyle[30] ?>%;
          -ms-border-radius: <?php echo $allStyle[30] ?>%;
        }
      </style>

      <?php
      include wpm_6310_plugin_url . 'settings/helper/template-05.php';
      ?>
      <div class="wpm-preview-box">
        <div class="wpm-6310-preview">
          Preview
          <div style="display: inline; float: right">
            <input type="text" id="wpm_background_preview" class="wpm-form-input  wpm-pull-right wpm_6310_color_picker wpm_preview_color_chooser" data-format="rgb" data-opacity=".8" value="rgba(255, 255, 255, .8)"></div>
        </div>
        <hr />
      </div>
      <div class="wpm_6310_tabs_panel_preview">
        <div id="wpm-6310-noslider-<?php echo $styleId ?>">
          <?php
          $col = 0;
          if ($members) {
            foreach ($members as $value) {
              if ($value['profile_details_type'] == 1) {
                $link_type = " class='wpm_6310_team_style_05 wpm_6310_team_member_info' link-id='{$value['id']}' link-url='{$value['profile_url']}' target='{$value['open_new_tab']}' team-id='0'";
              } else if ($value['profile_details_type'] == 2) {
                $link_type = " class='wpm_6310_team_style_05 wpm_6310_team_member_info' link-id='0' team-id='{$value['id']}'";
              } else {
                $link_type = " class='wpm_6310_team_style_05' link-id='0' team-id='0'";
              }
              $col++;
              if ($allStyle[0] == 1) {
                echo "<div class='wpm-6310-row'>";
              } else if ($col % $allStyle[0] == 1) {
                echo "<div class='wpm-6310-row'>";
              }
          ?>
              <div class="wpm-6310-col-<?php echo $allStyle[0] ?>">
                <div<?php echo $link_type ?>>
                  <div class="wpm_6310_team_style_05_pic">
                    <img src="<?php echo $value['image'] ?>" alt="<?php echo $value['name'] ?>">
                  </div>
                  <div class="wpm_6310_team_style_05_team_content">
                    <div class="wpm_6310_team_style_05_title"><?php echo $value['name'] ?></div>
                    <div class="wpm_6310_team_style_05_designation"><?php echo $value['designation'] ?></div>
                    <?php
                    if($value['iconids']) {
                    $icons = $wpdb->get_results("SELECT * FROM $icon_table WHERE id in ({$value['iconids']})", ARRAY_A);
                    if ($icons) {
                      $iconUrl = explode("||||", $value['iconurl']);
                      $iconIds = explode(",", $value['iconids']);
                      $iconStyles = "";
                      $c = 0;
                      foreach ($icons as $li) {
                        $index = array_search($li['id'], $iconIds);
                        if ($c == 0) {
                          echo "<ul class='wpm_6310_team_style_05_social'>";
                        }
                        $c++;
                        echo "<li><a " . wpm_6310_external_link($iconUrl[$index]) . " title='{$li['name']}' id='wpm-social-link-{$value['id']}-{$li['id']}'><i class='" . $li['class_name'] . "'></i></a></li>";
                        $iconStyles .= "<style>#wpm-social-link-{$value['id']}-{$li['id']}{border: {$allStyle[28]}px solid {$li['bgcolor']}; background-color: {$li['bgcolor']}; color:{$li['color']};} #wpm-social-link-{$value['id']}-{$li['id']}:hover{color: {$li['bgcolor']}; background-color:{$li['color']};} </style>";
                        if ($c == 4) {
                          break;
                        }
                      }

                      if ($c > 0) {
                        echo "</ul>";
                        echo $iconStyles;
                      }
                    }
                  }
                    ?>
                  </div>
              </div>
        </div>
    <?php
              if ($allStyle[0] == 1) {
                echo "</div>";
              } else if ($col % $allStyle[0] == 0) {
                echo "</div>";
              }
            }
            if (($allStyle[0] > 1) && $col % $allStyle[0] != 0) {
              echo "</div>";
            }
          }
    ?>
      </div>

      <div class="carousel">
        <div id="wpm-6310-slider-<?php echo $styleId ?>" class="wpm-6310-owl-carousel">
          <?php
          if ($members) {
            foreach ($members as $value) {
              if ($value['profile_details_type'] == 1) {
                $link_type = " class='wpm_6310_team_style_05 wpm_6310_team_member_info' link-id='{$value['id']}' link-url='{$value['profile_url']}' target='{$value['open_new_tab']}' team-id='0'";
              } else if ($value['profile_details_type'] == 2) {
                $link_type = " class='wpm_6310_team_style_05 wpm_6310_team_member_info' link-id='0' team-id='{$value['id']}'";
              } else {
                $link_type = " class='wpm_6310_team_style_05' link-id='0' team-id='0'";
              }
          ?>
              <div class="wpm-6310-item">
                <div <?php echo $link_type ?>>
                  <div class="wpm_6310_team_style_05_pic">
                    <img src="<?php echo $value['image'] ?>" alt="<?php echo $value['name'] ?>">
                  </div>
                  <div class="wpm_6310_team_style_05_team_content">
                    <div class="wpm_6310_team_style_05_title"><?php echo $value['name'] ?></div>
                    <div class="wpm_6310_team_style_05_designation"><?php echo $value['designation'] ?></div>
                    <?php
                    if($value['iconids']) {
                    $icons = $wpdb->get_results("SELECT * FROM $icon_table WHERE id in ({$value['iconids']})", ARRAY_A);
                    if ($icons) {
                      $iconUrl = explode("||||", $value['iconurl']);
                      $iconIds = explode(",", $value['iconids']);
                      $iconStyles = "";
                      $c = 0;
                      foreach ($icons as $li) {
                        $index = array_search($li['id'], $iconIds);
                        if ($c == 0) {
                          echo "<ul class='wpm_6310_team_style_05_social'>";
                        }
                        $c++;
                        echo "<li><a " . wpm_6310_external_link($iconUrl[$index]) . " title='{$li['name']}' id='wpm-social-link-{$value['id']}-{$li['id']}'><i class='" . $li['class_name'] . "'></i></a></li>";
                        $iconStyles .= "<style>#wpm-social-link-{$value['id']}-{$li['id']}{border: {$allStyle[28]}px solid {$li['bgcolor']}; background-color: {$li['bgcolor']}; color:{$li['color']};} #wpm-social-link-{$value['id']}-{$li['id']}:hover{color: {$li['bgcolor']}; background-color:{$li['color']};} </style>";
                        if ($c == 4) {
                          break;
                        }
                      }

                      if ($c > 0) {
                        echo "</ul>";
                        echo $iconStyles;
                      }
                    }
                  }
                    ?>
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
    <br />

  </div>
  <div class="wpm-plugin-setting-right">
    <?php wpm_6310_add_new_media($styleId, $member_table, $icon_table, $styledata['memberid']) ?>
  </div>
</div>
</div>
<?php wpm_6310_modal_settings_for_member_description($loading); ?>