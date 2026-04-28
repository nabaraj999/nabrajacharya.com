<?php

namespace App\Filament\Resources\BlogComments\Pages;

use App\Filament\Resources\BlogComments\BlogCommentResource;
use Filament\Resources\Pages\EditRecord;

class EditBlogComment extends EditRecord
{
    protected static string $resource = BlogCommentResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (filled($data['admin_reply'] ?? null) && blank($data['replied_at'] ?? null)) {
            $data['replied_at'] = now();
        }

        if (blank($data['admin_reply'] ?? null)) {
            $data['replied_at'] = null;
        }

        return $data;
    }
}
