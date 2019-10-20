<?php

namespace App\Providers;

use Faker\Provider\Base;

class FakerProvider extends Base
{
    protected static $wordList = [
        'vr', 'texture', 'barbiedukke', 'kardanled', 'post', 'konklusion', 'peugeot', 'elvis', 'policy', 'exit',
        'basra', 'legende', 'teamtegn', 'flakkende', 'inertia', 'flueknepper', 'karat', 'manipulator', 'william',
        'opfør', 'ørn', 'transmongolske', 'kreditor', 'translokation', 'veganer', 'headset', 'marijuana', 'foreningen',
        'diesel', 'taekwondo', 'cup', 'shakespeare', 'agil', 'efsli', 'bremse', 'psykostisk', 'animator', 'rundkørsel',
        'layout', 'forfatning', 'galileo', 'minnie', 'pathos', 'insufficiens', 'x-sheet', 'cameroon', 'drawing',
        'nazist', 'ventrikel', 'ishockey', 'impuls', 'detect', 'kirtel', 'træ', 'pixel', 'rendering', 'upload', 'konge',
        'havanna', 'elipse', 'apex', 'cyber', 'traume', 'tweening', 'wernher', 'falk', 'solglimt', 'momentum',
        'flipping', 'illumination', 'database', 'abduktiv', 'tasmanien', 'default', 'adapter', 'marketing', 'show',
        'kateter', 'caribiske', 'hotkey', 'robin', 'gyse', 'luther', 'translation', 'elongated', 'krudtugle', 'plainer',
        'bitmap', 'cheerleader', 'hydraulik', 'session', 'lock', 'min', 'david', 'illuminati', 'skal', 'udsagn',
        'polygon', 'bad', 'virus', 'døje', 'charlottenlund', 'ugle', 'jupiter', 'software', 'advent', 'uhøflig',
        'action', 'embedsmand', 'inbetween', 'graf', 'fysiologi', 'abrikos', 'skakmat', 'protokol', 'ambulant', 'palme',
        'pyeongchang', 'mass', 'indbyggertal', 'animation', 'klæder', 'ulleruphus', 'jernbane', 'pseudo', 'makrofag',
        'spread', 'risalamande', 'amager', 'beslag', 'jiu', 'sociale', 'hint', 'bigben', 'amger', 'program',
        'proportioner', 'skød', 'hamburg', 'ophav', 'social', 'rotation', 'wagrain', 'michael', 'guvernør', 'ramadan',
        'silhuet', 'pose', 'sandsynligt', 'gimbal', 'jackson', 'stregkode', 'airback', 'mac', 'borgmester', 'hyena',
        'kirkwall', 'syndikat', 'mør', 'tunge', 'isotone', 'norm', 'komplementær', 'palm', '2', 'kvarker', 'hook',
        'ayay', 'boblberg', 'amatør', 'tjetjenien', 'commitee', 'picker', 'parabolic', 'multiplex', 'parasitter',
        'gesture', 'royal', 'fddb', 'snobbe', 'verbum', 'motiv', 'out', 'arktis', 'ventil', 'apartheid', 'modul',
        'briller', 'contour', 'ærgerlig', 'peer2peer', 'cambodia', 'cache', 'vafler', 'klinisk', 'edamame', 'healing',
        'kapitalisme', 'onkel', 'cyster', 'pompeii', 'tændstik', 'genialt', 'premiere', 'forenede', 'masochist',
        'incitament', 'kobling', 'marginalisering', 'tolerant', 'inkasso', 'monopol', 'marcipan', 'turkmenistan',
        'blive', 'måløv', 'anamnese', 'compression', 'gonoré', 'lus', 'blodprøve', 'mineraler', 'er', 'arabiske',
        'stat', 'oxford', 'backup', 'kulhydrater', 'menegitis', 'auto', 'plot', 'babylon', 'slør', 'vedtægt', 'moske',
        'socket', 'migrant', '20', 'sagprosa', '1', 'klamydia', 'giddens', 'barokken', 'bookmaker', 'finest', 'guff',
        'kim', 'jedi', 'smoothie', 'sign', 'nano', 'linoleum', 'ål', 'previz', 'hybrid', 'to', 'infektion', 'platform',
        'sennett', 'joule', 'osmose', 'jitsu', 'the', 'helsingør', 'glostrup', 'abs', 'console', 'futsal', 'stamtavle',
        'renæssancen', 'nomade', 'vores', 'arena', 'in', 'opdatere', 'version', 'polterabend', 'zink', 'indehaver',
        'vorte', 'penetration', 'neutron', 'tirana', 'komité', 'narko', 'vinyl', 'aukland', 'malware', 'habitus',
        'bahrain', 'pythagoras', 'holding', 'eurovision', 'snap', 'forud', 'periodiske', 'fodspor', 'døvblinde', 'slum',
        'euler', 'retarderet', 'pipeline', 'taskforce', 'williams', 'transsibiriske', 'insekter', 'afrika',
        'orkneyøerne', 'frugtbare', 'white', 'jong-un', 'interesse', 'astma', 'translate', 'indfødt', 'importere',
        'parlamentarisk', 'ombudsmand', 'arkæolog', 'system', 'ipad', 'primary', 'melodigrandprix', 'gluoner', 'rokoko',
        'teletubbies', 'drev', 'zanzibar', 'tillykke', 'koregrafi', 'laser', 'palet', 'mosul', 'nudge', 'astronaut',
        'hang', 'nazisme', 'hindu', 'fascist', 'programmering', 'circle k', 'her', 'muskelsvind', 'velbekommen', 'åsyn',
        'jyderup', 'ovartaci', 'adjektiv', 'jul', 'kujon', 'smear', 'lotto', 'betlehem', 'pleje', 'fitness', 'kreta',
        'termostat', 'haft', 'sadist', 'stepped', 'vikle', 'nåde', 'booste', 'frontend', 'chili', 'metafor',
        'pixilation', 'lambert', 'homøostase', 'close-up', 'space', 'resonans', 'time', 'neandertaler', 'thumbnails',
        'caribien', 'molotovcocktails', 'zlatan', 'inklusion', 'proportional', 'campus', 'phishing', 'pigment',
        'optage', 'koncentreret', 'cinematography', 'narrativ', 'cannabis', 'hypotese', 'dimenssion', 'gentlemen', 'du',
        'forråelse', 'forbillede', 'erkende', 'semester', 'mikroorganismer', 'offset', 'høvding', 'hertug', 'messi',
        'toonboom', 'interface', 'tesla', 'range', 'vedkende', 'absalon', 'potientale', '14', 'rip', 'rektangulær',
        'format', 'extreme', 'sov', 'alveole', 'garderobe', 'efterspurgt', 'titanic', 'menu', 'eldorado', 'fliser',
        'kassedame', 'emirater', 'braun', 'center', 'demo', 'koala', 'snorke', 'nytår', 'kirgisistan', 'antagonist',
        'generation', 'trend', 'femsplaining', 'danske', 'extrude', 'jetlag', 'bali', 'maya', 'sæt', 'protein',
        'monica', 'fis', 'drone', 'knap', 'barmhjertig', 'testamente', 'marihuana', 'dopamin', 'anatomi', 'ease',
        'straight', 'spise', 'constraint', 'vector', 'ideal', 'rigging', 'agonist', 'synd', 'målmand', 'account',
        'glyptoteket', 'blocking', 'lionel', 'modalitet', 'molekyle', 'steroider', 'westminster', 'åland', 'arc',
        'reform', 'richard', 'nitrogen', 'lover', 'cyan', 'pyongyang', 'bible', 'bil', 'payload', 'rock', 'tømmermænd',
        'usb', 'handles', 'ædru', 'buffer', 'cross', 'bomster', 'patofysiologi', 'gnist', 'væk', 'forsømme',
        'ambivalens', 'hospital', 'inkontinens', 'telt', 'jesus', 'kontroversiel', 'sex', 'fnidder', 'magister',
        'device', 'check', 'recession', 'koral', 'alien', 'konditor', 'udsat', 'olympiske', 'demultiplex', 'ankel',
        'rovdyr', 'ab0-system', 'forræderi', 'synopsis', 'a-tool', 'intuition', 'adfærd', 'pommes', 'jeg', 'playblast',
        'ford', 'transformeren', 'forsone', 'subscribe', 'karate', 'brunch', 'fladfisk', 'token', 'adaptere',
        'hjertekarsygdom', 'form', 'handyman', 'radar', 'respons', 'ahead', 'shape', 'taknemmelig', 'celledegeneration',
        'croquis', 'spline', 'taksonomi', 'anfald', 'download', 'patch', 'detailhandel', 'filter', 'guacamole',
        'hukommelse', 'beirut', 'åbenlys', 'widget', 'fætter', 'hacker', 'value', 'fotosyntese', 'nørlum', 'dimension',
        'domæne', 'register', 'islamisk', 'underretning', 'laminat', 'gondol', 'acidinorange', 'paradis', 'pjerrot',
        'servostyring', 'intuitiv', 'hood', 'mesh', 'kantarel', 'logaritme', 'impressionisme', 'koralrev',
        'loppemarked', 'kork', 'vedtægter', 'disc', 'von', 'entreprise', 'danse', 'of', 'borgerlig', 'cfd', 'ly',
        'fraktal', 'migration', 'sæson', 'medie', 'backpacker', 'spreadthesign', 'stamcelle', 'oman', 'galilei',
    ];
    protected static $hashList = [
        'matematik', 'tegning', 'video', 'by', 'fodbold', 'kunst', 'land', 'design', 'grafik', 'form', 'brand',
        'matematisk', 'overflade', 'gamletegn', 'kørsel', 'film', 'køretøj', 'program', 'redigering', 'tidsalder',
        'kunster', 'spil', 'programmering', 'mad', 'tidsperiode', 'grønsager', 'forbund', 'religion', 'bjergkæde', 'it',
        'pægagogik', 'materiale', 'computervidenskab', 'nordkorea', 'animation', 'skuespiller', 'computer', 'cv',
        'teknologi', 'biolog', 'stil', 'software', 'person', 'hovedstad', 'formgiving', 'bil', 'butik',
        'programmeringssprog', 'cafe', 'socialmedier', 'pokemon', 'instruktion', 'brands', 'karrier', 'fysik', 'udland',
        'fotografi', 'biologi', 'lande', 'farve', 'teknik', 'logik', 'figur', 'hovedstaed', 'danmark',
    ];
    protected static $videoUuidList = [
        'v-7a5b8bd8-abd6-4cac-a7fe-1f152faa6fda', 'v-7949d64d-0615-41bd-80ab-cc0cc71065d4',
        'v-d8b8bb90-9826-0137-cf4f-0adeb7a592e0', 'v-276bbbd8-daa1-4c7f-8037-693c911e4a89',
        'v-3077c04f-2954-4dad-8c1c-8ea1d5743335', 'v-eb841c7c-cf12-4179-b93c-d2a9af8af309',
        'v-2860e060-60a9-4924-bf29-eff3c9dfcff5', 'v-adf77620-9827-0137-b01c-02f6e3696dde',
        'v-27c80978-8a42-4b85-b804-41f3bfc7e3cf', 'v-dfa9af14-086f-4c96-b4b7-17774b720783',
        'v-6be5231c-c049-4878-8986-587af80f76e8', 'v-549efcc0-9826-0137-b01c-02f6e3696dde',
        'v-194c9965-9a77-4596-83c0-0dc11a4dd9e6', 'v-bd96e9b0-9826-0137-cf4f-0adeb7a592e0',
        'v-06929450-9826-0137-b01d-02f6e3696dde', 'v-eacc0432-ba29-4bcb-8ddb-60a0b5ee782f',
        'v-dc5becb0-9824-0137-b01d-02f6e3696dde', 'v-a4975f39-61fc-4506-8f58-f652fa967cc7',
        'v-31582398-ac9d-4fa9-a591-fc39658ee8be', 'v-a588af20-9824-0137-b01d-02f6e3696dde',
        'v-4b2b2a20-9826-0137-cf4f-0adeb7a592e0', 'v-9b98bca0-9824-0137-b01d-02f6e3696dde',
        'v-855821f3-aa7a-4bc9-8d04-f7ee95789219', 'v-7ed1ef5e-b576-45b8-a320-1310ac1d3fe7',
        'v-ae638250-9826-0137-b01d-02f6e3696dde', 'v-98f9ea63-b356-4b0c-9958-77f498a6cfe4',
        'v-917a0b20-9825-0137-cf4f-0adeb7a592e0', 'v-b76dcaec-d292-42d5-8588-c26f39284454',
        'v-0b46c600-5b2f-4d12-87ca-0c72390b316a', 'v-d430dbfd-9968-4b89-b38f-c8ec93664564',
        'v-48ae61b6-bfdd-4735-ab1c-8c2ed94e0837', 'v-c28fabd0-9825-0137-b01c-02f6e3696dde',
        'v-86e998de-00dc-4011-b6ed-d07f923d6f99', 'v-c2293790-9825-0137-cf4f-0adeb7a592e0',
        'v-17d71050-9827-0137-cf4e-0adeb7a592e0', 'v-4b809377-1237-4bff-8d5a-2b5b7cc87a0a',
        'v-cb71a105-14b4-4131-a45f-5b4e019e9af6', 'v-d5e6c9a0-55db-425f-9f98-a217500deda0',
        'v-e8f59e10-9826-0137-cf4f-0adeb7a592e0', 'v-9e83d4f0-9824-0137-cf4e-0adeb7a592e0',
        'v-597cd5c4-725c-4cf7-ac0c-526e7e9c0f68', 'v-109a8ae0-9827-0137-b01d-02f6e3696dde',
        'v-59a969ab-86ec-4107-ba41-c7c0b5bd3f0c', 'v-dd3441a2-ef4d-4911-b5e0-1e6af341495c',
        'v-9e4ccd50-9826-0137-b01d-02f6e3696dde', 'v-c1e33030-9825-0137-cf4f-0adeb7a592e0',
        'v-8861d4e4-4f9e-4fab-8aee-40c4e5b7a71f', 'v-b5d27600-9825-0137-cf4f-0adeb7a592e0',
        'v-f7058b95-724f-4867-a4c4-55b80fa57cc0', 'v-a648dc5f-e1e2-4a9a-8c5a-c745d7028fce',
        'v-252e048b-afc8-452a-a897-3c4ed87db5f6', 'v-34ec2c2b-0ccf-482b-8c01-149f4f33e2b5',
        'v-1b4f6147-7ae5-442c-8cf6-94bf8f58125b', 'v-74928969-115c-4e62-8fa0-35fb874f4dd1',
        'v-372efdb0-9825-0137-b01c-02f6e3696dde', 'v-d3286620-9825-0137-cf4f-0adeb7a592e0',
        'v-83379a07-f160-466d-a7fb-c4eea4132a54', 'v-89b8cdbe-9128-44a3-ae9f-7848b02406ec',
        'v-4e146170-9825-0137-cf4e-0adeb7a592e0', 'v-165ba665-1cac-41f7-8102-ad21a14b2b7e',
        'v-afc40780-9825-0137-cf4e-0adeb7a592e0', 'v-ca29fe7f-73b8-460a-a5b8-7d357415019e',
        'v-923c7270-9825-0137-b01d-02f6e3696dde', 'v-a684a580-9825-0137-b01c-02f6e3696dde',
        'v-fb4837be-e0ad-4bcd-837a-7321129f0e7f', 'v-c30298a0-9825-0137-cf4e-0adeb7a592e0',
        'v-239a1666-25fc-4e6c-8d56-c8b5e3926a38', 'v-b084b510-9825-0137-b01c-02f6e3696dde',
        'v-a3a80c36-17fb-4d91-80da-10baa39e0da0', 'v-30c3feb0-9827-0137-cf4e-0adeb7a592e0',
        'v-60987164-73c1-4c70-8bec-f04b6ec3cc81', 'v-cdf4b943-1a76-4c61-a7ba-0b505aa4aaa5',
        'v-341c6b10-9825-0137-cf4f-0adeb7a592e0', 'v-7ccc4fb0-9826-0137-b01d-02f6e3696dde',
        'v-40de1290-9825-0137-cf4f-0adeb7a592e0', 'v-2837f840-9826-0137-cf4e-0adeb7a592e0',
        'v-b8501450-9827-0137-cf4e-0adeb7a592e0', 'v-0250ec60-9826-0137-cf4f-0adeb7a592e0',
        'v-f9345b60-9826-0137-cf4f-0adeb7a592e0', 'v-877eb380-9827-0137-cf4e-0adeb7a592e0',
        'v-4921b59a-6ea4-43e3-9683-49674eda793d', 'v-c40bec10-9827-0137-b01d-02f6e3696dde',
        'v-d33ba847-2f89-4667-ab50-f6ae33a3c535', 'v-da107d9e-c5d3-4198-87e4-a7b426f4c52f',
        'v-0f8df4b0-9826-0137-b01c-02f6e3696dde', 'v-595704b1-511e-4d4d-b7b2-7cb61a68756e',
        'v-ea263749-59fb-44a8-bc14-fb992ed3b904', 'v-c2a285aa-9d98-4bb2-9bb7-f4fb3a488376',
        'v-4154e220-de2d-469e-bda6-3c852c262d7f', 'v-f1399a30-9826-0137-cf4f-0adeb7a592e0',
        'v-fb58c310-9826-0137-b01c-02f6e3696dde', 'v-5e5f0a48-81e5-4cab-8829-0bf5fbe79337',
        'v-d2a347eb-fee1-43c7-b599-a92af4cd48f6', 'v-b8bc2409-50da-456d-aa28-5353bd9dc09e',
        'v-f8071ff0-9824-0137-cf4e-0adeb7a592e0', 'v-fdee85e0-9825-0137-b01d-02f6e3696dde',
        'v-6b11054b-5959-460d-b665-bd8cbe91ae8e', 'v-5117ee20-9825-0137-b01c-02f6e3696dde',
        'v-88beb0ba-fefb-4042-8dc2-13ed35b08d23', 'v-4b887280-809a-45d2-9c4a-c1a9643e736c',
    ];

    /**
     * Creates a word or sentence for the word of the sign.
     *
     * If no $min and $max is provided, it creates a biased distribution of
     * words to the sentence with 50% chance for one word, 30% for two
     * and 20% for three words.
     * Otherwise it creates a sentence with from $min to $max (unbiased) words.
     *
     * @param  int  $min  minimum # of words for the sentence. Nullable
     * @param  int  $max  maximum # of words for the sentence. Nullable
     *
     * @return string the sentence
     * @throws \Exception
     */
    public function wignLiterals(int $min = null, int $max = null)
    {
        if ( ! $min && ! $max) {
            $number = $this->biasedRandom([50, 30, 20]);
        } else {
            $number = rand($min, $max);
        }

        return ucfirst(implode(' ', $this::randomElements(static::$wordList, $number, true)));
    }

    public function videoUuid()
    {
        return $this::randomElement(static::$videoUuidList);
    }

    public function hashtag(int $numHash = 1)
    {
        $tmpHash = $this::randomElements(static::$hashList, $numHash);
        $hashtag = [];
        foreach ($tmpHash as $hash) {
            $hashtag[] = '#'.$hash;
        }

        return $hashtag;
    }

    public function textWithHashtag(int $numWord = 10, int $numHash = 3)
    {
        $words  = $this::randomElements(static::$wordList, $numWord, true);
        $hashes = $this->hashtag($numHash);

        return implode(' ', self::shuffle(array_merge($words, $hashes)));
    }

    private function biasedRandom(array $bias): int
    {
        $count  = rand(0, 99);
        $number = 0;
        while ($count >= 0) {
            $count -= array_shift($bias);
            $number++;
        }

        return $number;
    }
}
