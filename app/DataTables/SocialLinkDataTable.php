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
            ->editColumn('name', function (SocialLink $socialLink) {
                return
                    "<span class=\"pr-2\"><i class=\"mdi mdi-"
                    .
                    ($socialLink?->getAttributes()['name'] === "github"
                        ? $socialLink?->getAttributes()['name'] . "-circle"
                        : $socialLink?->getAttributes()['name'])
                    .
                    "\"></i></span>" . " " . $socialLink?->name;
            })
            ->addColumn('action', function (SocialLink $socialLink) {
                return "
                    <a href=\"javascript:void(0)\" class=\"edit\" title=\"Edit\" data-url=\"" . route('admin.social-links.edit', $socialLink?->id) . "\"
                    data-update-url=\"" . route('admin.social-links.update', $socialLink?->id) . "\"><i
                    class=\"mdi mdi-square-edit-outline\"></i></a>
                    <a href=\"javascript:void(0)\" title=\"Delete\"
                    class=\"destroy\" data-url=\"" . route('admin.social-links.destroy', $socialLink?->id) . "\"><i
                    class=\"mdi mdi-delete-outline\"></i></a>
                ";
            })
            ->addColumn('status', function (SocialLink $socialLink) {
                return
                    "<form class=\"change-status\" action=\""
                    .
                    route('admin.social-links.update.status', $socialLink->id)
                    .
                    "\">"
                    .
                    "<input type=\"text\" name=\"status\" value=\""
                    .
                    ($socialLink->is_active === SocialLink::STATUS_ACTIVE
                        ? SocialLink::STATUS_INACTIVE
                        : SocialLink::STATUS_ACTIVE)
                    .
                    "\" hidden /><button type=\"submit\" style=\"border: none; background: none;\"><span class=\"badge rounded-pill "
                    .
                    ($socialLink->is_active === SocialLink::STATUS_ACTIVE
                        ? "btn-inverse-success"
                        : "btn-inverse-danger")
                    .
                    "\">"
                    .
                    ($socialLink->is_active == SocialLink::STATUS_ACTIVE
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
            Column::make('status')
                ->orderable(false),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(70)
                ->addClass('text-center'),
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
