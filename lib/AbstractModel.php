<?php
/**
 * @author Dima Korets korets.web@gmail.com
 * @Date: 17.05.18
 */

abstract class AbstractModel
{
    protected static $table = '';

    public static function all()
    {
        $db = DbConnection::getInstance()->getMysqli();

        $table = static::$table;
        return $db->query("SELECT * FROM {$table}");
    }

    public static function find(integer $id)
    {
        $db = DbConnection::getInstance()->getMysqli();

        return $db->query("SELECT * FROM {static::$table} WHERE `id` = {$id}");
    }

    public static function last()
    {
        $db = DbConnection::getInstance()->getMysqli();

        return $db->query("SELECT * FROM {static::$table} ORDER BY `id` DESC LIMIT 1");
    }

    public function save()
    {
        $db = DbConnection::getInstance()->getMysqli();

        $table = static::$table;

        $fields = [];
        $values = [];

        foreach (get_object_vars($this) as $propertyName => $value) {
            if ($propertyName === 'id') {
                continue;
            }
            $fields[] = "`" . $propertyName . "`";
            $values[] = "'" . $value . "'";
        }

        $fields = implode(', ', $fields);
        $values = implode(', ', $values);


        return $db->query("INSERT INTO `{$table}` ({$fields}) VALUES ($values)");
    }
}