<?php

 class Users extends AbstractModel {
     protected static $table = 'users';

     /**
      * @var integer
      */
     public $id;

     /**
      * @var string
      */
     public $name;

     /**
      * @var string
      */
     public $email;

     /**
      * @var string
      */
     public $password;
 }