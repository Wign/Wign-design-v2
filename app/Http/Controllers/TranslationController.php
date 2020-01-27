<?php

namespace App\Http\Controllers;

use App\Http\Requests\DescriptionRequest;
use App\Http\Requests\SignRequest;
use App\Http\Requests\WordRequest;
use App\Services\DescriptionService;
use App\Services\SignService;
use App\Services\UserService;
use App\Services\WordService;
use App\Translation;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Log;
use Nuwave\Lighthouse\Execution\Utils\Subscription;

class TranslationController extends Controller
{
    private $wordService;
    private $signService;
    private $descriptionService;
    private $userService;

    public function __construct(WordService $wordService, SignService $signService, DescriptionService $descriptionService, UserService $userService)
    {
        $this->wordService = $wordService;
        $this->signService = $signService;
        $this->descriptionService = $descriptionService;
        $this->userService = $userService;
    }

    public function recents()
    {
        return view('pages.recent');
    }

    public function index()
    {
        return view('pages.signs');
    }

    public function createIndex()
    {
        return view('pages.createTranslation');
    }

    public function createTranslation(WordRequest $wordRequest, SignRequest $signRequest, DescriptionRequest $descriptionRequest)
    {
        $user = $this->userService->getUser();

        $word = $this->wordService->findOrMakeWord($wordRequest, $user);
        $sign = $this->signService->makeSign($signRequest, $user);
        $desc = $this->descriptionService->makeDescription($descriptionRequest, $user);

        if ($word != null && $sign != null && $desc != null) {
            $word->save();
            $sign->save();
            $desc->save();

            $translation = Translation::create([
                'word_id' => $word->id,
                'sign_id' => $sign->id,
                'description_id' => $desc->id,
                'creator_id' => $user->id,
                'editor_id' => $user->id,
            ]);
            Subscription::broadcast('traceTranslations', $translation);

            return response()->json($translation);
        } else {
            Log::error('Creation of translation has failed - some elements were missed', ['word' => $word, 'sign' => $sign, 'description' => $desc]);

            return redirect()->back()->withErrors(__('error.creationFailed'));
        }
    }

    public function editTranslation(WordRequest $wordRequest, SignRequest $signRequest, DescriptionRequest $descriptionRequest, $translationId)
    {
        $user = Auth::user();

        $translation = Translation::findOrFail($translationId);
        $newWord = $this->wordService->editWordSoftly($wordRequest, $translation, $user);
        $newSign = $this->signService->editSign($signRequest, $user);
        $newDesc = $this->descriptionService->editDescription($descriptionRequest, $translation, $user);

        if ($newWord != null || $newSign != null || $newDesc != null) {
            $newTranslation = Translation::make([
                'word_id' => $newWord == null ? $translation->word->id : $newWord->id,
                'sign_id' => $newSign == null ? $translation->sign->id : $newSign->id,
                'description_id' => $newDesc == null ? $translation->description->id : $newDesc->id,
                'creator_id' => $translation->creator->id,
                'editor_id' => $user->id,
            ]);

            if ($newWord != null) {
                $newWord->save();
                if ($this->wordService->isVacant($translation->word)) {
                    try {
                        $translation->word->delete();
                    } catch (Exception $e) {
                        Log::error('Deleting the word has failed', [$e]);
                    }
                }
            }
            if ($newSign != null) {
                $newSign->save();
            }
            if ($newDesc != null) {
                $newDesc->save();
            }
            $newTranslation->save();

            try {
                $translation->delete();
            } catch (Exception $e) {
                Log::error('Delete the previous translation has failed', [$e]);

                return abort(500);
            }

            return response()->json($newTranslation);
        }

        return redirect()->back()->withErrors(__('error.noChanges'));
    }

    public function deleteTranslation(string $translationId): bool
    {
        $translation = Translation::findOrFail($translationId);

        try {
            $translation->delete();
        } catch (Exception $e) {
            Log::error('Delete the previous translation has failed', [$e]);

            return abort(500);
        }

        return true;
    }

    public function restoreTranslation(Request $request): bool //TODO do more the analyse
    {
        $translation = Translation::withTrashed()->find($request->input(['ID']));

        if ($translation != null) {
            $translation->restore();

            return true;
        }

        return false;
    }

    public function previewSigns(string $literal)
    {
        $word = $this->wordService->findWordWithTranslations($literal);

        if (isset($word)) {
            return $word->signs()->withCount('likes')->get()->sortBy('count_likes', SORT_REGULAR, true);
        } else {
            return;
        }
    }
}
