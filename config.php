<?php

// use this config file to overwrite the defaults from default_config.php
// or to make local config changes.
$config = array();
// run the generator.php file or fill this with a long string
// must not be empty
$config['encryptionKey'] = 'FIXME';
$config['site_title']    = 'altLab Documenta'; // Site title
$config['theme']         = 'altlab'; // Set the theme

$config['plugins']['gibbs\\phileSubNavigation'] = array('active' => true);
$config['plugins']['siezi\\phileServeContentFiles'] = ['active' => true];
$config['plugins']['phile\\youtube'] = array('active' => true);

$config['plugins']['pschmitt\\analytics'] = array('active' => true);

$config['google_tracking_id'] = 'UA-20725619-1';


// it is important to return the $config array!
return $config;
