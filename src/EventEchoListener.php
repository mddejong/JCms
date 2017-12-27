<?php

/**
 *
 * @package    JCms
 * @subpackage EventListener
 * @author     Matijs de Jong <mjong@magnafacta.nl>
 * @copyright  Copyright (c) 2017, Stichting J-POP and MagnaFacta B.V.
 * @license    No free license, do not copy
 */

namespace JCms;

use Bolt\Events\AccessControlEvent;
use Bolt\Events\AccessControlEvents;
// use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\VarDumper\VarDumper;

/**
 *
 * @package    JCms
 * @subpackage EventListener
 * @copyright  Copyright (c) 2017, Stichting J-POP and MagnaFacta B.V.
 * @license    No free license, do not copy
 * @since      Class available since version 1.8.2 27-Dec-2017 15:51:40
 */
class EventEchoListener implements EventSubscriberInterface
{
    /**
     *
     * @var Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     *
     * @param AccessControlEvent $event
     */
    public function onEcho(AccessControlEvent $event)
    {
        $code = $event->getName() . ' - ' . $event->getUserName();
        $this->app['logger.flash']->info($code);
        $this->app['logger.system']->alert($code, ['event' => 'authentication']);
    }


    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     * * The method name to call (priority defaults to 0)
     * * An array composed of the method name to call and the priority
     * * An array of arrays composed of the method names to call and respective
     *   priorities, or 0 if unset
     *
     * For instance:
     *
     * * array('eventName' => 'methodName')
     * * array('eventName' => array('methodName', $priority))
     * * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            AccessControlEvents::LOGIN_SUCCESS  => ['onEcho', 100],
            AccessControlEvents::LOGIN_FAILURE  => ['onEcho', 100],
            AccessControlEvents::LOGOUT_SUCCESS => ['onEcho', 100],
            AccessControlEvents::RESET_REQUEST  => ['onEcho', 100],
            AccessControlEvents::RESET_SUCCESS  => ['onEcho', 100],
            AccessControlEvents::RESET_FAILURE  => ['onEcho', 100],
            AccessControlEvents::ACCESS_CHECK_REQUEST => ['onEcho', 100],
            AccessControlEvents::ACCESS_CHECK_SUCCESS => ['onEcho', 100],
            AccessControlEvents::ACCESS_CHECK_FAILURE => ['onEcho', 100],
        ];
    }
}
