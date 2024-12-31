<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mice', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_id')->nullable();
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('cascade');
            $table->integer('employee_id');
            $table->integer('category_id');
            $table->string('mouseCode')->nullable();
            $table->string('mouseName')->nullable();
            $table->string('status')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mice');
        Schema::table('mice', function (Blueprint $table) {
            $table->dropForeign(['inventory_id']);
            $table->dropColumn('inventory_id');
        });
    }
};
