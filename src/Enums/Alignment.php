<?php

declare(strict_types=1);

namespace Awcodes\LightSwitch\Enums;

enum Alignment: string
{
    case TopLeft = 'top-left';

    case TopCenter = 'top-center';

    case TopRight = 'top-right';

    case BottomLeft = 'bottom-left';

    case BottomCenter = 'bottom-center';

    case BottomRight = 'bottom-right';

    public function isTop(): bool
    {
        return str_starts_with($this->value, 'top');
    }
}
