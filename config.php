<?php  // Totara configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'pgsql';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'totara';
$CFG->dbuser    = 'totarauser';
$CFG->dbpass    = 'totarapwd';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbsocket' => '',
);

$CFG->wwwroot   = 'http://localhost/totaralms-258';
$CFG->dataroot  = '/Applications/XAMPP/sitedata/totaralmsdata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(dirname(__FILE__) . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
