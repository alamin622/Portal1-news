<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['cat_id','subcat_id','dis_id','subdis_id', 'user_id',
    'title_en','title_bn','image','details_en','details_bn','tags_en','tags_bn','headline','first_section',
    'first_section_thumbnail','bigthumbnail','post_date','post_month','created_at','updated_at'];

}
