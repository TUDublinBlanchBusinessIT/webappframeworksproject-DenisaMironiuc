<?php

namespace App\Repositories;

use App\Models\scorder;
use App\Repositories\BaseRepository;

/**
 * Class scorderRepository
 * @package App\Repositories
 * @version August 22, 2020, 8:43 am UTC
*/

class scorderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'orderdate',
        'deliverystreet',
        'deliverycity',
        'deliverycounty',
        'ordertotal'
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
        return scorder::class;
    }
}
