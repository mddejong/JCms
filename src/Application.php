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
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

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
        parent::__construct([
            'path_resolver.root' => $installationDir,
            'path_resolver.paths' => [
                'cache' => $installationDir . '/var/cache',
                'view', '%web%/bolt-public',
                ]]);

        $this->subscribe($this['dispatcher']);
        // $configuration->setUrl("root", "/JCms");
        // $configuration->setUrl('view', '/JCms/bolt-public');
    }

    /**
     * Define events to listen to here.
     *
     * @param EventDispatcherInterface $dispatcher
     */
    protected function subscribe(EventDispatcherInterface $dispatcher)
    {
        $dispatcher->addSubscriber(new EventEchoListener($this));
    }
}
