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
 * Twig extension to provide the xhtml code for requested button using: `sharebuttons(['SHARE1', 'SHARE2', 'SHARE3', etc.], 'STYLE[distinct|ellipse|toolbar](default distinct)', 'SIZE[lg|md|sm|xs](default md)', 'ALIGNMENT[left|center|right](default center)', DISPLAY_ICON[true|false](default true), DISPLAY_TEXTX[true|false](default false))`
 * @author Laurent Marquet <laurent.marquet@laposte.net>
 * @copyright 2019 975L <contact@975l.com>
 */
class ShareButtons extends AbstractExtension
{
    /**
     * Stores the shareButtonsServiceInterface
     * @var ShareButtonsServiceInterface
     */
    private $sharebuttonsService;

    public function __construct(ShareButtonsServiceInterface $sharebuttonsService)
    {
        $this->sharebuttonsService = $sharebuttonsService;
    }

    public function getFunctions()
    {
        return array(
            new TwigFunction(
                'sharebuttons',
                array($this, 'sharebuttons'),
                array(
                    'needs_environment' => true,
                    'is_safe' => array('html'),
                )
            ),
        );
    }

    /**
     * Returns the xhtml code for the button
     * @return string
     */
    public function sharebuttons(Environment $environment, $shares, $style = 'distinct', $size = 'md', $alignment = 'center', $displayIcon = true, $displayText = false, $url = null)
    {
        //Defines data
        $shares = 'main' === $shares ? $this->sharebuttonsService->getMainShares() : $shares;
        $style = '' === $style ? 'distinct' : $style;

        //Defines shares to display
        $sharing = null;
        foreach ($shares as $share) {
            $shareData = $this->sharebuttonsService->getShareData($share);
            if (false !== $shareData) {
                $sharing .= $environment->render('@c975LShareButtons/button.html.twig', array(
                    'share' => $share,
                    'size' => $size,
                    'icon' => $shareData['icon'],
                    'color' => $shareData['color'],
                    'displayIcon' => $displayIcon,
                    'displayText' => $displayText,
                    'url' => $url,
                ));
            }
        }

        //Returns sharing buttons
        $loader = new FilesystemLoader(__DIR__ . '/../Resources/views');
        if (null !== $sharing && $loader->exists($style . '.html.twig')) {
            return $environment->render('@c975LShareButtons/' . $style . '.html.twig', array(
                'sharing' => $sharing,
                'size' => $size,
                'alignment' => $alignment,
            ));
        }
    }
}
