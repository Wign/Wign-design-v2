<?php

namespace App\Http\Controllers;

use App\Translation;
use Auth;
use mysql_xdevapi\Exception;
use Request;

class TranslationController extends Controller {

    private $wordService;
    private $signService;
    private $descriptionService;

    private function __construct(WordService $wordService, SignService $signService, DescriptionService $descriptionService)
    {
        $this->wordService = $wordService;
        $this->signService = $signService;
        $this->descriptionService = $descriptionService;
    }

    public function createTranslation(Request $request) {
        $user = Auth::user();

        $word = $this->wordService->findOrMakeWord($request, $user);
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

            return response()->json($translation);
        } else {
            return redirect()->back()->withErrors(__('error.creationFailed'));
        }

    }

    public function editTranslation(Request $request, $translationId) {
        $user = Auth::user();

        $translation = Translation::findOrFail($translationId);

        $newWord = $this->wordService->editWordSoftly($request, $translation, $user);
        $newSign = $this->signService->editSign($request, $translation, $user);
        $newDesc = $this->descriptionService->editDescription($request, $translation, $user);

        if ($newWord != null || $newSign != null || $newDesc != null) {
            $newTranslation = Translation::make([
                'word_id' => $newWord == null ? $translation->word->id : $newWord->id,
                'sign_id' => $newSign == null ? $translation->sign->id : $newSign->id,
                'description_id' => $newDesc == null ? $translation->description->id : $newDesc->id,
                'creator_id' => $translation->creator->id,
                'editor_id' => $user->id,
            ]);

            try {
                $translation->delete();
            } catch (\Exception $e) {
                return response($e, 500);
            }

            if ($newWord != null) { $newWord->save(); }
            if ($newSign != null) { $newSign->save(); }
            if ($newDesc != null) { $newDesc->save(); }
            $newTranslation->save();

            return response()->json($newTranslation);
        }

        return redirect()->back()->withErrors(__('error.noChanges'));
    }
}
