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
        'v-992e8297-c561-4c4a-8eb1-55219dfb7263', 'v-4b3f8733-6054-40c2-975c-414899aff986',
        'v-d6f2db50-9827-0137-cf4e-0adeb7a592e0', 'v-a65aa3d0-6891-4e7a-90d0-0b6bebf3c733',
        'v-cf9c10e4-c2e0-41b8-99ab-9b4487885027', 'v-34be7360-9827-0137-cf4e-0adeb7a592e0',
        'v-c98b3b40-9825-0137-cf4e-0adeb7a592e0', 'v-8c2de09b-6489-4e52-a0c3-1fa2a6b41d28',
        'v-260afb50-9827-0137-cf4e-0adeb7a592e0', 'v-a27676d5-cbf8-400c-a3c9-2fdc3aa9b104',
        'v-efec6373-91f6-4df8-89cf-e42c0729c189', 'v-597351d0-9827-0137-cf4e-0adeb7a592e0',
        'v-04e704fd-0a81-48e3-a20a-344728d5a892', 'v-4de348c4-f373-4c62-8560-91c63f508494',
        'v-09f7bc99-f430-451b-81f4-3f06727ba444', 'v-6458eea0-9826-0137-cf4f-0adeb7a592e0',
        'v-b6a746eb-48cf-47ee-bab0-ae6f1ccdfabc', 'v-ce26c6c8-1e35-46e2-a7cb-7a64d94b7235',
        'v-ef3c5cf5-848a-40f6-bc9f-0b20f2e7e624', 'v-fa283eb5-c599-4575-aab2-0e52df38728d',
        'v-0aa6263e-cdc4-4024-b357-6a27a84a4afc', 'v-3a852d02-3e64-4a38-b0a6-007fe6eaf2c8',
        'v-9bf9bad0-9824-0137-cf4e-0adeb7a592e0', 'v-c8c4acf0-9827-0137-cf4f-0adeb7a592e0',
        'v-67193db1-76af-47cb-9a43-b5b76439de27', 'v-d006477e-8ad1-44cf-90df-22b06d0f98a8',
        'v-b737b42b-977d-4fef-9e8c-30213d70f00d', 'v-6d4f9eb4-e89d-47e3-a6aa-8afdd855cea4',
        'v-113ba950-9825-0137-cf4f-0adeb7a592e0', 'v-a8fc57c6-5d4e-4206-ae68-7680b68d1931',
        'v-7d38d67b-3550-4e32-b3f9-e488cbe5e4f7', 'v-b6c62300-9826-0137-cf4e-0adeb7a592e0',
        'v-72736ee0-9825-0137-cf4f-0adeb7a592e0', 'v-7db2ad7b-b692-4b87-9b3f-e0543bcd6bb9',
        'v-845fc1c3-a225-40b0-94d0-9c3e885cfa99', 'v-f20ef8e6-dfb4-420e-9c53-867df5358eaa',
        'v-5e188cea-7a5c-47a3-8330-3a2831b21220', 'v-53afb221-496e-4b9b-8d53-d0362b380fdc',
        'v-e9ba81e1-b5bb-4d38-8022-94a0cb3805b6', 'v-4c4bf151-fef7-4cbe-8a65-bde4d8ebce50',
        'v-217583da-9ffb-4296-9411-4541ce1a681f', 'v-3683d483-9d03-4cbb-98ed-2e3546152f9c',
        'v-dbb05370-9824-0137-cf4f-0adeb7a592e0', 'v-b22952d4-3c6d-472b-a58f-1b4737a0026d',
        'v-8586ffe0-9827-0137-b01d-02f6e3696dde', 'v-f7aabf4f-0ecc-405b-a428-db2f3cfd97ab',
        'v-9c6de124-fb21-4836-9019-f80881c3394c', 'v-9c98e776-b751-447b-8cbf-88b47b8c3cb7',
        'v-702c8c60-9826-0137-cf4f-0adeb7a592e0', 'v-95da1b82-18e4-4886-b1d4-c8046c02527b',
        'v-16efaa53-2d6c-4aed-ba3f-f89a79d43ed7', 'v-7d858ca2-2f5e-4dd4-91eb-e405ac21d9c0',
        'v-ff3aa520-9825-0137-cf4f-0adeb7a592e0', 'v-70e6bec2-7b1a-40f0-b64f-c0b8f61a0167',
        'v-b0eb14a0-9825-0137-cf4f-0adeb7a592e0', 'v-e6a01140-9825-0137-b01c-02f6e3696dde',
        'v-8c5aa820-9825-0137-cf4f-0adeb7a592e0', 'v-ee36a6f0-9825-0137-b01d-02f6e3696dde',
        'v-4577b847-b0d7-4fb3-afa4-f809c93f4bd8', 'v-a06df768-92d5-4b5f-90d4-086b69cd3313',
        'v-1fcb00b0-9825-0137-cf4e-0adeb7a592e0', 'v-b4b777e0-9826-0137-cf4e-0adeb7a592e0',
        'v-d2419f5d-120c-4612-ae80-aedc2a01776d', 'v-956a6bd0-9827-0137-cf4f-0adeb7a592e0',
        'v-f35f7ddb-4c65-49c5-b56b-6de3ffa37770', 'v-5107552f-0f5b-4b1f-b790-c80dd0f1ce0d',
        'v-b74c8ad8-f209-4f1f-8ca1-025c4fdf8c24', 'v-d0f610fc-1ba2-4017-a178-bb146e92c8c3',
        'v-0d7b1e60-9827-0137-cf4e-0adeb7a592e0', 'v-652683ff-6c4e-4d64-8bd1-6de5a74b7214',
        'v-22709c26-be0e-42dc-a7ff-e474aa75abb8', 'v-8f51e4b0-9826-0137-b01c-02f6e3696dde',
        'v-2cdd7c47-4a1c-419f-9bc8-e50a98e46b0c', 'v-18b64d1b-3963-47b5-86a1-ab10b4f223ea',
        'v-03ec209e-60d8-4584-9bf0-0c7834498eb7', 'v-909273c0-9827-0137-b01c-02f6e3696dde',
        'v-fec7b9d0-9826-0137-cf4e-0adeb7a592e0', 'v-83f37bb2-bb2e-4be9-919d-9a9748be4b80',
        'v-835912d0-9826-0137-b01d-02f6e3696dde', 'v-ac246470-9826-0137-b01d-02f6e3696dde',
        'v-dcb89a09-22ee-4899-bd4c-626a78c5e5d6', 'v-daa4e672-0a91-44ef-82ff-4cf2dfce6748',
        'v-b4b796e0-9824-0137-cf4f-0adeb7a592e0', 'v-9a6c117f-6f48-4618-bf9f-ee9eaf3a4aaa',
        'v-68034bb1-5f40-4c29-aec5-445f4b0b88ce', 'v-9577f818-86ef-43bd-b1c1-2ead95b7f3c1',
        'v-d104431c-d8d5-4f53-bb4b-fb0b67f0b15b', 'v-ac6e30a0-9827-0137-b01d-02f6e3696dde',
        'v-80f9cc87-ec26-49ec-b410-b87606b7a18f', 'v-88c8b470-9827-0137-b01c-02f6e3696dde',
        'v-f85664aa-b0a4-4a13-8387-d22e05945fc1', 'v-56314cdd-3c45-4f9c-8c72-8311404aaa30',
        'v-cf4db834-cf79-44e9-9400-ae03160a55cb', 'v-a3ef581b-9e67-40db-8433-4e59ad81883a',
        'v-377f1a8a-1deb-40b3-8d25-3fb87df14a6f', 'v-05a64f40-9827-0137-cf4f-0adeb7a592e0',
        'v-0039f79d-ca8d-415e-ba8d-c9e361d8b08a', 'v-b869f9c0-9824-0137-b01d-02f6e3696dde',
        'v-a2730630-9827-0137-cf4e-0adeb7a592e0', 'v-4105e7a0-9827-0137-cf4e-0adeb7a592e0',
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
        if (! $min && ! $max) {
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
        $words = $this::randomElements(static::$wordList, $numWord, true);
        $hashes = $this->hashtag($numHash);

        return implode(' ', self::shuffle(array_merge($words, $hashes)));
    }

    private function biasedRandom(array $bias): int
    {
        $count = rand(0, 99);
        $number = 0;
        while ($count >= 0) {
            $count -= array_shift($bias);
            $number++;
        }

        return $number;
    }
}
