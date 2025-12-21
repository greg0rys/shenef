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
        Schema::table(
            'company_locations',
            function (Blueprint $table) {
                //
                $table->dropForeign('company_locations_manager_user_foreign');
                $table
                    ->foreignId('manager_user')
                    ->nullable()
                    ->after('parent_company_id')
                    ->change()
                    ->constrained('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade')
                ;
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table(
            'company_locations',
            function (Blueprint $table) {

            });
    }
};
