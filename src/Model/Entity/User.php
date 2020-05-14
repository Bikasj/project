<?php
declare(strict_types=1);

namespace App\Model\Entity;
//use Authentication\PasswordHasher\DefaultPasswordHasher;
// use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{
  
    protected $_accessible = [
        'firstname' => true,
        'lastname' => true,
        'email' => true,
        'password' => true,
        'adharcard' => true,
        'role' => true,
        'status' => true,
        'created' => true,
        'updated' => true,
        'phone' => true,
        'image'=>true,
    ];

 
    protected $_hidden = [
        'password',
    ];
    // protected function _setPassword($password)
    // {
    //     if (strlen($password) > 0) {
    //       return (new DefaultPasswordHasher)->hash($password);
    //     }
    // }
}
