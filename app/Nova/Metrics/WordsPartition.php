<?php

namespace App\Nova\Metrics;

use App\Repositories\WordRepository;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;

class WordsPartition extends Partition
{
    protected $wordRepository;

    /**
     * WordsPartition constructor.
     *
     * @param  WordRepository  $wordRepository
     */
    public function __construct(WordRepository $wordRepository)
    {
        parent::__construct();
        $this->wordRepository = $wordRepository;
    }

    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return mixed
     */
    public function calculate(Request $request)
    {
        $requestedWord = $this->wordRepository->allActiveRequests()->count();
        $signedWord = $this->wordRepository->allSigned()->count();
        $vacantWord = $this->wordRepository->allVacant()->count();

        return $this->result([
            'Requested' => $requestedWord,
            'Signed'    => $signedWord,
            'Vacant'    => $vacantWord,
        ]);
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        return now()->addMinutes(30);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'words-partition';
    }
}
