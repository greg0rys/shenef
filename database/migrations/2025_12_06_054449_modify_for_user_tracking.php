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
            'items',
            function (Blueprint $table) {
                $table
                    ->foreignId('item_type_id')
                    ->after('id')
                    ->constrained()
                    ->onDelete('cascade')
                    ->onUpdate('cascade')
                    ->change()
                ;

                $table
                    ->unsignedBigInteger('asset_id')
                    ->nullable()
                    ->after('item_type_id')
                ;

                $table
                    ->foreignId('user_id')
                    ->after('item_type_id')
                    ->constrained('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade')
                    ->onUpdate('cascade')
                ;
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(
            'items',
            function (Blueprint $table) {
                //
            });
    }
};
