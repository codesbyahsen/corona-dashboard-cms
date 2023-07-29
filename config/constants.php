<?php

use App\Models\SocialLink;

return [

    /*
    |--------------------------------------------------------------------------
    | Social link status active
    |--------------------------------------------------------------------------
    |
    | This value is the active status of social link module. This value is used to
    | change the status and retrieve social link data on active status based or
    | used to any other location as required.
    |
    */

    'SOCIAL_LINK_STATUS_ACTIVE' => SocialLink::STATUS_ACTIVE,

    /*
    |--------------------------------------------------------------------------
    | Social link status inactive
    |--------------------------------------------------------------------------
    |
    | This value is the inactive status of social link module. This value is used to
    | change the status and retrieve social link data on inactive status based or
    | used to any other location as required.
    |
    */

    'SOCIAL_LINK_STATUS_INACTIVE' => SocialLink::STATUS_INACTIVE,

];
