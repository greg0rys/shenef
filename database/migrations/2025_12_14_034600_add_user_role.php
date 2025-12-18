<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('user_roles');
        Schema::dropIfExists('role_user');

        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->nullableTimestamps();
        });
        Schema::table(
            'users',
            function (Blueprint $table) {
                $table
                    ->foreignId('role_id')
                    ->nullable()
                    ->after('company_location_id')
                    ->constrained('role_user')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                ;
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(
            'users',
            function (Blueprint $table) {
                //
            });
    }
};
