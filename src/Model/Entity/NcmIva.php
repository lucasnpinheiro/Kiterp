<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NcmIva Entity.
 *
 * @property int $id
 * @property int $ncm_id
 * @property \App\Model\Entity\Ncm $ncm
 * @property int $icms_estadual_id
 * @property \App\Model\Entity\IcmsEstadual $icms_estadual
 * @property float $iva
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class NcmIva extends Entity
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
    ];
}
