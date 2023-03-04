<?php

use App\Models\Blog;

return [

    /*
    |--------------------------------------------------------------------------
    | Blog status active
    |--------------------------------------------------------------------------
    |
    | This value is the active status of blog module. This value is used to
    | change the status and retrieve blogs data on active status based or
    | used to any other location as required.
    |
    */

    'BLOG_STATUS_ACTIVE' => Blog::STATUS_ACTIVE,

    /*
    |--------------------------------------------------------------------------
    | Blog status inactive
    |--------------------------------------------------------------------------
    |
    | This value is the inactive status of blog module. This value is used to
    | change the status and retrieve blogs data on inactive status based or
    | used to any other location as required.
    |
    */

    'BLOG_STATUS_INACTIVE' => Blog::STATUS_INACTIVE,

];
