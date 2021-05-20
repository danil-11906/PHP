<?php
require_once ('MyClass.php');
$class = new MyClass();

function chooseMethod($num) {
    switch ($num){
        case 1:
            return 'methodOne';
        case 2:
            return 'methodTwo';
        case 3:
            return 'methodThree';
        case 4:
            return 'methodFour';
    }
}

for ($i = 1; $i <= 4; $i++) {
    $method = chooseMethod($i);
    try {
        $class->$method();
    }
    catch (exceptions\ExThree $exception) {
        echo 'Ошибка 3  '.$exception->getMessage().'<br>';
    }
    catch (exceptions\ExFive $exception) {
        echo 'Ошибка 5  '.$exception->getMessage().'<br>';
    }
    catch (exceptions\ExOne $exception) {
        echo 'Ошибка 1  '.$exception->getMessage().'<br>';
    }
    catch (exceptions\ExTwo $exception) {
        echo 'Ошибка 2  '.$exception->getMessage().'<br>';
    }
    catch (exceptions\ExFour $exception) {
        echo 'Ошибка 4  '.$exception->getMessage().'<br>';
    }
    echo '<br>';
}