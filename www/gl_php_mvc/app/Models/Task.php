<?php

namespace App\Models;

class Task extends AbstractModel
{
    public string $table = 'tasks';

    public array $propertiesWhiteList = [];

    public array $propertiesBlackList = ['p2'];
}