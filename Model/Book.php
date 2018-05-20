<?php
/**
 * @author Dima Korets korets.web@gmail.com
 * @Date: 17.05.18
 */

class Book extends AbstractModel
{
    protected static $table = 'books';

    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $author;

    /**
     * @var integer
     */
    public $year;
}