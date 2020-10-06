<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeProductTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeProductTable Test Case
 */
class TypeProductTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeProductTable
     */
    protected $TypeProduct;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TypeProduct',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TypeProduct') ? [] : ['className' => TypeProductTable::class];
        $this->TypeProduct = $this->getTableLocator()->get('TypeProduct', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TypeProduct);

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
