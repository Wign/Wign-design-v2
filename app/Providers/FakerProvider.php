<?php

namespace App\Providers;

use Faker\Provider\Base;

class FakerProvider extends Base
{

    protected static $wordList = array(
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
        'fraktal', 'migration', 'sæson', 'medie', 'backpacker', 'spreadthesign', 'stamcelle', 'oman', 'galilei'
    );
    protected static $hashList = array(
        'matematik', 'tegning', 'video', 'by', 'fodbold', 'kunst', 'land', 'design', 'grafik', 'form', 'brand',
        'matematisk', 'overflade', 'gamletegn', 'kørsel', 'film', 'køretøj', 'program', 'redigering', 'tidsalder',
        'kunster', 'spil', 'programmering', 'mad', 'tidsperiode', 'grønsager', 'forbund', 'religion', 'bjergkæde', 'it',
        'pægagogik', 'materiale', 'computervidenskab', 'nordkorea', 'animation', 'skuespiller', 'computer', 'cv',
        'teknologi', 'biolog', 'stil', 'software', 'person', 'hovedstad', 'formgiving', 'bil', 'butik',
        'programmeringssprog', 'cafe', 'socialmedier', 'pokemon', 'instruktion', 'brands', 'karrier', 'fysik', 'udland',
        'fotografi', 'biologi', 'lande', 'farve', 'teknik', 'logik', 'figur', 'hovedstaed', 'danmark'
    );

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
    public function wignWords(int $min = null, int $max = null)
    {
        if ( ! $min && ! $max) {
            $number = $this->biasedRandom([50, 30, 20]);
        } else {
            $number = rand($min, $max);
        }

        return ucfirst(implode(" ", $this::randomElements(static::$wordList, $number, true)));
    }

    public function hashtag(int $numHash = 1)
    {
        $tmpHash = $this::randomElements(static::$hashList, $numHash);
        $hashtag = array();
        foreach ($tmpHash as $hash) {
            $hashtag[] = "#".$hash;
        }

        return $hashtag;
    }

    public function textWithHashtag(int $numWord = 10, int $numHash = 3)
    {
        $words  = $this::randomElements(static::$wordList, $numWord, true);
        $hashes = $this->hashtag($numHash);

        return implode(" ", self::shuffle(array_merge($words, $hashes)));
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
