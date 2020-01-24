<?php

declare(strict_types=1);

namespace CIWorkshopTest\Functional\Controller;

use CIWorkshop\Controller\RentalController;
use CIWorkshop\Core\Mailer\MailService;
use CIWorkshop\Core\Mailer\MailServiceInterface;
use CIWorkshop\UseCase\RentalMovies;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RentalControllerTest
 *
 * @package CIWorkshopTest\Controller
 */
class RentalControllerTest extends TestCase
{
    /**
     * @var MailServiceInterface
     */
    private MailServiceInterface $mailService;

    /**
     * @var RentalMovies
     */
    private RentalMovies $rentalMovies;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mailService = new MailService(
            $_ENV['MAIL_HOST'],
            (int) $_ENV['MAIL_PORT'],
            $_ENV['MAIL_USERNAME'],
            $_ENV['MAIL_PASSWORD'],
            $_ENV['MAIL_ENCRYPTION']
        );

        $this->rentalMovies = new RentalMovies($this->mailService);
    }

    /**
     * @test
     */
    public function testCreate__顧客はWeb上で映画をレンタルをすることができる(): void
    {
        $requestBody = json_encode([
            'movies' => [
                ['id' => 1, 'dayRented' => 1]
            ]
        ]);

        $request = Request::create(
            'http://localhost',
            'POST',
            [], //parameters
            [], //cookies
            [], //files
            [], //server
            (string) $requestBody, //content
        );

        $rentalController = new RentalController($this->rentalMovies);
        $response = $rentalController->create($request);

        $this->assertSame(200, $response->getStatusCode());
    }
}
