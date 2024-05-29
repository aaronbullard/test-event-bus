<?php

$res = shell_exec('composer test');

print_r($res);