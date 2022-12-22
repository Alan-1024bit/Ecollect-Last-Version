let SelectBairro = document.querySelector("#SelectBairro")
SelectBairro.addEventListener('change', SelectionBairro)

//Clonar elemento que será reinserido no HTML
let newSelectBairro = SelectBairro

//obter div parent para inserção de conteúdo dinâmico a partir da seleção do Bairro
let divBairro = document.querySelector("#divBairro")

//obter a quantidade de bairros selecionados que, por padrão, vale 0
let qtddBairros = Number.parseInt(document.querySelector("#id_qtddBairros").value)

//obter div que contém o select para sua alteração futura (na linha 37), onde será desabilitado a opção já selecionada pelo usuário
let DivSelectBairro = document.querySelector("#divSelectBairro")//Parent de SelectBairro, na linha 1

function SelectionBairro(){
    //Obter a opção de Bairro selecionada pelo usuário
    let optionSelected = SelectBairro.options[SelectBairro.selectedIndex];

    //Obter o ID de Bairro selecionada pelo usuário
    let idBairro = optionSelected.value

    if(idBairro != 0 && qtddBairros <= 4){//Se alguma opção, sem ser a padrão 0, for selecionada

        //definir conteúdo a ser inserido
        let HiddenBairro = `
        <div class="btn-group mt-1 mb-1" role="group" aria-label="Exemplo básico" id="InputBairroHidden${idBairro}">
            <button type="button" class="btn btn-secondary disable">${optionSelected.text}</button>
            <button type="button" class="btn btn-secondary material-icons" id='buttonDeleteBairro${idBairro}' onclick="DeleteBairro(${idBairro})">close</button>

            <input type="hidden" name="Bairro${idBairro}" value="${idBairro}">
        </div>
        `
    
        //inserir conteúdo
        divBairro.insertAdjacentHTML('beforeend', HiddenBairro)

        //Aumentar +1 ao índice que conta quantos bairros foram selecionados
        qtddBairros++
        document.querySelector("#id_qtddBairros").value = qtddBairros

        //Desabilitar a opção selecionada
        newSelectBairro.options[idBairro].disabled = true
        DivSelectBairro.replaceChild(newSelectBairro, SelectBairro)
    }
}

function DeleteBairro(i){
    //remover conteúdo
    InputBairroHidden = document.querySelector(`#InputBairroHidden${i}`)//Child do Parent
    divBairro.removeChild(InputBairroHidden)//Remove

    //Diminuir 1 ao índice que conta quantos bairros foram selecionados
    qtddBairros--
    document.querySelector("#id_qtddBairros").value = qtddBairros

    //habilitar opção no select após sua exclusão
    newSelectBairro.options[i].disabled = false
    newSelectBairro.value = 0
    DivSelectBairro.replaceChild(newSelectBairro, SelectBairro)

    //padronizar o select novamente
    document.querySelector("#SelectBairro").selectedOptions = 0
}

/*------------------------------------------------------------*/

let SelectMaterial = document.querySelector("#SelectMaterial")
SelectMaterial.addEventListener('change', SelectionMaterial)

//Clonar elemento que será reinserido no HTML
let newSelectMaterial = SelectMaterial

//obter div parent para inserção de conteúdo dinâmico a partir da seleção do Material
let divMaterial = document.querySelector("#divMaterial")

//obter a quantidade de materiais selecionados que, por padrão, vale 0
let qtddMateriais = Number.parseInt(document.querySelector("#id_qtddMateriais").value)

//obter div que contém o select para sua alteração futura (na linha 37), onde será desabilitado a opção já selecionada pelo usuário
let DivSelectMaterial = document.querySelector("#divSelectMaterial")//Parent de SelectMaterial, na linha 1

function SelectionMaterial(){
    //Obter a opção de Material selecionada pelo usuário
    let optionSelected = SelectMaterial.options[SelectMaterial.selectedIndex];

    //Obter o ID de Material selecionada pelo usuário
    let idMaterial = optionSelected.value

    if(idMaterial != 0 && qtddMateriais <= 7){//Se alguma opção, sem ser a padrão, 0, for selecionada
        //definir conteúdo a ser inserido
        let HiddenMaterial = `
        <div class="btn-group mt-1 mb-1" role="group" aria-label="Exemplo básico" id="InputMaterialHidden${idMaterial}">
            <button type="button" class="btn btn-secondary disable">${optionSelected.text}</button>
            <button type="button" class="btn btn-secondary material-icons" id='buttonDeleteMaterial${idMaterial}' onclick="DeleteMaterial(${idMaterial})">close</button>

            <input type="hidden" name="Material${idMaterial}" value="${idMaterial}">
        </div>
        `
    
        //inserir conteúdo
        divMaterial.insertAdjacentHTML('beforeend', HiddenMaterial)

        //Aumentar +1 ao índice que conta quantos materiais foram selecionados
        qtddMateriais++
        document.querySelector("#id_qtddMateriais").value = qtddMateriais

        //Desabilitar a opção selecionada
        newSelectMaterial.options[idMaterial].disabled = true
        DivSelectMaterial.replaceChild(newSelectMaterial, SelectMaterial)
    }
}

function DeleteMaterial(i){
    //remover conteúdo
    InputMaterialHidden = document.querySelector(`#InputMaterialHidden${i}`)//Child do Parent
    divMaterial.removeChild(InputMaterialHidden)//Remove

    //Diminuir 1 ao índice que conta quantos materiais foram selecionados
    qtddMateriais--
    document.querySelector("#id_qtddMateriais").value = qtddMateriais

    //habilitar opção no select após sua exclusão
    newSelectMaterial.options[i].disabled = false
    newSelectMaterial.value = 0
    DivSelectMaterial.replaceChild(newSelectMaterial, SelectMaterial)

    //padronizar o select novamente
    document.querySelector("#SelectMaterial").selectedOptions = 0
}

function incluirInputValue(i){
    document.getElementById("input_idColeta").value = i
}

function disableOption(i){
    let selectId = parseInt(i)

    let select = document.getElementById(`Material${selectId}`)
    let optionId = select.options[select.selectedIndex].value

    let qtddMateriais = document.getElementById("qtddMateriais").value
    
    let opcaoAnterior = document.getElementById(`optionAnterior${selectId}`).value
    /**/
    if(optionId != 0){
        for (let index = 1; index <= qtddMateriais; index++) {
            if(selectId != index){
                document.getElementById(`Material${index}`).options[optionId].disabled = true
            }

            if (opcaoAnterior != 0) {
                document.getElementById(`Material${index}`).options[opcaoAnterior].disabled = false
            }
        }
    }else{
        for (let index = 1; index <= qtddMateriais; index++) {
            document.getElementById(`Material${index}`).options[opcaoAnterior].disabled = false
        }
    }

    document.getElementById(`optionAnterior${selectId}`).value = optionId 
}