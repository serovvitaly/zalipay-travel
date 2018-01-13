<?php

namespace App\Services;


interface GenericServiceInterface
{
    public function satisfy($objectType, $objectIdentifier);
}
