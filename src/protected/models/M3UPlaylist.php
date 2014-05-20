<?php

use Behat\Transliterator\Transliterator;

/**
 * Represents an M3U playlist. Once populated using addItem() it can be used as 
 * a string
 *
 * @author Sam Stenvall <neggelandia@gmail.com>
 * @author Víctor Zabalza <vzabalza@gmail.com>
 * @copyright Copyright &copy; Sam Stenvall 2013-
 * @license https://www.gnu.org/licenses/gpl.html The GNU General Public License v3.0
 */
class M3UPlaylist
{

	/**
	 * @var array the playlist items
	 */
	private $_items = array();

	/**
	 * Adds an item to the playlist
	 * @param array $item the item
	 */
	public function addItem($item)
	{
		$this->_items[] = $item;
	}

	/**
	 * Generates the playlist data
	 * @return stromg
	 */
	public function __toString()
	{
		ob_start();

		echo '#EXTM3U'.PHP_EOL;

		foreach ($this->_items as $item)
		{
			echo "#EXTINF:".$item['runtime'].','.$item['label'].PHP_EOL;
			echo $item['url'].PHP_EOL;
		}

		return ob_get_clean();
	}
	
	/**
	 * Sanitizes the specified filename to minimize issues with various 
	 * platforms
	 * @param string $name the filename
	 * @return string the sanitized filename
	 */
	public static function sanitizeFilename($name)
	{
		return Transliterator::transliterate($name);
	}

}