<?php 
/*Plugin Name: Redux Option Panel Lite
Plugin URI:   https://github.com/dasbairagya/ajax-login-register-lite
Description:  Simple redux framework based wordpress option panel plugin. Activate the plugin and then go to your  Settings page to set up basic things. 
Version:      1.0.0
Author:       Gopal Dasbairagya
Author URI:   https://www.iamgopal.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages
License:     GPL2
Redux Option Panel Lite is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
Redux Option Panel Lite is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with Redux Option Panel Lite. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/
if (!class_exists('ReduxFramework') && file_exists(plugin_dir_path(__FILE__) . '/optionpanel/framework.php')){
    require_once ('optionpanel/framework.php');
}
if (!isset($redux_demo) && file_exists(plugin_dir_path(__FILE__) . '/optionpanel/config.php')){
    require_once ('optionpanel/config.php');
 }