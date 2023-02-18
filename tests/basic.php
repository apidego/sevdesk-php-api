<?php
require_once(__DIR__.'/../sevdesk-php-api.php');
const CHECK_MARK = "\xE2\x9C\x94";
const CROSS_MARK = "\xE2\x9D\x8C";

$sevdesk = new sevdesk_client(['api_key' => 'f2aaa7a7b0e906509f386364bba1b4a7']);

// test contacts endpoint
$contacts = $sevdesk->get_contacts();
if (isset($contacts->objects)) {
    printf(CHECK_MARK." Contacts endpoint works".PHP_EOL);
} else {
    printf(CROSS_MARK." Contacts endpoint does not work".PHP_EOL);
}