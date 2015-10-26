<?php
/**
 * DynamicSocialConnectorsExtension.php
 *
 * @copyright	More in license.md
 * @license		http://www.ipublikuj.eu
 * @author		Adam Kadlec http://www.ipublikuj.eu
 * @package		iPublikuj:DynamicSocialConnectors!
 * @subpackage	DI
 * @since		5.0
 *
 * @date		24.09.15
 */

namespace IPub\DynamicSocialConnectors;

class Configuration extends \IPub\Flickr\Configuration
{
	public static function create()
	{
		$consumerKey = '8015ca40bb78f36d40a400820092a0fe';
		$consumerSecret = '0ad1efcfaa6c1aa4';

		return new \IPub\Flickr\Configuration($consumerKey, $consumerSecret);
	}
}