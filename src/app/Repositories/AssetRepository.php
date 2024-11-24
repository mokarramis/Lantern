<?php

namespace App\Repositories;

use App\Models\Asset;
use App\Repositories\Interfaces\AssetInterface;

class AssetRepository extends BaseRepository implements AssetInterface
{
  public function __construct(Asset $asset)
  {
    parent::__construct($asset);
  }
}