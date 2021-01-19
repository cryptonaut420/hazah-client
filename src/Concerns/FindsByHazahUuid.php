<?php


namespace Cryptonaut420\HazahClient\Concerns;

/**
 * find by tokenly_uuid field
 */
trait FindsByHazahUuid
{
 
    public function findByCryptonaut420Uuid($tokenly_uuid) {
        return $this->prototype_model->where('tokenly_uuid', $tokenly_uuid)->first();
    }


}