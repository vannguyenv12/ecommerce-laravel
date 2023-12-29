<?php

namespace App\DataTables;

use App\Models\Order;
use App\Models\VendorOrder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserOrderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query) {
                $showBtn = "<a href='".route('user.orders.show', $query->id)."' class='btn btn-primary'><i class='far fa-eye'></i></a>";
                // $deleteBtn = "<a href='".route('admin.order.destroy', $query->id)."' class='btn btn-danger mx-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                // $statusBtn = "<a href='".route('admin.order.destroy', $query->id)."' class='btn btn-warning'><i class='fas fa-truck'></i></a>";

                return $showBtn;
            })
            ->addColumn('customer', function($query) {
                return $query->user->name;
            })
            ->addColumn('amount', function($query) {
                return $query->currency_icon.$query->amount;
            })
            ->addColumn('date', function($query) {
                return date('d-M-Y', strtotime($query->created_at));
            })
            ->addColumn('payment_status', function($query) {
                if ($query->payment_status) {
                    return "<span class='badge bg-success'>complete</span>";
                } else {
                    return "<span class='badge bg-warning'>pending</span>";

                }
            })
            ->addColumn('order_status', function($query) {
                switch ($query->order_status) {
                    case 'pending':
                        return "<span class='badge bg-warning'>Pending</span>";
                    case 'processed_and_ready_to_ship':
                        return "<span class='badge bg-info'>Processed</span>";
                    case 'dropped_off':
                        return "<span class='badge bg-info'>Dropped Off</span>";
                    case 'shipped':
                        return "<span class='badge bg-info'>Shipped</span>";
                    case 'out_for_delivery':
                        return "<span class='badge bg-primary'>Out For Delivery</span>";
                    case 'delivered':
                        return "<span class='badge bg-success'>Delivered</span>";
                    case 'canceled':
                        return "<span class='badge bg-danger'>Canceled</span>";
                    default:
                        return "";
                }
            })
            ->rawColumns(['order_status', 'action', 'payment_status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        return $model::where('user_id', Auth::user()->id)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('vendororder-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('invoice_id'),
            Column::make('customer'),
            Column::make('date'),
            Column::make('product_qty'),
            Column::make('amount'),
            Column::make('order_status'),
            Column::make('payment_status'),
            Column::make('payment_method'),

            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'VendorOrder_' . date('YmdHis');
    }
}
