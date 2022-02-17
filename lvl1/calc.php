<?php

$solution = 0;

while (true) {

    $userInputRaw = (string)readline("Input: ");
    $userInput = explode(" ", $userInputRaw);

    switch (sizeof($userInput)) {

        /* Input of type options */
        case 1:
            switch ((string)$userInput[0]) {
                case "clear":
                    $solution = 0;
                    print "Solution: $solution\n";
                break;
                case "exit":
                    exit("Bye\n");
                break;
                default:
                    exit("Something went wrong\n");
            }
        break;

        /* Input of type operator num */
        case 2:
            switch ((string)$userInput[0]) {
                case "-":
                    $solution -= $userInput[1];
                    print "Solution: $solution\n";
                break;
                case "+":
                    $solution += $userInput[1];
                    print "Solution: $solution\n";
                break;
                case "*":
                    $solution *= $userInput[1];
                    print "Solution: $solution\n";
                break;
                case "/":
                    if ($userInput[1] == 0) {
                        exit("DONT DEVIDE BY 0!!! \n");
                    }
                    $solution /= $userInput[1];
                    print "Solution: $solution\n";
                break;
                default:
                    exit("Something went wrong\n");
            }
        break;

        /* Input of type num1 operator num2 */
        case 3:
            switch ((string)$userInput[1]) {
                case "-":
                    $solution = $userInput[0] - $userInput[2];
                    print "Solution: $solution\n";
                break;
                case "+":
                    $solution = $userInput[0] + $userInput[2];
                    print "Solution: $solution\n";
                break;
                case "*":
                    $solution = $userInput[0] * $userInput[2];
                    print "Solution: $solution\n";
                break;
                case "/":
                    if ($userInput[2] == 0) {
                        exit("DONT DEVIDE BY 0!!! \n");
                    }
                    $solution = $userInput[0] / $userInput[2];
                    print "Solution: $solution\n";
                break;
                default:
                    exit("Something went wrong\n");
            }
        break;
        
        default:
            exit("Something went wrong\n");
    }
}
