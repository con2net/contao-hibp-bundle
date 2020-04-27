<?php

/*
 * This file is part of the Contao HIBP Bundle.
 *
 * (c) con2net,2020 stefan.meise@connect2net.de
 *
 * @license LGPL-3.0-or-later
 */

namespace con2net\ContaoHIBPBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use con2net\ContaoHIBPBundle\ContaoHIBPBundle;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoHIBPBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
