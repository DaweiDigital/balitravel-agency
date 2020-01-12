<?php

/**
 * Remove WP Version from the Feed
 */
add_filter ( 'the_generator', '__return_empty_string' );
