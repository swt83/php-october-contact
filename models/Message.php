<?php

namespace Travis\Contact\Models;

use Model;

class Message extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $rules = [];

    public $timestamps = true;

    public $table = 'travis_contact_messages';
}