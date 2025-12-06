<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table(
            'users',
            function (Blueprint $table) {
                $table->renameColumn('email', 'company_email');
                $table->string('personal_email')->after('company_email');
            });
    }

    public function down()
    {
        Schema::table(
            'users',
            function (Blueprint $table) {
                //
            });
    }
};
