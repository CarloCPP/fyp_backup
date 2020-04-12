<?php

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

function booking_extends_navigation(global_navigation $navigation) {
    $bookingnode = navigation_node::create('booking',new moodle_url('/booking/view.php'), navigation_node::TYPE_CONTAINER);
    $navigation->add_node($bookingnode);
    $bookingnode->make_active();
}
