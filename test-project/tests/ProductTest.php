<?php

namespace Tests;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function een_product_kan_worden_aangemaakt()
    {
        $product = Product::create([
            'name' => 'Test Product',
            'price' => 9.99,
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'price' => 9.99,
        ]);
    }

    #[Test]
    public function een_product_kan_worden_gelezen()
    {
        $product = Product::factory()->create();

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
        ]);
    }

    #[Test]
    public function een_product_kan_worden_bijgewerkt()
    {
        $product = Product::factory()->create();

        $product->update([
            'name' => 'Updated Product',
            'price' => 19.99,
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Updated Product',
            'price' => 19.99,
        ]);
    }

    #[Test]
    public function een_product_kan_worden_verwijderd()
    {
        $product = Product::factory()->create();

        $product->delete();

        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}
