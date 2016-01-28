<?php
 echo "入力してください";
 $INPUT = fgets(STDIN);
 echo "入力したもの:";
 echo $INPUT;

$flug = true;
do {
    print '\n';
    print 'a+bのaを入力（数字）';
    $INPUT_a = fgets(STDIN);
    print 'a = ';
    print $INPUT_a;
    print 'これでいいですか? y/n';

    do {
        $INPUT =fgets(STDIN);
        $INPUT = rtrim($INPUT);

        if (strcasecmp($INPUT, 'Y') == 0
                || strcasecmp($INPUT, 'y') == 0) {
            $INPUT = rtrim($INPUT_a);
            $flug = false;
            break;
        } else if (strcasecmp($INPUT, 'N') == 0 
                    || strcasecmp($INPUT, 'n') == 0) {
            break;
        }
    } while (true);
} while ($flug);


$FLUG = true;
do {
    print '\n';
    print 'a+bのbを入力（数字）';
    $INPUT_b = fgets(STDIN);
    print 'b = ';
    print $INPUT_b;
    print 'これでいいですか? y/n';

    do {
        $INPUT =fgets(STDIN);
        $INPUT = rtrim($INPUT);

        if (strcasecmp($INPUT, 'Y') == 0
                || strcasecmp($INPUT, 'y') == 0) {
            $INPUT = rtrim($INPUT_b);
            $flug = false;
            break;
        } else if (strcasecmp($INPUT, 'N') == 0
                    || strcasecmp($INPUT, 'n') == 0) {
            break;
        }
    } while (true);
} while ($flug);    

$addAB = intval($INPUT_a) + intval($INPUT_b);
print 'a + b = ';
print $addAB;
print "\n";

while (true) {
    $INPUT = fgets(STDIN);
    $INPUT = rtrim($INPUT);
    if (strcasecmp($INPUT, '\e') == 0) {
        return;
    }
}

