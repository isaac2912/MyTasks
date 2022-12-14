<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category',
        'task_doc',
        'start_date',
        'end_date',
        'budget',
        'priority',
        'description',
        'points',
      ];
    public function insertTaskRecord($title,$points,$category){
   
        
        $task = Tasks::create([
            'title' => $title,
            'points' => $points,
            'category' => $category,
        ]);
        $task->save();
    }
}
