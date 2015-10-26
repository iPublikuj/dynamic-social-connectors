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

namespace IPub\DynamicSocialConnectors\DI;

use Nette;
use Nette\DI;
use Nette\Utils;
use Nette\Neon;
use Nette\PhpGenerator as Code;


class DynamicSocialConnectorsExtension extends DI\CompilerExtension
{
	protected $structure = [
		'name' => NULL,
		'factory' => NULL,
		'class' => NULL,
		'arguments' => [],
	];

	public function loadConfiguration()
	{
		// Get extension configuration
		$config = $this->getConfig();
		// Get container builder
		$builder = $this->getContainerBuilder();

		foreach($config as $connector => $settings) {
			$settings = array_merge($this->structure, $settings);

			Utils\Validators::assert($settings['name'], 'string', 'Connector service name');
			Utils\Validators::assert($settings['factory'], 'string', 'Connector service factory');
			Utils\Validators::assert($settings['class'], 'string', 'Connector service class');

			// Check if connector service exits
			if ($builder->hasDefinition($settings['name'])) {
				$builder->removeDefinition($settings['name']);
				// Redefine social connector with custom factory
				$service = $builder->addDefinition($this->prefix($connector))
					->setFactory($settings['factory'])
					->setClass($settings['class']);

				// Check if additional arguments are defined
				if (Utils\Validators::is($settings['arguments'], 'array') && count($settings['arguments'])) {
					$service->setArguments($settings['arguments']);
				}

			} else {
				throw new \Exception("Service with given name '{$settings['name']}' not found.");
			}
		}
	}
}