<?php

declare(strict_types=1);

namespace CIWorkshop\Core\Mailer;

/**
 * Class Message
 *
 * @package CIWorkshop\Core\Mailer
 */
class Message
{
    /**
     * @var string
     */
    private string $subject = '';

    /**
     * @var array<array<string, string>|string>
     */
    private array $to = [];

    /**
     * @var array<array<string, string>|string>
     */
    private array $froms = [];

    /**
     * @var string
     */
    private string $body = '';

    /**
     * @return self
     */
    public static function create(): self
    {
        return new Message();
    }

    /**
     * @param string $subject
     *
     * @return $this
     */
    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param array<string, string>|string $to
     *
     * @return $this
     */
    public function addTo($to): self
    {
        $this->to[] = $to;

        return $this;
    }

    /**
     * @return array<string|array<string, string>>
     */
    public function getTo(): array
    {
        return $this->to;
    }

    /**
     * @param array<string, string>|string $from
     *
     * @return $this
     */
    public function addFrom($from): self
    {
        $this->froms[] = $from;

        return $this;
    }

    /**
     * @return array<string|array<string, string>>
     */
    public function getFroms(): array
    {
        return $this->froms;
    }

    /**
     * @param string $body
     *
     * @return $this
     */
    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }
}
