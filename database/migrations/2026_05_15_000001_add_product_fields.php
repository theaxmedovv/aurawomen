<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('sku')->nullable()->after('slug');
            $table->string('barcode')->nullable()->after('sku');
            $table->string('brand')->nullable()->after('category');
            $table->string('size')->nullable()->after('brand');
            $table->string('gender')->nullable()->after('size');
            $table->unsignedTinyInteger('discount_percentage')->default(0)->after('sale_price');
            $table->decimal('final_price', 10, 2)->nullable()->after('discount_percentage');
            $table->unsignedInteger('sold_count')->default(0)->after('stock');
            $table->unsignedInteger('views')->default(0)->after('sold_count');
            $table->string('status')->default('active')->after('views');
            $table->unsignedInteger('min_stock')->default(0)->after('status');
            $table->boolean('availability')->default(true)->after('min_stock');
            $table->date('sale_start')->nullable()->after('availability');
            $table->date('sale_end')->nullable()->after('sale_start');
            $table->json('attributes')->nullable()->after('sale_end');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'sku','barcode','brand','size','gender','discount_percentage','final_price','sold_count','views','status','min_stock','availability','sale_start','sale_end','attributes'
            ]);
        });
    }
};
