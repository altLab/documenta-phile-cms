<?php

namespace Phile\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class PluginInstaller extends LibraryInstaller {
    /**
     * {@inheritDoc}
     */
    public function getPackageBasePath(PackageInterface $package) {
        return 'plugins' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $this->buildPackageName($package->getName()));
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType) {
        return 'phile-plugin' === $packageType;
    }

	/**
	 * convert the "-" sign into UpperCamelCase
	 *
	 * @param $name
	 *
	 * @return string
	 */
	protected function buildPackageName($name) {
		list($vendor, $package) = explode('/', $name);
		// split name string into single words
		$package = str_replace('-', ' ', $package);
		$vendor = str_replace('-', ' ', $vendor);
		// uppercase the first character of each word
		$package = ucwords(trim($package));
		$vendor = ucwords(trim($vendor));
		// just made the first character lowercase
		return lcfirst(str_replace(' ', '', $vendor)) . DIRECTORY_SEPARATOR . lcfirst(str_replace(" ", "", $package));
	}
}
