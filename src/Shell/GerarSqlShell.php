<?php

namespace App\Shell;

use Cake\Console\Shell;
use Cake\Datasource\ConnectionManager;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\ORM\TableRegistry;

/**
 * Instalacao shell command.
 */
class GerarSqlShell extends Shell {

    /**
     * main() method.
     *
     * @return bool|int Success or error code.
     */
    public function main() {
        $this->out('Iniciando a Instalação.');
        $this->out('Criando estrutura da tabela.');
        $this->install();
        $this->out('Criando dados basico de usuário.');
        $this->dados();
        $this->out('Finalizando a Instalação.');
    }

    public function install() {
        $sql = [];
        $defaultSql = [
            '40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT',
            '40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS',
            '40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION',
            '40101 SET NAMES utf8',
            '40103 SET @OLD_TIME_ZONE=@@TIME_ZONE',
            '40103 SET TIME_ZONE=\'+00:00\'',
            '40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0',
            '40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0',
            '40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE=\'NO_AUTO_VALUE_ON_ZERO\'',
            '40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0'
        ];

        foreach ($defaultSql as $key => $value) {
            $sql[] = '/*!' . $value . ' */;';
        }
        $sql[] = "\n";
        $db = ConnectionManager::get('default');
        $collection = $db->schemaCollection();
        $tables = $collection->listTables();
        if (count($tables) > 0) {

            foreach ($tables as $key => $value) {
                $table = $collection->describe($value)->createSql($db);
                $sql[] = '-- Inicio das estrutura da tabela `' . $value . '` --';
                $sql[] = '/* !40101 SET character_set_client = utf8 */;';
                $sql[] = 'DROP TABLE IF EXISTS `' . $value . '`;';
                $sql[] = str_replace('CREATE TABLE ', 'CREATE TABLE IF NOT EXISTS ', $table[0]) . ';';
                $sql[] = '-- Fim das estrutura da tabela `' . $value . '` --';
                $sql[] = "\n";
            }
        }

        $defaultSql = [
            '40101 SET SQL_MODE=@OLD_SQL_MODE',
            '40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS',
            '40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS',
            '40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT',
            '40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS',
            '40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION',
            '40111 SET SQL_NOTES=@OLD_SQL_NOTES',
        ];

        foreach ($defaultSql as $key => $value) {
            $sql[] = '/* !' . $value . ' */;';
        }

        $sql[] = "\n";
        $this->save('kiterp.sql', $sql);
    }

    public function dados() {
        $sql = [];
        $sql = $this->findDados('pessoas', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('atividades', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('bancos', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('condicoes_pagamentos', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('contas', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('empresas', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('formas_pagamentos', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('grupos', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('grupos_estoques', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('icms_estaduais', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('impostos', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('menus', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('menus_grupos', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('ncm', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('ncm_iva', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('parametros', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('pessoas_associacoes', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('pessoas_contatos', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('pessoas_enderecos', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('pessoas_fisicas', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('pessoas_juridicas', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('produtos', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('produtos_kits', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('produtos_valores', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('terminais', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('tipos_contatos', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('transportadoras', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('usuarios_grupos', $sql, [], 'INSERT IGNORE');
        $sql = $this->findDados('usuarios', $sql, [], 'INSERT IGNORE');
        $this->save('dados.sql', $sql);
    }

    public function findDados($table, $sql, $options = array(), $tipo = 'INSERT IGNORE') {
        debug($table);
        $find = TableRegistry::get($table)->find('all', $options)->autoFields(true)->hydrate(false)->toArray();
        $find = json_decode(json_encode($find), true);
        if (count($find) > 0) {
            $sql[] = '-- Inicio dos daddos da tabela `' . $table . '` --';
            $sql[] = 'LOCK TABLES `' . $table . '` WRITE;';
            $sql[] = '/*!40000 ALTER TABLE `' . $table . '` DISABLE KEYS */;';
            foreach ($find as $key => $value) {
                $c = $v = '';
                foreach ($value as $ke => $va) {
                    if ($c != '') {
                        $c .= ', ';
                        $v .= ', ';
                    }
                    $c .= '`' . $ke . '`';

                    if ($ke === 'created' OR $ke === 'modified') {
                        if ($ke === 'created') {
                            $v .= "'" . date('Y-m-d H:i:s') . "'";
                        } else {
                            $v .= 'NULL';
                        }
                    } else {
                        if (is_int($va) OR is_float($va)) {
                            $v .= $va;
                        } else {
                            $va = trim($va);
                            if ($va === '') {
                                $v .= 'NULL';
                            } else {
                                $v .= "'" . addslashes($va) . "'";
                            }
                        }
                    }
                }
                $sql[] = $tipo . ' INTO `' . $table . '` (' . $c . ') VALUES  (' . $v . ');';
            }
            $sql[] = '/*!40000 ALTER TABLE `' . $table . '` ENABLE KEYS */;';
            $sql[] = 'UNLOCK TABLES;';
            $sql[] = '-- Fim dos daddos da tabela `' . $table . '` --';
            $sql[] = "\n";
        }
        return $sql;
    }

    public function save($name, $dados = array()) {
        $dir = new Folder(ROOT . DS . 'config' . DS . 'schema' . DS, true, 0777);
        $file = new File($dir->pwd() . $name);
        $file->write(implode("\n", $dados));
        $file->close();
    }

}
