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
        Schema::table('blocks', function (Blueprint $table) {
            if (!Schema::hasColumn('blocks', 'block_index')) {
                $table->integer('block_index')->after('id')->nullable();
            }
            if (!Schema::hasColumn('blocks', 'data')) {
                $table->text('data')->nullable();
            }
            if (!Schema::hasColumn('blocks', 'previous_hash')) {
                $table->string('previous_hash')->nullable();
            }
            if (!Schema::hasColumn('blocks', 'hash')) {
                $table->string('hash')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blocks', function (Blueprint $table) {
            if (Schema::hasColumn('blocks', 'hash')) {
                $table->dropColumn('hash');
            }
            if (Schema::hasColumn('blocks', 'previous_hash')) {
                $table->dropColumn('previous_hash');
            }
            if (Schema::hasColumn('blocks', 'data')) {
                $table->dropColumn('data');
            }
            if (Schema::hasColumn('blocks', 'block_index')) {
                $table->dropColumn('block_index');
            }
        });
    }
};
