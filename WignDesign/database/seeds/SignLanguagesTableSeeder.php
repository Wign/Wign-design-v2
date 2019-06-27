<?php

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
        $languages = array(
            collect(['code' => 'dts_DK', 'text' => 'Dansk tegnsprog']),
            collect(['code' => 'bsl_UK', 'text' => 'British sign language']),
            collect(['code' => 'asl_US', 'text' => 'American sign language']),
            collect(['code' => 'sts_SE', 'text' => 'Svenska teckenspråk']),
            collect(['code' => 'nts_NO', 'text' => 'Norsk tegnspråk']),
            collect(['code' => 'svk_FI', 'text' => 'Suomalainen viittomakieli']),
            collect(['code' => 'dgs_DE', 'text' => 'Deutsche Gebärdensprache']),
            collect(['code' => 'lsf_FR', 'text' => 'Langues des signes française']),
            collect(['code' => 'lis_IT', 'text' => 'Lingua dei segni italiana']),
            collect(['code' => 'lse_ES', 'text' => 'Lengua de signos española']),
            collect(['code' => 'dsg_CH', 'text' => 'Deutschschweizer Gebärdensprache']),
            collect(['code' => 'lsf_CH', 'text' => 'Langue des Signes Francaise']),
            collect(['code' => 'lis_CH', 'text' => 'Lingua dei Segni Italiana']),
        );

        foreach ($languages as $l)  {
            \App\SignLanguage::create([
                'code' => $l->get('code'),
                'text' => $l->get('text')
            ]);
        }
    }
}
