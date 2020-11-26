<?php

namespace App\Observers;

use App\Entities\About;

class AboutObserver
{
    /**
     * Handle the about "creating" event.
     *
     * @param About $about
     * @return void
     */
    public function creating(About $about): void
    {
        if (is_null($about->position)) {
            $about->position = About::max('position') + 1;
            return;
        }

        $lowerPriorityAbouts = About::where('position', '>=', $about->position)
            ->get();

        foreach ($lowerPriorityAbouts as $lowerPriorityAbout) {
            $lowerPriorityAbout->position++;
            $lowerPriorityAbout->saveQuietly();
        }
    }

    /**
     * Handle the about "updating" event.
     *
     * @param About $about
     * @return void
     */
    public function updating(About $about): void
    {
        if ($about->isClean('position')) {
            return;
        }

        if (is_null($about->position)) {
            $about->position = About::max('position');
        }

        if ($about->getOriginal('position') > $about->position) {
            $positionRange = [
                $about->position, $about->getOriginal('position')
            ];
        } else {
            $positionRange = [
                $about->getOriginal('position'), $about->position
            ];
        }

        $lowerPriorityAbouts = About::where('id', '!=', $about->id)
            ->whereBetween('position', $positionRange)
            ->get();

        foreach ($lowerPriorityAbouts as $lowerPriorityAbout) {
            if ($about->getOriginal('position') < $about->position) {
                $lowerPriorityAbout->position--;
            } else {
                $lowerPriorityAbout->position++;
            }
            $lowerPriorityAbout->saveQuietly();
        }
    }

    /**
     * Handle the about "deleted" event.
     *
     * @param About $about
     * @return void
     */
    public function deleted(About $about)
    {
        $lowerPriorityAbouts = About::where('position', '>', $about->position)
            ->get();

        foreach ($lowerPriorityAbouts as $lowerPriorityAbout) {
            $lowerPriorityAbout->poeess;
            $lowerPriorityAbout->saveQuietly();
        }
    }
}
