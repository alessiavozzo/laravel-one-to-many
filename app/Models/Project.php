<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'project_image', /* 'tools' */'preview', 'project_link', 'github_link', 'creation_date', 'description'];
}
