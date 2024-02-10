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
                'url' => 'https://www.facebook.com/sharer/sharer.php?u='
            ],
            'twitter' => [
                'url' => 'https://twitter.com/intent/tweet?url='
            ],
            'linkedin' =>
            [
                'url' => 'https://www.linkedin.com/shareArticle?url='
            ],
            'pinterest' => [
                'url' => 'https://pinterest.com/pin/create/button/?url='
            ],
            'email' => [
                'url' => 'mailto:?body='
            ],
            //Other shares
            'blogger' => [
                'url' => 'https://www.blogger.com/start?successUrl=/blog-this.g?t&passive=true&u='
            ],
            'buffer' => [
                'url' => 'https://bufferapp.com/add?url='
            ],
            'delicious' => [
                'url' => 'https://delicious.com/save?v=5&noui&jump=close&url='
            ],
            'evernote' => [
                'url' => 'https://www.evernote.com/clip.action?url='
            ],
            'reddit' => [
                'url' => 'https://reddit.com/submit?url='
            ],
            'skype' => [
                'url' => 'https://web.skype.com/share?url='
            ],
            'stumbleupon' => [
                'url' => 'https://www.stumbleupon.com/submit?url='
            ],
            'tumblr' => [
                'url' => 'https://www.tumblr.com/share?u='
            ],
            'whatsapp' => [
                'url' => 'https://web.whatsapp.com/send?text='
            ],
            'wordpress' => [
                'url' => 'https://wordpress.com/press-this.php?u='
            ],
        ];

        if (isset($shares[$share])) {
            return $shares[$share];
        }

        return false;
    }
}
