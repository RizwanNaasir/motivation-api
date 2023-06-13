<?php

namespace App\Services;

use App\Models\Quote;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class QuoteService extends Service
{
    /**
     * @throws GuzzleException
     */
    public function fetchAndSaveQuotes(int $limit = 10): bool
    {
        $response = (new Client())
            ->get("https://api.quotable.io/quotes/random?limit=$limit");

        if ($response->getStatusCode() === 200) {
            $quotesData = json_decode($response->getBody(), true);

            Quote::truncate();

            foreach ($quotesData as $quoteData) {
                $quote = new Quote();
                $quote->content = $quoteData['content'];
                $quote->author = $quoteData['author'];
                $quote->tags = $quoteData['tags'];
                $quote->author_slug = $quoteData['authorSlug'];
                $quote->length = $quoteData['length'];
                $quote->created_at = $quoteData['dateAdded'];
                $quote->updated_at = $quoteData['dateModified'];
                $quote->save();
            }

            return true;
        }

        return false;
    }
}
