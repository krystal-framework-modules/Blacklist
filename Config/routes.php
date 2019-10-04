<?php

return array(
    '/profile/blacklist' => array(
        'controller' => 'Blacklist@listAction'
    ),

    '/profile/blacklist/block/(:var)' => array(
        'controller' => 'Blacklist@blockAction'
    ),

    '/profile/blacklist/unblock/(:var)' => array(
        'controller' => 'Blacklist@unblockAction'
    )
);