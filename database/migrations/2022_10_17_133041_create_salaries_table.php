<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("employee_id")->unsigned();
            $table->index("employee_id");
            $table->foreign("employee_id")->references("id")->on("employees")->onDelete("cascade");
            $table->integer("month");
            $table->integer("year");
            $table->integer("total_working_days");
            $table->integer("total_leave_taken");
            $table->integer("over_time");
            $table->double("total_salary_made")->default(0);
            $table->tinyInteger("is_salary_calculated")->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salaries');
    }
};
