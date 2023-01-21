<?php

namespace App\Repositories;

use App\Models\Cursos;
use App\Repositories\BaseRepository;

/**
 * Class CursosRepository
 * @package App\Repositories
 * @version January 13, 2023, 9:53 pm UTC
*/

class CursosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cur_siglas',
        'cur_descripcion',
        'cur_numero'
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
        return Cursos::class;
    }
}
