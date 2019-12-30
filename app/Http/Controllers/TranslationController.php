<?php

namespace App\Http\Controllers;

use App\Services\DescriptionService;
use App\Services\SignService;
use App\Services\UserService;
use App\Services\WordService;
use App\Translation;
use Auth;
use Exception;
use Illuminate\Http\Request;
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

    public function createTranslation(Request $request)
    {
        $user = $this->userService->getUser();
        $literal = $request->input('literal');

        $word = $this->wordService->findOrMakeWord($literal, $user);
        $sign = $this->signService->makeSign($request, $user);
        $desc = $this->descriptionService->makeDescription($request, $user);

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
            \Log::info('Creation of translation failed - how can it happens?', [$word, $sign, $desc]);

            return redirect()->back()->withErrors(__('error.creationFailed'));
        }
    }

    public function editTranslation(Request $request, $translationId)
    {
        $user = Auth::user();

        $translation = Translation::findOrFail($translationId);
        $newWord = $this->wordService->editWordSoftly($request, $translation, $user);
        $newSign = $this->signService->editSign($request, $user);
        $newDesc = $this->descriptionService->editDescription($request, $translation, $user);

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
                return response($e, 500);
            }

            return response()->json($newTranslation);
        }

        return redirect()->back()->withErrors(__('error.noChanges'));
    }

    public function deleteTranslation(Request $request): bool
    {
        $translation = Translation::findOrFail($request->input('ID'));

        try {
            $translation->delete();
        } catch (Exception $e) {
            return false;
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
}
