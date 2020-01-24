<?php

declare(strict_types=1);

namespace CIWorkshop\Controller;

use CIWorkshop\Entity\Customer;
use CIWorkshop\Entity\Movie;
use CIWorkshop\Entity\Rental;
use CIWorkshop\UseCase\RentalMovies;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RentalController
 *
 * @package CIWorkshop\Controller
 */
class RentalController
{
    /**
     * @var RentalMovies
     */
    private RentalMovies $rentalMovies;

    /**
     * @param RentalMovies $rentalMovies
     */
    public function __construct(RentalMovies $rentalMovies)
    {
        $this->rentalMovies = $rentalMovies;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $content = $request->getContent();
        if (is_resource($content) || !is_string($content)) {
            return new JsonResponse('', 400);
        }

        $requestValues = json_decode($content, true);

        /**
         * サンプルコードのため、バリデーション等は省略
         */

        $customer = $this->findCustomerById();

        $movies = $this->findMoviesByIds(array_map(function ($requestMovie) {
            return $requestMovie['id'];
        }, $requestValues['movies']));

        foreach ($requestValues['movies'] as $requestMovie) {
            $foundMovie = $this->extractMovieFormMovies($movies, $requestMovie['id']);
            if (is_null($foundMovie)) {
                continue ;
            }

            $customer->addRental(new Rental($foundMovie, (int) $requestMovie['dayRented']));
        }

        $this->rentalMovies->execute($customer);

        return new JsonResponse([
            'customerName' => $customer->getName(),
        ]);
    }

    /**
     * @return Customer
     */
    private function findCustomerById(): Customer
    {
        return new Customer("レンタルさん");
    }

    /**
     * @param int[] $ids
     *
     * @return Movie[]
     */
    private function findMoviesByIds(array $ids = []): array
    {
        $movies = [
            new Movie(1, "天空の城ラピュタ", Movie::REGULAR),
            new Movie(2, "となりのトトロ", Movie::CHILDRENS),
            new Movie(3, "毛虫のボロ", Movie::NEW_RELEASE),
        ];

        $foundMovies = [];
        foreach ($ids as $id) {
            foreach ($movies as $movie) {
                if ($id === $movie->getId()) {
                    $foundMovies[] = $movie;
                }
            }
        }

        return $foundMovies;
    }

    /**
     * @param Movie[] $movies
     * @param int $movieId
     *
     * @return Movie|null
     */
    private function extractMovieFormMovies(array $movies, int $movieId): ?Movie
    {
        foreach ($movies as $movie) {
            if ($movie->getId() === (int) $movieId) {
                return $movie;
            }
        }

        return null;
    }
}
