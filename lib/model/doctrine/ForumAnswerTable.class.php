<?php

/**
 * ForumAnswerTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ForumAnswerTable extends ForumMessageTable
{
    /**
     * Returns an instance of this class.
     *
     * @return ForumAnswerTable The table instance
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ForumAnswer');
    }
}