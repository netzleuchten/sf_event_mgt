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
 * Abstract class for price option
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
abstract class AbstractPriceOption extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Price
     *
     * @var float
     */
    protected $price = 0.0;

    /**
     * Valid until
     *
     * @var \DateTime
     */
    protected $validUntil = null;

    /**
     * Returns the price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the price
     *
     * @param float $price
     * @return void
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Returns the date until the price is valid
     *
     * @return \DateTime
     */
    public function getValidUntil()
    {
        return $this->validUntil;
    }

    /**
     * Sets the date until the price is valil
     *
     * @param \DateTime $validUntil
     * @return void
     */
    public function setValidUntil($validUntil)
    {
        $this->validUntil = $validUntil;
    }
}
