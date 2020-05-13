<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $payment_id
 * @property int $transientuser_id
 * @property int $pgowner_id
 * @property int $amount
 * @property string $payment_mode
 * @property int $transaction_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Transaction $transaction
 */
class Payment extends Entity
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
        'transientuser_id' => true,
        'pgowner_id' => true,
        'amount' => true,
        'payment_mode' => true,
        'transaction_id' => true,
        'created' => true,
        'room_id' => true,
    ];
}
