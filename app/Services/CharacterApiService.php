<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CharacterApiService
{
    const API_BASE_URL = 'https://rickandmortyapi.com/api';

    function getCharacter(Int $characterId): JsonResponse
    {
        $response = Http::get(self::API_BASE_URL . "/character/{$characterId}")->json();

        if (isset($response['error'])) {
            return response()->json([
                'error' => $response['error'],
            ]);
        }

        return response()->json($response);
    }

    function getCharacterList(Request $request): JsonResponse
    {
        $url = self::API_BASE_URL . "/character?" . http_build_query($request->query());
        $response = Http::get($url)->json();

        if (isset($response['error'])) {
            return response()->json([
                'error' => $response['error'],
            ]);
        }

        $page = filter_var($request->query('page'), FILTER_VALIDATE_INT, [
            'options' => ['default' => 1, 'min_range' => 1]
        ]);

        return response()->json([
            'result_count' => $response['info']['count'],
            'page_count' => $response['info']['pages'],
            'next_page' => $this->getPageUrl($request, $page + 1, $response['info']['pages']),
            'prev_page' => $this->getPageUrl($request, $page - 1, $response['info']['pages']),
            'results' => $response['results']
        ]);
    }

    private function getPageUrl(Request $request, Int $page, Int $pageCount): String | null
    {
        if ($page < 1 || $page > $pageCount) {
            return null;
        } 

        return request()->fullUrlWithQuery([...$request->query(), 'page' => $page]);
    }
}
