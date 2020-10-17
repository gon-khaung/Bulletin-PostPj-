<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable =['user_id', 'news_title', 'news_photo', 'news_content'];
}
