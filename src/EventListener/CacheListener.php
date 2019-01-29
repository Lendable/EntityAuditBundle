<?php

declare (strict_types=1);

namespace SimpleThings\EntityAudit\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use SimpleThings\EntityAudit\AuditReader;

class CacheListener implements EventSubscriber
{
    /**
     * @var AuditReader
     */
    private $auditReader;

    public function __construct(AuditReader $auditReader)
    {
        $this->auditReader = $auditReader;
    }

    public function getSubscribedEvents(): array
    {
        return [
            Events::onClear,
        ];
    }

    public function onClear(): void
    {
        $this->auditReader->clearEntityCache();
    }
}
