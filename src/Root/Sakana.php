<?php

declare(strict_types=1);

namespace AiSdk;

use AiSdk\Contracts\Model;
use AiSdk\Sakana\SakanaOptions;
use AiSdk\Sakana\SakanaProvider;

final class Sakana
{
    private static ?SakanaProvider $default = null;
    /** @param array<string, mixed> $config */
    public static function create(array $config = []): SakanaProvider
    {
        return self::$default = new SakanaProvider(SakanaOptions::fromArray($config));
    }
    public static function default(): SakanaProvider
    {
        return self::$default ??= self::create();
    }
    public static function reset(): void
    {
        self::$default = null;
    }
    public static function model(string $modelId): Model
    {
        return self::default()->model($modelId);
    }
}
