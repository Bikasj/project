<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
 
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('user_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Userroles', [
            'foreignKey' => 'role',
        ]);
        $this->hasMany('pg_details', [
            'foreignKey' => 'pg_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        
        $validator->notEmptyString('firstname');
        $validator->notEmptyString('lastname');
        $validator->notEmptyString('email')
            ->add('email', 'valid', [
                'rule' => 'email',
                'message' => 'Please enter valid email',
            ]);
        $validator->notEmptyString('password');
        $validator->notEmptyString('confirmpassword')
            ->add('confirmpassword', 'no-misspelling', [
                'rule' => ['compareWith', 'password'],
                'message' => 'Passwords are not equal',
            ]);
        $validator->notEmptyString('adharcard');
        $validator->notEmptyString('phone');
        $validator->notEmptyFile('image');
        $validator->notEmptyString('role')
                  ->scalar('role')
                  ->maxLength('role', 10)
                  ->requirePresence('role', 'create');
        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}





