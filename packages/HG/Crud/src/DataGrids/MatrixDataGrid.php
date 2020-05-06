<?php


namespace HG\Crud\DataGrids;


use Illuminate\Support\Facades\DB;
use Webkul\Ui\DataGrid\DataGrid;

class MatrixDataGrid extends DataGrid
{

    protected $index = 'matrix_id'; //the column that needs to be treated as index column

    protected $sortOrder = 'desc'; //asc or desc

    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('matrix as matrix_')
            ->select('matrix_.id as matrix_id', 'mt.name', 'matrix_.image', 'mt.locale')
            ->leftJoin('matrix_translations as mt', function($leftJoin) {
                $leftJoin->on('matrix_.id', '=', 'mt.matrix_id')
                    ->where('mt.locale', app()->getLocale());
            })
            ->groupBy('matrix_.id');


        $this->addFilter('matrix_id', 'mat.id');

        $this->setQueryBuilder($queryBuilder);
    }

    public function addColumns()
    {
        $this->addColumn([
            'index' => 'matrix_id',
            'label' => trans('admin::app.datagrid.id'),
            'type' => 'number',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'name',
            'label' => trans('admin::app.datagrid.name'),
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);
    }

    public function prepareActions() {
        $this->addAction([
            'title' => trans('admin::app.update'),
            'method' => 'GET', // use GET request only for redirect purposes
            'route' => 'matrix.edit',
            'icon' => 'icon pencil-lg-icon'
        ]);

        $this->addAction([
            'title' => trans('admin::app.delete'),
            'method' => 'POST', // use GET request only for redirect purposes
            'route' => 'admin.catalog.categories.delete',
            'confirm_text' => trans('ui::app.datagrid.massaction.delete', ['resource' => 'product']),
            'icon' => 'icon trash-icon'
        ]);
    }

}