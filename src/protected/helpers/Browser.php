<?php

/**
 * Helper for browser detection
 *
 * @author Sam Stenvall <neggelandia@gmail.com>
 * @copyright Copyright &copy; Sam Stenvall 2013-
 * @license https://www.gnu.org/licenses/gpl.html The GNU General Public License v3.0
 */
class Browser
{

	/**
	 * @return boolean whether the user browser is Internet Explorer
	 */
	public static function isInternetExplorer()
	{
		$browser = new Browser\Browser();
		return $browser->getBrowser() === $browser::IE;
	}

	/**
	 * @return boolean whether the user browser is a mobile browser (tablets 
	 * not including)
	 */
	public static function isMobile()
	{
		$detector = new Detection\MobileDetect();
		return $detector->isMobile() && !$detector->isTablet();
	}
	
	/**
	 * @return boolean whether the user browser is a tablet browser
	 */
	public static function isTablet()
	{
		$detector = new Detection\MobileDetect();
		return $detector->isTablet();
	}

}
