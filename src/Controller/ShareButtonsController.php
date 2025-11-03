<?php
/*
 * (c) 2019: 975L <contact@975l.com>
 * (c) 2019: Laurent Marquet <laurent.marquet@laposte.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace c975L\ShareButtonsBundle\Controller;

use c975L\ConfigBundle\Service\ConfigServiceInterface;
use c975L\ShareButtonsBundle\Service\ShareButtonsServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Main Controller class
 * @author Laurent Marquet <laurent.marquet@laposte.net>
 * @copyright 9 975L <contact@975l.com>
 */
class ShareButtonsController extends AbstractController
{
    public function __construct(
        /**
         * Stores ShareButtonsService
         */
        private readonly ShareButtonsServiceInterface $shareButtonsService
    )
    {
    }

// REDIRECT POST TO GET SHARE
    /**
     * Redirect calls made with post to get Route to avoid errors
     * @return Response
     */
    #[Route(
        '/share/{share}/{url}',
        name: 'sharebuttons_share_redirect',
        requirements: [
            'url' => '^.*$'
        ],
        methods: ['POST']
    )]
    public function shareRedirect($share, $url)
    {
        //Redirects to share url
        return $this->redirectToroute('sharebuttons_share', [
            'share' => $share,
            'url' => $url
        ]);
    }

// SHARE
    /**
     * Creates the ShareButtons from url call (mainly from link sent in email built with Monolog)
     * @return Response
     */
    #[Route(
        '/share/{share}/{url}',
        name: 'sharebuttons_share',
        requirements: [
            'url' => '^.*$'
        ],
        methods: ['GET']
    )]
    public function share($share, $url)
    {
        //Redirects to share url
        $shareData = $this->shareButtonsService->getShareData($share);
        if (false !== $shareData) {
            return $this->redirect($shareData['url'] . urldecode($url));
        }

        return new Response();
    }
}
