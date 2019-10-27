<?php
namespace AdminLTETimeline\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdminLTETimeline Model
 *
 * @property \AdminLTETimeline\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \AdminLTETimeline\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \AdminLTETimeline\Model\Table\PhinxlogTable|\Cake\ORM\Association\BelongsToMany $Phinxlog
 *
 * @method \AdminLTETimeline\Model\Entity\Timeline get($primaryKey, $options = [])
 * @method \AdminLTETimeline\Model\Entity\Timeline newEntity($data = null, array $options = [])
 * @method \AdminLTETimeline\Model\Entity\Timeline[] newEntities(array $data, array $options = [])
 * @method \AdminLTETimeline\Model\Entity\Timeline|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AdminLTETimeline\Model\Entity\Timeline saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AdminLTETimeline\Model\Entity\Timeline patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \AdminLTETimeline\Model\Entity\Timeline[] patchEntities($entities, array $data, array $options = [])
 * @method \AdminLTETimeline\Model\Entity\Timeline findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TimelineTable extends Table
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

        $this->setTable('admin_l_t_e_timeline');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->setEntityClass('AdminLTETimeline\Model\Entity\Timeline');

        $this->addBehavior('Timestamp');

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

        $validator
            ->scalar('destination')
            ->requirePresence('destination', 'create')
            ->allowEmptyString('destination', false);

        $validator
            ->scalar('icon')
            ->maxLength('icon', 48)
            ->allowEmptyString('icon', false);

        $validator
            ->scalar('color')
            ->maxLength('color', 48)
            ->allowEmptyString('color', false);

        $validator
            ->scalar('header')
            ->maxLength('header', 256)
            ->allowEmptyString('header', false);

        $validator
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->allowEmptyString('body', false);

        $validator
            ->scalar('footer')
            ->requirePresence('footer', 'create')
            ->allowEmptyString('footer', false);

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
        return $rules;
    }
}
