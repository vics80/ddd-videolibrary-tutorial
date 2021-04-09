<?php


namespace Videolibrary\Api\Infrastructure\Ui\Http\Controller\Videos;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Videolibrary\Api\Application\Command\Video\CreateVideoHandler;
use Videolibrary\Api\Application\Request\Video\CreateVideoRequest;
use Videolibrary\Api\Domain\Model\Videos\InvalidStatusValueException;

class CreateVideoController
{
    private CreateVideoHandler $createVideoHandler;

    public function __construct(CreateVideoHandler $createVideoHandler)
    {
        $this->createVideoHandler = $createVideoHandler;
    }

    public function __invoke(Request $request)
    {
        try {
            $video = ($this->createVideoHandler)(new CreateVideoRequest(
                $request->get('title'),
                $request->get('duration'),
                $request->get('status'),
                $request->get('subtitles')
            ));

            $response = new JsonResponse([
                'status' => 'ok',
                'hits' => [
                    $video->toArray(),
                ]
            ]);
        } catch (InvalidStatusValueException $e) {
            $response = new JsonResponse([
                'status' => 'error',
                'errorMesage' => 'Invalid status value. Must be published, pending or removed'
            ], 500);
        }

        return $response;
    }
}