<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatei\Sluggable\SlugOptions;

class Subject extends Model
{
    use HasFactory;


    protected $fillable = ['Subject_Code', 'Subject_Name', 'slug', 'Subject_Type', 'Units'];

    // protected $table = 'subjects';
    // protected $primaryKey = 'id';
    // protected $fillable = ['Subject_Code', 'Subject_Name', 'slug', 'Subject_Type', 'Units'];

    // public function getSlugOptions(): SlugOptions{
    //     return SlugOptions::create()
    //         ->generateSlugsFrom('Subject_Name')
    //         ->saveSlugsTo('slug');
    // }
}
