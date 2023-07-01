<?php
// — Ripetere l’esercizio del controllo password visto a lezione (da soli o rivedendo il video).
// — Implementare un metodo che faccia reinserire la password qualora anche una delle regole non fosse rispettate e che, invece, lo interrompa in caso di password accettata.
// — Visualizzare in console quale regola non e’ stata rispettata.
// — Implementare un metodo che faccia reinserire la password massimo 3 volte. 


// - Pushare su Github con nome php_03_nome_cognome

//dichiaro la variabile che ocnterrà la password digitata dall'utente
//utilizzo la tecnica del semaforo per validare alla fine la password
$passwordIsValid = false;

//dichiaro la funzione
function checkPassword (&$check) {
    $password = readline('Inserisci la password: ');
    //controllo se la pass è lunga almeno 8 caratteri
    if(strlen($password) < 8) {
        echo "la passa deve essere lunga almeno 8 Caratteri! \n";
        return;
    }
    //controlliamo se la passa include almeno 1 lettera maiuscola
    if(!preg_match('/[A-Z]/', $password)){
        echo "La pass deve contenere almeno una lettera maiuscola! \n";
        return;
    }
    //controllo che la pass contenga almeno un numero
    if(!preg_match('/[0-9]/', $password)){
        echo "La pass deve contenere almeno un numero! \n";
        return;
    }
    //controllo che la passwd contenga almeno un carattere speciale
    if(!preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?!~\\\\]/', $password)){
        echo "La password deve contentere almeno un carattere speciale! \n";
        return;
    };

    //se tutti i contrilli vanno a buon fine valorizzo con true la variabile $passwordIsValid e restituisco il messaggio di successo all'utente stampando la password in console per controllarne il valore
    echo "La password da lei inserita è CORRETTA!: ($password) \n";
    $check = true;
}


//utilizzo un ciclo FOR per far reinserire la passwd finché non è valida
for($i = 0; $i < 4; $i++) {
    //controllo dei tentativi massimi effettuati dall'utente
    if(!$passwordIsValid && $i === 3){
        echo "Tentativi massimi raggiunti, riprovare tra qualche secondo...";
        break;
    }
    //controllo se il check sulla password è ancora False
    elseif(!$passwordIsValid) {
        checkPassword($passwordIsValid);
    }
    //se la password rispecchia tutti i requisiti allora break e andiamo in check
    else {
        break;
    }
}

?>