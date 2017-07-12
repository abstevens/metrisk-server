<?php

namespace Database\Traits;

trait AdminRights
{
    protected function getAdminId($object, String $searchType, String $string): Int
    {
        $obj = $object::pluck('id', $searchType);

        $id = $obj[$string];

        return $id;
    }

    protected function removeFirstAdminId($object, $adminId): Void
    {
        $firstUser = $object->search($adminId);

        unset($object[$firstUser]);
    }
}