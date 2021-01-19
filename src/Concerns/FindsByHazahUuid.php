<?php


namespace Tokenly\HazahClient\Concerns;

/**
 * find by tokenly_uuid field
 */
trait FindsByHazahUuid
{
 
    public function findByTokenlyUuid($tokenly_uuid) {
        return $this->prototype_model->where('tokenly_uuid', $tokenly_uuid)->first();
    }


}