<?php

/**
 *
 * @package    JCms
 * @subpackage Application
 * @author     Matijs de Jong <mjong@magnafacta.nl>
 * @copyright  Copyright (c) 2017, Stichting J-POP and MagnaFacta B.V.
 * @license    No free license, do not copy
 */

namespace JCms;

use Bolt\Application as BoltApplication;
use Bolt\Configuration\Composer;

/**
 *
 * @package    JCms
 * @subpackage Application
 * @copyright  Expression copyright is undefined on line 56, column 18 in Templates/Scripting/PHPClass.php.
 * @copyright  Copyright (c) 2017, Stichting J-POP and MagnaFacta B.V.
 * @since      Class available since version 1.0.0 15-Sep-2017 17:27:09
 */
class Application extends BoltApplication
{
    /**
     * @param string $installationDir Root project / installation directory
     */
    public function __construct($installationDir)
    {
        $configuration = new Composer($installationDir);
        $configuration->setPath("cache", $installationDir . '/var/cache');
        $configuration->setPath('view', '%web%/bolt-public');
//        $configuration->setPath("web", $installationDir . '/public');
//        // $configuration->setPath("files", "public/files");
//        // $configuration->setPath("themebase", "public/theme");
        $configuration->setUrl("root", "/JCms");
        $configuration->setUrl('view', '/JCms/bolt-public');
//        $configuration->getVerifier()->disableApacheChecks();
        $configuration->verify();

        parent::__construct(['resources' => $configuration]);
    }

}
