<?php

declare(strict_types=1);

namespace Rivas;

class PerformanceData
{

    private readonly float $timestamp;

    private readonly float $memory;

    private readonly float $cpu;


    public function __construct()
    {
        $memoryInBytes = memory_get_usage();
        $sytemLoads    = sys_getloadavg();

        $this->timestamp = microtime(true);
        $this->memory    = (($memoryInBytes / 1024) / 1024);

        $this->cpu = (empty($sytemLoads)) ? 0 : $sytemLoads[0];

    }//end __construct()


    public function getTimestamp(): float
    {
        return $this->timestamp;

    }//end getTimestamp()


    public function getMemory(): float
    {
        return $this->memory;

    }//end getMemory()


    public function getCpu(): float
    {
        return $this->cpu;

    }//end getCpu()


}//end class
