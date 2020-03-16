<?php
declare(strict_types=1);

namespace App\Model\Entity;
//use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $user_id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $password
 * @property int $adharcard
 * @property int $role
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 * @property int $phone
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'username' => true,
        'email' => true,
        'password' => true,
        'adharcard' => true,
        'role' => true,
        'status' => true,
        'created' => true,
        'updated' => true,
        'phone' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
    // protected function _setPassword(string $password) : ?string
    // {
    //     if (strlen($password) > 0) {
    //         return (new DefaultPasswordHasher())->hash($password);
    //     }
    // }
}
