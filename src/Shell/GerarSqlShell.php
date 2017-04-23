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

    public $progress = null;
    private $countSequencia = 0;
    private $setSchemaDb = 'default';
    private $setNameEstrutura = 'estrutura.sql';
    private $setNameDados = 'dados.sql';

    /**
     * main() method.
     *
     * @return bool|int Success or error code.
     */
    public function main() {
        $this->out('Iniciando a Exportação.');
        $this->out('Criando estrutura da tabela.');
        $this->out('Exportando dados.');
        $this->progress = $this->helper('Progress');
        $this->progress->init();
        $this->install();
        $this->dados();
        $this->out(PHP_EOL . 'Exportação da base de dados finalizada com sucesso.');
        $this->dispatchShell('cache', 'clear_all');
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
        $db = ConnectionManager::get($this->setSchemaDb);
        $collection = $db->schemaCollection();
        $tables = $collection->listTables();
        if (count($tables) > 0) {
            $this->countSequencia = (float) (100 / count($tables));
            foreach ($tables as $key => $value) {
                $table = $collection->describe($value)->createSql($db);
                $sql[] = '-- Inicio das estrutura da tabela `' . $value . '` --';
                $sql[] = '/* !40101 SET character_set_client = utf8 */;';
                //$sql[] = 'DROP TABLE IF EXISTS `' . $value . '`;';
                $sql[] = str_replace('CREATE TABLE ', 'CREATE TABLE IF NOT EXISTS ', $table[0]) . ';';
                $sql[] = '-- Fim das estrutura da tabela `' . $value . '` --';
                $sql[] = "\n";
                $this->progress->increment($this->countSequencia);
                $this->progress->draw();
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
        $this->save($this->setNameEstrutura, $sql);
    }

    public function dadosAutomaticos($sql) {
        $db = ConnectionManager::get($this->setSchemaDb);
        $collection = $db->schemaCollection();
        $tables = $collection->listTables();
        if (count($tables) > 0) {
            foreach ($tables as $key => $value) {
                $sql[$value] = implode("\n ", $this->findDados($value, [], 'INSERT IGNORE'));
            }
        }
        return $sql;
    }

    public function dados() {
        if (!empty($this->setNameDados)) {
            $sql = [];

            $sql[] = '/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;';
            $sql[] = '/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;';
            $sql[] = '/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;';
            $sql[] = '/*!40101 SET NAMES utf8 */;';
            $sql[] = '/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;';
            $sql[] = '/*!40103 SET TIME_ZONE=\'+00:00\' */;';
            $sql[] = '/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;';
            $sql[] = '/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;';
            $sql[] = '/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE=\'NO_AUTO_VALUE_ON_ZERO\' */;';
            $sql[] = '/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;';

            //$sql['estados'] = implode("\n ", $this->findDados('estados', [], 'INSERT IGNORE'));
            //$sql['cidades'] = implode("\n ", $this->findDados('cidades', [], 'INSERT IGNORE'));
            /* $sql['comunicados_tipos'] = implode("\n ", $this->findDados('comunicados_tipos', [], 'INSERT IGNORE'));
              $sql['grupos'] = implode("\n ", $this->findDados('grupos', [], 'INSERT IGNORE'));
              $sql['grupos_menus'] = implode("\n ", $this->findDados('grupos_menus', [], 'INSERT IGNORE'));
              $sql['grupos_permissoes'] = implode("\n ", $this->findDados('grupos_permissoes', [], 'INSERT IGNORE'));
              $sql['menus'] = implode("\n ", $this->findDados('menus', [], 'REPLACE'));
              $sql['parametros'] = implode("\n ", $this->findDados('parametros', [], 'INSERT IGNORE'));
              $sql['regioes'] = implode("\n ", $this->findDados('regioes', [], 'INSERT IGNORE'));
              $sql['usuarios'] = implode("\n ", $this->findDados('usuarios', ['conditions' => ['id' => 1]], 'INSERT IGNORE'));
              $sql['usuarios_grupos'] = implode("\n ", $this->findDados('usuarios_grupos', ['conditions' => ['usuario_id' => 1]], 'INSERT IGNORE'));
              $sql['usuarios_regioes'] = implode("\n ", $this->findDados('usuarios_regioes', ['conditions' => ['usuario_id' => 1]], 'INSERT IGNORE'));
              $sql['usuarios_tipos'] = implode("\n ", $this->findDados('usuarios_tipos', [], 'INSERT IGNORE')); */

            $sql = $this->dadosAutomaticos($sql);

            $sql[] = '/* !40103 SET TIME_ZONE=@OLD_TIME_ZONE */;';
            $sql[] = "\n";
            $sql[] = '/* !40101 SET SQL_MODE=@OLD_SQL_MODE */;';
            $sql[] = '/* !40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;';
            $sql[] = '/* !40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;';
            $sql[] = '/* !40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;';
            $sql[] = '/* !40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;';
            $sql[] = '/* !40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;';
            $sql[] = '/* !40111 SET SQL_NOTES=@OLD_SQL_NOTES */;';
            $sql[] = "\n";
            $sql[] = '-- Dump completed on ' . date('Y-m-d H:i:s');

            $this->save($this->setNameDados, $sql);
        }
    }

    public function findDados($table, $options = array(), $tipo = 'INSERT IGNORE') {
        $sql = [];
        $sql[] = "\n";
        $sql[] = '--';
        $sql[] = '-- Dumping data for table `' . $table . '`';
        $sql[] = '--';
        $sql[] = "\n";

        $sql[] = 'LOCK TABLES `' . $table . '` WRITE;';
        $sql[] = '/*!40000 ALTER TABLE `' . $table . '` DISABLE KEYS */;';

        $find = TableRegistry::get($table)->find('all', $options)->autoFields(true)->hydrate(false)->toArray();
        $find = json_decode(json_encode($find), true);

        if (count($find) > 0) {

            foreach ($find as $key => $value) {
                $c = $v = '';
                foreach ($value as $ke => $va) {
                    if ($c != '') {
                        $c .= ', ';
                        $v .= ', ';
                    }
                    $c .= '`' . $ke . '`';

                    if (in_array($ke, ['created', 'modified'])) {
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
                $this->progress->increment($this->countSequencia);
                $this->progress->draw();
            }
        }
        $sql[] = '/*!40000 ALTER TABLE `' . $table . '` ENABLE KEYS */;';
        $sql[] = 'UNLOCK TABLES;';
        $sql[] = "\n";
        return $sql;
    }

    public function save($name, $dados = array()) {
        $dir = new Folder(ROOT . DS . 'config' . DS . 'schema' . DS, true, 0777);
        $file = new File($dir->pwd() . $name);
        $file->write(implode("\n", $dados));
        //$this->helper('Table')->output($dados);
        $file->close();
    }

}
