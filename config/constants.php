<?php

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\MailConfiguration;

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

    /*
    |--------------------------------------------------------------------------
    | Contact status active
    |--------------------------------------------------------------------------
    |
    | This value is the active status of contact module. This value is used to
    | change the status and retrieve contacts data on active status based or
    | used to any other location as required.
    |
    */

    'CONTACT_STATUS_ACTIVE' => Contact::STATUS_ACTIVE,

    /*
    |--------------------------------------------------------------------------
    | Contact status inactive
    |--------------------------------------------------------------------------
    |
    | This value is the inactive status of contact module. This value is used to
    | change the status and retrieve contacts data on inactive status based or
    | used to any other location as required.
    |
    */

    'CONTACT_STATUS_INACTIVE' => Contact::STATUS_INACTIVE,

    /*
    |--------------------------------------------------------------------------
    | Contact type head office
    |--------------------------------------------------------------------------
    |
    | This value is the head office type of contact module. This value is used to
    | specify the type and retrieve contacts data on head office type based or
    | used to any other location as required.
    |
    */

    'CONTACT_TYPE_HEAD_OFFICE' => Contact::TYPE_HEAD_OFFICE,

    /*
    |--------------------------------------------------------------------------
    | Mail configuration status active
    |--------------------------------------------------------------------------
    |
    | This value is the active status of mail configuration module. This value is used to
    | change the status and retrieve mail configuration data on active status based or
    | used to any other location as required.
    |
    */

    'MAIL_CONFIGURATION_STATUS_ACTIVE' => MailConfiguration::STATUS_ACTIVE,

    /*
    |--------------------------------------------------------------------------
    | Mail configuration status inactive
    |--------------------------------------------------------------------------
    |
    | This value is the inactive status of mail configuration module. This value is used to
    | change the status and retrieve mail configuration data on inactive status based or
    | used to any other location as required.
    |
    */

    'MAIL_CONFIGURATION_STATUS_INACTIVE' => MailConfiguration::STATUS_INACTIVE,

    /*
    |--------------------------------------------------------------------------
    | Faq status active
    |--------------------------------------------------------------------------
    |
    | This value is the active status of faq module. This value is used to
    | change the status and retrieve faq data on active status based or
    | used to any other location as required.
    |
    */

    'FAQ_STATUS_ACTIVE' => Faq::STATUS_ACTIVE,

    /*
    |--------------------------------------------------------------------------
    | Faq status inactive
    |--------------------------------------------------------------------------
    |
    | This value is the inactive status of faq module. This value is used to
    | change the status and retrieve faq data on inactive status based or
    | used to any other location as required.
    |
    */

    'FAQ_STATUS_INACTIVE' => Faq::STATUS_INACTIVE,

];
