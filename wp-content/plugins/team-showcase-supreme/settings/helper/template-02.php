<script type="text/javascript">
jQuery(document).ready(function () {
  jQuery("#wpm_items_per_row").on("change", function () {
    var row_num = jQuery(this).val();
    jQuery(".wpm_6310_items_per_row").removeClass("col-sm-1 col-sm-2 col-sm-3 col-sm-4 col-sm-5 col-sm-6");
    jQuery(".wpm_6310_items_per_row").addClass("col-sm-" + 12 / row_num);
  });
  jQuery("#wpm_effect_appearance").on("change", function () {
    var value = jQuery(this).val();
    jQuery("<style type='text/css'>.wpm_6310_team_style_02 .wpm_6310_team_style_02_pic:after { top:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_image_radius").on("change", function () {
    var value = jQuery(this).val() + "%";
    jQuery("<style type='text/css'>.wpm_6310_team_style_02 { border-radius:" + value + "; -moz-border-radius:" + value + "; -ms-border-radius:" + value + "; -o-border-radius:" + value + "; -webkit-border-radius:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_border_width").on("change", function () {
    var value = jQuery(this).val() + "px";
    jQuery("<style type='text/css'>.wpm_6310_team_style_02 { border-width:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_border_color").on("change", function () {
    var value = jQuery(this).val();
    jQuery("<style type='text/css'>.wpm_6310_team_style_02  { border-color:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_content_from_top").on("change", function () {
    var value = (parseInt(jQuery(this).val()) + 50) + "%";
    jQuery("<style type='text/css'>.wpm_6310_team_style_02 .wpm_6310_team_style_02_team_content { top:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_image_hover_background").on("change", function () {
    var value = jQuery(this).val();
    jQuery("<style type='text/css'>.wpm_6310_team_style_02 .wpm_6310_team_style_02_pic:after { background:" + value + ";} </style>").appendTo(".wpm-preview-box");
    jQuery("<style type='text/css'>.wpm_6310_team_style_02:hover { border-color:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_box_shadow_width, #wpm_box_shadow_blur, #wpm_box_shadow_color").on("change", function () {
    var spread = jQuery("#wpm_box_shadow_width").val() + "px";
    var blur = jQuery("#wpm_box_shadow_blur").val() + "px";
    var color = jQuery("#wpm_box_shadow_color").val().replace(/\+/g, ' ');
    color = color.split(':');
    jQuery("<style type='text/css'> .wpm_6310_team_style_02 { box-shadow: 0 0 " + blur + " " + spread + " " + color + "; -moz-box-shadow: 0 0 " + blur + " " + spread + " " + color + "; -webkit-box-shadow: 0 0 " + blur + " " + spread + " " + color + "; -ms-box-shadow: 0 0 " + blur + " " + spread + " " + color + "; -o-box-shadow: 0 0 " + blur + " " + spread + " " + color + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_member_font_size").on("change", function () {
    var value = jQuery(this).val() + "px";
    jQuery("<style type='text/css'>.wpm_6310_team_style_02 .wpm_6310_team_style_02_title { font-size:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_member_font_color").on("change", function () {
    var value = jQuery(this).val();
    jQuery("<style type='text/css'>.wpm_6310_team_style_02 .wpm_6310_team_style_02_title, .wpm_6310_team_style_02 .wpm_6310_team_style_02_title a { color:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_member_font_weight").on("change", function () {
    var value = jQuery(this).val();
    jQuery("<style type='text/css'>.wpm_6310_team_style_02 .wpm_6310_team_style_02_title { font-weight:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_member_text_transform").on("change", function () {
    var value = jQuery(this).val();
    jQuery("<style type='text/css'>.wpm_6310_team_style_02 .wpm_6310_team_style_02_title { text-transform:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_jquery_heading_font").on("change", function () {
    var value = jQuery(this).val().replace(/\+/g, ' ');
    value = value.split(':');
    jQuery("<style type='text/css'>.wpm_6310_team_style_02 .wpm_6310_team_style_02_title { font-family:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_heading_line_height").on("change", function () {
    var value = jQuery(this).val() + "px";
    jQuery("<style type='text/css'> .wpm_6310_team_style_02 .wpm_6310_team_style_02_title { line-height:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_designation_font_size").on("change", function () {
    var value = jQuery(this).val() + "px";
    jQuery("<style type='text/css'> .wpm_6310_team_style_02 .wpm_6310_team_style_02_designation { font-size:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_designation_font_color").on("change", function () {
    var value = jQuery(this).val();
    jQuery("<style type='text/css'> .wpm_6310_team_style_02 .wpm_6310_team_style_02_designation { color:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_designation_font_weight").on("change", function () {
    var value = jQuery(this).val();
    jQuery("<style type='text/css'> .wpm_6310_team_style_02 .wpm_6310_team_style_02_designation { font-weight:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_designation_text_transform").on("change", function () {
    var value = jQuery(this).val();
    jQuery("<style type='text/css'> .wpm_6310_team_style_02 .wpm_6310_team_style_02_designation { text-transform:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_jquery_designation_font").on("change", function () {
    var value = jQuery(this).val().replace(/\+/g, ' ');
    value = value.split(':');
    jQuery("<style type='text/css'>.wpm_6310_team_style_02 .wpm_6310_team_style_02_designation { font-family:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_designation_line_height").on("change", function () {
    var value = jQuery(this).val() + "px";
    jQuery("<style type='text/css'> .wpm_6310_team_style_02 .wpm_6310_team_style_02_designation { line-height:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#social_from_content").on("change", function () {
    var value = jQuery(this).val() + "px";
    jQuery("<style type='text/css'>.wpm_6310_team_style_02 .wpm_6310_team_style_02_designation { padding-bottom:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_social_icon_width").on("change", function () {
    var value = jQuery(this).val() + "px";
    jQuery("<style type='text/css'> .wpm_6310_team_style_02 .wpm_6310_team_style_02_social li a { width:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_social_icon_height").on("change", function () {
    var value = jQuery(this).val() + "px";
    jQuery("<style type='text/css'> .wpm_6310_team_style_02 .wpm_6310_team_style_02_social li a { height:" + value + "; line-height:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_social_border_width").on("change", function () {
    var value = jQuery(this).val() + "px !important";
    jQuery("<style type='text/css'>.wpm_6310_team_style_02 .wpm_6310_team_style_02_social li a { border-width:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_social_border_color").on("change", function () {
    var value = jQuery(this).val();
    jQuery("<style type='text/css'>.wpm_6310_team_style_02 .wpm_6310_team_style_02_social li a { border-color:" + value + ";} </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#wpm_social_border_radius").on("change", function () {
    var value = jQuery(this).val() + "%";
    jQuery("<style type='text/css'> .wpm_6310_team_style_02 .wpm_6310_team_style_02_social li a { border-radius:" + value + "; -moz-border-radius:" + value + "; -webkit-border-radius:" + value + "; -o-border-radius:" + value + "; -ms-border-radius:" + value + "; } </style>").appendTo(".wpm-preview-box");
  });
  jQuery("#open-in-new-tab-yes").change(function () {
    jQuery(".open_in_new_tab_class").attr("target", "_blank");
  });
  jQuery("#open-in-new-tab-no").change(function () {
    jQuery(".open_in_new_tab_class").removeAttr("target");
  });
});
</script>
