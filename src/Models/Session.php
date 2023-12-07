<?php

namespace OsKoala\Statistics\Models;

//use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use D4T\Core\Traits\HasDateTimeFormatter;

class Session extends Model
{
    use HasDateTimeFormatter;

    protected $guarded = [];
}
