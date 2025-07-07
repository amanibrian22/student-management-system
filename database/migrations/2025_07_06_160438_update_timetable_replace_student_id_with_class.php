<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Add nullable 'class' column temporarily
        Schema::table('timetable', function (Blueprint $table) {
            $table->string('class', 50)->nullable();
        });

        // Copy data from student table into 'class' column
        \DB::table('timetable as t')
            ->join('students as s', 't.student_id', '=', 's.id')
            ->update(['t.class' => \DB::raw('s.class')]);

        // Drop foreign key and student_id column
        Schema::table('timetable', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropColumn('student_id');
            $table->string('class', 50)->change(); // Make 'class' not nullable
        });
    }

    public function down()
    {
        // Re-add student_id column and foreign key
        Schema::table('timetable', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->dropColumn('class');
        });
    }
};
