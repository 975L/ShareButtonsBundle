<?php
/*
 * (c) 2019: 975L <contact@975l.com>
 * (c) 2019: Laurent Marquet <laurent.marquet@laposte.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace c975L\ShareButtonsBundle\Service;

use c975L\ConfigBundle\Service\ConfigServiceInterface;
use DateTime;

/**
 * Main services related to ShareButtons
 * @author Laurent Marquet <laurent.marquet@laposte.net>
 * @copyright 2017 975L <contact@975l.com>
 */
class ShareButtonsService implements ShareButtonsServiceInterface
{
    /**
     * Stores ConfigServiceInterface
     * @var ConfigServiceInterface
     */
    private $configService;

    public function __construct(ConfigServiceInterface $configService)
    {
        $this->configService = $configService;
    }

    /**
     * {@inheritdoc}
     */
    public function addShare(string $share, string $url)
    {
        if ($this->configService->getParameter('c975LShareButtons.statistics')) {
            $database = $this->configService->getParameter('c975LShareButtons.database');
            $table = $this->configService->getParameter('c975LShareButtons.table');
            if (is_string($database) && is_string($table)) {
                $sqlFile = __DIR__.'/../../var/tmp/sqlFile.sql';
                $current = new DateTime();
                $queryString = "INSERT INTO " . $database . "." . $table . " SET share='" . $share . "', url='" . urldecode($url) . "', date='" . $current->format('Y-m-d') . "', time='" . $current->format('H:i:s') . "';";
                file_put_contents($sqlFile, $queryString, FILE_APPEND | LOCK_EX);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function defineButton(string $share)
    {
        switch ($share) {
            case 'facebook':
                $icon = 'fab fa-facebook-f';
                break;
            case 'linkedin':
                $icon = 'fab fa-linkedin-in';
                break;
            case 'pinterest':
                $icon = 'fab fa-pinterest-p';
                break;
            case 'twitter':
                $icon = 'fab fa-twitter';
                break;

            default:
                $icon = null;
                break;
        }

        return $icon;
    }

    /**
     * {@inheritdoc}
     */
    public function defineShareUrl(string $share, string $url)
    {
        switch ($share) {
            case 'facebook':
                $urlShare = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
                break;
            case 'linkedin':
                $urlShare = 'https://www.linkedin.com/shareArticle?url=' . $url;
                break;
            case 'pinterest':
                $urlShare = 'https://pinterest.com/pin/create/button/?url=' . $url;
                break;
            case 'twitter':
                $urlShare = 'https://twitter.com/intent/tweet?url=' . $url;
                break;

            default:
                $urlShare = null;
                break;
        }

        return $urlShare;
    }
}
