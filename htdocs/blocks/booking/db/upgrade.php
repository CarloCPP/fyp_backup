<?php
defined('MOODLE_INTERNAL') || die();

function xmldb_block_booking_upgrade($oldversion) {
    global $DB;
    $dbman = $DB->get_manager();

    if ($oldversion < 2019011301) {

        // Define table room to be dropped.
        $table = new xmldb_table('room');

        // Conditionally launch drop table for room.
        if ($dbman->table_exists($table)) {
            $dbman->drop_table($table);
        }

        // Define table booking to be dropped.
        $table = new xmldb_table('booking');

        // Conditionally launch drop table for booking.
        if ($dbman->table_exists($table)) {
            $dbman->drop_table($table);
        }

        // Define table location to be dropped.
        $table = new xmldb_table('location');

        // Conditionally launch drop table for location.
        if ($dbman->table_exists($table)) {
            $dbman->drop_table($table);
        }

        // Define table room to be created.
        $table = new xmldb_table('room');

        // Adding fields to table room.
        $table->add_field('roomid', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('roomnumber', XMLDB_TYPE_CHAR, '10', null, XMLDB_NOTNULL, null, null);
        $table->add_field('roomcapacity', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, null, null);
        // $table->add_field('roomavailability', XMLDB_TYPE_CHAR, '1', null, XMLDB_NOTNULL, null, 'l');
        $table->add_field('roomtype', XMLDB_TYPE_CHAR, '20', null, XMLDB_NOTNULL, null, null);

        // Adding keys to table room.
        $table->add_key('primarykeyroomid', XMLDB_KEY_PRIMARY, array('roomid'));

        // Conditionally launch create table for room.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Define table booking to be created.
        $table = new xmldb_table('booking');

        // Adding fields to table booking.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('startdateyyyy', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, null, null);
        $table->add_field('startdatemm', XMLDB_TYPE_INTEGER, '2', null, XMLDB_NOTNULL, null, null);
        $table->add_field('startdatedd', XMLDB_TYPE_INTEGER, '2', null, XMLDB_NOTNULL, null, null);
        $table->add_field('starttimehh', XMLDB_TYPE_INTEGER, '2', null, XMLDB_NOTNULL, null, null);
        $table->add_field('starttimemm', XMLDB_TYPE_INTEGER, '2', null, XMLDB_NOTNULL, null, null);
        $table->add_field('durationmm', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, null, null);
        $table->add_field('description', XMLDB_TYPE_TEXT, null, null, XMLDB_NOTNULL, null, null);
        $table->add_field('roomidforeignkey', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, null, null);
        $table->add_field('bookingpersonid', XMLDB_TYPE_INTEGER, '20', null, XMLDB_NOTNULL, null, null);

        // Adding keys to table booking.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
        $table->add_key('roomidforeignkey', XMLDB_KEY_FOREIGN, array('roomidforeignkey'), 'room', array('roomid'));

        // Conditionally launch create table for bookingInfo.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Define table location to be created.
        $table = new xmldb_table('location');

        // Adding fields to table location.
        $table->add_field('locationid', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('locationbuilding', XMLDB_TYPE_CHAR, '20', null, XMLDB_NOTNULL, null, null);
        $table->add_field('locationfloor', XMLDB_TYPE_INTEGER, '2', null, XMLDB_NOTNULL, null, null);
        $table->add_field('locationroomnumber', XMLDB_TYPE_CHAR, '10', null, XMLDB_NOTNULL, null, null);

        // Adding keys to table location.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('locationid'));

        // Conditionally launch create table for location.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Booking savepoint reached.
        upgrade_block_savepoint(true, 2019011301, 'booking');

    }

}

