<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produto Entity.
 *
 * @property int $id
 * @property string $barra
 * @property string $nome
 * @property string $unidade
 * @property int $grupo_id
 * @property \App\Model\Entity\Grupo $grupo
 * @property int $produto_kit
 * @property string $foto
 * @property string $descricao
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\NotaFiscalEntradasIten[] $nota_fiscal_entradas_itens
 * @property \App\Model\Entity\NotaFiscalSaidasIten[] $nota_fiscal_saidas_itens
 * @property \App\Model\Entity\PedidosIten[] $pedidos_itens
 */
class Produto extends Entity {

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

    protected function _getFoto($foto) {
        $directorio = str_replace(DS, '/', ROOT . DS . 'webroot');
        $file = new \Cake\Filesystem\File($directorio . $foto);
        if ($file->exists()) {
            $file->close();
            return $foto;
        }
        return '/ImagemProdutos/produto-sem-imagem.gif';
    }

}
