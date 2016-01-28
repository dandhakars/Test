<?php
 echo "入力してください";
 $input = fgets(STDIN);
 echo "入力したもの:";
 echo $input;

$flug = true;
do {
    print '\n';
    print 'a+bのaを入力（数字）';
    $input_a = fgets(STDIN);
    print 'a = ';
    print $input_a;
    print 'これでいいですか? y/n';

    do {
        $input =fgets(STDIN);
        $input = rtrim($input);

        if (strcasecmp($input, 'Y') == 0
                || strcasecmp($input, 'y') == 0) {
            $input_a = rtrim($input_a);
            $flug = false;
            break;
        } else if (strcasecmp($inpput, 'N') == 0 
                    || strcasecmp($input, 'n') == 0) {
            break;
        }
    } while (true);
} while ($flug);


$FLUG = true;
do {
    print '\n';
    print 'a+bのbを入力（数字）';
    $input_b = fgets(STDIN);
    print 'b = ';
    print $input_b;
    print 'これでいいですか? y/n';

    do {
        $input =fgets(STDIN);
        $input = rtrim($input);

        if (strcasecmp($input, 'Y') == 0
                || strcasecmp($input, 'y') == 0) {
            $input_b = rtrim($input_b);
            $flug = false;
            break;
        } else if (strcasecmp($input, 'N') == 0
                    || strcasecmp($input, 'n') == 0) {
            break;
        }
    } while (true);
} while ($flug);    

$add_ad = intval($input_a) + intval($input_b);
print 'a + b = ';
print $add_ad;
print "\n";

while (true) {
    $input = fgets(STDIN);
    $input = rtrim($input);
    if (strcasecmp($input, '\e') == 0) {
        return;
    }
}

