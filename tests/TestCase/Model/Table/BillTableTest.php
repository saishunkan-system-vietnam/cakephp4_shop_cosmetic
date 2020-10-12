<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BillTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BillTable Test Case
 */
class BillTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BillTable
     */
    protected $Bill;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Bill',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Bill') ? [] : ['className' => BillTable::class];
        $this->Bill = $this->getTableLocator()->get('Bill', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Bill);

        parent::tearDown();
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
