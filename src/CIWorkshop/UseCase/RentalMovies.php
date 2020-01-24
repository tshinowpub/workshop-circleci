<?php

declare(strict_types=1);

namespace CIWorkshop\UseCase;

use CIWorkshop\Core\Mailer\MailServiceInterface;
use CIWorkshop\Core\Mailer\Message;
use CIWorkshop\Entity\Customer;

/**
 * @package CIWorkshop\UseCase
 */
class RentalMovies
{
    /**
     * @var MailServiceInterface
     */
    private MailServiceInterface $mailService;

    /**
     * @param MailServiceInterface $mailService
     */
    public function __construct(MailServiceInterface $mailService)
    {
        $this->mailService = $mailService;
    }

    /**
     * @param Customer $customer
     */
    public function execute(Customer $customer): void
    {
        /**
         * サンプルコードのためメール送信以外のロジックは省略
         */

        $this->mailService->send(
            Message::create()
                ->addTo('tshinow@gmail.com')
                ->addFrom('tshinow@gmail.com')
                ->setSubject('ありがとうございました。')
                ->setBody($customer->statement())
        );
    }
}
