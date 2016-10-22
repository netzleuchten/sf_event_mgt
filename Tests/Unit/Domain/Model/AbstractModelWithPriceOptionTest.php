<?php

namespace DERHANSEN\SfEventMgt\Tests\Unit\Domain\Model;

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

use DERHANSEN\SfEventMgt\Domain\Model\PriceOption;
use DERHANSEN\SfEventMgt\Domain\Model\RegistrationOptionPrice;

/**
 * Test case for class \DERHANSEN\SfEventMgt\Domain\Model\AbstractPriceOption
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
class AbstractModelWithPriceOptionTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * AbstractModelWithPriceOption mock
     *
     * @var \DERHANSEN\SfEventMgt\Domain\Model\AbstractModelWithPriceOption
     */
    protected $subject = null;

    /**
     * Setup
     *
     * @return void
     */
    protected function setUp()
    {
        $this->subject = $this->getMockForAbstractClass('DERHANSEN\\SfEventMgt\\Domain\\Model\\AbstractModelWithPriceOption');
    }

    /**
     * Teardown
     *
     * @return void
     */
    protected function tearDown()
    {
        unset($this->subject);
    }

    /**
     * Test if initial value for price is returned
     *
     * @test
     * @return void
     */
    public function getPriceReturnsInitialValueForFloat()
    {
        $this->assertSame(
            0.0,
            $this->subject->getPrice()
        );
    }

    /**
     * Test if price can be set
     *
     * @test
     * @return void
     */
    public function setPriceForFloatSetsPrice()
    {
        $this->subject->setPrice(3.14159265);

        $this->assertAttributeEquals(
            3.14159265,
            'price',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * Test if initial value for priceOption is returned
     *
     * @test
     * @return void
     */
    public function getPriceOptionsReturnsInitialValueforObjectStorage()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->assertEquals(
            $newObjectStorage,
            $this->subject->getPriceOptions()
        );
    }

    /**
     * Test if priceOption can be set
     *
     * @test
     * @return void
     */
    public function setPriceOptionForObjectStorageSetsPriceOption()
    {
        $priceOption = new \DERHANSEN\SfEventMgt\Domain\Model\PriceOption();
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $newObjectStorage->attach($priceOption);
        $this->subject->setPriceOptions($newObjectStorage);
        $this->assertEquals($newObjectStorage, $this->subject->getPriceOptions());
    }

    /**
     * Test if active price option is returned currectly
     *
     * @test
     * @return void
     */
    public function getActivePriceOptionsReturnsOnlyActivePriceOptions()
    {
        $dateYesterday = new \DateTime('yesterday');
        $dateToday = new \DateTime('today');
        $dateTomorrow = new \DateTime('tomorrow');

        $priceOption1 = new PriceOption();
        $priceOption1->setPrice(10.00);
        $priceOption1->setValidUntil($dateYesterday);

        $priceOption2 = new PriceOption();
        $priceOption2->setPrice(12.00);
        $priceOption2->setValidUntil($dateToday);

        $priceOption3 = new PriceOption();
        $priceOption3->setPrice(14.00);
        $priceOption3->setValidUntil($dateTomorrow);

        $priceOptions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $priceOptions->attach($priceOption1);
        $priceOptions->attach($priceOption2);
        $priceOptions->attach($priceOption3);
        $this->subject->setPriceOptions($priceOptions);

        $expected = [];
        $expected[$dateToday->getTimestamp()] = $priceOption2;
        $expected[$dateTomorrow->getTimestamp()] = $priceOption3;

        $this->assertEquals($expected, $this->subject->getActivePriceOptions());
    }

    /**
     * Test if getCurrentPrice is returned if no price option set
     *
     * @test
     * @return void
     */
    public function getCurrentPriceReturnsPriceIfNoPriceOptionsSet()
    {
        $this->subject->setPrice(12.99);
        $this->assertEquals(12.99, $this->subject->getCurrentPrice());
    }

    /**
     * Test if getCurrentPrice returns price option price if set for PriceOption object
     *
     * @test
     * @return void
     */
    public function getCurrentPriceReturnsPriceOptionForPriceOptionIfSet()
    {
        $this->subject->setPrice(19.99);

        $priceOption1 = new PriceOption();
        $priceOption1->setPrice(14.99);
        $priceOption1->setValidUntil(new \DateTime('today'));

        $priceOption2 = new PriceOption();
        $priceOption2->setPrice(16.99);
        $priceOption2->setValidUntil(new \DateTime('tomorrow'));

        $priceOptions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $priceOptions->attach($priceOption1);
        $priceOptions->attach($priceOption2);
        $this->subject->setPriceOptions($priceOptions);

        $this->assertEquals(14.99, $this->subject->getCurrentPrice());
    }

    /**
     * Test if getCurrentPrice returns price option price if set for RegistrationOptionPrice object
     *
     * @test
     * @return void
     */
    public function getCurrentPriceReturnsPriceOptionForRegistrationOptionPriceIfSet()
    {
        $this->subject->setPrice(19.99);

        $priceOption1 = new RegistrationOptionPrice();
        $priceOption1->setPrice(14.99);
        $priceOption1->setValidUntil(new \DateTime('today'));

        $priceOption2 = new RegistrationOptionPrice();
        $priceOption2->setPrice(16.99);
        $priceOption2->setValidUntil(new \DateTime('tomorrow'));

        $priceOptions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $priceOptions->attach($priceOption1);
        $priceOptions->attach($priceOption2);
        $this->subject->setPriceOptions($priceOptions);

        $this->assertEquals(14.99, $this->subject->getCurrentPrice());
    }
}
