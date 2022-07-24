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
     * Stores ConfigServiceInterface
     * @var ConfigServiceInterface
     */
    private $configService;

    /**
     * Stores AccessDecisionManagerInterface
     * @var AccessDecisionManagerInterface
     */
    private $decisionManager;

    /**
     * Used for access to config
     * @var string
     */
    public const CONFIG = 'c975LShareButtons-config';

    /**
     * Used for access to dashboard
     * @var string
     */
    public const DASHBOARD = 'c975LShareButtons-dashboard';

    /**
     * Used for access to help
     * @var string
     */
    public const HELP = 'c975LShareButtons-help';

    /**
     * Contains all the available attributes to check with in supports()
     * @var array
     */
    private const ATTRIBUTES = array(
        self::CONFIG,
        self::DASHBOARD,
        self::HELP,
    );

    public function __construct(
        ConfigServiceInterface $configService,
        AccessDecisionManagerInterface $decisionManager
    )
    {
        $this->configService = $configService;
        $this->decisionManager = $decisionManager;
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
        //Defines access rights
        switch ($attribute) {
            case self::CONFIG:
            case self::DASHBOARD:
            case self::HELP:
                return $this->decisionManager->decide($token, array($this->configService->getParameter('c975LShareButtons.roleNeeded', 'c975l/sharebuttons-bundle')));
                break;
        }

        throw new LogicException('Invalid attribute: ' . $attribute);
    }
}
