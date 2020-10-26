<?php
if (!defined('ABSPATH'))
   exit;
if (!current_user_can('edit_others_pages')) {
   wp_die(__('You do not have sufficient permissions to access this page.'));
}
?>
<div class="wpm-6310">
   <h1>Team Members <button class="wpm-btn-success" id="add-team-member">Add New</button></h1>
   <?php
   if (!defined('ABSPATH'))
      exit;
   if (!current_user_can('manage_options')) {
      wp_die(__('You do not have sufficient permissions to access this page.'));
   }

   $icon_table = $wpdb->prefix . 'wpm_6310_icons';
   $member_table = $wpdb->prefix . 'wpm_6310_member';
   wp_enqueue_media();


   wpm_6310_color_picker_script();

   $allIconList = "";
   $icon_table_data = $wpdb->get_results('SELECT * FROM ' . $icon_table . ' ORDER BY name ASC', ARRAY_A);
   foreach ($icon_table_data as $value) {
      $allIconList .= "<option value=\"{$value['id']}\">{$value['name']}</option>";
   }


   if (!empty($_POST['delete']) && isset($_POST['id']) && is_numeric($_POST['id'])) {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'wpm-nonce-field-delete')) {
         die('You do not have sufficient permissions to access this page.');
      } else {
         $id = (int) $_POST['id'];
         $wpdb->query($wpdb->prepare("DELETE FROM {$member_table} WHERE id = %d", $id));
      }
   } else if (!empty($_POST['save']) && $_POST['save'] == 'Save') {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'wpm-6310-nonce-add')) {
         die('You do not have sufficient permissions to access this page.');
      } else {
         $myData = array();
         $myData[0] = wpm_6310_replace($_POST['name']);
         $myData[1] = wpm_6310_replace($_POST['designation']);
         $myData[2] = sanitize_text_field($_POST['pd']);
         if ($myData[2] == 1) {
            $myData[3] = sanitize_text_field($_POST['url']);
            $myData[4] = sanitize_text_field($_POST['new_tab']);
            $myData[5] = "";
            $myData[6] = "";
         } else if ($myData[2] == 2) {
            $myData[3] = "";
            $myData[4] = "";
            $myData[5] = $_POST['profile_details_new'];
            $myData[6] = sanitize_text_field($_POST['effect']);
         } else {
            $myData[3] = "";
            $myData[4] = "";
            $myData[5] = "";
            $myData[6] = "";
         }
         $myData[7] = sanitize_text_field($_POST['image']);

         $iconIds = "";
         $iconUrl = "";


         if (isset($_POST['icon_link']) && $_POST['icon_link']) {
            $icon_name = array_map('esc_attr', $_POST['icon_name']);
            $icon_link = array_map('esc_attr', $_POST['icon_link']);
            if ($icon_link) {
               foreach ($icon_link as $dkey => $dvalue) {
                  if ($dvalue) {
                     if ($iconIds) {
                        $iconIds .= ",";
                        $iconUrl .= "||||";
                     }
                     $iconIds .= $icon_name[$dkey];
                     $iconUrl .= $icon_link[$dkey];
                  }
               }
            }
         }
         $myData[8] = $iconIds;
         $myData[9] = $iconUrl;

         $wpdb->query($wpdb->prepare("INSERT INTO {$member_table} set
                           name = %s,
                           designation = %s,
                           profile_details_type = %d,
                           profile_url = %s,
                           open_new_tab = %d,
                           profile_details = %s,
                           effect = %s,
                           image = %s,
                           iconids = %s,
                           iconurl = %s", $myData));
      }
   } else if (!empty($_POST['update']) && $_POST['update'] == 'Update') {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'wpm-6310-nonce-update')) {
         die('You do not have sufficient permissions to access this page.');
      } else {
         $id = (int) sanitize_text_field($_POST['eid']);
         $myData = array();
         $myData[0] = wpm_6310_replace($_POST['name']);
         $myData[1] = wpm_6310_replace($_POST['designation']);
         $myData[2] = sanitize_text_field($_POST['pd']);
         if ($myData[2] == 1) {
            $myData[3] = sanitize_text_field($_POST['url']);
            $myData[4] = sanitize_text_field($_POST['new_tab']);
            $myData[5] = "";
            $myData[6] = "";
         } else if ($myData[2] == 2) {
            $myData[3] = "";
            $myData[4] = "";
            $myData[5] = $_POST['profile_details_new'];
            $myData[6] = sanitize_text_field($_POST['effect']);
         } else {
            $myData[3] = "";
            $myData[4] = "";
            $myData[5] = "";
            $myData[6] = "";
         }
         $myData[7] = sanitize_text_field($_POST['image']);

         $iconIds = "";
         $iconUrl = "";
         if (isset($_POST['icon_link']) && $_POST['icon_link']) {
            $icon_name = array_map('esc_attr', $_POST['icon_name']);
            $icon_link = array_map('esc_attr', $_POST['icon_link']);
            if ($icon_link) {
               foreach ($icon_link as $dkey => $dvalue) {
                  if ($dvalue) {
                     if ($iconIds) {
                        $iconIds .= ",";
                        $iconUrl .= "||||";
                     }
                     $iconIds .= $icon_name[$dkey];
                     $iconUrl .= $icon_link[$dkey];
                  }
               }
            }
         }
         $myData[8] = $iconIds;
         $myData[9] = $iconUrl;
         $myData[10] = $id;

         $wpdb->query($wpdb->prepare("UPDATE {$member_table} set
                           name = %s,
                           designation = %s,
                           profile_details_type = %d,
                           profile_url = %s,
                           open_new_tab = %d,
                           profile_details = %s,
                           effect = %s,
                           image = %s,
                           iconids = %s,
                           iconurl = %s
                           where id = %d", $myData));
      }
   } else if (!empty($_POST['edit']) && $_POST['edit'] == 'Edit') {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'wpm-nonce-field-edit')) {
         die('You do not have sufficient permissions to access this page.');
      } else {
         $id = (int) $_POST['id'];
         $selMember = $wpdb->get_row($wpdb->prepare("SELECT * FROM $member_table WHERE id = %d ", $id), ARRAY_A);
         ?>
         <div id="wpm-6310-modal-edit" class="wpm-6310-modal" style="display: none">
            <div class="wpm-6310-modal-content wpm-6310-modal-md">
               <form action="" method="post">
                  <?php wp_nonce_field("wpm-6310-nonce-update") ?>
                  <input type="hidden" name="eid" value="<?php echo $id; ?>" />
                  <div class="wpm-6310-modal-header">
                     Edit Member
                     <span class="wpm-6310-close">&times;</span>
                  </div>
                  <div class="wpm-6310-modal-body-form">
                     <table border="0" width="100%" cellpadding="10" cellspacing="0">
                        <tr>
                           <td style="width: 150px;"><label class="wpm-form-label" for="name-edit">Full Name:</label></td>
                           <td><input type="text"  name="name" id="name-edit" value="<?php echo $selMember['name'] ?>" class="wpm-form-input lg" placeholder="Full Name" /></td>
                        </tr>
                        <tr>
                           <td><label class="wpm-form-label" for="designation-edit">Designation:</label></td>
                           <td><input type="text"  name="designation" id="designation-edit" value="<?php echo $selMember['designation'] ?>" class="wpm-form-input lg" placeholder="Designation" /></td>
                        </tr>
                        <tr>
                           <td><label class="wpm-form-label" for="pd-edit">Profile Details Type:</label></td>
                           <td>
                              <input type="hidden" name="pd" id="pd-edit" value="<?php echo $selMember['profile_details_type'] ?>" />
                              <button type="button" value="1" class="wpm-btn-multi profile-details-type-edit<?php if ($selMember['profile_details_type'] == 1) echo " active"; ?>">Link</button>
                              <button type="button" value="2" class="wpm-btn-multi profile-details-type-edit<?php if ($selMember['profile_details_type'] == 2) echo " active"; ?>">Pop Up</button>
                              <button type="button" value="0" class="wpm-btn-multi profile-details-type-edit<?php if ($selMember['profile_details_type'] == 0) echo " active"; ?>">None</button>
                           </td>
                        </tr>
                        <tr id="profile_url-edit">
                           <td><label class="wpm-form-label" for="url">Profile URL:</label></td>
                           <td>
                              <input type="text" name="url" value="<?php echo $selMember['profile_url'] ?>" class="wpm-form-input lg" id="url-edit" placeholder="http://www.example.com/profile" />
                           </td>
                        </tr>
                        <tr id="profile_url_tab-edit">
                           <td><label class="wpm-form-label" for="new_tab-edit">Open new tab:</label></td>
                           <td>
                              <input type="hidden" name="new_tab" id="new_tab-edit" value="<?php echo $selMember['open_new_tab'] ?>" />
                              <button type="button" value="1" class="wpm-btn-multi profile-new-tab-edit<?php if ($selMember['open_new_tab'] == 1) echo " active" ?>">Yes</button>
                              <button type="button" value="0" class="wpm-btn-multi profile-new-tab-edit<?php if ($selMember['open_new_tab'] == 0) echo " active" ?>">No</button>
                           </td>
                        </tr>
                        <tr id="profile_details-edit">
                           <td><label class="wpm-form-label" for="profile_details">Profile Details:</label></td>
                           <td>
                              <?php
                              $selMember['profile_details'] = str_replace("\'", "'", $selMember['profile_details']);
                              $selMember['profile_details'] = str_replace('\"', '"', $selMember['profile_details']);
                              $settings = array(
                                  'teeny' => TRUE,
                                  'media_buttons' => false,
                                  'textarea_rows' => 5
                              );
                              wp_editor($selMember['profile_details'], "profile_details_new", $settings);
                              ?>
                           </td>
                        </tr>
                        <tr id="effect-appearance-edit">
                           <td><label class="wpm-form-label" for="popup_app-edit">Popup Effect Appearance:</label></td>
                           <td>
                              <select name="effect" class="wpm-form-input lg" id="popup_app-edit">
                                 <option value="top"<?php if ($selMember['effect'] == 'top') echo " selected=''"; ?>>Top</option>
                                 <option value="bottom"<?php if ($selMember['effect'] == 'bottom') echo " selected=''"; ?>>Bottom</option>
                                 <option value="left"<?php if ($selMember['effect'] == 'left') echo " selected=''"; ?>>Left</option>
                                 <option value="right"<?php if ($selMember['effect'] == 'right') echo " selected=''"; ?>>Right</option>
                                 <option value="top-left"<?php if ($selMember['effect'] == 'top-left') echo " selected=''"; ?>>Top-Left</option>
                                 <option value="top-right"<?php if ($selMember['effect'] == 'top-right') echo " selected=''"; ?>>Top-Right</option>
                                 <option value="bottom-left"<?php if ($selMember['effect'] == 'bottom-left') echo " selected=''"; ?>>Bottom-Left</option>
                                 <option value="bottom-right"<?php if ($selMember['effect'] == 'bottom-right') echo " selected=''"; ?>>Bottom-Right</option>
                              </select>
                           </td>
                        </tr>

                        <tr>
                           <td colspan="2">
                              <label class="wpm-form-label" for="social_icon-edit">Social Icon <small>(Make Blank if you Don't want all)</small>:</label>
                              <br />
                              <?php
                              $iconList = $selMember['iconids'];
                              if ($iconList) {
                                 $iconList = explode(",", $iconList);
                                 $iconUrl = explode("||||", $selMember['iconurl']);
                                 $i = 0;
                                 foreach ($iconList as $list) {
                                    ?>
                                    <div style="margin-bottom: -6px; width: 100%; display: block;">
                                       <div class="wpm_6301_additonal_info_2">
                                          <select name="icon_name[]" class="wpm-form-input">
                                             <?php
                                             foreach ($icon_table_data as $itd) {
                                                if ($itd['id'] == $list) {
                                                   echo "<option value='" . $itd['id'] . "' selected>{$itd['name']}</option>";
                                                } else {
                                                   echo "<option value='" . $itd['id'] . "'>{$itd['name']}</option>";
                                                }
                                             }
                                             ?>
                                          </select>
                                       </div>
                                       <div class="wpm_6301_additonal_info_3"><input type="text" name="icon_link[]" value="<?php echo $iconUrl[$i] ?>"  class="wpm-form-input" placeholder="https://www.example.com/" ></div>&nbsp;
                                       <button type="button" class="wpm-btn-danger sm wpm_6310_icon_remove-edit-exist" value="Remove"><i class="far fa-times-circle" aria-hidden="true"></i></button>
                                       <br class="wpm-6310-clear" />
                                       <br class="wpm-6310-clear" />
                                    </div>
                                    <?php
                                    $i++;
                                 }
                              } else {
                                 ?>
                                 <div style="margin-bottom: -6px; width: 100%; display: block;">
                                    <div class="wpm_6301_additonal_info_2">
                                       <select name="icon_name[]" class="wpm-form-input">
                                          <?php
                                          echo $allIconList;
                                          ?>
                                       </select>
                                    </div>
                                    <div class="wpm_6301_additonal_info_3"><input type="text" name="icon_link[]"  class="wpm-form-input" placeholder="https://www.example.com/" ></div>
                                    <br class="wpm-6310-clear" />
                                 </div><br />
                              <?php } ?>

                              <div class="wpm_6301_additonal_info" id="wpm_6310_icon_new-edit">
                                 <input type="button" class="wpm-btn-default wpm_6310_icon_new-edit" value="Add Row" ><br />
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>Picture URL</td>
                           <td>
                              <input type="text" name="image" id="wpm_6310_upload_team_member_image_src-edit" value="<?php echo $selMember['image'] ?>" class="wpm-form-input lg" >
                              <input type="button" id="wpm_6310_upload_team_member_image-edit" value="Upload Image" class="wpm-btn-default" >
                           </td>
                        </tr>
                     </table>

                  </div>
                  <div class="wpm-6310-modal-form-footer">
                     <button type="button" name="close" id="wpm-from-close-edit" class="wpm-btn-danger wpm-pull-right">Close</button>
                     <input type="submit" name="update" class="wpm-btn-primary wpm-pull-right wpm-margin-right-10" value="Update"/>
                  </div>
                  <br class="wpm-6310-clear" />
               </form>
            </div>
            <br class="wpm-6310-clear" />
         </div>
         <script>
            
            jQuery(document).ready(function () {
               jQuery('#wpm-6310-modal-edit').fadeIn(500);
               jQuery("body").css({
                  "overflow": "hidden"
               });
      <?php
      if ($selMember['profile_details_type'] == 1) {
         echo 'jQuery("#profile_details-edit, #effect-appearance-edit").hide();';
      } else if ($selMember['profile_details_type'] == 2) {
         echo 'jQuery("#profile_url-edit, #profile_url_tab-edit").hide();';
      } else {
         echo 'jQuery("#profile_details-edit, #effect-appearance-edit, #profile_url-edit, #profile_url_tab-edit").hide();';
      }
      ?>

               /* Profile Details Type Start */
               jQuery("body").on("click", ".profile-details-type-edit", function () {
                  var val = parseInt(jQuery(this).val());
                  jQuery(".profile-details-type-edit").removeClass("active");
                  jQuery(this).addClass("active");

                  if (val == 0) {
                     jQuery("#profile_details-edit, #effect-appearance-edit, #profile_url-edit, #profile_url_tab-edit").hide();
                  } else if (val == 1) {
                     jQuery("#profile_url-edit, #profile_url_tab-edit").show();
                     jQuery("#profile_details-edit, #effect-appearance-edit").hide();
                  } else if (val == 2) {
                     jQuery("#profile_details-edit, #effect-appearance-edit").show();
                     jQuery("#profile_url-edit, #profile_url_tab-edit").hide();
                  }
                  jQuery("#pd-edit").val(val);
                  return false;
               });

               jQuery("body").on("click", ".profile-new-tab-edit", function () {
                  var val = parseInt(jQuery(this).val());
                  jQuery(".profile-new-tab-edit").removeClass("active");
                  jQuery(this).addClass("active");
                  jQuery("#new_tab-edit").val(val);
                  return false;
               });
               /* Profile Details Type End */

               /* Social Icon Start */
               jQuery("body").on("click", ".wpm_6310_icon_new-edit", function (e) {
                  var html = '<div class="wpm_6301_additonal_info"><div class="wpm_6301_additonal_info_2"><select name="icon_name[]" class="wpm-form-input"><?php echo $allIconList; ?></select></div><div class="wpm_6301_additonal_info_3"><input type="text" name="icon_link[]" class="wpm-form-input" placeholder="https://www.example.com" ></div><div class="wpm_6301_additonal_info_4"> &nbsp;&nbsp;<button type="button" class="wpm-btn-danger sm wpm_6310_icon_remove-edit" value="Remove"><i class="far fa-times-circle" aria-hidden="true"></i></button></div><br /></div>';
                  jQuery("body").css({
                     "overflow": "hidden"
                  });
                  jQuery("#wpm_6310_icon_new-edit").before(html);
               });
               jQuery("body").on("click", ".wpm_6310_icon_remove-edit", function (e) {
                  jQuery(this).parent().parent().remove();
                  return false;
               });
               jQuery("body").on("click", ".wpm_6310_icon_remove-edit-exist", function (e) {
                  jQuery(this).parent().remove();
                  return false;
               });
               /* Social Icon End */

               jQuery("body").on("click", ".wpm-6310-close-edit, #wpm-from-close-edit", function () {
                  jQuery("#wpm-6310-modal-add, #wpm-6310-modal-edit").fadeOut(500);
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
                  } else if (event.target == document.getElementById('wpm-6310-modal-edit')) {
                     jQuery("#wpm-6310-modal-edit").fadeOut(500);
                     jQuery("body").css({
                        "overflow": "initial"
                     });
                  }
               });

               /* ######### Media Start ########### */
               jQuery("body").on("click", "#wpm_6310_upload_team_member_image-edit", function (e) {
                  e.preventDefault();
                  var image = wp.media({
                     title: 'Upload Image',
                     multiple: false
                  }).open()
                          .on('select', function (e) {
                             var uploaded_image = image.state().get('selection').first();
                             console.log(uploaded_image);
                             var image_url = uploaded_image.toJSON().url;
                             jQuery("#wpm_6310_upload_team_member_image_src-edit").val(image_url);
                          });

                  jQuery("#wpm_6310_add_new_media").css({
                     "overflow-x": "hidden",
                     "overflow-y": "auto"

                  });

               });


               /* ######### Media End ########### */

            });
         </script>

      </script>
      <?php
   }
}
?>

<table class="wpm-table">
   <tr>
      <td style="width: 120px">Full Name</td>
      <td style="width: 120px">Designation</td>
      <td style="width: 180px">Social Icon</td>
      <td style="width: 100px">Picture</td>
      <td style="width: 100px">Edit Delete</td>
   </tr>

   <?php
   $data = $wpdb->get_results('SELECT * FROM ' . $member_table . ' ORDER BY id DESC', ARRAY_A);
   foreach ($data as $value) {
      echo '<tr>';
      echo '<td>' . $value['name'] . '</td>';
      echo '<td>' . $value['designation'] . '</td>';

      echo "<td>";
      if ($value['iconids']) {
         if($value['iconids']){
            $idExist = explode(',', $value['iconids']);
            $idExist = implode('', $idExist);
            $idExist = trim(str_replace(' ', '', $idExist));
            if($idExist){
               $myIcon = $wpdb->get_results("SELECT * FROM $icon_table WHERE id in (" . $value['iconids'] . ")", ARRAY_A);
               if ($myIcon) {
                  foreach ($myIcon as $k => $v) {
                     echo "<button class='wpm-btn-icon' style='color:" . $v['color'] . "; background-color: " . $v['bgcolor'] . "; margin-right: 5px; margin-bottom: 5px;'><i class='" . $v['class_name'] . "'></i></button>";
                  }
               }
            }
         } 
      }
      echo "</td>";
      if ($value['image']) {
         echo "<td><img src='" . $value['image'] . "' height='100' /></td>";
      } else {
         echo '<td>Not Avaliable</td>';
      }

      echo '<td>
                 <form method="post">
                   ' . wp_nonce_field("wpm-nonce-field-edit") . '
                          <input type="hidden" name="id" value="' . $value['id'] . '">
                          <button class="wpm-btn-success wpm-margin-right-10" style="float:left"  title="Edit"  type="submit" value="Edit" name="edit"><i class="fas fa-edit" aria-hidden="true"></i></button>
                  </form>
                  <form method="post">
                   ' . wp_nonce_field("wpm-nonce-field-delete") . '
                          <input type="hidden" name="id" value="' . $value['id'] . '">
                          <button class="wpm-btn-danger" style="float:left"  title="Delete"  type="submit" value="delete" name="delete" onclick="return confirm(\'Do you want to delete?\');"><i class="far fa-times-circle" aria-hidden="true"></i></button>
                  </form>

                             </td>';
   }
   ?>


</table>
<div id="wpm-6310-modal-add" class="wpm-6310-modal" style="display: none">
   <div class="wpm-6310-modal-content wpm-6310-modal-md">
      <form action="" method="post">
         <div class="wpm-6310-modal-header">
            Add Member
            <span class="wpm-6310-close">&times;</span>
         </div>
         <div class="wpm-6310-modal-body-form">
            <?php wp_nonce_field("wpm-6310-nonce-add") ?>
            <table border="0" width="100%" cellpadding="10" cellspacing="0">
               <tr>
                  <td style="width: 150px;"><label class="wpm-form-label" for="name">Full Name:</label></td>
                  <td><input type="text"  name="name" id="name" value="" class="wpm-form-input lg" placeholder="Full Name" /></td>
               </tr>
               <tr>
                  <td><label class="wpm-form-label" for="designation">Designation:</label></td>
                  <td><input type="text"  name="designation" id="designation" value="" class="wpm-form-input lg" placeholder="Designation" /></td>
               </tr>
               <tr>
                  <td><label class="wpm-form-label" for="pd">Profile Details Type:</label></td>
                  <td>
                     <input type="hidden" name="pd" id="pd" value="1" />
                     <button type="button" value="1" class="wpm-btn-multi profile-details-type active">Link</button>
                     <button type="button" value="2" class="wpm-btn-multi profile-details-type">Pop Up</button>
                     <button type="button" value="0" class="wpm-btn-multi profile-details-type">None</button>
                  </td>
               </tr>
               <tr id="profile_url">
                  <td><label class="wpm-form-label" for="url">Profile URL:</label></td>
                  <td>
                     <input type="text" name="url" value="" class="wpm-form-input lg" id="url" placeholder="http://www.example.com/profile" />
                  </td>
               </tr>
               <tr id="profile_url_tab">
                  <td><label class="wpm-form-label" for="new_tab">Open new tab:</label></td>
                  <td>
                     <input type="hidden" name="new_tab" id="new_tab" value="1" />
                     <button type="button" value="1" class="wpm-btn-multi profile-new-tab active">Yes</button>
                     <button type="button" value="0" class="wpm-btn-multi profile-new-tab">No</button>
                  </td>
               </tr>
               <tr id="profile_details">
                  <td><label class="wpm-form-label" for="profile_details">Profile Details:</label></td>
                  <td>
                     <?php
                     $settings = array(
                         'teeny' => TRUE,
                         'media_buttons' => false,
                         'textarea_rows' => 5
                     );
                     wp_editor("", "profile_details_new", $settings);
                     ?>
                  </td>
               </tr>
               <tr id="effect-appearance">
                  <td><label class="wpm-form-label" for="popup_app">Popup Effect Appearance:</label></td>
                  <td>
                     <select name="effect" class="wpm-form-input lg" id="popup_app">
                        <option value="top">Top</option>
                        <option value="bottom">Bottom</option>
                        <option value="left">Left</option>
                        <option value="right">Right</option>
                        <option value="top-left">Top-Left:</option>
                        <option value="top-right">Top-Right</option>
                        <option value="bottom-left">Bottom-Left</option>
                        <option value="bottom-right">Bottom-Right</option>
                     </select>
                  </td>
               </tr>

               <tr>
                  <td colspan="2">
                     <label class="wpm-form-label" for="social_icon">Social Icon <small>(Make Blank if you Don't want all)</small>:</label>
                     <br />
                     <div style="margin-bottom: -6px; width: 100%; display: block;">
                        <div class="wpm_6301_additonal_info_2">
                           <select name="icon_name[]" class="wpm-form-input">
                              <?php
                              echo $allIconList;
                              ?>
                           </select>
                        </div>
                        <div class="wpm_6301_additonal_info_3"><input type="text" name="icon_link[]"  class="wpm-form-input" placeholder="https://www.example.com/" ></div>
                        <br class="wpm-6310-clear" />
                     </div>

                     <br />
                     <div class="wpm_6301_additonal_info" id="wpm_6310_icon_new">
                        <input type="button" class="wpm-btn-default wpm_6310_icon_new" value="Add Row" ><br />
                     </div>
                  </td>
               </tr>
               <tr>
                  <td>Picture URL</td>
                  <td>
                     <input type="text" name="image" id="wpm_6310_upload_team_member_image_src" class="wpm-form-input lg" >
                     <input type="button" id="wpm_6310_upload_team_member_image" value="Upload Image" class="wpm-btn-default" >
                  </td>
               </tr>
            </table>

         </div>
         <div class="wpm-6310-modal-form-footer">
            <button type="button" name="close" id="wpm-from-close" class="wpm-btn-danger wpm-pull-right">Close</button>
            <input type="submit" name="save" class="wpm-btn-primary wpm-pull-right wpm-margin-right-10" value="Save"/>
         </div>
         <br class="wpm-6310-clear" />
      </form>
   </div>
   <br class="wpm-6310-clear" />
</div>
</div>

<script>
   
   jQuery(document).ready(function () {
      jQuery("#profile_details, #effect-appearance").hide();
      jQuery("body").on("click", "#add-team-member", function () {
         jQuery("#wpm-6310-modal-add").fadeIn(500);
         jQuery("body").css({
            "overflow": "hidden"
         });
         return false;
      });

      /* Profile Details Type Start */
      jQuery("body").on("click", ".profile-details-type", function () {
         var val = parseInt(jQuery(this).val());
         jQuery(".profile-details-type").removeClass("active");
         jQuery(this).addClass("active");

         if (val == 0) {
            jQuery("#profile_details, #effect-appearance, #profile_url, #profile_url_tab").hide();
         } else if (val == 1) {
            jQuery("#profile_url, #profile_url_tab").show();
            jQuery("#profile_details, #effect-appearance").hide();
         } else if (val == 2) {
            jQuery("#profile_details, #effect-appearance").show();
            jQuery("#profile_url, #profile_url_tab").hide();
         }
         jQuery("#pd").val(val);
         return false;
      });
      jQuery("body").on("click", ".profile-new-tab", function () {
         var val = parseInt(jQuery(this).val());
         jQuery(".profile-new-tab").removeClass("active");
         jQuery(this).addClass("active");
         jQuery("#new_tab").val(val);
         return false;
      });
      /* Profile Details Type End */

      /* Social Icon Start */
      jQuery("body").on("click", ".wpm_6310_icon_new", function (e) {
         var html = '<div class="wpm_6301_additonal_info"><div class="wpm_6301_additonal_info_2"><select name="icon_name[]" class="wpm-form-input"><?php echo $allIconList; ?></select></div><div class="wpm_6301_additonal_info_3"><input type="text" name="icon_link[]" class="wpm-form-input" placeholder="https://www.example.com" ></div><div class="wpm_6301_additonal_info_4"> &nbsp;&nbsp;<button type="button" class="wpm-btn-danger sm wpm_6310_icon_remove" value="Remove"><i class="far fa-times-circle" aria-hidden="true"></i></button></div><br /></div>';
         jQuery("body").css({
            "overflow": "hidden"
         });
         jQuery("#wpm_6310_icon_new").before(html);
      });
      jQuery("body").on("click", ".wpm_6310_icon_remove", function (e) {
         jQuery(this).parent().parent().remove();
         return false;
      });
      /* Social Icon End */

      /* Modal Close Start */
      jQuery("body").on("click", ".wpm-6310-close, #wpm-from-close", function () {
         jQuery("#wpm-6310-modal-add, #wpm-6310-modal-edit").fadeOut(500);
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
         } else if (event.target == document.getElementById('wpm-6310-modal-edit')) {
            jQuery("#wpm-6310-modal-edit").fadeOut(500);
            jQuery("body").css({
               "overflow": "initial"
            });
         }
      });
      /* Modal Close End */

      /* ######### Media Start ########### */
      jQuery("body").on("click", "#wpm_6310_upload_team_member_image", function (e) {
         e.preventDefault();
         var image = wp.media({
            title: 'Upload Image',
            multiple: false
         }).open()
                 .on('select', function (e) {
                    var uploaded_image = image.state().get('selection').first();
                    console.log(uploaded_image);
                    var image_url = uploaded_image.toJSON().url;
                    jQuery("#wpm_6310_upload_team_member_image_src").val(image_url);
                 });

         jQuery("#wpm_6310_add_new_media").css({
            "overflow-x": "hidden",
            "overflow-y": "auto"

         });
      });
      /* ######### Media End ########### */
   });
</script>
