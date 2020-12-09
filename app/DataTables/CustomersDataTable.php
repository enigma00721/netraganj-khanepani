<?php

namespace App\DataTables;

use App\App\Customer;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CustomersDataTable extends DataTable
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
            ->eloquent($query);
            // ->addColumn('action', 'customers.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\Customer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Customer $model)
    {
        // return $model->newQuery();
        $row = Customer::select();
        return $this->applyScopes($row);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('customers-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    
                    ->parameters([
                        'dom'          => 'Bfrtip',
                        'buttons'      => ['export', 'print', 'reset', 'reload'],
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('S.No'),
            Column::make('name'),
            Column::make('customer_number'),
            Column::make('father_name'),
            Column::make('mobile_number'),
            Column::make('customer_address'),
            Column::make('gender'),
            Column::make('meter_reading_zone'),
            Column::make('ward'),
            Column::make('number_of_consumers'),
            Column::make('customer_type'),
            Column::make('meter_connected_date'),
            Column::make('meter_serial'),
            Column::make('meter_status'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Customers_' . date('YmdHis');
    }
}
