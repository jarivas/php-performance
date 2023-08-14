<?php

declare(strict_types=1);

namespace Rivas;

class PerformanceDataList
{

    /** @var Array<PerformanceData> */
    private array $list;


    public function __construct()
    {
        $this->list = [new PerformanceData()];

    }//end __construct()


    public function snapshot(): void
    {
        $this->list[] = new PerformanceData();

    }//end snapshot()


    public function getExecutionTime(): float
    {
        return ($this->list[$this->getLastIndex()]->getTimeStamp() - $this->list[0]->getTimeStamp());

    }//end getExecutionTime()


    public function getAverageExecutionTime(): float
    {
        return ($this->getExecutionTime() / $this->getLastIndex());

    }//end getAverageExecutionTime()


    public function getMemoryUsage(): float
    {
        return ($this->list[$this->getLastIndex()]->getMemory() - $this->list[0]->getMemory());

    }//end getMemoryUsage()


    public function getAverageMemoryUsage(): float
    {
        return ($this->getMemoryUsage() / $this->getLastIndex());

    }//end getAverageMemoryUsage()


    public function getCpuUsage(): float
    {
        return ($this->list[$this->getLastIndex()]->getCpu() - $this->list[0]->getCpu());

    }//end getCpuUsage()


    public function getAverageCpuUsage(): float
    {
        return ($this->getCpuUsage() / $this->getLastIndex());

    }//end getAverageCpuUsage()


    private function getLastIndex(): int
    {
        return (count($this->list) - 1);

    }//end getLastIndex()


}//end class
