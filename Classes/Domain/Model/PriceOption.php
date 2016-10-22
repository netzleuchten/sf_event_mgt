<?php
namespace DERHANSEN\SfEventMgt\Domain\Model;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Price option
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
class PriceOption extends AbstractPriceOption
{
    /**
     * Event
     *
     * @var \DERHANSEN\SfEventMgt\Domain\Model\Event
     */
    protected $event = null;

    /**
     * Returns the event
     *
     * @return \DERHANSEN\SfEventMgt\Domain\Model\Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Sets the event
     *
     * @param \DERHANSEN\SfEventMgt\Domain\Model\Event $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }
}
