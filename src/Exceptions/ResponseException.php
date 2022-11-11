<?php
namespace Ampeco\OmnipayTransbank\Exceptions;

class ResponseException extends \Exception
{
    public static array $responseCodes = [
        '-96' => 'tbk_user does not exist',
        '-97' => 'Oneclick limits, maximum daily payment amount exceeded.',
        '-98' => 'Oneclick limits, maximum payment amount exceeded',
        '-99' => 'Oneclick limits, maximum amount of daily payments exceeded.',
    ];
}
