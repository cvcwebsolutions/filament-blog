<?php

use Firefly\FilamentBlog\Models\Category;
use Firefly\FilamentBlog\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('has posts', function () {
    // Arrange
    $category = Category::factory()
        ->hasAttached(Post::factory()->count(3))
        ->create();

    // Act & Assert
    expect($category->posts)
        ->toHaveCount(3)
        ->each
        ->toBeInstanceOf(Post::class);
});
