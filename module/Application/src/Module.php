<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Application;

use Laminas\Mvc\MvcEvent;
use Laminas\View\Model\JsonModel;
use Domain\Exception\DataNotFoundException;

class Module
{
    public function getConfig(): array
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap(MvcEvent $event)
    {
        $eventManager = $event->getApplication()->getEventManager();
        $eventManager->attach(
            MvcEvent::EVENT_DISPATCH_ERROR,
            [$this, 'onDispatchError']
        );
        $eventManager->attach(
            MvcEvent::EVENT_RENDER_ERROR,
            [$this, 'onRenderError']
        );
    }

    public function onDispatchError(MvcEvent $event)
    {
        $exception = $event->getParam('exception');
        if (is_null($exception)) {
            return;
        }
        if ($exception instanceof DataNotFoundException) {
            $event->getResponse()->setStatusCode(404);
        }
        $event->setResult(new JsonModel([
            'content' => $exception->getMessage()
        ]));
    }

    public function onRenderError(MvcEvent $event)
    {
        $exception = $event->getParam('exception');
        if (is_null($exception)) {
            return;
        }
        $event->setResult(new JsonModel([
            'content' => $exception->getMessage()
        ]));
    }
}
