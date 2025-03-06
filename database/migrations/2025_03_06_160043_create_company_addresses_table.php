<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('company_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');

            $table->string('city');
            $table->string('street');
            $table->string('country');
            $table->string('zip', length: 6);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_addresses');
    }
};
