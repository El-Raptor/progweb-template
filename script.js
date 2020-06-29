const fruits = ['LARANJA', 'MAÇÃ', 'MORANGO', 'BANANA', 'MELANCIA']
const objs = ['LÁPIS', 'CADERNO', 'CONTROLE', 'CÁLICE', 'GARRAFA']
let category = 0
let wordsFound = 0

// Gera as letras aleatoriamente.
function generateLetter() {
    let text = ""

    let possibleLetter = "ABCDEFGHIJKLMNOPQRSTUVWXYZÇ"
    //ÁÃÂÉÊÍÓÕÔÚÛÜ

    text = possibleLetter.charAt(Math.floor(Math.random() * possibleLetter.length))

    return text
}

// Insere as letras geradas na tabela.
function setTableCell() {
    
    for (let i = 0; i < 400; i++) {
        let cellId = "_" + (i+1)
        document.getElementById(cellId).innerHTML = generateLetter()
    }
}

// Seleciona a categoria de acordo com o escolhido pelo usuário.
function selectCategory(selectedCat) {
    document.getElementById("game-container").style.display = "none"
    document.getElementById("word-finder-container").style.display = "flex"
    document.getElementById("word-finder-container").style.justifyContent = "center"
    document.getElementById("word-finder-container").style.flexDirection = "column"
    start()
    setTableCell()
    if (selectedCat == 1) {
        category = 1
        for (let i = 0; i < fruits.length; i++) {
            insertWords(fruits[i])
            let wordNames = document.createElement("span")
            wordNames.innerHTML = fruits[i]
            wordNames.classList.add('find-words')
            wordNames.id = 'fw-' + i
            document.getElementById("word-finder-container").append(wordNames)
        }
        
    } else {
        category = 2
        console.log(category)
        for (let i = 0; i < objs.length; i++) {
            insertWords(objs[i])
            let wordNames = document.createElement("span")
            wordNames.innerHTML = objs[i]
            wordNames.classList.add('find-words')
            wordNames.id = 'fw-' + i
            document.getElementById("word-finder-container").append(wordNames)
        }
    }
}

// Insere as palavras na tabela.
function insertWords(word) {
    let cellPosition = Math.floor(Math.random() * 400)
    let direction = Math.ceil(Math.random() * 2)
    console.log(cellPosition)

    if (direction == 1) {
        insertHorizontal(word, cellPosition)
    } else {
        insertVertical(word, cellPosition)
    }

}

function insertHorizontal(word, cellPosition) {
    

    // TODO: Verificar se as palavras se sobrescrevem.

    if (cellPosition + word.length-1 > (Math.ceil(cellPosition/20) * 20)) {
        insertWords(word)
        return
    }

    for (let i = 0; i < word.length; i++) {
        document.getElementById("_" + (cellPosition + i)).innerHTML = word.charAt(i)
    }
}

function insertVertical(word, cellPosition) {

    // TODO: Verificar se as palavras se sobrescrevem.

    if (cellPosition + ((word.length-1) * 20) > 400) {
        insertWords(word)
        return
    }

    for (let i = 0; i < word.length; i++) {
        document.getElementById("_" + (cellPosition + (i * 20))).innerHTML = word.charAt(i)
    }
}

// TODO: Limitar direção de seleção.

function foundIt(word) {
    
    for (let i = 0; i < fruits.length; i++) {
        let foundWord = document.getElementById("fw-"+i).textContent
        console.log(foundWord + " fw")
        console.log(word)
        if (word == foundWord) {
            console.log('Chega')
            document.getElementById("fw-"+i).style.textDecoration = 'line-through'
            wordsFound++
            gameFinished()
            break
        }
    }   
    
}

// Verifica se o usuário achou todas as palavras.
function gameFinished() {
    if (wordsFound == 5) {
        stop()
        alert('Parabéns! Você ganhou!')
    }
}

// Realiza a seleção das palavras.
$(function () {
    let isMouseDown = false;
    let word = "";
    let path = Array();
    $("#word-finder td").mousedown(function () {
        isMouseDown = true;
        $(this).toggleClass("highlighted");
        path.push($(this).attr('id'));
        word += $(this).html();
        return false; // previne seleção de texto
      }).mouseover(function () {
        if (isMouseDown) {
            $(this).toggleClass("highlighted");
            path.push($(this).attr('id'));
            word += $(this).html();
            console.log(word);
        }
      });
    
    $(document).mouseup(function () {
        isMouseDown = false;
        if (category == 1) {
            console.log(category)
            if (word == fruits[0] || word == fruits[1] || word == fruits[2] 
                || word == fruits[3] || word == fruits[4]) {
                
                foundIt(word)
            } else {
                let lastPos = path.length-1;
                for (let i = lastPos; i >= 0; i--) {
                    document.getElementById(path[i]).classList.remove("highlighted");
                    //$(path[i]).removeClass("highlighted");
                    path.pop();
                }
            }
        } else {
            console.log(category)
            console.log(word)
            if (word == objs[0] || word == objs[1] || word == objs[2] 
                || word == objs[3] || word == objs[4]) {
                
                foundIt(word)
            } else {
                let lastPos = path.length-1;
                for (let i = lastPos; i >= 0; i--) {
                    document.getElementById(path[i]).classList.remove("highlighted");
                    //$(path[i]).removeClass("highlighted");
                    path.pop();
                }
            } 
        }
        path = [];
        word = "";
      });
  });


let timer
let hora = 0
let minuto = 0
let segundo = 0
let milissegundo = 0
// Funcao para atualizar o display do cronometro no html.
function updateVisualization() {
  // As próximas linhas buscam pelos respectivos espacos de hora, minuto, segundo e milissegundos
  // Basta implementar a lógica e alterar o conteúdo (innerHTML) com os valores
  const horaSpan = document.getElementsByClassName('hora')[0]
  const minSpan = document.getElementsByClassName('minuto')[0]
  const secSpan = document.getElementsByClassName('segundo')[0]
  //const msSpan = document.getElementsByClassName('milissegundo')[0]

  milissegundo++
  /*if (milissegundo < 10) {
    msSpan.innerHTML = `0${milissegundo}`
  } else {
    msSpan.innerHTML = milissegundo
  }*/

  if (milissegundo == 100) {
    segundo++
    milissegundo = 0
    if (segundo < 10) {
      secSpan.innerHTML = `0${segundo}`
    } else {
      secSpan.innerHTML = segundo
    }
  }
  if (segundo == 60) {
    segundo = 0
    secSpan.innerHTML = `0${segundo}`
    minuto++
    if (minuto < 10) {
      minSpan.innerHTML = `0${minuto}`
    } else {
      minSpan.innerHTML = minuto
    }
  }
  if (minuto == 60) {
    minuto = 0
    minSpan.innerHTML = `0${minuto}`
    hora++
    if (hora < 10) {
      horaSpan.innerHTML = `0${hora}`
    } else {
      horaSpan.innerHTML = hora
    }
  }

}

// Funcao executada quando o botão 'Inicar' é clicado
// - se o cronometro estiver parado, iniciar contagem.
// - se estiver ativo, reiniciar a contagem
function start() {
  if (!timer) {
    timer = setInterval(updateVisualization, 10)
  } else {
    clearInterval(timer)
    reiniciar()
    timer = setInterval(updateVisualization, 10)
  }
}

// Funcao executada quando o botão 'Parar' é clicado
// - se o cronometro estiver ativo, parar na contagem atual
function stop() {
  clearInterval(timer)
  if (!!timer) {timer = false}
}

function reiniciar() {
    hora = 0
    minuto = 0
    segundo = 0
    milissegundo = 0
    document.getElementsByClassName('hora')[0].innerHTML = "00"
    document.getElementsByClassName('minuto')[0].innerHTML = "00"
    document.getElementsByClassName('segundo')[0].innerHTML = "00"
    //document.getElementsByClassName('milissegundo')[0].innerHTML = "000"
  }