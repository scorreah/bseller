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
        Schema::table('bid_rules', function (Blueprint $table) {
            // User's relation
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                   ->references('id')
                   ->on('users')
                   ->onDelete('cascade')
                   ->onUpdate('cascade');
            // Shoe's relation
            $table->unsignedBigInteger('shoe_id');
            $table->foreign('shoe_id')
                   ->references('id')
                   ->on('shoes')
                   ->onDelete('cascade')
                   ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bid_rules', function (Blueprint $table) {
            // User's relation
            $table->dropColumn('user_id');
            // Shoe's relation
            $table->dropColumn('shoe_id');
        });
    }
};
