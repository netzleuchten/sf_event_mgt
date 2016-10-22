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
 * Abstract class for models with price and price options
 *
 * Classes extending this class must override the "priceOptions" property and also hold an add- and
 * remove-function (abstract function not possible, since different signatures) for the overridden property
 * with the used object-type in the ObjectStorage
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
abstract class AbstractModelWithPriceOption extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Price
     *
     * @var float
     */
    protected $price = 0.0;

    /**
     * Price options (must to be overridden by extending class
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    protected $priceOptions = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->priceOptions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the price
     *
     * @return float $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the price
     *
     * @param float $price Price
     *
     * @return void
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Returns priceOptions
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getPriceOptions()
    {
        return $this->priceOptions;
    }

    /**
     * Sets priceOptions
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $priceOptions
     * @return void
     */
    public function setPriceOptions($priceOptions)
    {
        $this->priceOptions = $priceOptions;
    }

    /**
     * Returns all active price options sorted by date ASC
     *
     * @return array
     */
    public function getActivePriceOptions()
    {
        $activePriceOptions = [];
        if ($this->getPriceOptions()) {
            $compareDate = new \DateTime('today midnight');
            foreach ($this->getPriceOptions() as $priceOption) {
                if ($priceOption->getValidUntil() >= $compareDate) {
                    $activePriceOptions[$priceOption->getValidUntil()->getTimestamp()] = $priceOption;
                }
            }
        }
        ksort($activePriceOptions);
        return $activePriceOptions;
    }

    /**
     * Returns the current price of the event respecting possible price options
     *
     * @return float
     */
    public function getCurrentPrice()
    {
        $activePriceOptions = $this->getActivePriceOptions();
        if (count($activePriceOptions) >= 1) {
            // Sort active price options and return first element
            return reset($activePriceOptions)->getPrice();
        } else {
            // Just return the price field
            return $this->price;
        }
    }
}
