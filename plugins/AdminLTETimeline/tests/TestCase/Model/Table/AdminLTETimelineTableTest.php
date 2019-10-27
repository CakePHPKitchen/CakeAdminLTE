<?php
namespace AdminLTETimeline\Test\TestCase\Model\Table;

use AdminLTETimeline\Model\Table\TimelineTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * AdminLTETimeline\Model\Table\AdminLTETimelineTable Test Case
 */
class AdminLTETimelineTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \AdminLTETimeline\Model\Table\TimelineTable
     */
    public $AdminLTETimeline;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.AdminLTETimeline.AdminLTETimeline',
        'plugin.AdminLTETimeline.Users',
        'plugin.AdminLTETimeline.Roles',
        'plugin.AdminLTETimeline.Phinxlog'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AdminLTETimeline') ? [] : ['className' => TimelineTable::class];
        $this->AdminLTETimeline = TableRegistry::getTableLocator()->get('AdminLTETimeline', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdminLTETimeline);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
