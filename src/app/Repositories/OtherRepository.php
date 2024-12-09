<?php

namespace App\Repositories;

use App\Models\Other;
use App\Repositories\Interfaces\OtherInterface;
use Illuminate\Database\Eloquent\Model;

class OtherRepository extends BaseRepository implements OtherInterface
{
  public function __construct(Other $asset)
  {
    parent::__construct($asset);
  }

  public function create(array $data): Model
  {
    $asset = $this->model->create($data);

    return $asset;
  }
}