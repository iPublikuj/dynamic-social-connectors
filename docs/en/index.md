# Quickstart

This extensions adds support for dynamical update of some social connectors like [Kdyby/Facebook](https://github.com/Kdyby/facebook) or [IPub/twitter](https://github.com/iPublikuj/twitter) etc.

## Installation

The best way to install ipub/dynamic-social-connectors is using [Composer](http://getcomposer.org/):

```sh
$ composer require ipub/dynamic-social-connectors
```

After that you have to register extension in config.neon.

```neon
extensions:
	dynamicSocialConnectors: IPub\DynamicSocialConnectors\DI\DynamicSocialConnectorsExtension
```

## Usage

Now you have to define your custom factories which have to override default services of selected connectors

```neon
	dynamicSocialConnectors:
		flickr:
			name: flickr.client
			factory: Path\To\Your\Custom\FlickrFactory::create
			class: IPub\Flickr\Client
			arguments: [
				consumerKey: "123456789", consumerSecret: "a1b2c3d4"
			]
```

In the **name** you have to define service name which you want to override. For example for Flickr it could be found [here](https://github.com/iPublikuj/flickr/blob/master/src/IPub/Flickr/DI/FlickrExtension.php#L53)

The **factory** section define the path to your factory which will be used for recreation of overridden service.

And the **class** section is for defining class name of the overridden service.

If you need you can use optional section **arguments** and define here an array of arguments which will be pass to the factory.

### Example factory

Here you can see how your custom factory could look like:

```php
class FlickrClient
{
	/**
	 * @param string $consumerKey
	 * @param string $consumerSecret
	 * @param IPub\Flickr\Configuration $config
	 * @param IPub\Flickr\SessionStorage $session
	 * @param IPub\OAuth\HttpClient $httpClient
	 * @param Nette\Http\IRequest $httpRequest
	 *
	 * @return IPub\Flickr\Client
	 */
	public static function create(
		$consumerKey,
		$consumerSecret,
		IPub\Flickr\Configuration $config,
		IPub\Flickr\SessionStorage $session,
		IPub\OAuth\HttpClient $httpClient,
		Nette\Http\IRequest $httpRequest
	) {
		// Set consumer key to config
		$config->consumerKey = $consumerKey;
		// Set consumer secret to config
		$config->consumerSecret = $consumerSecret;

		// Create oAuth consumer
		$consumer = new IPub\OAuth\Consumer($config->consumerKey, $config->consumerSecret);

		// Create new client
		return new IPub\Flickr\Client($consumer, $httpClient, $config, $session, $httpRequest);
	}
}
```