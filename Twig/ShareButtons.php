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
 * Twig extension to provide the xhtml code for requested button using: `shareButtons_button(path('ROUTE', { 'VARIABLE': object.PROPERTY }), 'BUTTON_NAME', 'SIZE[lg|md|sm|xs](default md)', 'USE_ANOTHER_LABEL', 'USE_ANOTHER_STYLE')
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
    public function sharebuttons(Environment $environment, $shares, $style = 'distinct', $size = 'md', $alignment = 'center', $displayIcon = true, $displayText = false)
    {
        //Defines main shares
        $shares = 'main' === $shares ? $this->sharebuttonsService->getMainShares() : $shares;

        $style = '' === $style ? 'distinct' : $style;

        //Defines shares to display
        $sharing = null;
        foreach ($shares as $share) {
            //Defines $icon and $color
            extract($this->sharebuttonsService->defineButton($share));

            if (null !== $icon) {
                $sharing .= $environment->render('@c975LShareButtons/button.html.twig', array(
                    'share' => $share,
                    'size' => $size,
                    'icon' => $icon,
                    'color' => $color,
                    'displayIcon' => $displayIcon,
                    'displayText' => $displayText,
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
