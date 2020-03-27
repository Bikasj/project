<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PgDetail Entity
 *
 * @property int $pg_id
 * @property int $owner_id
 * @property string $room
 * @property string $location
 * @property string $address
 * @property string $area
 * @property string $gender
 * @property string $availability
 * @property int $no_of_room
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 * @property int $phone
 *
 * @property \App\Model\Entity\User $user
 */
class PgDetail extends Entity
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
        'owner_id' => true,
        'room' => true,
        'location' => true,
        'address' => true,
        'area' => true,
        'gender' => true,
        'availability' => true,
        'no_of_room' => true,
        'status' => true,
        'created' => true,
        'updated' => true,
        'phone' => true,
        'user' => true,
    ];
}
