<?php


namespace Cryptonaut420\HazahClient\Concerns;

/**
 * find by tokenly_uuid field
 */
trait FindsByHazahUuid
{

    public function findByHazahUuid($hazah_uuid) {
        return $this->prototype_model->where('hazah_uuid', $hazah_uuid)->first();
    }


}
