<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PgDetailsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('pg_details');
        $this->setDisplayField('pg_id');
        $this->setPrimaryKey('pg_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'owner_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('pg_id')
            ->allowEmptyString('pg_id', null, 'create');
        $validator
            ->notEmptyString('owner_id');
        $validator
            ->scalar('location')
            ->maxLength('location', 30)
            ->requirePresence('location', 'create')
            ->notEmptyString('location');

        $validator
            ->scalar('address')
            ->maxLength('address', 100)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('area')
            ->maxLength('area', 50)
            ->requirePresence('area', 'create')
            ->notEmptyString('area');

        $validator
            ->scalar('availability')
            ->maxLength('availability', 10)
            ->requirePresence('availability', 'create')
            ->notEmptyString('availability');
        $validator
            ->scalar('gender')
            ->maxLength('gender', 20)
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');

        $validator
            ->integer('no_of_room')
            ->requirePresence('no_of_room', 'create')
            ->notEmptyString('no_of_room');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->notEmptyString('status');

        $validator
            ->integer('phone')
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['owner_id'], 'Users'));

        return $rules;
    }
}
