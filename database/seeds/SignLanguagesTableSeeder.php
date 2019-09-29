<?php

use App\SignLanguage;
use Illuminate\Database\Seeder;

class SignLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            collect(['code' => 'dt_DK', 'text' => 'Dansk tegnsprog']),
//            collect(['code' => 'bs_UK', 'text' => 'British sign language']),
//            collect(['code' => 'as_US', 'text' => 'American sign language']),
//            collect(['code' => 'st_SE', 'text' => 'Svenska teckenspråk']),
//            collect(['code' => 'nt_NO', 'text' => 'Norsk tegnspråk']),
//            collect(['code' => 'sv_FI', 'text' => 'Suomalainen viittomakieli']),
//            collect(['code' => 'dg_DE', 'text' => 'Deutsche Gebärdensprache']),
//            collect(['code' => 'ls_FR', 'text' => 'Langues des signes française']),
//            collect(['code' => 'ls_IT', 'text' => 'Lingua dei segni italiana']),
//            collect(['code' => 'ls_ES', 'text' => 'Lengua de signos española']),
//            collect(['code' => 'dg_CH', 'text' => 'Deutschschweizer Gebärdensprache']),
//            collect(['code' => 'lf_CH', 'text' => 'Langue des Signes Francaise']),
//            collect(['code' => 'li_CH', 'text' => 'Lingua dei Segni Italiana']),
        ];

        foreach ($languages as $l) {
            SignLanguage::create([
                'code' => $l->get('code'),
                'text' => $l->get('text'),
            ]);
        }
    }
}
