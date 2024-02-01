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
    public function __construct(
        /**
         * Stores ConfigServiceInterface
         */
        private readonly ConfigServiceInterface $configService
    ) {
    }

    /**
     * {@inheritdoc}
     */
    public function getMainShares()
    {
        return ['facebook', 'twitter', 'linkedin', 'pinterest', 'email'];
    }

    /**
     * {@inheritdoc}
     */
    public function getShareData(string $share)
    {
        $shares = [
            //Main shares
            'facebook' => [
                'icon' => 'fab fa-facebook-f',
                'url' => 'https://www.facebook.com/sharer/sharer.php?u='
            ],
            'twitter' => [
                'icon' => 'fab fa-twitter',
                'url' => 'https://twitter.com/intent/tweet?url='
            ],
            'linkedin' =>
            [
                'icon' => 'fab fa-linkedin-in',
                'url' => 'https://www.linkedin.com/shareArticle?url='
            ],
            'pinterest' => [
                'icon' => 'fab fa-pinterest-p',
                'url' => 'https://pinterest.com/pin/create/button/?url='
            ],
            'email' => [
                'icon' => 'fas fa-envelope',
                'url' => 'mailto:?body='
            ],
            //Other shares
            'blogger' => [
                'icon' => 'fab fa-blogger-b',
                'url' => 'https://www.blogger.com/start?successUrl=/blog-this.g?t&passive=true&u='
            ],
            'buffer' => [
                'icon' => 'fab fa-buffer',
                'url' => 'https://bufferapp.com/add?url='
            ],
            'delicious' => [
                'icon' => 'fab fa-delicious',
                'url' => 'https://delicious.com/save?v=5&noui&jump=close&url='
            ],
            'evernote' => [
                'icon' => 'fab fa-evernote',
                'url' => 'https://www.evernote.com/clip.action?url='
            ],
            'pocket' => [
                'icon' => 'fab fa-get-pocket',
                'url' => 'https://getpocket.com/save?url='
            ],
            'reddit' => [
                'icon' => 'fab fa-reddit-alien',
                'url' => 'https://reddit.com/submit?url='
            ],
            'skype' => [
                'icon' => 'fab fa-skype',
                'url' => 'https://web.skype.com/share?url='
            ],
            'stumbleupon' => [
                'icon' => 'fab fa-stumbleupon',
                'url' => 'https://www.stumbleupon.com/submit?url='
            ],
            'tumblr' => [
                'icon' => 'fab fa-tumblr',
                'url' => 'https://www.tumblr.com/share?u='
            ],
            'whatsapp' => [
                'icon' => 'fab fa-whatsapp',
                'url' => 'https://web.whatsapp.com/send?text='
            ],
            'wordpress' => [
                'icon' => 'fab fa-wordpress',
                'url' => 'https://wordpress.com/press-this.php?u='
            ],
        ];

        if (isset($shares[$share])) {
            return $shares[$share];
        }

        return false;
    }
}
