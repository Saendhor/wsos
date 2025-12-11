<?php

$tecniche =
[
    'spurg'    => ['tempo' => 5, 'tec' => 2],
    'pul'      => ['tempo' => 3, 'tec' => 1],
    'affett'   => ['tempo' => 2, 'tec' => 1],
    'tagli'    => ['tempo' => 2, 'tec' => 1],
    'lav'      => ['tempo' => 1, 'tec' => 1],
    'sbucci'   => ['tempo' => 3, 'tec' => 1],
    'sciacqu'  => ['tempo' => 1, 'tec' => 1],
    'scol'     => ['tempo' => 1, 'tec' => 1],
    'asciug'   => ['tempo' => 2, 'tec' => 1],
    'infarin'  => ['tempo' => 3, 'tec' => 1],
    'impast'   => ['tempo' => 5, 'tec' => 3],
    'mescol'   => ['tempo' => 2, 'tec' => 1],
    'trit'     => ['tempo' => 4, 'tec' => 2],
    'rosol'    => ['tempo' => 4, 'tec' => 2],
    'soffrigg' => ['tempo' => 3, 'tec' => 3],
    'frig'     => ['tempo' => 5, 'tec' => 3],
    'sbollent' => ['tempo' => 2, 'tec' => 1],
    'cuoc'     => ['tempo' => 5, 'tec' => 2],
    'scald'    => ['tempo' => 1, 'tec' => 1],
    'boll'     => ['tempo' => 4, 'tec' => 1],
    'grigli'   => ['tempo' => 4, 'tec' => 3],
    'sfum'     => ['tempo' => 2, 'tec' => 3],
    'marin'    => ['tempo' => 7, 'tec' => 2],
    'emulsion' => ['tempo' => 2, 'tec' => 2],
    'inforn'   => ['tempo' => 5, 'tec' => 2],
    'ripos'    => ['tempo' => 7, 'tec' => 1],
    'frull'    => ['tempo' => 2, 'tec' => 1],
    'amalgam'  => ['tempo' => 4, 'tec' => 1],
    'apr'      => ['tempo' => 1, 'tec' => 2],
    'aggiung'  => ['tempo' => 1, 'tec' => 1],
    'vers'     => ['tempo' => 1, 'tec' => 1],
    'copr'     => ['tempo' => 1, 'tec' => 1],
    'schiacci' => ['tempo' => 3, 'tec' => 1],
    'mont'     => ['tempo' => 3, 'tec' => 2],
    'vent'     => ['tempo' => 3, 'tec' => 1],
    'cond'     => ['tempo' => 1, 'tec' => 1],
];

function calcolaLivelli($descrizione, &$tecniche)
{
    $descrizione = strtolower($descrizione);
    $tempo = 0;
    $maxTec = 0;
    $trovati = [];

    $maxTempo = array_sum(array_column($tecniche, 'tempo'));

    foreach ($tecniche as $stem => $valori)
    {
        if (strpos($descrizione, $stem) !== false)
        {
            $tempo += $valori['tempo'];
            $trovati[] = $stem;

            if ($valori['tec'] > $maxTec)
            {
                $maxTec = $valori['tec'];
            }
        }
    }

    $percentualeTempo = ($maxTempo > 0) ? round(($tempo / $maxTempo) * 100) : 0;

    if ($percentualeTempo <= 25)        $livelloTempo = 'veloce';
    elseif ($percentualeTempo <= 50)    $livelloTempo = 'medio';
    else                                $livelloTempo = 'lungo';

    if ($maxTec === 1)       $livelloTec = 'facile';
    elseif ($maxTec === 2)   $livelloTec = 'medio';
    else                     $livelloTec = 'difficile';

    return [
        'tempo'          => $livelloTempo,
        'difficolta'     => $livelloTec,
        'tempo_raw'      => $tempo,
        'tempo_percent'  => $percentualeTempo,
        'maxTec_raw'     => $maxTec,
        'trovati'        => $trovati
    ];
}
?>