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

use Nette;
use Nette\Http;

use IPub;
use IPub\Flickr;
use IPub\OAuth;

class FlickrClient
{
	/**
	 * @param string $consumerKey
	 * @param string $consumerSecret
	 * @param Flickr\Configuration $config
	 * @param Flickr\SessionStorage $session
	 * @param OAuth\HttpClient $httpClient
	 * @param Http\IRequest $httpRequest
	 *
	 * @return Flickr\Client
	 */
	public static function create(
		$consumerKey,
		$consumerSecret,
		Flickr\Configuration $config,
		Flickr\SessionStorage $session,
		OAuth\HttpClient $httpClient,
		Http\IRequest $httpRequest
	) {
		// Set consumer key to config
		$config->consumerKey = $consumerKey;
		// Set consumer secret to config
		$config->consumerSecret = $consumerSecret;

		// Create oAuth consumer
		$consumer = new OAuth\Consumer($config->consumerKey, $config->consumerSecret);

		// Create new client
		return new Flickr\Client($consumer, $httpClient, $config, $session, $httpRequest);
	}
}