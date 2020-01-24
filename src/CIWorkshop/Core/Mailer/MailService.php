<?php

declare(strict_types=1);

namespace CIWorkshop\Core\Mailer;

class MailService implements MailServiceInterface
{
    /**
     * @var string
     */
    private string $host;

    /**
     * @var int
     */
    private int $port;

    /**
     * @var string
     */
    private string $userName;

    /**
     * @var string
     */
    private string $password;

    /**
     * @var string
     */
    private string $encryption;

    /**
     * @param string $host
     * @param int $port
     * @param string $userName
     * @param string $password
     * @param string $encryption
     */
    public function __construct(string $host, int $port, string $userName, string $password, string $encryption = 'tls')
    {
        $this->host = $host;
        $this->port = $port;
        $this->userName = $userName;
        $this->password = $password;
        $this->encryption = $encryption;
    }

    /**
     * @param Message $message
     *
     * @return int
     */
    public function send(Message $message): int
    {
        $transport = (new \Swift_SmtpTransport($this->host, $this->port, $this->encryption))
            ->setUsername($this->userName)
            ->setPassword($this->password)
        ;

        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message($message->getSubject()))
            ->setFrom($message->getFroms())
            ->setTo('tshinow@gmail.com', "aaaa")
            ->setBody($message->getBody())
        ;

        return $mailer->send($message);
    }
}
