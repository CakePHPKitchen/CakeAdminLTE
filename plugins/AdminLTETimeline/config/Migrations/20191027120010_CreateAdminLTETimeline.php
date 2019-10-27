<?php
use Migrations\AbstractMigration;

class CreateAdminLTETimeline extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('admin_l_t_e_timeline');
        $table->addColumn('destination', 'enum', [
            'values' => [
                'Global',
                'Role',
                'User'
            ]
        ]);
        $table->addColumn('user_id', 'string', [
            'default' => '',
            'limit' => 36
        ]);
        $table->addColumn('role_id', 'string', [
            'default' => '',
            'limit' => 36
        ]);
        $table->addColumn('icon', 'string', [
            'default' => 'fa fa-flask',
            'limit' => 48
        ]);
        $table->addColumn('color', 'string', [
            'default' => 'bg-yellow',
            'limit' => 48
        ]);
        $table->addColumn('header', 'string', [
            'default' => '',
            'limit' => 256
        ]);
        $table->addColumn('body', 'text');
        $table->addColumn('footer', 'text');
        $table->addColumn('created', 'datetime');
        $table->create();
    }
}
