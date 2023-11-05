
function msgErro(msgErro){

    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Ops! :(',
        text: msgErro,
        showConfirmButton: true,
        timer: 7000
    });
}

function msgSucesso(msgSucesso){

    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Sucesso! :) ',
        text: msgSucesso,
        showConfirmButton: false,
        timer: 7000
    });
}

function confirmarExclusao(id, nome) {

    const nomeFormatado = `<span style="color: red;">${nome}</span>`;

    const deletar = Swal.mixin({
        customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
        },
        buttonsStyling: true
    });
    
    deletar.fire({
        title: 'Deseja mesmo excluir o produto?',
        text: '',
        html: nomeFormatado,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Sim, excluir!',
        cancelButtonText: 'Não, cancelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
        //* Aqui, você pode redirecionar o usuário para a rota de exclusão
        window.location.href = "/cardapio_online/deletar-produto/" + id;
        } else if (result.dismiss === Swal.DismissReason.cancel) {
        deletar.fire(
            'Cancelado',
            'O produto ' + nomeFormatado + ' não foi excluído.',
            'error'
        );
        }
    });
    }
