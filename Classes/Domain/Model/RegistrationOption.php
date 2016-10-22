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
 * Registration option
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
class RegistrationOption extends AbstractModelWithPriceOption
{
    /**
     * Title
     *
     * @var string
     */
    protected $title = '';

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Link
     *
     * @var string
     */
    protected $link = '';

    /**
     * Date
     *
     * @var \DateTime
     */
    protected $date = null;

    /**
     * Show the amount select field
     *
     * @var bool
     */
    protected $showAmount = false;

    /**
     * Label for amount select field
     *
     * @var string
     */
    protected $amountLabel = '';

    /**
     * Max possible value for the amount select field
     *
     * @var int
     */
    protected $amountMax = 1;

    /**
     * Show the amount input field
     *
     * @var bool
     */
    protected $showAmountInput = false;

    /**
     * Label for the amount input field
     *
     * @var string
     */
    protected $amountInputLabel = '';

    /**
     * Event
     *
     * @var \DERHANSEN\SfEventMgt\Domain\Model\Event
     */
    protected $event = null;

    /**
     * PriceOptions (overridden from abstract class!)
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DERHANSEN\SfEventMgt\Domain\Model\RegistrationOptionPrice>
     * @cascade remove
     * @lazy
     */
    protected $priceOptions = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets descrption
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets link
     *
     * @param string $link
     * @return void
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * Returns date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets date
     *
     * @param \DateTime $date
     * @return void
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Returns event
     *
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Sets event
     *
     * @param Event $event
     * @return void
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * Adds a priceOption
     *
     * @param \DERHANSEN\SfEventMgt\Domain\Model\RegistrationOptionPrice $registrationOptionPrice
     *
     * @return void
     */
    public function addPriceOptions(RegistrationOptionPrice $registrationOptionPrice)
    {
        $this->priceOptions->attach($registrationOptionPrice);
    }

    /**
     * Removes a priceOption
     *
     * @param \DERHANSEN\SfEventMgt\Domain\Model\RegistrationOptionPrice $registrationOptionPrice
     *
     * @return void
     */
    public function removePriceOptions(RegistrationOptionPrice $registrationOptionPrice)
    {
        $this->priceOptions->detach($registrationOptionPrice);
    }

    /**
     * Returns showAmount
     *
     * @return boolean
     */
    public function getShowAmount()
    {
        return $this->showAmount;
    }

    /**
     * Sets showAmount
     *
     * @param boolean $showAmount
     */
    public function setShowAmount($showAmount)
    {
        $this->showAmount = $showAmount;
    }

    /**
     * Returns amountLabel
     *
     * @return string
     */
    public function getAmountLabel()
    {
        return $this->amountLabel;
    }

    /**
     * Sets amountLabel
     *
     * @param string $amountLabel
     * @return void
     */
    public function setAmountLabel($amountLabel)
    {
        $this->amountLabel = $amountLabel;
    }

    /**
     * Returns amountMax
     *
     * @return int
     */
    public function getAmountMax()
    {
        return $this->amountMax;
    }

    /**
     * Sets amountMax
     *
     * @param int $amountMax
     * @return void
     */
    public function setAmountMax($amountMax)
    {
        $this->amountMax = $amountMax;
    }

    /**
     * Returns showAmountInput
     *
     * @return boolean
     */
    public function getShowAmountInput()
    {
        return $this->showAmountInput;
    }

    /**
     * Sets showAmountInput
     *
     * @param boolean $showAmountInput
     * @return void
     */
    public function setShowAmountInput($showAmountInput)
    {
        $this->showAmountInput = $showAmountInput;
    }

    /**
     * Returns amountInputLabel
     *
     * @return string
     */
    public function getAmountInputLabel()
    {
        return $this->amountInputLabel;
    }

    /**
     * Sets amountInputLabel
     *
     * @param string $amountInputLabel
     * @return void
     */
    public function setAmountInputLabel($amountInputLabel)
    {
        $this->amountInputLabel = $amountInputLabel;
    }
}
