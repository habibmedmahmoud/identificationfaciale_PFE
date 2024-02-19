<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Identification;

class IdentificationTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->searchable(),
            Column::make("Email", "email")
                ->searchable(),
            Column::make("Prénom", "firstName")
                ->searchable(),
            Column::make("Nom", "lastName")
                ->searchable(),
            Column::make("Statut", "status")
                ->searchable(),
            Column::make("NNI", "nni")
                ->searchable(),
            Column::make("Telephone", "tel")
                ->searchable(),
            Column::make("Resultat machine", "matching")
                ->searchable(),
            Column::make("Resultat humain", "matching_human")
                ->searchable(),
        ];
    }

    public function query(): Builder
    {
        return Identification::query();
    }


}
