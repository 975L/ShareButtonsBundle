<?php
/*
 * (c) 2019: 975L <contact@975l.com>
 * (c) 2019: Laurent Marquet <laurent.marquet@laposte.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace c975L\ShareButtonsBundle\Security;

use c975L\ConfigBundle\Service\ConfigServiceInterface;
use c975L\ShareButtonsBundle\Entity\ShareButtons;
use LogicException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManagerInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

/**
 * Voter for EsceptionChecker access
 * @author Laurent Marquet <laurent.marquet@laposte.net>
 * @copyright 2019 975L <contact@975l.com>
 */
class ShareButtonsVoter extends Voter
{
    /**
     * Used for access to config
     * @var string
     */
    final public const CONFIG = 'c975LShareButtons-config';

    /**
     * Used for access to dashboard
     * @var string
     */
    final public const DASHBOARD = 'c975LShareButtons-dashboard';

    /**
     * Used for access to help
     * @var string
     */
    final public const HELP = 'c975LShareButtons-help';

    /**
     * Contains all the available attributes to check with in supports()
     * @var array
     */
    private const ATTRIBUTES = [self::CONFIG, self::DASHBOARD, self::HELP];

    public function __construct(
        /**
         * Stores ConfigServiceInterface
         */
        private readonly ConfigServiceInterface $configService,
        /**
         * Stores AccessDecisionManagerInterface
         */
        private readonly AccessDecisionManagerInterface $decisionManager
    )
    {
    }

    /**
     * {@inheritdoc}
     */
    protected function supports($attribute, $subject): bool
    {
        if (null !== $subject) {
            return $subject instanceof ShareButtons && in_array($attribute, self::ATTRIBUTES);
        }

        return in_array($attribute, self::ATTRIBUTES);
    }

    /**
     * {@inheritdoc}
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool
    {
        return match ($attribute) {
            self::CONFIG, self::DASHBOARD, self::HELP => $this->decisionManager->decide($token, [$this->configService->getParameter('c975LShareButtons.roleNeeded', 'c975l/sharebuttons-bundle')]),
            default => throw new LogicException('Invalid attribute: ' . $attribute),
        };
    }
}
