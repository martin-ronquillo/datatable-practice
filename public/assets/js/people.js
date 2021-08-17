import { drawTable, personId } from "./drawtable.js";
import { getData, updatePerson } from "./endpoints.js"

let btnGuardar = document.getElementById('btn-guardar')

btnGuardar.onclick = () => {
    let form = document.forms['edit-person']
    updatePerson(form, personId).then(response => {
        form.reset()
    })
}

window.onload = async function() {
    const { data } = await getData()

    drawTable(data)
}