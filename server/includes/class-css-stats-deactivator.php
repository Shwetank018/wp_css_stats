<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://learn.skillcrush.com
 * @since      1.0.0
 *
 * @package    Css_Stats
 * @subpackage Css_Stats/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Css_Stats
 * @subpackage Css_Stats/includes
 * @author     Skillcrush Development <dev@skillcrush.com>
 */
class Css_Stats_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		delete_option('css_stats_filepath');
	}

}
