<?php
enum DriveType: string
{
    case Internal = 'internal';
    case External = 'external';
}

class Drive
{
    public function __construct(
        public string $vendor,
        public string $model,
        public DriveType $type,
        public string $variants = '',
    )
    {
    }

    public function is_external(): bool
    {
        return $this->type === DriveType::External;
    }
}