<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContactusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContactusTable Test Case
 */
class ContactusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContactusTable
     */
    protected $Contactus;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Contactus',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Contactus') ? [] : ['className' => ContactusTable::class];
        $this->Contactus = TableRegistry::getTableLocator()->get('Contactus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Contactus);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
