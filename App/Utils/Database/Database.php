<?php
namespace Panda\BgQuiz\Utils\Database;
require_once '../config/app.php';

use PDO, PDOException;

class PdoDb {

    private PDO $dbh;

    public function __construct() {

        global $conf;

        try {
            $this->dbh = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['database'], $conf['user'], $conf['password'], [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            $message = 'Erreur ! ' . $e->getMessage() . '<hr />';
            die($message);
        }
    }

    public function request(string $selected, string $from, bool $where = false, string $key = '', string $val = '', bool $order = false, string $whatOrder = '', string $direction = 'DESC', bool $limit = false, string $howMany = '', string $fetchMode = 'fetchAll')
    {
        $completion = '';

        if ($where) {
            $completion .= ' WHERE ' . $key . ' = ' . $val;
        }
        if ($order) {
            $completion .= ' ORDER BY ' . $whatOrder . ' ' . $direction;
        }
        if ($limit) {
            $completion .= ' LIMIT ' . $howMany;
        }
        if (!$where && !$order && !$limit) {
            $completion = null;
        }
        $sql = 'SELECT ' . $selected . ' FROM ' . $from . $completion;
        return $this->dbh->query($sql, PDO::FETCH_ASSOC)->{$fetchMode}();
    }
}
