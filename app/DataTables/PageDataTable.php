<?php

namespace App\DataTables;

use App\Models\Page;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class PageDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('description', function (Page $page) {
                $limit = 50;
                return strlen($page?->description) <= $limit ? $page?->description : Str::limit($page?->description, $limit, '...');
            })
            ->addColumn('action', function (Page $page) {
                return "
                <a href=\"" . route('admin.pages.show', encrypt($page->id)) . "\"
                title=\"View details\"><i class=\"mdi mdi-file-eye\"></i></a>
                <a href=\"javascript:void(0)\" class=\"edit\" title=\"Edit\" data-url=\"" . route('admin.pages.edit', $page?->id) . "\"
                data-update-url=\"" . route('admin.pages.update', $page?->id) . "\"><i
                class=\"mdi mdi-square-edit-outline\"></i></a>
                <a href=\"javascript:void(0)\" title=\"Delete\"
                class=\"destroy\" data-url=\"" . route('admin.pages.destroy', $page?->id) . "\"><i
                class=\"mdi mdi-delete-outline\"></i></a>
            ";
            })
            ->addColumn('status', function (Page $page) {
                return
                    "<form class=\"change-status\" action=\""
                    .
                    route('admin.pages.update.status', $page->id)
                    .
                    "\">"
                    .
                    "<input type=\"text\" name=\"status\" value=\""
                    .
                    ($page->is_active === Page::STATUS_ACTIVE
                        ? Page::STATUS_INACTIVE
                        : Page::STATUS_ACTIVE)
                    .
                    "\" hidden /><button type=\"submit\" style=\"border: none; background: none;\"><span class=\"badge rounded-pill "
                    .
                    ($page->is_active === Page::STATUS_ACTIVE
                        ? "btn-inverse-success"
                        : "btn-inverse-danger")
                    .
                    "\">"
                    .
                    ($page->is_active == Page::STATUS_ACTIVE
                        ? "Active"
                        : "Disabled")
                    .
                    "</span></button></form>";
            })
            ->rawColumns(['description', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Page $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('page-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
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
            Column::make('title'),
            Column::make('description'),
            Column::make('status')
                ->orderable(false),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Page_' . date('YmdHis');
    }
}
