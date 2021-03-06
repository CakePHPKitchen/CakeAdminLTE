<?php
namespace AdminLTE\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdminLTEMenuNotificationLogs Model
 *
 * @property \AdminLTE\Model\Table\MenuNotificationsTable|\Cake\ORM\Association\BelongsTo $AdminLTEMenuNotifications
 * @property \AdminLTE\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \AdminLTE\Model\Entity\MenuNotificationLog get($primaryKey, $options = [])
 * @method \AdminLTE\Model\Entity\MenuNotificationLog newEntity($data = null, array $options = [])
 * @method \AdminLTE\Model\Entity\MenuNotificationLog[] newEntities(array $data, array $options = [])
 * @method \AdminLTE\Model\Entity\MenuNotificationLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AdminLTE\Model\Entity\MenuNotificationLog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AdminLTE\Model\Entity\MenuNotificationLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \AdminLTE\Model\Entity\MenuNotificationLog[] patchEntities($entities, array $data, array $options = [])
 * @method \AdminLTE\Model\Entity\MenuNotificationLog findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MenuNotificationLogsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('admin_l_t_e_menu_notification_logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->setEntityClass('AdminLTE\Model\Entity\MenuNotificationLog');

        $this->addBehavior('Timestamp');

        $this->belongsTo('AdminLTEMenuNotifications', [
            'foreignKey' => 'admin_l_t_e_menu_notification_id',
            'joinType' => 'INNER',
            'className' => 'AdminLTE.MenuNotifications'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'AdminLTE.Users'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['admin_l_t_e_menu_notification_id'], 'AdminLTEMenuNotifications'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
