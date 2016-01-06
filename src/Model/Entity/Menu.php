<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Menu Entity.
 *
 * @property int $id
 * @property string $titulo
 * @property string $plugin
 * @property string $controller
 * @property string $action
 * @property int $status
 * @property int $root
 * @property int $item_menu
 * @property \App\Model\Entity\Grupo[] $grupos
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modifield
 */
class Menu extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
