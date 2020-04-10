<?php

namespace App\DataTables;

use App\Pharmacy;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PharmaciesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'doctors.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Pharmacy $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Pharmacy $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder() 
                    ->setTableId('pharmacies-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    
                    /* 'data' => 'image',
                    'render' => function(data, type, full, meta){
                        return "<img src=/images/" + data + " alt='image' height='42' width='42' />";
                    }]) */
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('name'),
            Column::make('national_id'),
            Column::make('area_id'), 
            Column::make('priority'),
            Column::make('email'),

        

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Pharmacies_' . date('YmdHis');
    }
}
