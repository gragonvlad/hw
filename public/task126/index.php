<?php 
$example_persons_array = [
    [
        'fullname' => 'Иванов Иван Иванович',
        'job' => 'tester',
    ],
    [
        'fullname' => 'Степанова Наталья Степановна',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Пащенко Владимир Александрович',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Громов Александр Иванович',
        'job' => 'fullstack-developer',
    ],
    [
        'fullname' => 'Славин Семён Сергеевич',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Цой Владимир Антонович',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Быстрая Юлия Сергеевна',
        'job' => 'PR-manager',
    ],
    [
        'fullname' => 'Шматко Антонина Сергеевна',
        'job' => 'HR-manager',
    ],
    [
        'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Бардо Жаклин Фёдоровна',
        'job' => 'android-developer',
    ],
    [
        'fullname' => 'Шварцнегер Арнольд Густавович',
        'job' => 'babysitter',
    ],
];


function getPartsFromFullname($value){

       $data = explode(' ', $value);
       return ['surname' => $data[0], 'name' => $data[1], 'patronomyc' => $data[2]];

}

foreach ($example_persons_array as $name){

    $fio = getPartsFromFullname($name['fullname']);
    print_r ($fio);
    echo '<br>';

}

echo '<hr>';

function getFullnameFromParts($arr){

    return implode(' ', $arr);

}

foreach ($example_persons_array as $name){

    $fio = getFullnameFromParts(getPartsFromFullname($name['fullname']));
    print_r ($fio);
    echo '<br>';
    
}

echo '<hr>';

function getShortName($str){

    $arr = getPartsFromFullname($str);
    return $arr['name']. ' '. mb_substr($arr['surname'], 0, 1). '.'; 

}

foreach ($example_persons_array as $name){

    $fio = getShortName(getFullnameFromParts(getPartsFromFullname($name['fullname'])));
    print_r ($fio);
    echo '<br>';

}

echo '<hr>';

function getGenderFromName ($str){

    $arr = getPartsFromFullname($str);
    $woman = -1;
    $man = 1;
    $unknown = 0;
    if (mb_substr($arr['surname'], -2) === 'ва' || mb_substr($arr['name'], -1) === 'а' || mb_substr($arr['patronomyc'], -3) === 'вна') {
        return $woman; 
    }
    else if (mb_substr($arr['surname'], -1) === 'в' || mb_substr($arr['name'], -1) === 'н' ||  mb_substr($arr['name'], -3) === 'мад' || mb_substr($arr['name'], -1) === 'й' || mb_substr($arr['patronomyc'], -2) === 'ич'){
        return $man; 
    }
    else {
        return $unknown;
    }

}

//Код который должен быть согласно условия задания, но выводит немного некорректно ФИО Бардо Жаклин Фёдоровна.
/*
function getGenderFromName ($str){

    $arr = getPartsFromFullname($str);
    $all = 0;
    $woman = -1;
    $man = 1;
    $unknown = 0;
    if (mb_substr($arr['surname'], -2) === 'ва'){$all -= 1;} 
    if (mb_substr($arr['name'], -1) === 'а'){$all -= 1;} 
    if (mb_substr($arr['patronomyc'], -3) === 'вна'){$all -= 1;} 

    if (mb_substr($arr['surname'], -1) === 'в') {$all += 1;} 
    if (mb_substr($arr['name'], -1) === 'н') {$all += 1;} 
    if (mb_substr($arr['name'], -1) === 'й') {$all += 1;} 
    if (mb_substr($arr['patronomyc'], -2) === 'ич'){$all += 1;} 

    if ($all < 0){ 
        return $woman;
    } else if ($all > 0){
        return $man;
    } else {
        return $unknown;
    }
}
*/

foreach ($example_persons_array as $name){

    $gender = getGenderFromName($name['fullname']);
    echo $name['fullname'] . '<br>';
    if ($gender < 0){echo 'Женщина';}
    else if ($gender > 0){echo 'Мужчина';}
    else if ($gender == 0){echo 'Тот кто не определился';}
    echo '<hr>';

}

function getGenderDescription($arr){
    $woman = 0;
    $man = 0;
    $unknown = 0;
    $all = count($arr);
    foreach ($arr as $name){
        $description = getGenderFromName($name['fullname']);
        if ($description < 0){$woman++;}
        else if ($description > 0){$man++;}
        else if ($description == 0){$unknown++;}
    }
    echo 'Гендерный состав аудитории: <br> --------------------------- <br> 
    Мужчины - '.round($man / $all * 100, 1).'% <br>
    Женщины - '.round($woman / $all * 100, 1).'% <br>
    Не удалось определить - '.round($unknown / $all * 100, 1).'%';  
}

getGenderDescription($example_persons_array);
echo '<hr>';

function getPerfectPartner($surname, $name, $patronomyc, $arr){

    $surname = mb_strtoupper(mb_substr($surname, 0, 1)) . mb_strtolower(mb_substr($surname, 1));
    $name = mb_strtoupper(mb_substr($name, 0, 1)) . mb_strtolower(mb_substr($name, 1));
    $patronomyc = mb_strtoupper(mb_substr($patronomyc, 0, 1)) . mb_strtolower(mb_substr($patronomyc, 1));

    $fio = getFullnameFromParts([$surname, $name, $patronomyc]);
    $gender = getGenderFromName($fio);
    while (true){
        $randPerson = $arr[rand (0, count($arr) - 1)];
        $randPerGen = getGenderFromName($randPerson['fullname']);
        if ($randPerGen <> $gender) {
            break;
        }
    }
    echo getShortName($fio) . ' + ' . getShortName($randPerson['fullname']) . ' = <br> ♡ Идеально на ' . number_format(rand(5000, 10000) / 100, 2, '.', '') . '% ♡';
}

getPerfectPartner('ПетРова', 'Валентина', 'Викторовна', $example_persons_array);

?>