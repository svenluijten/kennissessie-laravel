<?php

namespace Tests\Browser;

use App\Post;
use App\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PostsTest extends DuskTestCase
{
    /**
     * Test if a guest user can view all posts
     */
    public function testIfGuestCanViewAllPosts()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('posts.index')
                ->assertRouteIs('posts.index');
        });
    }

    /**
     * Test if a guest user cannot create posts
     */
    public function testIfGuestUserCanNotCreatePosts()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('posts.create')
                ->assertRouteIs('login');
        });
    }

    /**
     * Test if a guest user cannot create posts
     */
    public function testIfGuestUserCanNotEditPosts()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('posts.edit', [Post::firstOrFail()->id])
                ->assertRouteIs('login');
        });
    }

    /**
     * Make sure a guest user cannot see the delete posts buttons
     */
    public function testIfGuestUserCannotSeeDeletePostsButton()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('posts.index')
                ->assertRouteIs('posts.index');

            $this->assertNull($browser->element('.btn-danger'));
        });
    }

    /**
     * Test if a guest user cannot create posts
     */
    public function testIfAuthenticatedUserCanEditPosts()
    {

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::firstOrFail());
            $postId = Post::firstOrFail()->id;

            $browser->visitRoute('posts.edit', [$postId])
                ->assertRouteIs('posts.edit', [$postId]);
        });
    }

    /**
     * Test if authenticated user can create posts
     */
    public function testIfAuthenticatedUserCanCreatePosts()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::firstOrFail());
            $browser->visitRoute('posts.create')
                ->assertRouteIs('posts.create');
        });
    }

    /**
     * Make sure a guest user cannot see the delete posts buttons
     */
    public function testIfGuestUserCanSeeDeletePostsButton()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::firstOrFail());

            $browser->visitRoute('posts.index');

            $browser->assertRouteIs('posts.index')
                ->assertSeeIn('#submit', 'Delete Post');
        });
    }
}
