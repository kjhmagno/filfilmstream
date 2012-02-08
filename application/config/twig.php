<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Twig Views Directory
 */
$config['template_dir'] = APPPATH.'views';
/*
 * Twig Cache Directory
 */
$config['cache_dir'] = APPPATH.'cache/twig';
/*
 * CI Cookie Helper
 */
$config['ci_cookie'] = array('set_cookie', 'get_cookie', 'delete_cookie');
/*
 * CI Date Helper
 */
$config['ci_date'] = array('now', 'mdate', 'standard_date', 'local_to_gmt', 'gmt_to_local', 'mysql_to_unix', 'unix_to_human', 'human_to_unix', 'timespan', 'days_in_month', 'timezones', 'timezone_menu');
/*
 * CI Directory Helper
 */
$config['ci_directory'] = array('directory_map');
/*
 * CI Form Helper
 */
$config['ci_form'] = array('form_open', 'form_open_multipart', 'form_hidden', 'form_input', 'form_password', 'form_upload', 'form_textarea', 'form_dropdown', 'form_multiselect', 'form_fieldset', 'form_fieldset_close', 'form_checkbox', 'form_radio', 'form_submit', 'form_label', 'form_reset', 'form_button', 'form_close', 'form_prep', 'form_error', 'validation_errors', 'set_value', 'set_select', 'set_checkbox', 'set_radio');
/*
 * CI HTML Helper
 */
$config['ci_html'] = array('br', 'heading', 'img', 'link_tag', 'nbs', 'ol', 'ul', 'meta', 'doctype');
/*
 * CI URL Helper
 */
$config['ci_url'] = array('site_url', 'base_url', 'current_url', 'uri_string', 'index_page', 'anchor', 'anchor_popup', 'mailto', 'safe_mailto', 'auto_link', 'url_title', 'prep_url', 'redirect');

/*
 * End of file: ./twig.php
 * Location: ./application/config/twig.php
 */
