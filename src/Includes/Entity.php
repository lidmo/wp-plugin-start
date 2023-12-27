<?php

namespace LidmoPrefix\Includes;

use Lidmo\WP\Foundation\Support\Str;
use LidmoPrefix\Support\Plugin;
use LidmoPrefix\Traits\Singleton;

abstract class Entity
{
    use Singleton;

    private $wpdb;
    private $prefix;
    private $table;
    private $data = [];

    private $schema = [];

    private $primaryKey = 'id';

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->prefix = Plugin::getDBPrefix();
        $this->setTable();
        $this->loadSchema();
    }

    public function getPrefix($wp = false)
    {
        return ($wp ? $this->wpdb->prefix : $this->prefix);
    }

    public function getSchema()
    {
        return $this->schema;
    }

    public function getColumns()
    {
        return array_keys($this->schema);
    }

    public function getTable()
    {
        return $this->table;
    }

    public function getPrimaryKeyName()
    {
        return $this->primaryKey;
    }

    public function getPrimaryKeyValue()
    {
        return $this->data[$this->primaryKey];
    }

    public function getWpdb()
    {
        return $this->wpdb;
    }

    public function all()
    {
        return $this->query("SELECT * FROM {$this->getTable()}");
    }

    public function find($id)
    {
        $results = $this->query("SELECT * FROM {$this->getTable()} WHERE {$this->getPrimaryKeyName()}={$id}");
        return $results[0] ?? null;
    }

    public function query($query, $action = 'get_results')
    {
        $result = $this->wpdb->{$action}($query);

        if (is_null($result) && $action === 'get_results') {
            $result = [];
        }

        if(is_object($result)){
            $classname = get_called_class();
            $entity = new $classname();
            $entity->populate($result);
            return $entity;
        }

        if (is_array($result)) {
            foreach ($result as $key => $data) {
                $classname = get_called_class();
                $entity = new $classname();
                $entity->populate($data);
                $result[$key] = $entity;
            }
        }

        return $result;
    }

    public function populate($data)
    {
        $data = is_object($data) ? get_object_vars($data) : $data;
        if (is_array($data) && !array_is_list($data)) {
            foreach ($data as $key => $value) {
                if (array_key_exists($key, $this->data)) {
                    $this->data[$key] = $value;
                }
            }
        }
    }

    public function create($data)
    {
        return $this->wpdb->insert($this->getTable(), $data);
    }

    public function update($data)
    {
        if (array_key_exists('updated_at', $this->schema)) {
            $data['updated_at'] = date(DATE_W3C);
        }
        return $this->wpdb->update($this->getTable(), $data, [$this->getPrimaryKeyName() => $this->getPrimaryKeyValue()]);
    }

    public function delete()
    {
        return $this->wpdb->delete($this->getTable(), [$this->getPrimaryKeyName() => $this->getPrimaryKeyValue()]);
    }

    public function save()
    {

    }

    public function __get($name)
    {
        return $this->castData($name, $this->data[$name]);
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        unset($this->data[$name]);
    }

    private function castData($name, $value)
    {
        $schema = $this->schema[$name] ?? null;
        if ($schema) {
            $type = Str::before($schema->Type, '(');
            $type = Str::replace(' unsigned', '', $type);
            switch ($type) {
                case 'int';
                    $value = (int)$value;
                    break;
                case 'date':
                case 'datetime':
                case 'varchar':
                case 'text':
                case 'enum':
                    $value = (string)$value;
                    break;
                default:
                    break;
            }

            return $value;
        }
    }

    private function setTable()
    {
        $this->table = $this->prefix . Str::plural(strtolower(Str::after(get_called_class(), 'Entities\\')));
    }

    private function loadSchema()
    {
        $schema = $this->wpdb->get_results("DESCRIBE {$this->getTable()}");
        foreach ($schema as $object) {
            $this->schema[$object->Field] = $object;
            $this->data[$object->Field] = null;
            if ($object->Key === 'PRI') {
                $this->primaryKey = $object->Field;
            }
        }
    }
}