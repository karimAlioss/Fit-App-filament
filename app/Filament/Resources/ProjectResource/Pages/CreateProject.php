<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    /*protected function handleRecordCreation(array $data): Model
    {
        $project = parent::handleRecordCreation($data);

        $user = Auth::user();
        $project->teams()->sync($user->teams->pluck('id'));

        return $project;
    }*/
}
