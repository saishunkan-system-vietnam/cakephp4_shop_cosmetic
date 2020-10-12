<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BillDetailTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BillDetailTable Test Case
 */
class BillDetailTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BillDetailTable
     */
    protected $BillDetail;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.BillDetail',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BillDetail') ? [] : ['className' => BillDetailTable::class];
        $this->BillDetail = $this->getTableLocator()->get('BillDetail', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BillDetail);

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
