<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {

        Schema::dropIfExists('employees');
        
        Schema::create('employees', function (Blueprint $table) {
                $table->bigIncrements('employee_id');
                $table->string('first_name', 30);
                $table->string('last_name', 30);
                $table->string('job_title');
                $table->string('salary');
                $table->integer('reports_to');
                $table->integer('office_id');
            });
   

        
    }

    public function down()
    {
        Schema::dropIfExists(‘class_subjects’);
    }
};
