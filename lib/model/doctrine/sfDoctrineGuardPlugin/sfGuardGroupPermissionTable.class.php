<?php

/**
 * sfGuardGroupPermissionTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class sfGuardGroupPermissionTable extends PluginsfGuardGroupPermissionTable
{
    /**
     * Returns an instance of this class.
     *
     * @return sfGuardGroupPermissionTable The table instance
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfGuardGroupPermission');
    }
}