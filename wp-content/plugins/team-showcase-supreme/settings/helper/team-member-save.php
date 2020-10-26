<?php
if (!empty($_POST['rearrange-list-save']) && $_POST['rearrange-list-save'] == 'Save' && $_POST['rearrange_id'] != ''&& $_POST['rearrange_list'] != '') {
    $wpdb->query($wpdb->prepare("UPDATE $style_table SET memberid = %s WHERE id = %d", $_POST['rearrange_list'], $_POST['rearrange_id']));
}

if (!empty($_POST['team-member-save']) && $_POST['team-member-save'] == 'Save' && $_POST['styleid'] != '') {
         $nonce = $_REQUEST['_wpnonce'];
         if (!wp_verify_nonce($nonce, 'wpm-6310-nonce-add-member')) {
            die('You do not have sufficient permissions to access this page.');
         } else {
            $id = sanitize_text_field($_POST['styleid']);
            $memberids = isset($_POST['memid']) ? $_POST['memid'] : '';
            $temp = "";
            if($memberids){
               foreach ($memberids as $memberid){
                  if($temp){
                     $temp .= ",";
                  }
                  $temp .= $memberid;
               }
            }
            $wpdb->query($wpdb->prepare("UPDATE $style_table SET memberid = %s WHERE id = %d", $temp, $id));
         }
}

if (!empty($_POST['item_per_row_sub']) && $_POST['item_per_row_sub'] == 'Update') {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'wpm_nonce_field_form')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $style_table WHERE id = %d ", $styleId), ARRAY_A);
        $item_per_row_data = sanitize_text_field($_POST['item_per_row_data']);
        $styleid = sanitize_text_field($_POST['id']);        
        $css = $item_per_row_data . "|" . substr($styledata['css'], 2);
        
        $wpdb->update("$style_table", array(
            "css" => $css
                ), array('id' => $styleid), array('%s'), array('%d')
        );

    }
}
?>

