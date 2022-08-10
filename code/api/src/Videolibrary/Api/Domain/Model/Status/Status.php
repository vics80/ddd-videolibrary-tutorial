<?php


namespace App\Videolibrary\Api\Domain\Model\Status;


class Status
{
    private string $value;

    const PUBLISHED = 'published';
    const PENDING = 'pending';
    const REMOVED = 'removed';

    const ALLOWED_VALUES = [
        'pending',
        'published',
        'removed'
    ];

    public function __construct(string $value)
    {
        if (!in_array($value, self::ALLOWED_VALUES)) {
            throw new InvalidStatusValueException();
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(Status $status)
    {
        return $this->value() === $status->value();
    }

    public static function makePublished(): self
    {
        return new self(self::PUBLISHED);
    }

    public static function makePending(): self
    {
        return new self(self::PENDING);
    }

    public static function makeRemoved(): self
    {
        return new self(self::REMOVED);
    }
}