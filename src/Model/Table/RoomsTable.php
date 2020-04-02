<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rooms Model
 *
 * @property \App\Model\Table\PgDetailsTable&\Cake\ORM\Association\BelongsTo $PgDetails
 *
 * @method \App\Model\Entity\Room newEmptyEntity()
 * @method \App\Model\Entity\Room newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Room[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Room get($primaryKey, $options = [])
 * @method \App\Model\Entity\Room findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Room patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Room[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Room|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Room saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Room[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Room[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Room[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Room[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RoomsTable extends Table
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

        $this->setTable('rooms');
        $this->setDisplayField('room_id');
        $this->setPrimaryKey('room_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PgDetails', [
            'foreignKey' => 'pg_id',
            'joinType' => 'INNER',
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
            ->integer('room_id')
            ->allowEmptyString('room_id', null, 'create');

        $validator
            ->scalar('ac_facility')
            ->maxLength('ac_facility', 20)
            ->requirePresence('ac_facility', 'create')
            ->notEmptyString('ac_facility');

        $validator
            ->scalar('seater')
            ->maxLength('seater', 20)
            ->requirePresence('seater', 'create')
            ->notEmptyString('seater');

        $validator
            ->integer('rent')
            ->requirePresence('rent', 'create')
            ->notEmptyString('rent');

        $validator
            ->allowEmptyFile('image');

        $validator
            ->scalar('food_availability')
            ->maxLength('food_availability', 10)
            ->requirePresence('food_availability', 'create')
            ->notEmptyString('food_availability');

        $validator
            ->integer('security_charge')
            ->requirePresence('security_charge', 'create')
            ->notEmptyString('security_charge');

        $validator
            ->integer('notice_period')
            ->requirePresence('notice_period', 'create')
            ->notEmptyString('notice_period');

        $validator
            ->integer('seats_available')
            ->requirePresence('seats_available', 'create')
            ->notEmptyString('seats_available');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->notEmptyString('status');
        $validator->notEmpty('pg_id');
        $validator->notEmpty('image');

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
        $rules->add($rules->existsIn(['pg_id'], 'PgDetails'));

        return $rules;
    }
}
