<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\CharacterApiService;

class CharacterApiController extends Controller
{
    public function __construct(
        private CharacterApiService $characterApiService
    ){}

    public function getCharacter(Int $characterId): JsonResponse
    {
        return $this->characterApiService->getCharacter($characterId);
    }

    public function getCharacterList(Request $request): JsonResponse
    {
        return $this->characterApiService->getCharacterList($request);
    }
}
