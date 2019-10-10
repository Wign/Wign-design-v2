<?php

use App\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TEXT LANGUAGES
        $languages = [
            collect(['code' => 'da_DK', 'text' => 'Dansk', 'type' => 'TEXT']),
            //collect(['code' => 'en_UK', 'text' => 'English', 'type' => 'TEXT']),
            //collect(['code' => 'en_US', 'text' => 'English', 'type' => 'TEXT']),
        ];

        // SIGNED LANGUAGES
        $languages = array_merge($languages, [
            collect(['code' => 'dt_DK', 'text' => 'Dansk tegnsprog', 'type' => 'SIGN']),
//            collect(['code' => 'bs_UK', 'text' => 'British sign language', 'type' => 'SIGN']),
//            collect(['code' => 'as_US', 'text' => 'American sign language', 'type' => 'SIGN']),
//            collect(['code' => 'st_SE', 'text' => 'Svenska teckenspråk', 'type' => 'SIGN']),
//            collect(['code' => 'nt_NO', 'text' => 'Norsk tegnspråk', 'type' => 'SIGN']),
//            collect(['code' => 'sv_FI', 'text' => 'Suomalainen viittomakieli', 'type' => 'SIGN']),
//            collect(['code' => 'dg_DE', 'text' => 'Deutsche Gebärdensprache', 'type' => 'SIGN']),
//            collect(['code' => 'ls_FR', 'text' => 'Langues des signes française', 'type' => 'SIGN']),
//            collect(['code' => 'ls_IT', 'text' => 'Lingua dei segni italiana', 'type' => 'SIGN']),
//            collect(['code' => 'ls_ES', 'text' => 'Lengua de signos española', 'type' => 'SIGN']),
//            collect(['code' => 'dg_CH', 'text' => 'Deutschschweizer Gebärdensprache', 'type' => 'SIGN']),
//            collect(['code' => 'lf_CH', 'text' => 'Langue des Signes Francaise', 'type' => 'SIGN']),
//            collect(['code' => 'li_CH', 'text' => 'Lingua dei Segni Italiana', 'type' => 'SIGN']),
        ]);

        foreach ($languages as $l) {
            Language::create([
                'code' => $l->get('code'),
                'text' => $l->get('text'),
                'type' => $l->get('type'),
            ]);
        }
    }
}
