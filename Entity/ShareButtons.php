<?php
/*
 * (c) 2019: 975L <contact@975l.com>
 * (c) 2019: Laurent Marquet <laurent.marquet@laposte.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace c975L\ShareButtonsBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entity ShareButtons (linked to DB table `exception_checker`)
 * @author Laurent Marquet <laurent.marquet@laposte.net>
 * @copyright 2019 975L <contact@975l.com>
 *
 * @ORM\Table(name="exception_checker", indexes={@ORM\Index(name="un_exception_checker", columns={"url"})})
 * @ORM\Entity(repositoryClass="c975L\ShareButtonsBundle\Repository\ShareButtonsRepository")
 */
class ShareButtons
{
    /**
     * ShareButtons unique id
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Url shared
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    protected $url;

    /**
     * Kind of sharing used
     * @var string
     *
     * @ORM\Column(name="kind", type="string", length=24)
     */
    protected $kind;

    /**
     * Date of sharing
     * @var DateTime|null
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    protected $date;

    /**
     * Time of sharing
     * @var DateTime|null
     *
     * @ORM\Column(name="time", type="date", nullable=true)
     */
    protected $time;

    /**
     * DateTime of creation for ShareButtons
     * @var DateTime
     *
     * @ORM\Column(name="creation", type="datetime")
     */
    protected $creation;

    /**
     * Get id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set url
     * @param string
     * @return ShareButtons
     */
    public function setUrl(?string $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     * @return string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Set kind
     * @param string
     * @return ShareButtons
     */
    public function setKind(?string $kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Get kind
     * @return string
     */
    public function getKind(): ?string
    {
        return $this->kind;
    }

    /**
     * Set date
     * @param DateTime|null
     * @return ShareButtons
     */
    public function setDate(?DateTime $date = null)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     */
    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    /**
     * Set time
     * @param string|null
     * @return ShareButtons
     */
    public function setTime(?DateTime $time = null)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     */
    public function getTime(): ?DateTime
    {
        return $this->time;
    }

    /**
     * Set creation
     * @param DateTime
     * @return ShareButtons
     */
    public function setCreation(?DateTime $creation)
    {
        $this->creation = $creation;

        return $this;
    }

    /**
     * Get creation
     * @return DateTime
     */
    public function getCreation(): ?DateTime
    {
        return $this->creation;
    }
}
