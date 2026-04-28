<?php

namespace App\Filament\Resources\BlogComments\Pages;

use App\Filament\Resources\BlogComments\BlogCommentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogComment extends CreateRecord
{
    protected static string $resource = BlogCommentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (filled($data['admin_reply'] ?? null) && blank($data['replied_at'] ?? null)) {
            $data['replied_at'] = now();
        }

        return $data;
    }
}
