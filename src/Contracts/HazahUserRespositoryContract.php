<?php

/**
 * Instantiator provides utility methods to build objects without invoking their constructors
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 */

namespace Cryptonaut420\HazahClient\Contracts;

use Illuminate\Database\Eloquent\Model;

interface HazahUserRespositoryContract
{

    public function create($attributes);

    public function update(Model $resource, $attributes);

    public function findByHazahUuid($hazah_uuid);

}
