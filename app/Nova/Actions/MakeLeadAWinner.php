<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;
use Carbon\Carbon;
use App\Mail\CongratulateWinner;

class MakeLeadAWinner extends Action implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public function __construct() {
        $this->onConnection('redis');
    }

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            try {

                // Generate a random access token for each preapproved fundraiser
                sleep(1);

                Mail::to($model->email)->send(new CongratulateWinner($model));

                // Mark lead as a winner
                $model->is_winner = Carbon::now();
                $model->save();
                sleep(1);

            } catch (Exception $e) {
                $this->markAsFailed($model, $e);
            }
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
