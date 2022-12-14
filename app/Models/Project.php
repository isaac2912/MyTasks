<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
      'project_name',
      'project_cate',
      'project_doc',
      'start_date',
      'end_date',
      'budget',
      'priority',
      'description',
    ];


}
