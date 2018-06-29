<?php

namespace Voryx\ThruwayBundle\Annotation;

use Doctrine\Common\Annotations\Annotation\Required;

/**
 * Define Worker
 *
 * How to use:
 *   '@Worker("worker_name")'
 *   '@Worker("worker_name", realm = "realm1", url = "ws://127.0.0.1:8080")'
 *   '@Worker("worker_name", maxProcesses = 10)'
 *
 * @Annotation
 * @Target({"CLASS"})
 *
 */
class Worker implements AnnotationInterface
{
    /**
     * @Required()
     * @var string
     */
    protected $value;
    
    /**
     * @var int|null
     */
    protected $maxProcesses;
    
    /**
     * @var string|null
     */
    protected $realm;
    
    /**
     * @var string|null
     */
    protected $url;
    
    /**
     * @var bool|null
     */
    protected $trusted = true;

    /**
     * @param $options
     * @throws \InvalidArgumentException
     */
    public function __construct($options)
    {
        foreach ($options as $key => $value) {
            if (!property_exists($this, $key)) {
                throw new \InvalidArgumentException(
                    sprintf('Property "%s" does not exist for the Worker annotation', $key)
                );
            }
            $this->$key = $value;
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->value;
    }
    
    /**
     * @return bool
     */
    public function isTrusted(): bool {
        return $this->trusted===null?false:$this->trusted;
    }

    /**
     * @return int
     */
    public function getMaxProcesses(): int
    {
        return $this->maxProcesses ?: 1;
    }

    /**
     * @return string|nulls
     */
    public function getRealm(): ?string
    {
        return $this->realm;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getWorker(): string
    {
        return $this->value;
    }
}
