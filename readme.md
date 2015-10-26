# Dynamic social connectors

[![Build Status](https://img.shields.io/travis/iPublikuj/dynamic-social-connectors.svg?style=flat-square)](https://travis-ci.org/iPublikuj/dynamic-social-connectors)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/iPublikuj/dynamic-social-connectors.svg?style=flat-square)](https://scrutinizer-ci.com/g/iPublikuj/dynamic-social-connectors/?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/ipub/dynamic-social-connectors.svg?style=flat-square)](https://packagist.org/packages/ipub/dynamic-social-connectors)
[![Composer Downloads](https://img.shields.io/packagist/dt/ipub/dynamic-social-connectors.svg?style=flat-square)](https://packagist.org/packages/ipub/dynamic-social-connectors)

Flickr API client with authorization for [Nette Framework](http://nette.org/)

## Installation

The best way to install ipub/dynamic-social-connectors is using  [Composer](http://getcomposer.org/):

```sh
$ composer require ipub/dynamic-social-connectors
```

After that you have to register extension in config.neon.

```neon
extensions:
	dynamicSocialConnectors: IPub\DynamicSocialConnectors\DI\DynamicSocialConnectorsExtension
```

## Documentation

Learn how to override default social connectors with custom factories in [documentation](https://github.com/iPublikuj/dynamic-social-connectors/blob/master/docs/en/index.md).

***
Homepage [http://www.ipublikuj.eu](http://www.ipublikuj.eu) and repository [http://github.com/iPublikuj/dynamic-social-connectors](http://github.com/iPublikuj/dynamic-social-connectors).