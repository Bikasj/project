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
    }

    public function validationDefault(Validator $validator): Validator
    {
        
        $validator->notEmpty('firstname');
        $validator->notEmpty('lastname');
        $validator->notEmpty('email')
            ->add('email', 'valid', [
                'rule' => 'email',
                'message' => 'Please enter valid email',
            ]);
        $validator->notEmpty('password');
        $validator->notEmpty('confirmpassword')
            ->add('confirmpassword', 'no-misspelling', [
                'rule' => ['compareWith', 'password'],
                'message' => 'Passwords are not equal',
            ]);
        $validator->notEmpty('adharcard');
        $validator->notEmpty('phone');
        
        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}





