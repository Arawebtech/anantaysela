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
        Schema::table('products', function (Blueprint $table) {
            // Check if columns don't exist before adding them
            if (!Schema::hasColumn('products', 'description')) {
                $table->text('description')->after('name');
            }
            if (!Schema::hasColumn('products', 'price')) {
                $table->decimal('price', 10, 2)->after('details');
            }
            if (!Schema::hasColumn('products', 'original_price')) {
                $table->decimal('original_price', 10, 2)->nullable()->after('price');
            }
            if (!Schema::hasColumn('products', 'discount_percentage')) {
                $table->integer('discount_percentage')->default(0)->after('original_price');
            }
            if (!Schema::hasColumn('products', 'image')) {
                $table->string('image')->nullable()->after('discount_percentage');
            }
            if (!Schema::hasColumn('products', 'category')) {
                $table->string('category')->nullable()->after('image');
            }
            if (!Schema::hasColumn('products', 'rating')) {
                $table->decimal('rating', 3, 2)->default(0)->after('category');
            }
            if (!Schema::hasColumn('products', 'rating_count')) {
                $table->integer('rating_count')->default(0)->after('rating');
            }
            if (!Schema::hasColumn('products', 'featured')) {
                $table->boolean('featured')->default(false)->after('rating_count');
            }
            if (!Schema::hasColumn('products', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('featured');
            }
            if (!Schema::hasColumn('products', 'stock')) {
                $table->integer('stock')->default(0)->after('is_active');
            }
            
            // Make details nullable if it's not already
            if (Schema::hasColumn('products', 'details')) {
                $table->text('details')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $columns = [
                'description',
                'price',
                'original_price',
                'discount_percentage',
                'image',
                'category',
                'rating',
                'rating_count',
                'featured',
                'is_active',
                'stock',
            ];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('products', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
