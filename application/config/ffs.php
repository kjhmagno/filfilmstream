<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 | Page settings
 */
$config['title'] = "FilFilmStream";

/*
 | Accounts settings
 */
$config['allow_registration'] = TRUE;
$config['phpass_hash_strength'] = 8;
$config['phpass_hash_portable'] = FALSE;

/*
 | Login settings
 */
$config['login_max_attempts'] = 5;
$config['login_count_attempts'] = TRUE;
$config['login_attempt_expire'] = 60*60*24;

/*
 | Cookies settings
 */
$config['autologin_cookie_name'] = "ffs_autologin";
$config['autologin_cookie_life'] = 60*60*24*31*2;

/*
 | Access control settings
 */
 $config['account_level_admin'] = "admin";
 $config['account_level_user'] = "user";


/* End of file: ffs.php */
/* Location: ./application/config/ffs.php */