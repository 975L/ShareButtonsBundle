<?php
/*
 * (c) 2019: 975L <contact@975l.com>
 * (c) 2019: Laurent Marquet <laurent.marquet@laposte.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace c975L\ShareButtonsBundle\Twig;

use c975L\ShareButtonsBundle\Service\ShareButtonsServiceInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Twig\Loader\FilesystemLoader;

/**
 * Twig extension to provide the xhtml code for requested dropdown button using: ``
 * @author Laurent Marquet <laurent.marquet@laposte.net>
 * @copyright 2019 975L <contact@975l.com>
 */
class ShareButtonsDropdown extends AbstractExtension
{
    public function __construct(
        /**
         * Stores the shareButtonsServiceInterface
         */
        private readonly ShareButtonsServiceInterface $sharebuttonsService
    )
    {
    }

    public function getFunctions()
    {
        return [new TwigFunction(
            'sharebuttons_dropdown',
            $this->sharebuttonsDropdown(...),
            ['needs_environment' => true, 'is_safe' => ['html']]
        )];
    }

    /**
     * Returns the xhtml code for the dropdown button
     * @return string
     */
    public function sharebuttonsDropdown(Environment $environment, $shares, $url, $size = 'md', $displayIcon = true, $displayText = false)
    {
        //Defines main shares
        $shares = 'main' === $shares ? $this->sharebuttonsService->getMainShares() : $shares;

        //Defines shares to display
        $sharing = null;
        foreach ($shares as $share) {
            $shareData = $this->sharebuttonsService->getShareData($share);
            if (false !== $shareData) {
                $sharing .= $environment->render('@c975LShareButtons/buttonDropdown.html.twig', ['share' => $share, 'size' => $size, 'icon' => $shareData['icon'], 'color' => $shareData['color'], 'displayIcon' => $displayIcon, 'displayText' => $displayText, 'url' => $url]);
            }
        }

        //Returns sharing buttons
        return $environment->render('@c975LShareButtons/dropdown.html.twig', ['sharing' => $sharing, 'size' => $size]);
    }
}
