// Ajouter un bloc Image dans le formulaire :
$('#add-image').click(function() {
    var container_sous_formulaire = $('#ad_images');
    var widgetCounter = $('#widgets-counter');
    const index = +$(widgetCounter).val();

    // Récupérer le prototype des entrées :
    const tmpl = $(container_sous_formulaire).data('prototype').replace(/__name__/g, index);

    // J'injecte ce template au sein de la Div contenant les sous-formulaires :
    $(container_sous_formulaire).append(tmpl);

    $(widgetCounter).val(index + 1);

    handleDeleteButton();
});

// Supprimer un bloc Image dans le formulaire :
function handleDeleteButton() {
    $('button[data-action="delete"]').click(function(){
        const target = this.dataset.target;
        $(target).remove();
    })
}

function updateCounter() {
    const count = +$('#ad_images div.form-group').length;
    $('#widgets-counter').val(count);
}

updateCounter();
handleDeleteButton();