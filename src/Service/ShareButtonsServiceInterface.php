<?php
/*
 * (c) 2019: 975L <contact@975l.com>
 * (c) 2019: Laurent Marquet <laurent.marquet@laposte.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace c975L\ShareButtonsBundle\Service;

use c975L\ShareButtonsBundle\Entity\ShareButtons;

/**
 * Interface to be called for DI for ShareButtons Main related services
 * @author Laurent Marquet <laurent.marquet@laposte.net>
 * @copyright 2019 975L <contact@975l.com>
 */
interface ShareButtonsServiceInterface
{
    /**
     * Returns main share networks
     * @return array
     */
    public function getMainShares();

    /**
     * Returns data related to share
     * @return string|null
     */
    public function getShareData(string $share);
}
