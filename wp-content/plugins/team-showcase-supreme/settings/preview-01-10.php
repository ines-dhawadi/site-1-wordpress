<?php
if (!defined('ABSPATH'))
   exit;
if (!current_user_can('edit_others_pages')) {
   wp_die(__('You do not have sufficient permissions to access this page.'));
}

if (!empty($_POST['submit']) && $_POST['submit'] == 'Save' && $_POST['style'] != '') {
   $nonce = $_REQUEST['_wpnonce'];
   if (!wp_verify_nonce($nonce, 'wpm-nonce-field')) {
      die('You do not have sufficient permissions to access this page.');
   } else {
      $slider = "1||4000|true|fas fa-angle|18|10|rgba(0, 0, 0, 0.8)|rgba(255, 255, 255, 1)|rgba(130, 130, 130, 0.81)|rgba(255, 255, 255, 1)|true|18|18|rgba(0, 0, 0, 0.94)|rgba(250, 0, 0, 0.8)|50|3";
      $name = sanitize_text_field($_POST['style_name']);
      $style_name = sanitize_text_field($_POST['style']);

      if ($_POST['style'] == 'template-01') {
         $css = "3||0|0|rgba(255, 0, 0, 1)||nai|rgba(255, 255, 255, 0.96)|0|4|rgba(0, 0, 0, 0.4)|18|rgb(0, 0, 0)|rgb(0, 100, 0)||100|uppercase|Shanti|26|14|rgb(152, 152, 152)|100|capitalize|Shanti|20|rgb(0, 100, 0)|35|35|1||0";
      } else if ($_POST['style'] == 'template-02') {
         $css = "3||0|2|rgba(172, 19, 14, 1)||nai|rgba(51, 52, 62, 1)|0|0|rgba(255, 3, 3, 0.93)|18|rgb(255, 255, 255)|||500|uppercase|Shanti|24|14|rgb(255, 255, 255)|200|capitalize|Shanti|18||35|35|1||0";
      } else if ($_POST['style'] == 'template-03') {
         $css = "3|scale(1.05)|0|0|rgba(255, 0, 0, 1)||nai|rgba(255, 255, 255, 1)|0|2|rgba(43, 42, 42, 0.25)|16|rgb(39, 39, 39)|rgb(0, 100, 0)||600|uppercase|Shanti|22|14|rgb(152, 152, 152)|100|capitalize|Shanti|20|rgb(0, 100, 0)|35|35|1||0";
      } else if ($_POST['style'] == 'template-04') {
         $css = "3||0|0|rgba(29, 124, 207, 1)||nai|rgba(74, 74, 74, 0.65)|0|1|rgba(29, 124, 207, 0.83)|18|rgb(255, 255, 255)|||600|uppercase|Shanti|24|14|rgb(255, 255, 255)|200|capitalize|Shanti|24||35|35|1||1";
      } else if ($_POST['style'] == 'template-05') {
         $css = "3|50%|0|2|rgba(168, 3, 0, 1)||nai|rgba(61, 61, 61, 1)|0|0|rgba(145, 0, 0, 1)|20|rgb(255, 255, 255)|||600|uppercase|Shanti|24|14|rgb(255, 255, 255)|200|capitalize|Shanti|20||35|35|1||1";
      } else if ($_POST['style'] == 'template-06') {
         $css = "3|wpm_6310_eff_nul|0|2|rgba(148, 0, 0, 1)||nai|rgba(25, 25, 25, 0.8)|0|0|rgba(143, 0, 0, 1)|18|rgb(255, 255, 255)|||500|uppercase|Shanti|24|14|rgb(255, 255, 255)|100|capitalize|Shanti|20||35|35|1||0";
      } else if ($_POST['style'] == 'template-07') {
         $css = "3||0|2|rgba(158, 0, 0, 1)||nai|rgba(255, 255, 255, 1)|0|0|rgba(245, 0, 0, 1)|18|rgb(0, 0, 0)|||700|capitalize|Shanti|28|14|rgb(0, 0, 0)|100|capitalize|Shanti|18||35|35|1||1";
      } else if ($_POST['style'] == 'template-08') {
         $css = "3||0|2|rgba(244, 54, 98, 1)||nai|rgba(54, 206, 214, 1)|0|0|rgba(0, 40, 173, 1)|18|rgb(41, 41, 41)|||100|uppercase|Shanti|24|14|rgb(115, 115, 115)|100|capitalize|Shanti|20||35|35|1||0";
      } else if ($_POST['style'] == 'template-09') {
         $css = "3||0|0|rgba(230, 126, 34, 1)||nai|rgba(39, 39, 39, 1)|0|0|rgba(84, 0, 0, 1)|18|rgb(255, 255, 255)|||600|uppercase|Shanti|24|14|rgb(187, 187, 187)|200|capitalize|Shanti|22||35|35|1||10";
      } else if ($_POST['style'] == 'template-10') {
         $css = "3||0|1|rgba(235, 97, 82, 0.89)||nai|rgba(255, 255, 255, 1)|0|0|rgba(235, 97, 82, 0.89)|18|rgb(38, 38, 38)|||normal|uppercase|Shanti|24|14|rgb(234, 97, 83)|200|capitalize|Shanti|20||35|35|1||1";
      }

      $members = $wpdb->get_results('SELECT * FROM ' . $member_table . ' ORDER BY name ASC', ARRAY_A);
      $membersId = "";
      foreach ($members as $member) {
         if ($membersId) {
            $membersId .= ",";
         }
         $membersId .= $member['id'];
      }

      $wpdb->query($wpdb->prepare("INSERT INTO {$style_table} (name, style_name, css, slider, memberid) VALUES ( %s, %s, %s, %s, %s )", array($name, $style_name, $css, $slider,  $membersId)));
      $redirect_id = $wpdb->insert_id;

      if ($redirect_id == 0) {
         $url = admin_url("admin.php?page=wpm-team-showcase");
      } else if ($redirect_id != 0) {
         $url = admin_url("admin.php?page=wpm-template-01-10&styleid=$redirect_id");
      }
      echo '<script type="text/javascript"> document.location.href = "' . $url . '"; </script>';
      exit;
   }
}

$arr = array(
  'https://www.wpmart.org/wp-content/uploads/2020/04/1.jpg',
  'https://www.wpmart.org/wp-content/uploads/2020/04/2.jpg',
  'https://www.wpmart.org/wp-content/uploads/2020/04/3.jpg',
  'https://www.wpmart.org/wp-content/uploads/2020/04/4.jpg',
  'https://www.wpmart.org/wp-content/uploads/2020/04/5.jpg'
);

$icons = array(
   '<li><a href="https://www.linkedin.com" class="open_in_new_tab_class wpm-social-link-linkedin" title="Linkedin" target="_blank" id=""><i class="fab fa-linkedin-in"></i></a></li>',
   '<li><a href="https://www.facebook.com" class="open_in_new_tab_class wpm-social-link-facebook" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>',
   '<li><a href="https://www.youtube.com" class="open_in_new_tab_class wpm-social-link-youtube" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a></li>',
   '<li><a href="https://www.twitter.com" class="open_in_new_tab_class wpm-social-link-twitter" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>',
   '<li><a href="https://www.google.com" class="open_in_new_tab_class wpm-social-link-google" title="Google Plus" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>',
   '<li><a href="https://www.pinterest.com" class="open_in_new_tab_class wpm-social-link-pinterest" title="Pinterest" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>',
   '<li><a href="https://www.whatsapp.com" class="open_in_new_tab_class wpm-social-link-whatsapp" title="Whatsapp" target="_blank"><i class="fab fa-whatsapp"></i></a></li>'
);
?>
<div class="wpm-6310">
  <h1>Select Template</h1>
  <?php shuffle($arr); ?>
  <div class="wpm-6310-row wpm-6310_team-style-boxed">
    <div class="wpm-padding-15">
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_01">
          <img src="<?php echo $arr[0] ?>" class="wpm-image-responsive" alt="Team Showcase">
          <figcaption>
            <div class="wpm_6310_team_style_01_caption">
              <div class="wpm_6310_team_style_01_designation">Web Developer</div>
              <div class="wpm_6310_team_style_01_title">Adam Smith</div>
              <ul class="wpm_6310_team_style_01_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 4; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </figcaption>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_01">
          <img src="<?php echo $arr[1] ?>" class="wpm-image-responsive" alt="Team Showcase">
          <figcaption>
            <div class="wpm_6310_team_style_01_caption">
              <div class="wpm_6310_team_style_01_designation">Web Developer</div>
              <div class="wpm_6310_team_style_01_title">Adam Smith</div>
              <ul class="wpm_6310_team_style_01_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 4; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </figcaption>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_01">
          <img src="<?php echo $arr[2] ?>" class="wpm-image-responsive" alt="Team Showcase">
          <figcaption>
            <div class="wpm_6310_team_style_01_caption">
              <div class="wpm_6310_team_style_01_designation">Web Developer</div>
              <div class="wpm_6310_team_style_01_title">Adam Smith</div>
              <ul class="wpm_6310_team_style_01_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 4; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </figcaption>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_01">
          <img src="<?php echo $arr[3] ?>" class="wpm-image-responsive" alt="Team Showcase">
          <figcaption>
            <div class="wpm_6310_team_style_01_caption">
              <div class="wpm_6310_team_style_01_designation">Web Developer</div>
              <div class="wpm_6310_team_style_01_title">Adam Smith</div>
              <ul class="wpm_6310_team_style_01_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 4; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </figcaption>
        </div>
      </div>
    </div>
    <div class="wpm-6310-template-list">
      Template 1 <small>(Single Effect)</small>
      <button type="button" class="wpm-btn-success wpm_choosen_style" id="template-01">Create Team</button>
    </div>
    <br class="wpm-6310-clear" />
  </div>

  <?php shuffle($arr); ?>
  <div class="wpm-6310-row wpm-6310_team-style-boxed">
    <div class="wpm-padding-15">
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_02">
          <div class="wpm_6310_team_style_02_pic">
            <img src="<?php echo $arr[0] ?>" alt="Team Showcase">
          </div>
          <div class="wpm_6310_team_style_02_team_content">
            <div class="wpm_6310_team_style_02_title">Mildred Martin</div>
            <div class="wpm_6310_team_style_02_designation">Sales Agent</div>
            <ul class="wpm_6310_team_style_02_social">
              <?php
                     shuffle($icons);
                     for ($i = 0; $i < 4; $i++) {
                        echo $icons[$i];
                     }
                     ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_02">
          <div class="wpm_6310_team_style_02_pic">
            <img src="<?php echo $arr[1] ?>" alt="Team Showcase">
          </div>
          <div class="wpm_6310_team_style_02_team_content">
            <div class="wpm_6310_team_style_02_title">Mildred Martin</div>
            <div class="wpm_6310_team_style_02_designation">Sales Agent</div>
            <ul class="wpm_6310_team_style_02_social">
              <?php
                     shuffle($icons);
                     for ($i = 0; $i < 4; $i++) {
                        echo $icons[$i];
                     }
                     ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_02">
          <div class="wpm_6310_team_style_02_pic">
            <img src="<?php echo $arr[2] ?>" alt="Team Showcase">
          </div>
          <div class="wpm_6310_team_style_02_team_content">
            <div class="wpm_6310_team_style_02_title">Mildred Martin</div>
            <div class="wpm_6310_team_style_02_designation">Sales Agent</div>
            <ul class="wpm_6310_team_style_02_social">
              <?php
                     shuffle($icons);
                     for ($i = 0; $i < 4; $i++) {
                        echo $icons[$i];
                     }
                     ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_02">
          <div class="wpm_6310_team_style_02_pic">
            <img src="<?php echo $arr[3] ?>" alt="Team Showcase">
          </div>
          <div class="wpm_6310_team_style_02_team_content">
            <div class="wpm_6310_team_style_02_title">Mildred Martin</div>
            <div class="wpm_6310_team_style_02_designation">Sales Agent</div>
            <ul class="wpm_6310_team_style_02_social">
              <?php
                     shuffle($icons);
                     for ($i = 0; $i < 4; $i++) {
                        echo $icons[$i];
                     }
                     ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="wpm-6310-template-list">
      Template 2 <small>(3 Effects)</small>
      <button type="button" class="wpm-btn-success wpm_choosen_style" id="template-02">Create Team</button>
    </div>
    <br class="wpm-6310-clear" />
  </div>

  <?php shuffle($arr); ?>
  <div class="wpm-6310-row wpm-6310_team-style-boxed">
    <div class="wpm-padding-15">
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_03">
          <img src="<?php echo $arr[0] ?>" class="wpm-image-responsive" alt="Team Showcase">
          <figcaption>
            <div class="wpm_6310_team_style_03_caption">
              <div class="wpm_6310_team_style_03_designation">Web Developer</div>
              <div class="wpm_6310_team_style_03_title">Adam Smith</div>
              <ul class="wpm_6310_team_style_03_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 4; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </figcaption>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_03">
          <img src="<?php echo $arr[1] ?>" class="wpm-image-responsive" alt="Team Showcase">
          <figcaption>
            <div class="wpm_6310_team_style_03_caption">
              <div class="wpm_6310_team_style_03_designation">Web Developer</div>
              <div class="wpm_6310_team_style_03_title">Adam Smith</div>
              <ul class="wpm_6310_team_style_03_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 4; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </figcaption>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_03">
          <img src="<?php echo $arr[2] ?>" class="wpm-image-responsive" alt="Team Showcase">
          <figcaption>
            <div class="wpm_6310_team_style_03_caption">
              <div class="wpm_6310_team_style_03_designation">Web Developer</div>
              <div class="wpm_6310_team_style_03_title">Adam Smith</div>
              <ul class="wpm_6310_team_style_03_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 4; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </figcaption>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_03">
          <img src="<?php echo $arr[3] ?>" class="wpm-image-responsive" alt="Team Showcase">
          <figcaption>
            <div class="wpm_6310_team_style_03_caption">
              <div class="wpm_6310_team_style_03_designation">Web Developer</div>
              <div class="wpm_6310_team_style_03_title">Adam Smith</div>
              <ul class="wpm_6310_team_style_03_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 4; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </figcaption>
        </div>
      </div>
    </div>
    <div class="wpm-6310-template-list">
      Template 3 <small>(3 Effects)</small>
      <button type="button" class="wpm-btn-success wpm_choosen_style" id="template-03">Create Team</button>
    </div>
    <br class="wpm-6310-clear" />
  </div>

  <?php shuffle($arr); ?>
  <div class="wpm-6310-row wpm-6310_team-style-boxed">
    <div class="wpm-padding-15">
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_04">
          <img src="<?php echo $arr[0] ?>" class="wpm-image-responsive" alt="Team Showcase">
          <figcaption>
            <div class="wpm_6310_team_style_04_caption">
              <div class="wpm_6310_team_style_04_designation">CEO</div>
              <div class="wpm_6310_team_style_04_title">Adam Smith</div>
              <ul class="wpm_6310_team_style_04_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 4; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </figcaption>
          <div class="wpm_6310_team_style_04_overlay"></div>
          <div class="wpm_6310_team_style_04_icon">
            <i class="fas fa-plus-circle"></i>
          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_04">
          <img src="<?php echo $arr[1] ?>" class="wpm-image-responsive" alt="Team Showcase">
          <figcaption>
            <div class="wpm_6310_team_style_04_caption">
              <div class="wpm_6310_team_style_04_designation">Sales Agent</div>
              <div class="wpm_6310_team_style_04_title">Adam Smith</div>
              <ul class="wpm_6310_team_style_04_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 4; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </figcaption>
          <div class="wpm_6310_team_style_04_overlay"></div>
          <div class="wpm_6310_team_style_04_icon">
            <i class="fas fa-plus-circle"></i>
          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_04">
          <img src="<?php echo $arr[2] ?>" class="wpm-image-responsive" alt="Team Showcase">
          <figcaption>
            <div class="wpm_6310_team_style_04_caption">
              <div class="wpm_6310_team_style_04_designation">Support Manager</div>
              <div class="wpm_6310_team_style_04_title">Adam Smith</div>
              <ul class="wpm_6310_team_style_04_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 4; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </figcaption>
          <div class="wpm_6310_team_style_04_overlay"></div>
          <div class="wpm_6310_team_style_04_icon">
            <i class="fas fa-plus-circle"></i>
          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_04">
          <img src="<?php echo $arr[3] ?>" class="wpm-image-responsive" alt="Team Showcase">
          <figcaption>
            <div class="wpm_6310_team_style_04_caption">
              <div class="wpm_6310_team_style_04_designation">Web Designer</div>
              <div class="wpm_6310_team_style_04_title">Adam Smith</div>
              <ul class="wpm_6310_team_style_04_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 4; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </figcaption>
          <div class="wpm_6310_team_style_04_overlay"></div>
          <div class="wpm_6310_team_style_04_icon">
            <i class="fas fa-plus-circle"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="wpm-6310-template-list">
      Template 4 <small>(Single Effect)</small>
      <button type="button" class="wpm-btn-success wpm_choosen_style" id="template-04">Create Team</button>
    </div>
    <br class="wpm-6310-clear" />
  </div>

  <?php shuffle($arr); ?>
  <div class="wpm-6310-row wpm-6310_team-style-boxed">
    <div class="wpm-padding-15">
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_05">
          <div class="wpm_6310_team_style_05_pic">
            <img src="<?php echo $arr[0] ?>" alt="Team Showcase">
          </div>
          <div class="wpm_6310_team_style_05_team_content">
            <div class="wpm_6310_team_style_05_title">Mildred Martin</div>
            <div class="wpm_6310_team_style_05_designation">Sales Agent</div>
            <ul class="wpm_6310_team_style_05_social">
              <?php
                     shuffle($icons);
                     for ($i = 0; $i < 4; $i++) {
                        echo $icons[$i];
                     }
                     ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_05">
          <div class="wpm_6310_team_style_05_pic">
            <img src="<?php echo $arr[1] ?>" alt="Team Showcase">
          </div>
          <div class="wpm_6310_team_style_05_team_content">
            <div class="wpm_6310_team_style_05_title">Mildred Martin</div>
            <div class="wpm_6310_team_style_05_designation">Sales Agent</div>
            <ul class="wpm_6310_team_style_05_social">
              <?php
                     shuffle($icons);
                     for ($i = 0; $i < 4; $i++) {
                        echo $icons[$i];
                     }
                     ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_05">
          <div class="wpm_6310_team_style_05_pic">
            <img src="<?php echo $arr[2] ?>" alt="Team Showcase">
          </div>
          <div class="wpm_6310_team_style_05_team_content">
            <div class="wpm_6310_team_style_05_title">Mildred Martin</div>
            <div class="wpm_6310_team_style_05_designation">Sales Agent</div>
            <ul class="wpm_6310_team_style_05_social">
              <?php
                     shuffle($icons);
                     for ($i = 0; $i < 4; $i++) {
                        echo $icons[$i];
                     }
                     ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_05">
          <div class="wpm_6310_team_style_05_pic">
            <img src="<?php echo $arr[3] ?>" alt="Team Showcase">
          </div>
          <div class="wpm_6310_team_style_05_team_content">
            <div class="wpm_6310_team_style_05_title">Mildred Martin</div>
            <div class="wpm_6310_team_style_05_designation">Sales Agent</div>
            <ul class="wpm_6310_team_style_05_social">
              <?php
                     shuffle($icons);
                     for ($i = 0; $i < 4; $i++) {
                        echo $icons[$i];
                     }
                     ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="wpm-6310-template-list">
      Template 5 <small>(3 Effects)</small>
      <button type="button" class="wpm-btn-success wpm_choosen_style" id="template-05">Create Team</button>
    </div>
    <br class="wpm-6310-clear" />
  </div>

  <?php shuffle($arr); ?>
  <div class="wpm-6310-row wpm-6310_team-style-boxed">
    <div class="wpm-padding-15">
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_06">
          <div class="wpm_6310_team_style_06_pic">
            <img src="<?php echo $arr[0] ?>" class="img-responsive" alt="team showcase supreme">
            <figcaption>
              <div class="wpm_6310_team_style_06_content">
                <div class="wpm_6310_team_style_06_designation">Marketing Head</div>
                <div class="wpm_6310_team_style_06_title">Connor Charles</div>
                <ul class="wpm_6310_team_style_06_social">
                  <?php
                           shuffle($icons);
                           for ($i = 0; $i < 4; $i++) {
                              echo $icons[$i];
                           }
                           ?>
                </ul>
              </div>
            </figcaption>
          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_06">
          <div class="wpm_6310_team_style_06_pic">
            <img src="<?php echo $arr[1] ?>" class="img-responsive wpm_6310_team_style_06_top_right"
              alt="team showcase supreme">
            <figcaption>
              <div class="wpm_6310_team_style_06_content">
                <div class="wpm_6310_team_style_06_designation">Marketing Head</div>
                <div class="wpm_6310_team_style_06_title">Connor Charles</div>
                <ul class="wpm_6310_team_style_06_social">
                  <?php
                           shuffle($icons);
                           for ($i = 0; $i < 4; $i++) {
                              echo $icons[$i];
                           }
                           ?>
                </ul>
              </div>
            </figcaption>
          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_06">
          <div class="wpm_6310_team_style_06_pic">
            <img src="<?php echo $arr[2] ?>" class="img-responsive wpm_6310_team_style_06_top_left"
              alt="team showcase supreme">
            <figcaption>
              <div class="wpm_6310_team_style_06_content">
                <div class="wpm_6310_team_style_06_designation">Marketing Head</div>
                <div class="wpm_6310_team_style_06_title">Connor Charles</div>
                <ul class="wpm_6310_team_style_06_social">
                  <?php
                           shuffle($icons);
                           for ($i = 0; $i < 4; $i++) {
                              echo $icons[$i];
                           }
                           ?>
                </ul>
              </div>
            </figcaption>
          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_06">
          <div class="wpm_6310_team_style_06_pic">
            <img src="<?php echo $arr[3] ?>" class="img-responsive wpm_6310_team_style_06_bottom_left"
              alt="team showcase supreme">
            <figcaption>
              <div class="wpm_6310_team_style_06_content">
                <div class="wpm_6310_team_style_06_designation">Marketing Head</div>
                <div class="wpm_6310_team_style_06_title">Connor Charles</div>
                <ul class="wpm_6310_team_style_06_social">
                  <?php
                           shuffle($icons);
                           for ($i = 0; $i < 4; $i++) {
                              echo $icons[$i];
                           }
                           ?>
                </ul>
              </div>
            </figcaption>
          </div>
        </div>
      </div>
    </div>
    <div class="wpm-6310-template-list">
      Template 6 <small>(11 Effects)</small>
      <button type="button" class="wpm-btn-success wpm_choosen_style" id="template-06">Create Team</button>
    </div>
    <br class="wpm-6310-clear" />
  </div>

  <?php shuffle($arr); ?>
  <div class="wpm-6310-row wpm-6310_team-style-boxed">
    <div class="wpm-padding-15">
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_07">
          <img src="<?php echo $arr[0] ?>" class="img-responsive" alt="team showcase supreme">
          <figcaption>
            <div class="wpm_6310_team_style_07_content">
              <div class="wpm_6310_team_style_07_title">Connor Charles</div>
              <div class="wpm_6310_team_style_07_designation">Marketing Head</div>
              <ul class="wpm_6310_team_style_07_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 3; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </figcaption>

        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_07">
          <img src="<?php echo $arr[1] ?>" class="img-responsive" alt="team showcase supreme">
          <figcaption>
            <div class="wpm_6310_team_style_07_content">
              <div class="wpm_6310_team_style_07_title">Connor Charles</div>
              <div class="wpm_6310_team_style_07_designation">Marketing Head</div>
              <ul class="wpm_6310_team_style_07_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 3; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </figcaption>

        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_07">
          <img src="<?php echo $arr[2] ?>" class="img-responsive" alt="team showcase supreme">
          <figcaption>
            <div class="wpm_6310_team_style_07_content">
              <div class="wpm_6310_team_style_07_title">Connor Charles</div>
              <div class="wpm_6310_team_style_07_designation">Marketing Head</div>
              <ul class="wpm_6310_team_style_07_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 3; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </figcaption>

        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_07">
          <img src="<?php echo $arr[3] ?>" class="img-responsive" alt="team showcase supreme">
          <figcaption>
            <div class="wpm_6310_team_style_07_content">
              <div class="wpm_6310_team_style_07_title">Connor Charles</div>
              <div class="wpm_6310_team_style_07_designation">Marketing Head</div>
              <ul class="wpm_6310_team_style_07_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 3; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </figcaption>

        </div>
      </div>
    </div>
    <div class="wpm-6310-template-list">
      Template 7 <small>(Single Effect)</small>
      <button type="button" class="wpm-btn-success wpm_choosen_style" id="template-07">Create Team</button>
    </div>
    <br class="wpm-6310-clear" />
  </div>

  <?php shuffle($arr); ?>
  <div class="wpm-6310-row wpm-6310_team-style-boxed">
    <div class="wpm-padding-15">
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_08">
          <div class="wpm_6310_team_style_08_pic">
            <img src="<?php echo $arr[0] ?>" alt="Team Showcase">
          </div>

          <div class="wpm_6310_team_style_08_team_content">
            <div class="wpm_6310_team_style_08_title">JHON</div>
            <div class="wpm_6310_team_style_08_border"></div>
            <div class="wpm_6310_team_style_08_designation">Web Desginer</div>
            <ul class="wpm_6310_team_style_08_social">
              <?php
                     shuffle($icons);
                     for ($i = 0; $i < 4; $i++) {
                        echo $icons[$i];
                     }
                     ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_08">
          <div class="wpm_6310_team_style_08_pic">
            <img src="<?php echo $arr[1] ?>" alt="Team Showcase">
          </div>

          <div class="wpm_6310_team_style_08_team_content">
            <div class="wpm_6310_team_style_08_title">JHON</div>
            <div class="wpm_6310_team_style_08_border"></div>
            <div class="wpm_6310_team_style_08_designation">Web Desginer</div>
            <ul class="wpm_6310_team_style_08_social">
              <?php
                     shuffle($icons);
                     for ($i = 0; $i < 4; $i++) {
                        echo $icons[$i];
                     }
                     ?>
            </ul>

          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_08">
          <div class="wpm_6310_team_style_08_pic">
            <img src="<?php echo $arr[2] ?>" alt="Team Showcase">
          </div>

          <div class="wpm_6310_team_style_08_team_content">
            <div class="wpm_6310_team_style_08_title">JHON</div>
            <div class="wpm_6310_team_style_08_border"></div>
            <div class="wpm_6310_team_style_08_designation">Web Desginer</div>
            <ul class="wpm_6310_team_style_08_social">
              <?php
                     shuffle($icons);
                     for ($i = 0; $i < 4; $i++) {
                        echo $icons[$i];
                     }
                     ?>
            </ul>

          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_08">
          <div class="wpm_6310_team_style_08_pic">
            <img src="<?php echo $arr[3] ?>" alt="Team Showcase">
          </div>

          <div class="wpm_6310_team_style_08_team_content">
            <div class="wpm_6310_team_style_08_title">JHON</div>
            <div class="wpm_6310_team_style_08_border"></div>
            <div class="wpm_6310_team_style_08_designation">Web Desginer</div>
            <ul class="wpm_6310_team_style_08_social">
              <?php
                     shuffle($icons);
                     for ($i = 0; $i < 4; $i++) {
                        echo $icons[$i];
                     }
                     ?>
            </ul>

          </div>
        </div>
      </div>
    </div>
    <div class="wpm-6310-template-list">
      Template 8 <small>(Single Effect)</small>
      <button type="button" class="wpm-btn-success wpm_choosen_style" id="template-08">Create Team</button>
    </div>
    <br class="wpm-6310-clear" />
  </div>

  <?php shuffle($arr); ?>
  <div class="wpm-6310-row wpm-6310_team-style-boxed">
    <div class="wpm-padding-15">
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_09">
          <div class="wpm_6310_team_style_09_pic">
            <img src="<?php echo $arr[0] ?>" alt="Team Showcase">
          </div>

          <div class="wpm_6310_team_style_09_team_content">
            <div class="wpm_6310_team_style_09_title">Mildred Martin</div>
            <div class="wpm_6310_team_style_09_designation">Sales Agent</div>
            <p class="wpm_6310_team_style_09_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Mauris.</p>
            <ul class="wpm_6310_team_style_09_social">
              <?php
                     shuffle($icons);
                     for ($i = 0; $i < 4; $i++) {
                        echo $icons[$i];
                     }
                     ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_09">
          <div class="wpm_6310_team_style_09_pic">
            <img src="<?php echo $arr[1] ?>" alt="Team Showcase">
          </div>

          <div class="wpm_6310_team_style_09_team_content">
            <div class="wpm_6310_team_style_09_title">Mildred Martin</div>
            <div class="wpm_6310_team_style_09_designation">Sales Agent</div>
            <p class="wpm_6310_team_style_09_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Mauris.</p>
            <ul class="wpm_6310_team_style_09_social">
              <?php
                     shuffle($icons);
                     for ($i = 0; $i < 4; $i++) {
                        echo $icons[$i];
                     }
                     ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_09">
          <div class="wpm_6310_team_style_09_pic">
            <img src="<?php echo $arr[2] ?>" alt="Team Showcase">
          </div>

          <div class="wpm_6310_team_style_09_team_content">
            <div class="wpm_6310_team_style_09_title">Mildred Martin</div>
            <div class="wpm_6310_team_style_09_designation">Sales Agent</div>
            <p class="wpm_6310_team_style_09_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Mauris.</p>
            <ul class="wpm_6310_team_style_09_social">
              <?php
                     shuffle($icons);
                     for ($i = 0; $i < 4; $i++) {
                        echo $icons[$i];
                     }
                     ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_09">
          <div class="wpm_6310_team_style_09_pic">
            <img src="<?php echo $arr[3] ?>" alt="Team Showcase">
          </div>
          <div class="wpm_6310_team_style_09_team_content">
            <div class="wpm_6310_team_style_09_title">Mildred Martin</div>
            <div class="wpm_6310_team_style_09_designation">Sales Agent</div>
            <p class="wpm_6310_team_style_09_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Mauris.</p>
            <ul class="wpm_6310_team_style_09_social">
              <?php
                     shuffle($icons);
                     for ($i = 0; $i < 4; $i++) {
                        echo $icons[$i];
                     }
                     ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="wpm-6310-template-list">
      Template 9 <small>(Single Effect)</small>
      <button type="button" class="wpm-btn-success wpm_choosen_style" id="template-09">Create Team</button>
    </div>
    <br class="wpm-6310-clear" />
  </div>

  <?php shuffle($arr); ?>
  <div class="wpm-6310-row wpm-6310_team-style-boxed">
    <div class="wpm-padding-15">
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_10">
          <div class="wpm_6310_team_style_10_pic">
            <img src="<?php echo $arr[0] ?>" alt="Team Showcase">
            <div class="wpm_6310_team_style_10_social_team">
              <ul class="wpm_6310_team_style_10_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 4; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </div>
          <div class="wpm_6310_team_style_10_team_content">
            <div class="wpm_6310_team_style_10_title">
              Adam Smith
            </div>
            <div class="wpm_6312_team_style_10_designation">Web Desginer</div>
          </div>
        </div>

      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_10">
          <div class="wpm_6310_team_style_10_pic">
            <img src="<?php echo $arr[1] ?>" alt="Team Showcase">
            <div class="wpm_6310_team_style_10_social_team">
              <ul class="wpm_6310_team_style_10_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 4; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </div>
          <div class="wpm_6310_team_style_10_team_content">
            <div class="wpm_6310_team_style_10_title">
              Adam Smith
            </div>
            <div class="wpm_6312_team_style_10_designation">Web Developer</div>
          </div>
        </div>

      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_10">
          <div class="wpm_6310_team_style_10_pic">
            <img src="<?php echo $arr[2] ?>" alt="Team Showcase">
            <div class="wpm_6310_team_style_10_social_team">
              <ul class="wpm_6310_team_style_10_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 4; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </div>
          <div class="wpm_6310_team_style_10_team_content">
            <div class="wpm_6310_team_style_10_title">
              Adam Smith
            </div>
            <div class="wpm_6312_team_style_10_designation">SEO Expert</div>
          </div>
        </div>

      </div>
      <div class="wpm-6310-col-4">
        <div class="wpm_6310_team_style_10">
          <div class="wpm_6310_team_style_10_pic">
            <img src="<?php echo $arr[3] ?>" alt="Team Showcase">
            <div class="wpm_6310_team_style_10_social_team">
              <ul class="wpm_6310_team_style_10_social">
                <?php
                        shuffle($icons);
                        for ($i = 0; $i < 4; $i++) {
                           echo $icons[$i];
                        }
                        ?>
              </ul>
            </div>
          </div>
          <div class="wpm_6310_team_style_10_team_content">
            <div class="wpm_6310_team_style_10_title">
              Adam Smith
            </div>
            <div class="wpm_6312_team_style_10_designation">Senior Analyst</div>
          </div>
        </div>
      </div>
    </div>
    <div class="wpm-6310-template-list">
      Template 10 <small>(Single Effect)</small>
      <button type="button" class="wpm-btn-success wpm_choosen_style" id="template-10">Create Team</button>
    </div>
    <br class="wpm-6310-clear" />
  </div>
</div>

<div id="wpm-6310-modal-add" class="wpm-6310-modal" style="display: none">
  <div class="wpm-6310-modal-content wpm-6310-modal-sm">
    <form action="" method="post">
      <div class="wpm-6310-modal-header">
        Create Team
        <div class="wpm-6310-close">&times;</div>
      </div>
      <div class="wpm-6310-modal-body-form">
        <?php wp_nonce_field("wpm-nonce-field") ?>
        <input type="hidden" name="style" id="wpm-style-hidden" />
        <table border="0" width="100%" cellpadding="10" cellspacing="0">
          <tr>
            <td width="90"><label class="wpm-form-label" for="icon_name">Team Name:</label></td>
            <td><input type="text" required="" name="style_name" id="style_name" value="" class="wpm-form-input"
                placeholder="Team Name" style="width: 265px" /></td>
          </tr>
        </table>
      </div>
      <div class="wpm-6310-modal-form-footer">
        <button type="button" name="close" class="wpm-btn-danger wpm-pull-right">Close</button>
        <input type="submit" name="submit" class="wpm-btn-primary wpm-pull-right wpm-margin-right-10" value="Save" />
      </div>
    </form>
    <br class="wpm-6310-clear" />
  </div>
</div>

<script>
jQuery(document).ready(function() {
  jQuery("body").on("click", ".wpm_choosen_style", function() {
    jQuery("#wpm-6310-modal-add").fadeIn(500);
    jQuery("#wpm-style-hidden").val(jQuery(this).attr("id"));
    jQuery("body").css({
      "overflow": "hidden"
    });
    return false;
  });

  jQuery("body").on("click", ".wpm-6310-close, .wpm-btn-danger", function() {
    jQuery("#wpm-6310-modal-add").fadeOut(500);
    jQuery("body").css({
      "overflow": "initial"
    });
  });
  jQuery(window).click(function(event) {
    if (event.target == document.getElementById('wpm-6310-modal-add')) {
      jQuery("#wpm-6310-modal-add").fadeOut(500);
      jQuery("body").css({
        "overflow": "initial"
      });
    }
  });
});
</script>