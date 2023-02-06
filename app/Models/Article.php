<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function article_category(){
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }


}
