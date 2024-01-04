<?php

namespace OsKoala\Statistics\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    use HasFactory;

    protected $table = 'admin_page_views';

    protected $guarded = [];
}
