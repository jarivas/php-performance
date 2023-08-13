<?php

declare(strict_types=1);

namespace Rivas\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use SqlModels\GenerationSqlite;
use SqlModels\Dbms;

abstract class TestCase extends PHPUnitTestCase
{
    public const NAMESPACE = 'SqlModels\Tests\Sqlite\Models';


    public static function generateModels(): void
    {
        $appDir       = dirname(__DIR__);
        $host         = "$appDir/db/Sqlite";
        $dbName       = 'chinook.db';
        $targetFolder = "$appDir/tests/Sqlite/Models";
        $generation   = new GenerationSqlite();

        $generation->process(Dbms::Sqlite, $host, $dbName, $targetFolder, self::NAMESPACE);

    }//end generateModels()


}//end class
