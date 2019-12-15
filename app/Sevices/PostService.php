<?php


namespace App\Sevices;


use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostService implements PostServiceInterface
{
    /**
     * Get posts by category.
     *
     * @param int $categoryId
     * @return Collection
     */
    public function getPostsByCategory(int $categoryId): Collection
    {
        // TODO: Implement getPostsByCategory() method.
    }

    /**
     * Get post by ID.
     *
     * @param int $post
     * @return Post
     */
    public function getPostById(int $post): Post
    {
        // TODO: Implement getPostById() method.
    }

    /**
     * Create category.
     *
     * @param array $attributes
     * @return int
     */
    public function createCategory(array $attributes): int
    {
        // TODO: Implement createCategory() method.
    }

    /**
     * Create post.
     *
     * @param array $attributes
     * @return int
     */
    public function createPost(array $attributes): int
    {
        // TODO: Implement createPost() method.
    }

    /**
     * Publishing method.
     *
     * @param Post $post
     * @param Category $category
     */
    public function publish(Post $post, Category $category): void
    {
        // TODO: Implement publish() method.
    }

    /**
     * Unpublish method.
     *
     * @param Post $post
     * @param Category $category
     */
    public function unPublish(Post $post, Category $category): void
    {
        // TODO: Implement unPublish() method.
    }

    /**
     * Remove post.
     *
     * @param Post $post
     */
    public function removePost(Post $post): void
    {
        // TODO: Implement removePost() method.
    }

    /**
     * Remove category.
     *
     * @param Category $post
     */
    public function removeCategory(Category $post): void
    {
        // TODO: Implement removeCategory() method.
    }

}
