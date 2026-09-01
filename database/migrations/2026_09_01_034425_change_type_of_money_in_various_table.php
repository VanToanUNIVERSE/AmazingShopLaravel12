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
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('wallet', 15, 2)->default(0)->change();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('total_price', 15, 2)->default(0)->change();
        });

         Schema::table('products', function (Blueprint $table) {
            $table->decimal('price', 15, 2)->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->double('wallet')->default(0)->change();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->double('total_price')->default(0)->change();
        });

         Schema::table('products', function (Blueprint $table) {
            $table->double('price')->default(0)->change();
        });
    }
};
