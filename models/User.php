<?php

namespace models;

use packs\ActiveRecord\CActiveRecord;

/**
 * @author Sayan
 * Date: 22.09.2016
 * Time: 10:20
 * Default model
 */
class User extends CActiveRecord
{
    protected static $table = 'news';
}