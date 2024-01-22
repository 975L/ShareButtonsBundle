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
    )
    {
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
            'facebook' => ['icon' => 'fab fa-facebook-f', 'color' => '#3c5a99', 'url' => 'https://www.facebook.com/sharer/sharer.php?u='],
            'twitter' => ['icon' => 'fab fa-twitter', 'color' => '#1da1f2', 'url' => 'https://twitter.com/intent/tweet?url='],
            'linkedin' => ['icon' => 'fab fa-linkedin-in', 'color' => '#0077b5', 'url' => 'https://www.linkedin.com/shareArticle?url='],
            'pinterest' => ['icon' => 'fab fa-pinterest-p', 'color' => '#bd081c', 'url' => 'https://pinterest.com/pin/create/button/?url='],
            'email' => ['icon' => 'fas fa-envelope', 'color' => '#2f4f4f', 'url' => 'mailto:?body='],
            //Other shares
            'blogger' => ['icon' => 'fab fa-blogger-b', 'color' => '#f57d00', 'url' => 'https://www.blogger.com/start?successUrl=/blog-this.g?t&passive=true&u='],
            'buffer' => ['icon' => 'fab fa-buffer', 'color' => '#168eea', 'url' => 'https://bufferapp.com/add?url='],
            'delicious' => ['icon' => 'fab fa-delicious', 'color' => '#3399ff', 'url' => 'https://delicious.com/save?v=5&noui&jump=close&url='],
            'evernote' => ['icon' => 'fab fa-evernote', 'color' => '#2dbe60', 'url' => 'https://www.evernote.com/clip.action?url='],
            'pocket' => ['icon' => 'fab fa-get-pocket', 'color' => '#ef4056', 'url' => 'https://getpocket.com/save?url='],
            'reddit' => ['icon' => 'fab fa-reddit-alien', 'color' => '#ff4500', 'url' => 'https://reddit.com/submit?url='],
            'skype' => ['icon' => 'fab fa-skype', 'color' => '#00aff0', 'url' => 'https://web.skype.com/share?url='],
            'stumbleupon' => ['icon' => 'fab fa-stumbleupon', 'color' => '#eb4924', 'url' => 'https://www.stumbleupon.com/submit?url='],
            'tumblr' => ['icon' => 'fab fa-tumblr', 'color' => '#35465c', 'url' => 'https://www.tumblr.com/share?u='],
            'whatsapp' => ['icon' => 'fab fa-whatsapp', 'color' => '#25d366', 'url' => 'https://web.whatsapp.com/send?text='],
            'wordpress' => ['icon' => 'fab fa-wordpress', 'color' => '#21759b', 'url' => 'https://wordpress.com/press-this.php?u='],
        ];

        if (isset($shares[$share])) {
            return $shares[$share];
        }

        return false;
    }
}
