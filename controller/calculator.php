<?php
function d($data){      // debug function, режим дебага - все ошибки выводятся. На этой строке data - параметр функции - принимает данные
    echo "<pre>";
    var_dump($data);    // На этой строке data - аргумент функции - передает аргумент (данные)
    echo "</pre>";
}

// echo json_encode($_POST);
// echo "<b>test</b>";


// инициализация/объявление функций
// принимаем параметры в функции, в т.ч. по умолчанию (параметры по умолчанию не требуется передавать в аргументы)
function add($num1, $num2){
    return $num1 + $num2;
}

function subtract($num1, $num2){
    return $num1 - $num2;
}

function multiply($num1, $num2){
    return $num1 * $num2;
}

function divide($num1, $num2){
    if($num2 == 0){
        return "You cannot divide by zero";
    } else {
        return $num1 / $num2;
    } 
}

if(isset($_POST["submit"])){

    // инициализация/объявление переменных
    // можно задать через @ - игнорирование ошибок (ущербный способ)
    $num1 = $_POST["num1"]; 
    $num2 = $_POST["num2"]; 
    $operator = $_POST["operator"];
    $result = NULL;

    if($num1 == NULL || $num2 == NULL){
        $result = "Enter both values first";
    } else {
    // проверка на число
    if(!is_numeric($num1) || !is_numeric($num2)){
        $result = "Please enter numeric values";
    } else {
        switch($operator){
            case '+':
                $result = add($num1, $num2);                // вызов функции  и  отдача аргументов в функцию
                break;
            
            case '-':
                $result = subtract($num1, $num2);
                break;
            
            case '*':
                $result = multiply($num1, $num2);
                break;
            
            case '/':
                $result = divide($num1, $num2);
                break;

            default:
                $result = "Something went wrong";
                break;
        }
    }
    }
    $result = json_encode(["Result" => $result]);           // json_encode() возвращает string|(false = "")
    if(isset($result)) echo $result;
}

exit();
$array = [];            // подготовка структуры данных - объявление массива
$array = ['name' => 'Aleksei', 'surname' => 'Pershikov'];
$array['teacher'] = 'Ruslan Senatorov';
$array += ['wannabe' => 'PHP developer', 'to_loot' => 'money'];
$array[] = 'PHP developer';
arrtay_push($array, 'Fullsack developer', 'Python developer');
unset($array[0]);

echo "<pre>";
var_dump($array);
echo "</pre>";

$fruits = ['name1' => 'apple', 'name2' => 'banana', 'name3' => 'mango'];
$new_array = [];

foreach($fruits as $value){
    $new_array[] = $value;
}
d($new_array);