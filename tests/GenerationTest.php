<?php

declare(strict_types=1);

namespace Rivas\Tests;

use Rivas\PerformanceData;
use Rivas\PerformanceDataList;

class GenerationTest extends TestCase
{
    private const KEY = 'generateModels';


    public function testGenerateModels():void
    {
        $performanceList = new PerformanceDataList();

        $performanceList->begin(self::KEY);

        $this->generateModels();

        $data = $performanceList->end(self::KEY);

        $this->assertIsArray($data);

        $this->assertInstanceOf(PerformanceData::class, $data[0]);

    }//end testGenerateModels()


}//end class
