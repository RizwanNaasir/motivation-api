<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\QuoteRequest;
use App\Http\Resources\Api\QuoteResource;
use App\Models\Quote;
use App\Services\QuoteService;
use GuzzleHttp\Exception\GuzzleException;

class QuoteController extends Controller
{
    public function index()
    {
        return $this->success(data: QuoteResource::collection(Quote::all()));
    }

    public function store(QuoteRequest $request)
    {
        return new QuoteResource(Quote::create($request->validated()));
    }

    public function show(Quote $quote)
    {
        return new QuoteResource($quote);
    }

    public function update(QuoteRequest $request, Quote $quote)
    {
        $quote->update($request->validated());

        return new QuoteResource($quote);
    }

    public function destroy(Quote $quote)
    {
        $quote->delete();

        return response()->json();
    }

    /**
     * @throws GuzzleException
     */
    public function fetchAndSaveQuotes()
    {
        $quoteService = new QuoteService();
        $quoteService->fetchAndSaveQuotes();

        return $this->success(message: 'Quotes fetched and saved successfully');
    }

    public function like(Quote $quote)
    {
        $user = request()->user();
        if ($user->addToFavouriteQuotes($quote)){
            return $this->success(message: 'Quote Added to Favourite Successfully!');
        }else{
            return $this->success(message: 'Quote removed from Favourite!');
        }
    }

    public function listFavouriteQuotes()
    {
        return $this->success(data: QuoteResource::collection(request()->user()->favoriteQuotes));
    }
}
