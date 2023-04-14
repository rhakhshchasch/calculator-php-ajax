<?php
// function d($data){  //debug function, режим дебага - все ошибки выводятся. На этой строке data - параметр функции - принимает данные
//     echo "<pre>";
//     var_dump($data); //На этой строке data - аргумент функции - передает аргумент (данные)
//     echo "</pre>";
// }

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
    $result = json_encode(["Result" => $result]);       // json_encode() возвращает string|(false = "")
    if(isset($result)) echo $result;
}