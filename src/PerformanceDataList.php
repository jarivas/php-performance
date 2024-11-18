<?php

declare(strict_types=1);

namespace Rivas;

class PerformanceDataList
{
    use Uuid;

    protected string $key;
    /** @var PerformanceData[] */
    protected array $list;


    public function __construct()
    {
        $this->key = $this->generateUuidv4();

        $this->list[$this->key] = new PerformanceData();

    }//end __construct()


    public function snapshot(?string $point = null): void
    {
        if ($point === null) {
            $point = $this->generateUuidv4();
        }

        $this->list[$point] = new PerformanceData();

    }//end snapshot()


    public function count(): int
    {
        return count($this->list);

    }//end count()


    public function getExecutionTime(): float
    {
        return ($this->getLastItem()->getTimeStamp() - $this->getFistItem()->getTimeStamp());

    }//end getExecutionTime()


    public function getAverageExecutionTime(): float
    {
        return ($this->getExecutionTime() / $this->count());

    }//end getAverageExecutionTime()


    public function getMemoryUsage(): float
    {
        return ($this->getLastItem()->getMemory() - $this->getFistItem()->getMemory());

    }//end getMemoryUsage()


    public function getAverageMemoryUsage(): float
    {
        return ($this->getMemoryUsage() / $this->count());

    }//end getAverageMemoryUsage()


    public function getCpuUsage(): float
    {
        return ($this->getLastItem()->getCpu() - $this->getFistItem()->getCpu());

    }//end getCpuUsage()


    public function getAverageCpuUsage(): float
    {
        return ($this->getCpuUsage() / $this->count());

    }//end getAverageCpuUsage()

    protected function getFistItem(): PerformanceData
    {
        return $this->list[$this->key];
    }//end getFistItem()


    protected function getLastItem(): PerformanceData
    {
        $keys = array_keys($this->list);

        $last = end($keys);

        return $this->list[$last];
    }//end getLastItem()

}//end class
