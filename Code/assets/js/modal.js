function testando(idColeta) {
    form_edit = document.getElementById("edit")
    form_delete = document.getElementById("delete")

    form_edit.href = `descartador_edita_solicitacao.php?idColeta=${idColeta}&&flag=1`
    form_delete.href = `descartador_delete_solicitacao.php?idColeta=${idColeta}`
}