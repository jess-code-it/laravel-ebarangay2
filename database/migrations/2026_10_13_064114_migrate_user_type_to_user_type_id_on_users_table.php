<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            UPDATE users
            JOIN user_types
                ON user_types.name = users.user_type
            SET users.user_type_id = user_types.id
            WHERE users.user_type_id IS NULL
        ");

        // Remove the legacy column only after the role mapping.
        Schema::table('users', function ($table) {
            $table->dropColumn('user_type');
        });
    }

    public function down(): void
    {
        Schema::table('users', function ($table) {
            $table->string('user_type')->default('resident');
        });

        DB::statement("
            UPDATE users
            JOIN user_types
                ON user_types.id = users.user_type_id
            SET users.user_type = user_types.name
        ");
    }
};