<?php

namespace Loevgaard\DandomainFoundationBundle\UpdatedEntityProvider;

use Dandomain\Api\Api;
use Loevgaard\DandomainDateTime\DateTimeImmutable;

abstract class UpdatedEntityProvider implements UpdatedEntityProviderInterface
{
    /**
     * @var string
     */
    protected $logsDir;

    /**
     * @var Api
     */
    protected $api;

    /**
     * @var string
     */
    protected $logPath;

    /**
     * @param string $logsDir The directory where runtime logs are stored
     * @param Api    $api     The Dandomain API
     */
    public function __construct(string $logsDir, Api $api)
    {
        $this->logsDir = rtrim($logsDir, '/');
        $this->api = $api;
    }

    public function getModifiedInterval(): array
    {
        $lastLog = $this->readLog();

        if (array_key_exists('end', $lastLog) && ($lastLog['end'] instanceof DateTimeImmutable)) {
            $start = $lastLog['end'];
        } else {
            $start = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2000-01-01 00:00:00');
        }

        $end = new DateTimeImmutable();

        // validation of dates
        if ($start > $end) {
            throw new \InvalidArgumentException('Start date is after end date');
        }

        return [
            'start' => $start,
            'end' => $end,
        ];
    }

    /**
     * @throws \RuntimeException
     *
     * @return array
     */
    public function readLog(): array
    {
        $logPath = $this->getLogPath();

        if (!file_exists($logPath)) {
            return [];
        }

        $data = @unserialize(file_get_contents($logPath));

        if (false === $data) {
            throw new \RuntimeException('Could not unserialize log file '.$logPath);
        }

        return (array) $data;
    }

    /**
     * Will write to the log for this synchronizer service.
     *
     * @param array $log The log
     */
    protected function writeLog(array $log)
    {
        $logPath = $this->getLogPath();

        file_put_contents($logPath, serialize($log));
    }

    /**
     * Returns the log filename.
     *
     * @return string
     */
    protected function getLogPath(): string
    {
        if (!$this->logPath) {
            $this->logPath = $this->logsDir.'/'.$this->decamelize(get_class($this));
        }

        return $this->logPath;
    }

    /**
     * Decamelizes a string.
     *
     * @param $string
     *
     * @return string
     */
    protected function decamelize($string): string
    {
        return strtolower(preg_replace(['/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/'], '$1_$2', $string));
    }
}
