<?php
namespace SSENSE\HiringTest\Models;

class Country extends BaseModel
{
    const CANADA_CODE = 'CA';
    /**
     * Name of the table to use for the queries
     * 
     * @var string
     */
    protected $tableName = 'countries';
}
