<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Loevgaard\DandomainFoundationBundle\Entity\RepositoryInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class Synchronizer implements SynchronizerInterface
{
    /**
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * @var Api
     */
    protected $api;

    /**
     * @var string
     */
    protected $logsDir;

    /**
     * @var string
     */
    protected $logFilePath;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var array
     */
    protected $options;

    /**
     * @param RepositoryInterface $repository
     * @param Api $api The Dandomain API
     * @param string $logsDir The directory where synchronizer logs are stored
     */
    public function __construct(RepositoryInterface $repository, Api $api, string $logsDir)
    {
        $this->repository = $repository;
        $this->api = $api;
        $this->logsDir = rtrim($logsDir, '/');
        $this->logger = new NullLogger();
    }

    /**
     * @param array $options
     * @param callable $optionsConfigurator
     * @return array
     */
    protected function resolveOptions(array $options = [], callable $optionsConfigurator) : array
    {
        $resolver = new OptionsResolver();
        call_user_func_array($optionsConfigurator, [$resolver]);
        return $resolver->resolve($options);
    }

    /**
     * @throws \RuntimeException
     * @return array
     */
    public function readLog() : array
    {
        $logFilePath = $this->getLogFilePath();

        if(!file_exists($logFilePath)) {
            return [];
        }

        $data = @unserialize(file_get_contents($logFilePath));

        if($data === false) {
            throw new \RuntimeException('Could not unserialize log file '.$logFilePath);
        }

        return (array)$data;
    }

    /**
     * Will write to the log for this synchronizer service
     *
     * @param array $log The log
     */
    protected function writeLog(array $log)
    {
        $logFilePath = $this->getLogFilePath();

        file_put_contents($logFilePath, serialize($log));
    }

    /**
     * Returns the log filename
     *
     * @return string
     */
    protected function getLogFilePath() : string
    {
        if(!$this->logFilePath) {
            $this->logFilePath = $this->logsDir.'/'.$this->decamelize(get_class($this));
        }

        return $this->logFilePath;
    }

    /**
     * Decamelizes a string
     *
     * @param $string
     * @return string
     */
    protected function decamelize($string) : string
    {
        return strtolower(preg_replace(['/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/'], '$1_$2', $string));
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}
