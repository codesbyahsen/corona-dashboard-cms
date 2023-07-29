<?php

namespace App\DataTables;

use App\Models\SocialLink;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SocialLinkDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('name', function ($row) {
                return
                    "<span class=\"pr-2\"><i class=\"mdi mdi-"
                    .
                    ($row?->getAttributes()['name'] === "github"
                    ? $row?->getAttributes()['name'] . "-circle"
                    : $row?->getAttributes()['name'])
                    .
                    "\"></i></span>" . " " . $row?->name;
            })
            ->addColumn('action', function ($row) {
                return "
                    <a href=\"javascript:void(0)\" title=\"Edit\" data-toggle=\"modal\"
                        data-target=\"#editSocialLink-{$row?->id}\"><i
                        class=\"mdi mdi-square-edit-outline\"></i></a>
                        <a href=\"javascript:void(0)\" title=\"Delete\"
                        onclick=\"confirmToDelete('" . route('admin.social-links.destroy', $row?->id) . "')\"><i
                        class=\"mdi mdi-delete-outline\"></i></a>
                ";
            })
            ->addColumn('status', function ($row) {
                return
                    "<form action=\""
                    .
                    route('admin.social-links.update.status', $row->id)
                    .
                    "\" method=\"POST\">"
                    .
                    "<input type=\"hidden\" name=\"_token\" value=\""
                    .
                    csrf_token()
                    .
                    "\" />"
                    .
                    "<input type=\"hidden\" name=\"_method\" value=\"PATCH\" />"
                    .
                    "<input type=\"text\" name=\"status\" value=\""
                    .
                    ($row->active == SocialLink::STATUS_ACTIVE
                        ? SocialLink::STATUS_INACTIVE
                        : SocialLink::STATUS_ACTIVE)
                    .
                    "\" hidden /><button type=\"submit\" style=\"border: none; background: none;\"><span class=\"badge rounded-pill "
                    .
                    ($row->active == SocialLink::STATUS_ACTIVE
                        ? "btn-inverse-success"
                        : "btn-inverse-danger")
                    .
                    "\">"
                    .
                    ($row->active == SocialLink::STATUS_ACTIVE
                        ? "Active"
                        : "Disabled")
                    .
                    "</span></button></form>";
            })
            ->rawColumns(['name', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SocialLink $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('sociallink-table')
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
            Column::make('name'),
            Column::make('link'),
            Column::make('status'),
            Column::make('action'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SocialLink_' . date('YmdHis');
    }
}
