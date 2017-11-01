<?php
/**
 * Created by PhpStorm.
 * User: Back-End
 * Date: 31.10.2017
 * Time: 11:34
 */

namespace App\Events;

use App\Portfolio;
use Illuminate\Queue\SerializesModels;

class PortfolioShown
{
    use SerializesModels;

    public $portfolio;

    /**
     * Create a new event instance.
     *
     * @param  Portfolio  $portfolio
     * @return void
     */
    public function __construct(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
    }
}