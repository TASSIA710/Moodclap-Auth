
/* Update Name */
function updateNameField(e) {
    const name = e.value.trim();
    document.getElementById('create_name_slug').innerHTML = encodeURI(name.toLowerCase().split(' ').join('-'));

    if (!validateName(name)) e.classList.add('border-danger');
    else e.classList.remove('border-danger');
}

function validateName(name) {
    if (!name) return false;
    if (!name.match(/^[a-zA-Z]+[a-zA-Z0-9-_ ]+$/)) return false;
    if (name.length < 3) return false;
    return name.length <= 32;
}
/* Update Name */



/* Create Group */
function createGroup() {
    document.getElementById('create_button').disabled = true;
    const name = document.getElementById('create_name_field').value.trim();
    const slug = encodeURI(name.toLowerCase().split(' ').join('-'));
    if (!validateName(name)) return;

    const data = {};
    data.name = name;

    launchAJAX(AUTH_CONFIG.ROOT + 'api/group/create/', data, function(res, status, text) {
        if (status !== 200) {
            document.getElementById('create_button').disabled = false;
            return false;
        }

        if (res.success) {
            document.location.href = AUTH_CONFIG.ROOT + 'group/' + slug + '/';
            return true;
        }

        showAlertDanger('', res.message);
        document.getElementById('create_button').disabled = false;
        return true;
    });
}
/* Create Group */



/* Abort Group Creation */
function abortGroupCreation() {
    window.location.href = AUTH_CONFIG.ROOT;
}
/* Abort Group Creation */



/* Load Event */
window.addEventListener('load', function() {
    let e;

    e = document.getElementById('create_name_field');
    if (e) e.addEventListener('input', function() { updateNameField(document.getElementById('create_name_field')); });

});
/* Load Event */