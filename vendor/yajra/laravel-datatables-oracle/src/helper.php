<?php

use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\DataTables;

if (!function_exists('datatables')) {
    /**
     * Helper to make a new DataTable instance from source.
     * Or return the factory if source is not set.
     *
     * @param mixed $source
     * @return DataTableAbstract|DataTables
     */
    function datatables($source = null)
    {
        if (is_null($source)) {
            return app('datatables');
        }

        return app('datatables')->make($source);
    }
}
