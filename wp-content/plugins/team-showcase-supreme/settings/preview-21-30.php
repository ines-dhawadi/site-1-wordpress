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

    if ($_POST['style'] == 'template-21') {
      $css = "4||12|2|rgba(245, 203, 147, 1)||nai|rgba(165, 42, 42, 1)|0|0|rgba(51, 51, 51, 1)|20|rgb(255, 255, 255)|||normal|uppercase|Shanti|26|14|rgb(255, 255, 255)|200|capitalize|Shanti|24||35|35|1||0";
    } else if ($_POST['style'] == 'template-22') {
      $css = "4||0|0|rgba(153, 24, 20, 1)||nai|rgba(243, 144, 77, 0.7)|0|0|rgba(36, 36, 36, 0.93)|20|rgb(44, 60, 201)|||700|capitalize|Shanti|25|15|rgb(31, 128, 26)|200|capitalize|Shanti|20||35|35|2||10";
    } else if ($_POST['style'] == 'template-23') {
      $css = "4||0|0|rgba(0, 0, 0, 0.4)||nai|rgba(203, 86, 93, 1)|||rgba(207, 0, 0, 1)|24||||700|capitalize|Anton||16|rgb(255, 255, 255)|800|capitalize|Shanti|25||35|35|0||15";
    } else if ($_POST['style'] == 'template-24') {
      $css = "4||0|0|rgba(42, 193, 235, 1)||nai|rgba(43, 193, 234, 0.6)|0|4|rgba(43, 193, 234, 0.6)|20|rgb(0, 0, 0)|||700|capitalize|Shanti|26|14|rgb(0, 0, 0)|200|capitalize|Shanti|24||35|35|1||10";
    } else if ($_POST['style'] == 'template-25') {
      $css = "4||0|0|rgba(194, 177, 177, 1)||nai|rgba(61, 61, 61, 1)|0|0|rgba(36, 36, 36, 0.93)|20|rgb(10, 1, 1)|||bold|capitalize|Shanti|25|14|rgb(8, 0, 0)|800|capitalize|Shanti|20||35|35|1||0";
    } else if ($_POST['style'] == 'template-26') {
      $css = "4||0|1|rgba(255, 102, 76, 1)||nai|rgba(97, 52, 71, 1)|0|0|rgba(237, 224, 190, 1)|20|rgb(94, 52, 72)|||700|capitalize|Shanti|20|14|rgb(251, 102, 72)|100|capitalize|Shanti|20||35|35|2||10";
    } else if ($_POST['style'] == 'template-27') {
      $css = "4||0|0|rgba(0, 0, 0, 0.4)||nai|rgba(203, 86, 93, 1)|||rgba(207, 0, 0, 1)|20|rgb(255, 255, 255)|||700|capitalize|Shanti|23|14|rgb(255, 255, 255)|300|capitalize|Shanti|18||35|35|0||15";
    } else if ($_POST['style'] == 'template-28') {
      $css = "4||0|0|rgba(222, 51, 51, 0.7)||nai|rgba(216, 52, 60, 1)|1|3|rgba(191, 115, 112, 0.7)|20|rgb(255, 255, 255)|||600|capitalize|Shanti|26|14|rgb(255, 255, 255)|200|capitalize|Shanti|24||36|36|1||1";
    } else if ($_POST['style'] == 'template-29') {
      $css = "4||0|3|rgba(0, 153, 153, 1)||nai|rgba(35, 148, 120, 0.47)|0|0|rgba(43, 146, 148, 1)|20|rgb(255, 255, 255)|||600|uppercase|Shanti|24|13|rgb(255, 255, 255)|300|capitalize|Shanti|18||35|35|0||20";
    } else if ($_POST['style'] == 'template-30') {
      $css = "4||0|0|rgba(0, 131, 224, 0.9)||nai|rgb(255, 255, 255)|0|0|rgb(255, 193, 7)|20|rgb(230, 28, 21)|||600|uppercase|Shanti|28|14|rgb(22, 82, 16)|200|capitalize|Shanti|20||28|28|0||5";
    }

    $wpdb->query($wpdb->prepare("INSERT INTO {$style_table} (name, style_name, css, slider) VALUES ( %s, %s, %s, %s )", array($name, $style_name, $css, $slider)));
    $redirect_id = $wpdb->insert_id;

    if ($redirect_id == 0) {
      $url = admin_url("admin.php?page=wpm-team-showcase");
    } else if ($redirect_id != 0) {
      $url = admin_url("admin.php?page=wpm-template-21-30&styleid=$redirect_id");
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
  '<li><a href="https://www.whatsapp.com" class="open_in_new_tab_class wpm-social-link-whatsapp" title="Whatsapp" target="_blank"><i class="fab fa-whatsapp"></i></a></li>');
  ?>
  <div class="wpm-6310">
    <h1>Select Template</h1>

    <?php shuffle($arr); ?>
    <div class="wpm-6310-row wpm-6310_team-style-boxed">
      <div class="wpm-padding-15">
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_21">
            <div class="wpm_6310_team_style_21_pic">
              <img src="<?php echo $arr[0] ?>" alt="Team Showcase">
            </div>
            <div class="wpm_6310_team_style_21_team_content">
              <div class="wpm_6310_team_style_21_title">William</div>
              <div class="wpm_6310_team_style_21_designation">Web Desginer</div>
              <ul class="wpm_6310_team_style_21_social">
                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                <li><a href=""><i class="fab fa-youtube"></i></a></li>
                <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
              </ul>
            </div>

          </div>

        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_21">
            <div class="wpm_6310_team_style_21_pic">
              <img src="<?php echo $arr[1] ?>" alt="Team Showcase">
            </div>
            <div class="wpm_6310_team_style_21_team_content">
              <div class="wpm_6310_team_style_21_title">William</div>
              <div class="wpm_6310_team_style_21_designation">Web Desginer</div>
              <ul class="wpm_6310_team_style_21_social">
                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                <li><a href=""><i class="fab fa-youtube"></i></a></li>
                <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
              </ul>
            </div>

          </div>

        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_21">
            <div class="wpm_6310_team_style_21_pic">
              <img src="<?php echo $arr[2] ?>" alt="Team Showcase">
            </div>
            <div class="wpm_6310_team_style_21_team_content">
              <div class="wpm_6310_team_style_21_title">William</div>
              <div class="wpm_6310_team_style_21_designation">Web Desginer</div>
              <ul class="wpm_6310_team_style_21_social">
                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                <li><a href=""><i class="fab fa-youtube"></i></a></li>
                <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
              </ul>
            </div>

          </div>

        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_21">
            <div class="wpm_6310_team_style_21_pic">
              <img src="<?php echo $arr[3] ?>" alt="Team Showcase">
            </div>
            <div class="wpm_6310_team_style_21_team_content">
              <div class="wpm_6310_team_style_21_title">William</div>
              <div class="wpm_6310_team_style_21_designation">Web Desginer</div>
              <ul class="wpm_6310_team_style_21_social">
                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                <li><a href=""><i class="fab fa-youtube"></i></a></li>
                <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
              </ul>
            </div>

          </div>

        </div>
      </div>
      <div class="wpm-6310-template-list">
        Template 21
        <button type="button" class="wpm-btn-danger wpm-pull-right wpm-margin-right-15">Pro Only</button>
      </div>
      <br class="wpm-6310-clear" />
    </div>

    <?php shuffle($arr); ?>
    <div class="wpm-6310-row wpm-6310_team-style-boxed">
      <div class="wpm-padding-15">
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_22">
            <div class="wpm_6310_team_style_22_pic">
              <img src="<?php echo $arr[0] ?>" alt="Team Showcase">
              <ul class="wpm_6310_team_style_22_social">
                <?php
                shuffle($icons);
                for ($i = 0; $i < 4; $i++) {
                  echo $icons[$i];
                }
                ?>
              </ul>
            </div>
            <div class="wpm_6310_team_style_22_team_content">
              <div class="wpm_6310_team_style_22_title">William</div>
              <div class="wpm_6310_team_style_22_designation">Web Desginer</div>
              <div class="wpm_6310_team_style_22_description">Lorem ipsum dolor sit amet, consectetur adipiscing.</div>
            </div>

          </div>

        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_22">
            <div class="wpm_6310_team_style_22_pic">
              <img src="<?php echo $arr[1] ?>" alt="Team Showcase">
              <ul class="wpm_6310_team_style_22_social">
                <?php
                shuffle($icons);
                for ($i = 0; $i < 4; $i++) {
                  echo $icons[$i];
                }
                ?>
              </ul>
            </div>
            <div class="wpm_6310_team_style_22_team_content">
              <div class="wpm_6310_team_style_22_title">William</div>
              <div class="wpm_6310_team_style_22_designation">Web Desginer</div>
              <div class="wpm_6310_team_style_22_description">Lorem ipsum dolor sit amet, consectetur adipiscing.</div>
            </div>

          </div>

        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_22">
            <div class="wpm_6310_team_style_22_pic">
              <img src="<?php echo $arr[2] ?>" alt="Team Showcase">
              <ul class="wpm_6310_team_style_22_social">
                <?php
                shuffle($icons);
                for ($i = 0; $i < 4; $i++) {
                  echo $icons[$i];
                }
                ?>
              </ul>
            </div>
            <div class="wpm_6310_team_style_22_team_content">
              <div class="wpm_6310_team_style_22_title">William</div>
              <div class="wpm_6310_team_style_22_designation">Web Desginer</div>
              <div class="wpm_6310_team_style_22_description">Lorem ipsum dolor sit amet, consectetur adipiscing.</div>
            </div>

          </div>

        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_22">
            <div class="wpm_6310_team_style_22_pic">
              <img src="<?php echo $arr[3] ?>" alt="Team Showcase">
              <ul class="wpm_6310_team_style_22_social">
                <?php
                shuffle($icons);
                for ($i = 0; $i < 4; $i++) {
                  echo $icons[$i];
                }
                ?>
              </ul>
            </div>
            <div class="wpm_6310_team_style_22_team_content">
              <div class="wpm_6310_team_style_22_title">William</div>
              <div class="wpm_6310_team_style_22_designation">Web Desginer</div>
              <div class="wpm_6310_team_style_22_description">Lorem ipsum dolor sit amet, consectetur adipiscing.</div>
            </div>

          </div>

        </div>
      </div>
      <div class="wpm-6310-template-list">
        Template 22
        <button type="button" class="wpm-btn-danger wpm-pull-right wpm-margin-right-15">Pro Only</button>
      </div>
      <br class="wpm-6310-clear" />
    </div>

    <?php shuffle($arr); ?>
    <div class="wpm-6310-row wpm-6310_team-style-boxed">
      <div class="wpm-padding-15">
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_23">
            <img src="<?php echo $arr[0] ?>" alt="Team Showcase">
            <div class="wpm_6310_team_style_23_team_content">
              <div class="wpm_6310_team_style_23_title">Sara</div>
              <div class="wpm_6310_team_style_23_designation">web designer</div>
              <ul class="wpm_6310_team_style_23_social">
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
          <div class="wpm_6310_team_style_23">
            <img src="<?php echo $arr[1] ?>" alt="Team Showcase">
            <div class="wpm_6310_team_style_23_team_content">
              <div class="wpm_6310_team_style_23_title">Sara</div>
              <div class="wpm_6310_team_style_23_designation">web designer</div>
              <ul class="wpm_6310_team_style_23_social">
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
          <div class="wpm_6310_team_style_23">
            <img src="<?php echo $arr[2] ?>" alt="Team Showcase">
            <div class="wpm_6310_team_style_23_team_content">
              <div class="wpm_6310_team_style_23_title">Sara</div>
              <div class="wpm_6310_team_style_23_designation">web designer</div>
              <ul class="wpm_6310_team_style_23_social">
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
          <div class="wpm_6310_team_style_23">
            <img src="<?php echo $arr[3] ?>" alt="Team Showcase">
            <div class="wpm_6310_team_style_23_team_content">
              <div class="wpm_6310_team_style_23_title">Sara</div>
              <div class="wpm_6310_team_style_23_designation">web designer</div>
              <ul class="wpm_6310_team_style_23_social">
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
        Template 23
        <button type="button" class="wpm-btn-danger wpm-pull-right wpm-margin-right-15">Pro Only</button>
      </div>
      <br class="wpm-6310-clear" />
    </div>

    <?php shuffle($arr); ?>
    <div class="wpm-6310-row wpm-6310_team-style-boxed">
      <div class="wpm-padding-15">
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_24">

            <img src="<?php echo $arr[0] ?>" alt="Team Showcase">
            <ul class="wpm_6310_team_style_24_social">
              <?php
              shuffle($icons);
              for ($i = 0; $i < 4; $i++) {
                echo $icons[$i];
              }
              ?>
            </ul>
            <div class="wpm_6310_team_style_24_team_content">
              <div class="wpm_6310_team_style_24_title">Williamson</div>
              <div class="wpm_6310_team_style_24_designation">web developer</div>
            </div>
          </div>
        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_24">

            <img src="<?php echo $arr[1] ?>" alt="Team Showcase">
            <ul class="wpm_6310_team_style_24_social">
              <?php
              shuffle($icons);
              for ($i = 0; $i < 4; $i++) {
                echo $icons[$i];
              }
              ?>
            </ul>
            <div class="wpm_6310_team_style_24_team_content">
              <div class="wpm_6310_team_style_24_title">Williamson</div>
              <div class="wpm_6310_team_style_24_designation">web developer</div>
            </div>
          </div>
        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_24">

            <img src="<?php echo $arr[2] ?>" alt="Team Showcase">
            <ul class="wpm_6310_team_style_24_social">
              <?php
              shuffle($icons);
              for ($i = 0; $i < 4; $i++) {
                echo $icons[$i];
              }
              ?>
            </ul>
            <div class="wpm_6310_team_style_24_team_content">
              <div class="wpm_6310_team_style_24_title">Williamson</div>
              <div class="wpm_6310_team_style_24_designation">web developer</div>
            </div>
          </div>
        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_24">

            <img src="<?php echo $arr[3] ?>" alt="Team Showcase">
            <ul class="wpm_6310_team_style_24_social">
              <?php
              shuffle($icons);
              for ($i = 0; $i < 4; $i++) {
                echo $icons[$i];
              }
              ?>
            </ul>
            <div class="wpm_6310_team_style_24_team_content">
              <div class="wpm_6310_team_style_24_title">Williamson</div>
              <div class="wpm_6310_team_style_24_designation">web developer</div>
            </div>
          </div>
        </div>
      </div>
      <div class="wpm-6310-template-list">
        Template 24
        <button type="button" class="wpm-btn-danger wpm-pull-right wpm-margin-right-15">Pro Only</button>
      </div>
      <br class="wpm-6310-clear" />
    </div>

    <?php shuffle($arr); ?>
    <div class="wpm-6310-row wpm-6310_team-style-boxed">
      <div class="wpm-padding-15">
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_25">
            <img src="<?php echo $arr[0] ?>" alt="Team Showcase">

            <div class="wpm_6310_team_style_25_team_content">
              <div class="wpm_6310_team_style_25_title">Williamson</div>
              <div class="wpm_6310_team_style_25_designation">web developer</div>
            </div>
            <ul class="wpm_6310_team_style_25_social">
              <?php
              shuffle($icons);
              for ($i = 0; $i < 4; $i++) {
                echo $icons[$i];
              }
              ?>
            </ul>
          </div>
        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_25">

            <img src="<?php echo $arr[1] ?>" alt="Team Showcase">

            <div class="wpm_6310_team_style_25_team_content">
              <div class="wpm_6310_team_style_25_title">Williamson</div>
              <div class="wpm_6310_team_style_25_designation">web developer</div>
            </div>
            <ul class="wpm_6310_team_style_25_social">
              <?php
              shuffle($icons);
              for ($i = 0; $i < 4; $i++) {
                echo $icons[$i];
              }
              ?>
            </ul>
          </div>
        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_25">

            <img src="<?php echo $arr[2] ?>" alt="Team Showcase">

            <div class="wpm_6310_team_style_25_team_content">
              <div class="wpm_6310_team_style_25_title">Williamson</div>
              <div class="wpm_6310_team_style_25_designation">web developer</div>
            </div>
            <ul class="wpm_6310_team_style_25_social">
              <?php
              shuffle($icons);
              for ($i = 0; $i < 4; $i++) {
                echo $icons[$i];
              }
              ?>
            </ul>
          </div>
        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_25">

            <img src="<?php echo $arr[3] ?>" alt="Team Showcase">

            <div class="wpm_6310_team_style_25_team_content">
              <div class="wpm_6310_team_style_25_title">Williamson</div>
              <div class="wpm_6310_team_style_25_designation">web developer</div>
            </div>
            <ul class="wpm_6310_team_style_25_social">
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
      <div class="wpm-6310-template-list">
        Template 25
        <button type="button" class="wpm-btn-danger wpm-pull-right wpm-margin-right-15">Pro Only</button>
      </div>
      <br class="wpm-6310-clear" />
    </div>

    <?php shuffle($arr); ?>
    <div class="wpm-6310-row wpm-6310_team-style-boxed">
      <div class="wpm-padding-15">
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_26">

            <img src="<?php echo $arr[0] ?>" alt="Team Showcase">

            <div class="wpm_6310_team_style_26_team_content">
              <div class="wpm_6310_team_style_26_title">Williamson</div>
              <div class="wpm_6310_team_style_26_designation">web developer</div>
              <ul class="wpm_6310_team_style_26_social">
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
          <div class="wpm_6310_team_style_26">

            <img src="<?php echo $arr[1] ?>" alt="Team Showcase">

            <div class="wpm_6310_team_style_26_team_content">
              <div class="wpm_6310_team_style_26_title">Williamson</div>
              <div class="wpm_6310_team_style_26_designation">web developer</div>
              <ul class="wpm_6310_team_style_26_social">
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
          <div class="wpm_6310_team_style_26">

            <img src="<?php echo $arr[2] ?>" alt="Team Showcase">

            <div class="wpm_6310_team_style_26_team_content">
              <div class="wpm_6310_team_style_26_title">Williamson</div>
              <div class="wpm_6310_team_style_26_designation">web developer</div>
              <ul class="wpm_6310_team_style_26_social">
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
          <div class="wpm_6310_team_style_26">

            <img src="<?php echo $arr[3] ?>" alt="Team Showcase">

            <div class="wpm_6310_team_style_26_team_content">
              <div class="wpm_6310_team_style_26_title">Williamson</div>
              <div class="wpm_6310_team_style_26_designation">web developer</div>
              <ul class="wpm_6310_team_style_26_social">
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
        Template 26
        <button type="button" class="wpm-btn-danger wpm-pull-right wpm-margin-right-15">Pro Only</button>
      </div>
      <br class="wpm-6310-clear" />
    </div>



    <?php shuffle($arr); ?>
    <div class="wpm-6310-row wpm-6310_team-style-boxed">
      <div class="wpm-padding-15">
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_27">
            <img src="<?php echo $arr[0] ?>" alt="Team Showcase">
            <ul class="wpm_6310_team_style_27_social">
              <?php
              shuffle($icons);
              for ($i = 0; $i < 4; $i++) {
                echo $icons[$i];
              }
              ?>
            </ul>
            <div class="wpm_6310_team_style_27_team_content">
              <div class="wpm_6310_team_style_27_title">Sara</div>
              <div class="wpm_6310_team_style_27_designation">web designer</div>

            </div>

          </div>
        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_27">
            <img src="<?php echo $arr[1] ?>" alt="Team Showcase">
            <ul class="wpm_6310_team_style_27_social">
              <?php
              shuffle($icons);
              for ($i = 0; $i < 4; $i++) {
                echo $icons[$i];
              }
              ?>
            </ul>
            <div class="wpm_6310_team_style_27_team_content">
              <div class="wpm_6310_team_style_27_title">Sara</div>
              <div class="wpm_6310_team_style_27_designation">web designer</div>

            </div>

          </div>
        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_27">
            <img src="<?php echo $arr[2] ?>" alt="Team Showcase">
            <ul class="wpm_6310_team_style_27_social">
              <?php
              shuffle($icons);
              for ($i = 0; $i < 4; $i++) {
                echo $icons[$i];
              }
              ?>
            </ul>
            <div class="wpm_6310_team_style_27_team_content">
              <div class="wpm_6310_team_style_27_title">Sara</div>
              <div class="wpm_6310_team_style_27_designation">web designer</div>

            </div>

          </div>
        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_27">
            <img src="<?php echo $arr[3] ?>" alt="Team Showcase">
            <ul class="wpm_6310_team_style_27_social">
              <?php
              shuffle($icons);
              for ($i = 0; $i < 4; $i++) {
                echo $icons[$i];
              }
              ?>
            </ul>
            <div class="wpm_6310_team_style_27_team_content">
              <div class="wpm_6310_team_style_27_title">Sara</div>
              <div class="wpm_6310_team_style_27_designation">web designer</div>

            </div>

          </div>
        </div>
      </div>
      <div class="wpm-6310-template-list">
        Template 27
        <button type="button" class="wpm-btn-danger wpm-pull-right wpm-margin-right-15">Pro Only</button>
      </div>
      <br class="wpm-6310-clear" />
    </div>

    <?php shuffle($arr); ?>
    <div class="wpm-6310-row wpm-6310_team-style-boxed">
      <div class="wpm-padding-15">
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_28">
            <div class="wpm_6310_team_style_28_pic">
              <img src="<?php echo $arr[0] ?>" alt="Team Showcase">
            </div>
            <div class="wpm_6310_team_style_28_team_content">
              <div class="wpm_6310_team_style_28_box_content">
                <div class="wpm_6310_team_style_28_title">Williamson</div>
                <div class="wpm_6310_team_style_28_designation">web developer</div>

                <ul class="wpm_6310_team_style_28_social">
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
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_28">
            <div class="wpm_6310_team_style_28_pic">
              <img src="<?php echo $arr[1] ?>" alt="Team Showcase">
            </div>
            <div class="wpm_6310_team_style_28_team_content">
              <div class="wpm_6310_team_style_28_box_content">
                <div class="wpm_6310_team_style_28_title">Williamson</div>
                <div class="wpm_6310_team_style_28_designation">web developer</div>

                <ul class="wpm_6310_team_style_28_social">
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
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_28">
            <div class="wpm_6310_team_style_28_pic">
              <img src="<?php echo $arr[2] ?>" alt="Team Showcase">
            </div>
            <div class="wpm_6310_team_style_28_team_content">
              <div class="wpm_6310_team_style_28_box_content">
                <div class="wpm_6310_team_style_28_title">Williamson</div>
                <div class="wpm_6310_team_style_28_designation">web developer</div>

                <ul class="wpm_6310_team_style_28_social">
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
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_28">
            <div class="wpm_6310_team_style_28_pic">
              <img src="<?php echo $arr[3] ?>" alt="Team Showcase">
            </div>
            <div class="wpm_6310_team_style_28_team_content">
              <div class="wpm_6310_team_style_28_box_content">
                <div class="wpm_6310_team_style_28_title">Williamson</div>
                <div class="wpm_6310_team_style_28_designation">web developer</div>

                <ul class="wpm_6310_team_style_28_social">
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
      </div>
      <div class="wpm-6310-template-list">
        Template 28
        <button type="button" class="wpm-btn-danger wpm-pull-right wpm-margin-right-15">Pro Only</button>
      </div>
      <br class="wpm-6310-clear" />
    </div>



    <?php shuffle($arr); ?>
    <div class="wpm-6310-row wpm-6310_team-style-boxed">
      <div class="wpm-padding-15">
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_29">
            <div class="wpm_6310_team_style_29_pic">
              <img src="<?php echo $arr[0] ?>" alt="Team Showcase">
              <ul class="wpm_6310_team_style_29_social">
                <?php
                shuffle($icons);
                for ($i = 0; $i < 4; $i++) {
                  echo $icons[$i];
                }
                ?>
              </ul>
            </div>
            <div class="wpm_6310_team_style_29_title">Sara</div>
            <div class="wpm_6310_team_style_29_designation">web designer</div>
          </div>
        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_29">
            <div class="wpm_6310_team_style_29_pic">
              <img src="<?php echo $arr[1] ?>" alt="Team Showcase">
              <ul class="wpm_6310_team_style_29_social">
                <?php
                shuffle($icons);
                for ($i = 0; $i < 4; $i++) {
                  echo $icons[$i];
                }
                ?>
              </ul>
            </div>
            <div class="wpm_6310_team_style_29_title">Sara</div>
            <div class="wpm_6310_team_style_29_designation">web designer</div>
          </div>
        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_29">
            <div class="wpm_6310_team_style_29_pic">
              <img src="<?php echo $arr[2] ?>" alt="Team Showcase">
              <ul class="wpm_6310_team_style_29_social">
                <?php
                shuffle($icons);
                for ($i = 0; $i < 4; $i++) {
                  echo $icons[$i];
                }
                ?>
              </ul>
            </div>
            <div class="wpm_6310_team_style_29_title">Sara</div>
            <div class="wpm_6310_team_style_29_designation">web designer</div>
          </div>
        </div>
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_29">
            <div class="wpm_6310_team_style_29_pic">
              <img src="<?php echo $arr[3] ?>" alt="Team Showcase">
              <ul class="wpm_6310_team_style_29_social">
                <?php
                shuffle($icons);
                for ($i = 0; $i < 4; $i++) {
                  echo $icons[$i];
                }
                ?>
              </ul>
            </div>
            <div class="wpm_6310_team_style_29_title">Sara</div>
            <div class="wpm_6310_team_style_29_designation">web designer</div>
          </div>
        </div>
      </div>
      <div class="wpm-6310-template-list">
        Template 29
        <button type="button" class="wpm-btn-danger wpm-pull-right wpm-margin-right-15">Pro Only</button>
      </div>
      <br class="wpm-6310-clear" />
    </div>

    <?php shuffle($arr); ?>
    <div class="wpm-6310-row wpm-6310_team-style-boxed">
      <div class="wpm-padding-15">
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_30">
            <div class="wpm_6310_team_style_30_pic">
              <img src="<?php echo $arr[0] ?>" alt="Team Showcase">
            </div>
            <div class="wpm_6310_team_style_30_team_content">
              <div class="wpm_6310_team_style_30_box_content">
                <div class="wpm_6310_team_style_30_title">Williamson</div>
                <div class="wpm_6310_team_style_30_designation">web developer</div>
                <div class="wpm_6310_team_style_30_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet ipsum ut quam faucibus dictum a sit amet lorem.</div>

                <ul class="wpm_6310_team_style_30_social">
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
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_30">
            <div class="wpm_6310_team_style_30_pic">
              <img src="<?php echo $arr[1] ?>" alt="Team Showcase">
            </div>
            <div class="wpm_6310_team_style_30_team_content">
              <div class="wpm_6310_team_style_30_box_content">
                <div class="wpm_6310_team_style_30_title">Williamson</div>
                <div class="wpm_6310_team_style_30_designation">web developer</div>
                <div class="wpm_6310_team_style_30_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet ipsum ut quam faucibus dictum a sit amet lorem.</div>

                <ul class="wpm_6310_team_style_30_social">
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
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_30">
            <div class="wpm_6310_team_style_30_pic">
              <img src="<?php echo $arr[2] ?>" alt="Team Showcase">
            </div>
            <div class="wpm_6310_team_style_30_team_content">
              <div class="wpm_6310_team_style_30_box_content">
                <div class="wpm_6310_team_style_30_title">Williamson</div>
                <div class="wpm_6310_team_style_30_designation">web developer</div>
                <div class="wpm_6310_team_style_30_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet ipsum ut quam faucibus dictum a sit amet lorem.</div>

                <ul class="wpm_6310_team_style_30_social">
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
        <div class="wpm-6310-col-4">
          <div class="wpm_6310_team_style_30">
            <div class="wpm_6310_team_style_30_pic">
              <img src="<?php echo $arr[3] ?>" alt="Team Showcase">
            </div>
            <div class="wpm_6310_team_style_30_team_content">
              <div class="wpm_6310_team_style_30_box_content">
                <div class="wpm_6310_team_style_30_title">Williamson</div>
                <div class="wpm_6310_team_style_30_designation">web developer</div>
                <div class="wpm_6310_team_style_30_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet ipsum ut quam faucibus dictum a sit amet lorem.</div>

                <ul class="wpm_6310_team_style_30_social">
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
      </div>


      <div class="wpm-6310-template-list">
        Template 30
        <button type="button" class="wpm-btn-danger wpm-pull-right wpm-margin-right-15">Pro Only</button>
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
              <td><input type="text" required="" name="style_name" id="style_name" value="" class="wpm-form-input" placeholder="Team Name" style="width: 265px" /></td>
            </tr>
          </table>
        </div>
        <div class="wpm-6310-modal-form-footer">
          <button type="button" name="close" class="wpm-btn-danger wpm-pull-right">Close</button>
          <input type="submit" name="submit" class="wpm-btn-primary wpm-pull-right wpm-margin-right-10" value="Save"/>
        </div>
      </form>
      <br class="wpm-6310-clear" />
    </div>
  </div>

  <script>
  jQuery(document).ready(function () {
    jQuery("body").on("click", ".wpm_choosen_style", function () {
      jQuery("#wpm-6310-modal-add").fadeIn(500);
      jQuery("#wpm-style-hidden").val(jQuery(this).attr("id"));
      jQuery("body").css({
        "overflow": "hidden"
      });
      return false;
    });

    jQuery("body").on("click", ".wpm-6310-close, .wpm-btn-danger", function () {
      jQuery("#wpm-6310-modal-add").fadeOut(500);
      jQuery("body").css({
        "overflow": "initial"
      });
    });
    jQuery(window).click(function (event) {
      if (event.target == document.getElementById('wpm-6310-modal-add')) {
        jQuery("#wpm-6310-modal-add").fadeOut(500);
        jQuery("body").css({
          "overflow": "initial"
        });
      }
    });
  });
</script>
