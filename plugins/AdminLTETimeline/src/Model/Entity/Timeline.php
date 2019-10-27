<?php
namespace AdminLTETimeline\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdminLTETimeline Entity
 *
 * @property int $id
 * @property string $destination
 * @property string $user_id
 * @property string $role_id
 * @property string $icon
 * @property string $color
 * @property string $header
 * @property string $body
 * @property string $footer
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \AdminLTETimeline\Model\Entity\User $user
 * @property \AdminLTETimeline\Model\Entity\Role $role
 * @property \AdminLTETimeline\Model\Entity\Phinxlog[] $phinxlog
 */
class Timeline extends Entity
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
        'destination' => true,
        'user_id' => true,
        'role_id' => true,
        'icon' => true,
        'color' => true,
        'header' => true,
        'body' => true,
        'footer' => true,
        'created' => true,
        'user' => true,
        'role' => true,
        'phinxlog' => true
    ];
}
