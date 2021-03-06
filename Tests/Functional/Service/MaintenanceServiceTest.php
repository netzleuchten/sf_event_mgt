<?php
namespace DERHANSEN\SfEventMgt\Tests\Functional\Service;

/*
 * This file is part of the Extension "sf_event_mgt" for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use DERHANSEN\SfEventMgt\Service\MaintenanceService;
use Nimut\TestingFramework\TestCase\FunctionalTestCase;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Test case for class \DERHANSEN\SfEventMgt\Domain\Service\MaintenanceService
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
class MaintenanceServiceTest extends FunctionalTestCase
{
    /** @var array */
    protected $testExtensionsToLoad = ['typo3conf/ext/sf_event_mgt'];

    /**
     * Setup
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->importDataSet(__DIR__ . '/../Fixtures/handle_expired_registrations.xml');
    }

    /**
     * @test
     * @return void
     */
    public function handleExpiredRegistrationsHidesExpectedRegistrations()
    {
        $subject = GeneralUtility::makeInstance(MaintenanceService::class);
        $subject->handleExpiredRegistrations();

        $registration1 = BackendUtility::getRecord('tx_sfeventmgt_domain_model_registration', 1);
        $this->assertEquals(1, $registration1['hidden'], 'Registration 1');

        $registration2 = BackendUtility::getRecord('tx_sfeventmgt_domain_model_registration', 2);
        $this->assertEquals(1, $registration2['hidden'], 'Registration 2');

        $registration3 = BackendUtility::getRecord('tx_sfeventmgt_domain_model_registration', 3);
        $this->assertEquals(0, $registration3['hidden'], 'Registration 3');
    }

    /**
     * @test
     * @return void
     */
    public function handleExpiredRegistrationsDeletesExpectedRegistrations()
    {
        $subject = GeneralUtility::makeInstance(MaintenanceService::class);
        $subject->handleExpiredRegistrations(true);

        $registration1 = BackendUtility::getRecord('tx_sfeventmgt_domain_model_registration', 1, '*', '', false);
        $this->assertEquals(1, $registration1['deleted'], 'Registration 1');

        $registration2 = BackendUtility::getRecord('tx_sfeventmgt_domain_model_registration', 2, '*', '', false);
        $this->assertEquals(1, $registration2['deleted'], 'Registration 2');

        $registration3 = BackendUtility::getRecord('tx_sfeventmgt_domain_model_registration', 3, '*', '', false);
        $this->assertEquals(0, $registration3['deleted'], 'Registration 3');
    }
}
