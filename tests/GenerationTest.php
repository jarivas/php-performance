<?php

declare(strict_types=1);

namespace Rivas\Tests;

use Rivas\PerformanceDataList;

class GenerationTest extends TestCase
{


    public function testGenerateModels():void
    {
        $performanceList = new PerformanceDataList();

        $this->generateModels();

        $performanceList->snapshot();

        $this->assertIsFloat($performanceList->getExecutionTime());
        $this->assertIsFloat($performanceList->getMemoryUsage());
        $this->assertIsFloat($performanceList->getCpuUsage());
        $this->assertIsFloat($performanceList->getAverageExecutionTime());
        $this->assertIsFloat($performanceList->getAverageMemoryUsage());
        $this->assertIsFloat($performanceList->getAverageCpuUsage());

    }//end testGenerateModels()


}//end class
