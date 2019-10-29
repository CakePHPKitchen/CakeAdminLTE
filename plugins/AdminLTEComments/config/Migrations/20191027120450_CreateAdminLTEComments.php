<?php
use Migrations\AbstractMigration;

class CreateAdminLTEComments extends AbstractMigration
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
        $table = $this->table('admin_l_t_e_comments');
        $table->addColumn('user_id', 'string', [
            'default' => '',
            'limit' => 36
        ]);
        $table->addColumn('table_name', 'string', [
            'default' => '',
            'limit' => 128
        ]);
        $table->addColumn('table_row_id', 'integer');
        $table->addColumn('admin_l_t_e_comment_id', 'integer', [
            'default' => 0
        ]);
        $table->addColumn('comment', 'text');
        $table->addColumn('created', 'datetime');
        $table->create();
    }
}
