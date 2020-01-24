<?php

declare(strict_types=1);

namespace CIWorkshop\Core\Mailer;

interface MailServiceInterface
{
    /**
     * @param Message $message
     *
     * @return int
     */
    public function send(Message $message): int;
}
