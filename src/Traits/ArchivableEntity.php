<?php

/*
 * This file is part of aakb/itstyr.
 *
 * (c) 2018–2019 ITK Development
 *
 * This source file is subject to the MIT license.
 */

namespace App\Traits;

use Doctrine\ORM\Mapping as ORM;

trait ArchivableEntity
{
    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $archivedAt;

    /**
     * Sets archivedAt.
     *
     * @param \DateTime|null $archivedAt
     *
     * @return $this
     */
    public function setArchivedAt(\DateTime $archivedAt = null)
    {
        $this->archivedAt = $archivedAt;

        return $this;
    }

    /**
     * Returns archivedAt.
     *
     * @return \DateTime
     */
    public function getArchivedAt()
    {
        return $this->archivedAt;
    }

    /**
     * Is archived?
     *
     * @return bool
     */
    public function isArchived()
    {
        return null !== $this->archivedAt;
    }
}
