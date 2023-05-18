<?php
$data = <<<'EOD'
X, -9\\\10\100\-5\\\0\\\\, A
Y, \\13\\1\, B
Z, \\\5\\\-3\\2\\\800, C
EOD;

$lines = explode("\n", $data);
$keluaran = array();

foreach ($lines as $baris) {
    $bagian0 = array_map('trim', explode(',', $baris));

    $bagian1 = $bagian0[0];
    $bagian2 = $bagian0[2];
    $bagian = preg_replace('/\\\\+/', ',', $bagian0[1]);

    $values = explode(',', $bagian);
    sort($values, SORT_NUMERIC);

    $counter = 1;
    foreach ($values as $value) {
        if (is_numeric($value)) {
            $keluaran[] = $bagian1 . ', ' . $value . ', ' . $bagian2 . ', ' . $counter;
            $counter++;
        }
    }
}

usort($keluaran, function ($a, $b) {
    $aValue = intval(explode(',', $a)[1]);
    $bValue = intval(explode(',', $b)[1]);

    return $aValue - $bValue;
});

foreach ($keluaran as $baris) {
    echo $baris . "\n";
}
?>