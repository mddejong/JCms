<?php

/**
 *
 * @package    JCms
 * @subpackage Public
 * @author     Matijs de Jong <mjong@magnafacta.nl>
 * @copyright  Copyright (c) 2017, Stichting J-POP and MagnaFacta B.V.
 * @license    No free license, do not copy
 */

require_once "../vendor/autoload.php";

$app = new JCms\Application(dirname(__DIR__));
$app->initialize();
$app->run();
