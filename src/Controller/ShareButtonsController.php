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
use Symfony\Component\Routing\Annotation\Route;
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

//DASHBOARD
    /**
     * Displays the dashboard
     * @return Response
     * @throws AccessDeniedException
     */
    #[Route(
        '/share/dashboard',
        name: 'sharebuttons_dashboard',
        methods: ['GET']
    )]
    public function dashboard()
    {
        $this->denyAccessUnlessGranted('c975LShareButtons-dashboard', null);

        //Renders the dashboard
        return $this->render('@c975LShareButtons/pages/dashboard.html.twig');
    }

    //SHARE
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

//CONFIG
    /**
     * Displays the configuration
     * @return Response
     * @throws AccessDeniedException
     */
    #[Route(
        '/share/config',
        name: 'sharebuttons_config',
        methods: ['GET', 'POST']
    )]
    public function config(Request $request, ConfigServiceInterface $configService)
    {
        $this->denyAccessUnlessGranted('c975LShareButtons-config', null);

        //Defines form
        $form = $configService->createForm('c975l/sharebuttons-bundle');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //Validates config
            $configService->setConfig($form);

            //Redirects
            return $this->redirectToRoute('sharebuttons_dashboard');
        }

        //Renders the config form
        return $this->render(
            '@c975LConfig/forms/config.html.twig',
            ['form' => $form->createView(), 'toolbar' => '@c975LShareButtons']);
    }

//HELP
    /**
     * Displays the help
     * @return Response
     * @throws AccessDeniedException
     */
    #[Route(
        '/share/help',
        name: 'sharebuttons_help',
        methods: ['GET']
    )]
    public function help()
    {
        $this->denyAccessUnlessGranted('c975LShareButtons-help', null);

        //Renders the help
        return $this->render('@c975LShareButtons/pages/help.html.twig');
    }
}
