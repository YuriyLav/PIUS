<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Category;

class ProductCategoryCommand extends Command
{
    protected $signature = 'product:category {id}'; 

    protected $description = 'Get category code for product by ID'; 

    public function handle()
    {
        $productId = $this->argument('id'); 
        $product = Product::find($productId);

        if (!$product) {
            $this->error("Product with ID {$productId} not found."); 
            return;
        }

        $categoryCode = Category::find($product->category_id)->code; 

        $this->info("Category code for product with ID {$productId}: {$categoryCode}"); 
    }
}
