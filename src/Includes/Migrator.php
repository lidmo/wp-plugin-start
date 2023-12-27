<?php

namespace LidmoPrefix\Includes;

use Lidmo\WP\Foundation\Support\Str;
use LidmoPrefix\Support\Arr;
use LidmoPrefix\Support\Plugin;

class Migrator
{
    public static function run()
    {
        $migrationPath = LIDMO_PREFIX_PLUGIN_DATABASE_PATH . 'migrations/';
        if(is_dir($migrationPath)) {
            require_once ABSPATH . 'wp-admin/install-helper.php';
            $ddlFiles = glob($migrationPath . '*.php');
            $currentMigrationVersion = (int) Plugin::getOption('migration_version', '0');
            $newMigrationVersion = $currentMigrationVersion;
            foreach ($ddlFiles as $ddlFile) {
                $ddlVersion = (int) str_replace('.php', '', Str::afterLast($ddlFile, '/'));
                $run = $ddlVersion > $newMigrationVersion;
                if($ddlVersion > $newMigrationVersion) {
                    $ddl = require_once $ddlFile;

                    foreach (Arr::getDotNotation($ddl, 'table.create', []) as $tableName => $ddlCreate){
                        maybe_create_table($tableName, $ddlCreate);
                    }

                    foreach (Arr::getDotNotation($ddl, 'columns.drop', []) as $tableName => $columns) {
                        foreach ($columns as $column => $ddlDropColumn) {
                            maybe_drop_column($tableName, $column, $ddlDropColumn);
                        }
                    }

                    foreach (Arr::getDotNotation($ddl, 'columns.add', []) as $tableName => $columns) {
                        foreach ($columns as $column => $ddlAddColumn) {
                            maybe_add_column($tableName, $column, $ddlAddColumn);
                        }
                    }

                    $newMigrationVersion = $ddlVersion;
                }
            }

            Plugin::updateOption('migration_version', $newMigrationVersion);
        }
    }
}