<?php

declare(strict_types=1);

namespace Rivas;

class PerformanceDataList
{

    /** @var Array<string, Array<PerformanceData>> */
    private array $list;


    public function __construct()
    {
        $this->list = [];

    }//end __construct()


    public function begin(string $key): void
    {
        $this->list[$key] = [new PerformanceData()];

    }//end begin()


    public function snapshot(string $key): void
    {
        $this->list[$key][] = new PerformanceData();

    }//end snapshot()


    /**
     * Return the current list
     * @return PerformanceData[]
     */
    public function get(string $key): array
    {
        return $this->list[$key];

    }//end get()


    /**
     * Adds last snapshop and return the list
     * @return PerformanceData[]
     */
    public function end(string $key): array
    {
        $this->snapshot($key);

        $dataList = $this->list[$key];

        unset($this->list[$key]);

        return $dataList;

    }//end end()


}//end class
