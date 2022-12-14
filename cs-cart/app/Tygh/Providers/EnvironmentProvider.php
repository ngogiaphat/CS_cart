<?php
/***************************************************************************
 *                                                                          *
 *   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 *                                                                          *
 ****************************************************************************
 * PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
 * "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
 ****************************************************************************/

namespace Tygh\Providers;

use Pimple\Container;
use Tygh\SoftwareProductEnvironment;

/**
 * Class EnvironmentProvider is intended to register environment-related services into the Application container.
 *
 * @package Tygh\Providers
 */
class EnvironmentProvider implements \Pimple\ServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function register(Container $app)
    {
        $app['product.env'] = function (Container $app) {
            $store_mode = fn_get_storage_data('store_mode');

            $licensing_environment = new SoftwareProductEnvironment(
                PRODUCT_NAME,
                PRODUCT_VERSION,
                $store_mode,
                PRODUCT_STATUS,
                PRODUCT_BUILD,
                PRODUCT_EDITION,
                PRODUCT_RELEASE_TIMESTAMP
            );

            return $licensing_environment;
        };
    }
}
