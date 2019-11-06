<?php

namespace Yajra\DataTables\Facades;

use Illuminate\Support\Facades\Facade;
use Yajra\DataTables\CollectionDataTable;
use Yajra\DataTables\EloquentDatatable;
use Yajra\DataTables\QueryDataTable;

/**
 * @mixin \Yajra\DataTables\DataTables
 * @method static EloquentDatatable eloquent($builder)
 * @method static QueryDataTable query($builder)
 * @method static CollectionDataTable collection($collection)
 *
 * @see \Yajra\DataTables\DataTables
 */
class DataTables extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'datatables';
    }
}
