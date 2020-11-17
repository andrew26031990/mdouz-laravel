<?php

namespace App\Repositories;

use App\Models\CurrencyModel;
use App\Repositories\BaseRepository;

/**
 * Class CurrencyModelRepository
 * @package App\Repositories
 * @version November 17, 2020, 5:07 am UTC
*/

class CurrencyModelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code',
        'exchange_rate',
        'default'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CurrencyModel::class;
    }
}
