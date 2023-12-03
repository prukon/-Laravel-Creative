<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';


//снятие защиты добавления новых записей в БД (1 способ)
    protected $guarded = [];

//аналогичная запись  (2 способ)
//protected $guarded = false;

//аналогичная запись с перечислением солбцов
//    protected $fillable = ['title'...];


    public $someProperty;


    //один ко многим
    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    //        Многое ко многим
    public  function tags() {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id','tag_id');
        }


}
