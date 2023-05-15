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
        Schema::table('bids', function (Blueprint $table) {
            // User's relation
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                   ->references('id')
                   ->on('users')
                   ->onDelete('cascade')
                   ->onUpdate('cascade');
            // BidRule's relation
            $table->unsignedBigInteger('bid_rule_id');
            $table->foreign('bid_rule_id')
                   ->references('id')
                   ->on('bid_rules')
                   ->onDelete('cascade')
                   ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bids', function (Blueprint $table) {
            // User's relation
            $table->dropColumn('user_id');
            // BidRule's relation
            $table->dropColumn('bid_rule_id');
        });
    }
};
