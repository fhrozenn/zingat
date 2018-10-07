<?php

namespace App\Http\Transformers;


use App\Document;
use App\Http\Dto\DocumentDto;

class DocumentTransformer
{

    public static function transform(Document $document = null)
    {
        if ($document == null) {
            return null;
        }

        $dto = new DocumentDto();
        $dto->id = $document->id;
        $dto->title = $document->title;
        $dto->body = $document->body;

        return $dto;

    }
}