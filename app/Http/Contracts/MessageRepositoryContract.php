<?php

namespace App\Http\Contracts;


interface MessageRepositoryContract
{
    public function showMessage(
        int $userIdSend,
        int $userIdReceive,
        int $limit,
        int $offset
    ): array;

    public function sendFile(
        object $request,
        int $idMessage
    ): array;

    public function saveMessage(
        object $request
    ): int;
}