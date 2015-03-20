<?php
/**
 * Plugin class
 */
namespace Phile\Plugin\Phile\PhpFastCache;

use Phile\Core\ServiceLocator;
use Phile\Plugin\AbstractPlugin;
use Phile\Plugin\Phile\PhpFastCache\PhpFastCache;

/**
 * Class Plugin
 * Default Phile cache engine
 *
 * @author  PhileCMS
 * @link    https://philecms.com
 * @license http://opensource.org/licenses/MIT
 * @package Phile\Plugin\Phile\PhpFastCache
 */
class Plugin extends AbstractPlugin {

	protected $events = ['plugins_loaded' => 'onPluginsLoaded'];

	/**
	 * onPluginsLoaded method
	 *
	 * @param null   $data
	 *
	 * @return mixed|void
	 */
	public function onPluginsLoaded($data = null) {
		// phpFastCache not working in CLI mode...
		if (!PHILE_CLI_MODE) {
			$vendor = $this->getPluginPath('lib/phpfastcache/phpfastcache.php');
			require_once($vendor);
			\phpFastCache::setup($this->settings);
			$cache = phpFastCache();
			ServiceLocator::registerService('Phile_Cache',
				new PhpFastCache($cache));
		}
	}
}
