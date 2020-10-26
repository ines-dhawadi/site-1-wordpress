<?php
if (!defined('ABSPATH'))
   exit;
if (!current_user_can('manage_options')) {
   wp_die(__('You do not have sufficient permissions to access this page.'));
}

if (!empty($_POST['delete']) && isset($_POST['id']) && is_numeric($_POST['id'])) {
   $nonce = $_REQUEST['_wpnonce'];
   if (!wp_verify_nonce($nonce, 'tss_nonce_field_delete')) {
      die('You do not have sufficient permissions to access this page.');
   } else {
      $id = (int) $_POST['id'];
      $wpdb->query($wpdb->prepare("DELETE FROM {$style_table} WHERE id = %d", $id));
   }
}
$data = $wpdb->get_results('SELECT * FROM ' . $style_table . ' ORDER BY id DESC', ARRAY_A);
?>

<h3> Team Showcase Supreme
   <?php
   if($data){
      echo '<small><a href="https://www.youtube.com/watch?v=R1m4ChXKM7A" target="_blank" class="wpm-btn-primary" style="text-decoration: none">How to use?</a></small>';
   }
   ?>
</h3>
<table class="wpm-table">
   <tr height="45" style="background-color: #f5f5f5">
      <td style="width: 130px">Team Name</td>
      <td style="width: 140px">Template</td>
      <td>Shortcode</td>
      <td style="width: 120px">Edit Delete</td>
   </tr>
   <?php
   
   if(!$data){
      echo '<script type="text/javascript"> document.location.href = "admin.php?page=wpm-template-01-10"; </script>';
   }
   else{
      foreach ($data as $value) {
         $id = $value['id'];
         $temp = substr($value['style_name'], -2);
         if ($temp <= 10) {
            $temp = "01-10";
         } else if ($temp <= 20) {
            $temp = "11-20";
         } else if ($temp <= 30) {
            $temp = "21-30";
         } else if ($temp <= 40) {
            $temp = "31-40";
         } else if ($temp <= 50) {
            $temp = "41-50";
         } else if ($temp <= 60) {
            $temp = "51-60";
         }
         $style_name = explode("-", $value['style_name']);

         echo '<tr class="wpm-row-select">';
         echo '<td>' . $value['name'] . '</td>';
         echo '<td>' . ucfirst($style_name[0]) . " " . (int) $style_name[1] . '</td>';
         echo '<td><span>Shortcode <input type="text" style="width: 250px;" onclick="this.setSelectionRange(0, this.value.length)" value="[wpm_team_showcase id=&quot;' . $id . '&quot;]"></span>';
         echo '<td>
                                       <a href="' . admin_url("admin.php?page=wpm-template-{$temp}&styleid=$id") . '"  title="Edit"  class="wpm-btn-success wpm-margin-right-10" style="float:left; margin-right: 5px; margin-left: 5px; height: 17px"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                       <form method="post">
                                        ' . wp_nonce_field("tss_nonce_field_delete") . '
                                               <input type="hidden" name="id" value="' . $id . '">
                                               <button class="wpm-btn-danger" style="float:left"  title="Delete"  type="submit" value="delete" name="delete" onclick="return confirm(\'Do you want to delete?\');"><i class="far fa-times-circle" aria-hidden="true"></i></button>
                                       </form>

                                </td>';
         echo ' </tr>';      
      }
   }
   ?>
</table>
