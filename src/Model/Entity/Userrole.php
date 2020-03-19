<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Userrole extends Entity
{
    
    protected $_accessible = [
        'user_rolename' => true,
    ];
}
