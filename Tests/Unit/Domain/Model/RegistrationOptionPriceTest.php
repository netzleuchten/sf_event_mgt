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

/**
 * Test case for class \DERHANSEN\SfEventMgt\Domain\Model\RegistrationOptionPrice
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
class RegistrationOptionPriceTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * RegistrationOptionPrice object
     *
     * @var \DERHANSEN\SfEventMgt\Domain\Model\RegistrationOptionPrice
     */
    protected $subject = null;

    /**
     * Setup
     *
     * @return void
     */
    protected function setUp()
    {
        $this->subject = new \DERHANSEN\SfEventMgt\Domain\Model\RegistrationOptionPrice();
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
     * Test if registrationOption returns intitial value
     *
     * @test
     * @return void
     */
    public function getRegistrationOptionReturnsInitialValue()
    {
        $this->assertNull($this->subject->getRegistrationOption());
    }

    /**
     * Test if registrationOption can be set
     *
     * @test
     * @return void
     */
    public function setRegistrationOptionForEventSetsRegistrationOption()
    {
        $registrationOption = new \DERHANSEN\SfEventMgt\Domain\Model\RegistrationOption();
        $this->subject->setRegistrationOption($registrationOption);
        $this->assertEquals($registrationOption, $this->subject->getRegistrationOption());
    }
}
