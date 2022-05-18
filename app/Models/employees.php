<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;
    protected $table = 'employees';
    public $timestamps = false;
    protected $primaryKey = 'employee_id';
    protected $fillable = ['employee_id','first_name','last_name','job_title','salary','reports_to','office_id'];

}
