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
 * Test case for class \DERHANSEN\SfEventMgt\Domain\Model\RegistrationOption
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
class RegistrationOptionTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * RegistrationOption object
     *
     * @var \DERHANSEN\SfEventMgt\Domain\Model\RegistrationOption
     */
    protected $subject = null;

    /**
     * Setup
     *
     * @return void
     */
    protected function setUp()
    {
        $this->subject = new \DERHANSEN\SfEventMgt\Domain\Model\RegistrationOption();
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
     * Test if initial value for title is returned
     *
     * @test
     * @return void
     */
    public function titleReturnsInitialValue()
    {
        $this->assertSame('', $this->subject->getTitle());
    }

    /**
     * Test if title can be set
     *
     * @test
     * @return void
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('A registration option');
        $this->assertAttributeEquals(
            'A registration option',
            'title',
            $this->subject
        );
    }

    /**
     * Test if initial value for description is returned
     *
     * @test
     * @return void
     */
    public function descriptionReturnsInitialValue()
    {
        $this->assertSame('', $this->subject->getDescription());
    }

    /**
     * Test if description can be set
     *
     * @test
     * @return void
     */
    public function setdescriptionForStringSetsdescription()
    {
        $this->subject->setDescription('A description');
        $this->assertAttributeEquals(
            'A description',
            'description',
            $this->subject
        );
    }

    /**
     * Test if initial value for link is returned
     *
     * @test
     * @return void
     */
    public function linkReturnsInitialValue()
    {
        $this->assertSame('', $this->subject->getLink());
    }

    /**
     * Test if link can be set
     *
     * @test
     * @return void
     */
    public function setLinkForStringSetsLink()
    {
        $this->subject->setLink('http://www.derhansen.de');
        $this->assertAttributeEquals(
            'http://www.derhansen.de',
            'link',
            $this->subject
        );
    }

    /**
     * Test if initial value for date is returned
     *
     * @test
     * @return void
     */
    public function dateReturnsInitialValue()
    {
        $this->assertNull($this->subject->getDate());
    }

    /**
     * Test if date can be set
     *
     * @test
     * @return void
     */
    public function setDateForDateTimeSetsDate()
    {
        $date = new \DateTime('01.01.2016 10:00');
        $this->subject->setDate($date);
        $this->assertAttributeEquals(
            $date,
            'date',
            $this->subject
        );
    }

    /**
     * Test if initial value for event is returned
     *
     * @test
     * @return void
     */
    public function getEventReturnsInitialValue()
    {
        $this->assertNull($this->subject->getEvent());
    }

    /**
     * Test if event can be set
     *
     * @test
     * @return void
     */
    public function setEventForEventSetsEvent()
    {
        $event = new \DERHANSEN\SfEventMgt\Domain\Model\Event();
        $this->subject->setEvent($event);
        $this->assertEquals($event, $this->subject->getEvent());
    }

    /**
     * Test if initial value for showAmount is returned
     *
     * @test
     * @return void
     */
    public function getShowAmountReturnsInitialValue()
    {
        $this->assertFalse($this->subject->getShowAmount());
    }

    /**
     * Test if showAmount can be set
     *
     * @test
     * @return void
     */
    public function setShowAmountForBooleanSetsShowAmount()
    {
        $this->subject->setShowAmount(true);
        $this->assertTrue($this->subject->getShowAmount());
    }

    /**
     * Test if initial value for amountLabel is returned
     *
     * @test
     * @return void
     */
    public function getAmountLabelReturnsInitialValue()
    {
        $this->assertEmpty($this->subject->getAmountLabel());
    }

    /**
     * Test if amountLabel can be set
     *
     * @test
     * @return void
     */
    public function setAmountLabelForBooleanSetsAmountLabel()
    {
        $this->subject->setAmountLabel('A label');
        $this->assertSame('A label', $this->subject->getAmountLabel());
    }

    /**
     * Test if initial value for amountMax is returned
     *
     * @test
     * @return void
     */
    public function getAmountMaxReturnsInitialValue()
    {
        $this->assertSame(1, $this->subject->getAmountMax());
    }

    /**
     * Test if amountMax can be set
     *
     * @test
     * @return void
     */
    public function setAmountMaxForBooleanSetsAmountMax()
    {
        $this->subject->setAmountMax(5);
        $this->assertSame(5, $this->subject->getAmountMax());
    }

    /**
     * Test if initial value for showAmountInput is returned
     *
     * @test
     * @return void
     */
    public function getShowAmountInputReturnsInitialValue()
    {
        $this->assertFalse($this->subject->getShowAmountInput());
    }

    /**
     * Test if showAmountInput can be set
     *
     * @test
     * @return void
     */
    public function setShowAmountInputForBooleanSetsShowAmountInput()
    {
        $this->subject->setShowAmountInput(true);
        $this->assertTrue($this->subject->getShowAmountInput());
    }

    /**
     * Test if initial value for amountInputLabel is returned
     *
     * @test
     * @return void
     */
    public function getAmountInputLabelReturnsInitialValue()
    {
        $this->assertEmpty($this->subject->getAmountInputLabel());
    }

    /**
     * Test if amountInputLabel can be set
     *
     * @test
     * @return void
     */
    public function setAmountInputLabelForBooleanSetsAmountInputLabel()
    {
        $this->subject->setAmountInputLabel('A label');
        $this->assertSame('A label', $this->subject->getAmountInputLabel());
    }
}
