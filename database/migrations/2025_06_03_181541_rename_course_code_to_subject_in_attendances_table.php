<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCourseCodeToSubjectInAttendancesTable extends Migration
{
    public function up()
    {
        // Check if 'attendances' table exists
        if (Schema::hasTable('attendances')) {
            // Check if 'course_code' column exists and 'subject' does not
            if (Schema::hasColumn('attendances', 'course_code') && !Schema::hasColumn('attendances', 'subject')) {
                Schema::table('attendances', function (Blueprint $table) {
                    $table->renameColumn('course_code', 'subject');
                });
            } elseif (!Schema::hasColumn('attendances', 'subject')) {
                // Add 'subject' column if neither exists
                Schema::table('attendances', function (Blueprint $table) {
                    $table->string('subject', 10)->after('present');
                });
            }
        }
    }

    public function down()
    {
        if (Schema::hasTable('attendances')) {
            // Reverse: rename 'subject' back to 'course_code' if it exists
            if (Schema::hasColumn('attendances', 'subject') && !Schema::hasColumn('attendances', 'course_code')) {
                Schema::table('attendances', function (Blueprint $table) {
                    $table->renameColumn('subject', 'course_code');
                });
            } elseif (Schema::hasColumn('attendances', 'subject')) {
                // Remove 'subject' if it was added
                Schema::table('attendances', function (Blueprint $table) {
                    $table->dropColumn('subject');
                });
            }
        }
    }
}